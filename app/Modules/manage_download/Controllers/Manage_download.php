<?php 
namespace App\Modules\manage_download\Controllers;
use App\Controllers\BaseController;


class Manage_download extends BaseController
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
        $data['total'] = $this->data->countSearchData('download', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'download', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_download\Views\index.php', $data);
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
                'title' => ['label' => 'Title', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_download/tambah'))->withInput(); 
            } else
            {
                $filename='';
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'File', 'rules' => 'uploaded[file]|max_size[file,2048]|ext_in[file,png,jpg,jpeg,pdf,docx,doc,xls,xlsx]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_download/tambah/'))->withInput(); 
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='download_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/download/', $filename);
                }
                
                $this->data->adddata('download', array(
                    'title' => $this->request->getVar('title'),
                    'status' => $this->request->getVar('status'),
                    'date' => $this->request->getVar('date'),
                    'file' => $filename,
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_download')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\manage_download\Views\tambah.php', $data);
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
                'title' => ['label' => 'Title', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_download/edit/'.$id))->withInput(); 
            } else
            {   
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'File', 'rules' => 'uploaded[file]|max_size[file,2048]|ext_in[file,png,jpg,jpeg,pdf,docx,doc,xls,xlsx]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_download/edit/'.$id))->withInput(); 
                    }
                    $data = $this->data->getSpecificData('download', array('id' => $id));
                    if(!empty($data->file)){
                        if(file_exists('public/uploads/download/'.$data->file)){
                            unlink('public/uploads/download/'.$data->file);
                        }                        
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='download_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/download/', $filename);
                    
                    $this->data->updateData(array(
                        'file' => $filename,
                    ), array('id' => $id), 'download');
                }
                
                $this->data->updateData(array(
                    'title' => $this->request->getVar('title'),
                    'status' => $this->request->getVar('status'),
                    'date' => $this->request->getVar('date'),
                ), array('id' => $id), 'download');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_download')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('download', array('id' => $id));
            echo view('\App\Modules\manage_download\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('download', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_download')); 
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
        $data['total'] = $this->data->countSearchData('download', null, null, 'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'download',null,null,'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_download\Views\index.php', $data);
    }
}