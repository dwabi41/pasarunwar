<?php 
namespace App\Modules\manage_banner\Controllers;
use App\Controllers\BaseController;


class Manage_banner extends BaseController
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
        $data['total'] = $this->data->countSearchData('banner', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'banner', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_banner\Views\index.php', $data);
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
                'url' => ['label' => 'Url', 'rules' => 'trim|required'],
                'title' => ['label' => 'Title', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_banner/tambah'))->withInput(); 
            } else
            {
                $filename='';
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'Foto', 'rules' => 'uploaded[file]|max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_banner/tambah/'))->withInput(); 
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='banner_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/banner/', $filename);
                }
                
                $this->data->adddata('banner', array(
                    'title' => $this->request->getVar('title'),
                    'status' => $this->request->getVar('status'),
                    'url' => $this->request->getVar('url'),
                    'img' => $filename,
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_banner')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\manage_banner\Views\tambah.php', $data);
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
                'url' => ['label' => 'Url', 'rules' => 'trim|required'],
                'title' => ['label' => 'Title', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_banner/edit/'.$id))->withInput(); 
            } else
            {   
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'Foto', 'rules' => 'uploaded[file]|max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_banner/edit/'.$id))->withInput(); 
                    }
                    $data = $this->data->getSpecificData('banner', array('id' => $id));
                    if(!empty($data->img)){
                        if(file_exists('public/uploads/banner/'.$data->img)){
                            unlink('public/uploads/banner/'.$data->img);
                        }                        
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='banner_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/banner/', $filename);
                    
                    $this->data->updateData(array(
                        'img' => $filename,
                    ), array('id' => $id), 'banner');
                }
                
                $this->data->updateData(array(
                    'title' => $this->request->getVar('title'),
                    'status' => $this->request->getVar('status'),
                    'url' => $this->request->getVar('url'),
                ), array('id' => $id), 'banner');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_banner')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('banner', array('id' => $id));
            echo view('\App\Modules\manage_banner\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('banner', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_banner')); 
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
        $data['total'] = $this->data->countSearchData('banner', null, null, 'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'banner',null,null,'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_banner\Views\index.php', $data);
    }
}