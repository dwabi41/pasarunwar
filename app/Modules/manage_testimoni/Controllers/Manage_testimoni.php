<?php 
namespace App\Modules\manage_testimoni\Controllers;
use App\Controllers\BaseController;


class Manage_testimoni extends BaseController
{
	public function __construct() {
		helper(['form', 'url']);
		$this->numOfContentsPerPage=50;
	}
	public function index()
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $page = $this->request->getVar('page') ? $this->request->getVar('page')-1 : 0;
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['perPage'] = $this->numOfContentsPerPage;
        $data['total'] = $this->data->countSearchData('testimoni', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'testimoni', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_testimoni\Views\index.php', $data);
    }
    public function tambah()
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        if ($this->request->getMethod() == "post")
        {
            if (! $this->validate([
                'date' => ['label' => 'Date', 'rules' => 'trim|required'],
                'nama' => ['label' => 'Nama', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_testimoni/tambah'))->withInput(); 
            } else
            {
                $filename='';
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'Foto', 'rules' => 'uploaded[file]|max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_testimoni/tambah/'))->withInput(); 
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='testimoni_'.$now.'_'.url_title($this->request->getVar('nama'), '-', true).'.'.$ext;
                    $file->move('public/uploads/testimoni/', $filename);
                }
                
                $this->data->adddata('testimoni', array(
                    'date' => $this->request->getVar('date'),
                    'nama' => $this->request->getVar('nama'),
                    'content' => $this->request->getVar('content'),
                    'status' => $this->request->getVar('status'),
                    'negara' => $this->request->getVar('negara'),
                    'img' => $filename,
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_testimoni')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\manage_testimoni\Views\tambah.php', $data);
        }
    }
    public function edit($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        if ($this->request->getMethod() == "post")
        {
            if (! $this->validate([
                'date' => ['label' => 'Date', 'rules' => 'trim|required'],
                'nama' => ['label' => 'nama', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_testimoni/edit/'.$id))->withInput(); 
            } else
            {   
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'Foto', 'rules' => 'uploaded[file]|max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_testimoni/edit/'.$id))->withInput(); 
                    }
                    $data = $this->data->getSpecificData('testimoni', array('id' => $id));
                    if(!empty($data->img)){
                        if(file_exists('public/uploads/testimoni/'.$data->img)){
                            unlink('public/uploads/testimoni/'.$data->img);
                        }                        
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='testimoni_'.$now.'_'.url_title($this->request->getVar('nama'), '-', true).'.'.$ext;
                    $file->move('public/uploads/testimoni/', $filename);
                    
                    $this->data->updateData(array(
                        'img' => $filename,
                    ), array('id' => $id), 'testimoni');
                }
                
                $this->data->updateData(array(
                    'date' => $this->request->getVar('date'),
                    'nama' => $this->request->getVar('nama'),
                    'content' => $this->request->getVar('content'),
                    'status' => $this->request->getVar('status'),
                    'negara' => $this->request->getVar('negara'),
                ), array('id' => $id), 'testimoni');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_testimoni')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('testimoni', array('id' => $id));
            echo view('\App\Modules\manage_testimoni\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('testimoni', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_testimoni')); 
    }
    
     public function search()
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $page = $this->request->getVar('page') ? $this->request->getVar('page')-1 : 0;
        $searchCache = $this->session->search;
        $search = $this->request->getVar('search');
        $search = isset($search) ? $search : $searchCache;
        $data['search'] = $search;
        $data['page'] = $page;
        $data['perPage'] = $this->numOfContentsPerPage;
        $data['total'] = $this->data->countSearchData('testimoni', null, null, 'nama LIKE \'%' . $search . '%\' OR nama LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'testimoni',null,null,'nama LIKE \'%' . $search . '%\' OR nama LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_testimoni\Views\index.php', $data);
    }
}