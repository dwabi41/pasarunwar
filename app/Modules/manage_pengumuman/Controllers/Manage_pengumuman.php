<?php 
namespace App\Modules\manage_pengumuman\Controllers;
use App\Controllers\BaseController;


class Manage_pengumuman extends BaseController
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
        $data['total'] = $this->data->countSearchData('pengumuman', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'pengumuman', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_pengumuman\Views\index.php', $data);
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
                 return redirect()->to(base_url('manage_pengumuman/tambah'))->withInput(); 
            } else
            {
                $img='';
                if($this->request->getFile('img')->isValid()){
                    if (! $this->validate([
                        'img' => ['label' => 'Foto', 'rules' => 'uploaded[img]|max_size[img,2048]|is_image[img]|mime_in[img,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_pengumuman/tambah/'))->withInput(); 
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('img'); 
                    $ext = $file->guessExtension();
                    $img='pengumuman_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/pengumuman/', $img);
                }
                $filename='';
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'File', 'rules' => 'uploaded[file]|max_size[file,2048]|ext_in[file,png,jpg,jpeg,pdf,docx,doc,xls,xlsx]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_pengumuman/tambah/'))->withInput(); 
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='pengumuman_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/pengumuman/', $filename);
                }
                
                $this->data->adddata('pengumuman', array(
                    'date' => $this->request->getVar('date'),
                    'title' => $this->request->getVar('title'),
                    'content' => $this->request->getVar('content'),
                    'hit' => $this->request->getVar('hit'),
                    'status' => $this->request->getVar('status'),
                    'img' => $img,
                    'file' => $filename,
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_pengumuman')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\manage_pengumuman\Views\tambah.php', $data);
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
                 return redirect()->to(base_url('manage_pengumuman/edit/'.$id))->withInput(); 
            } else
            {   
                if($this->request->getFile('img')->isValid()){
                    if (! $this->validate([
                        'img' => ['label' => 'Foto', 'rules' => 'uploaded[img]|max_size[img,2048]|is_image[img]|mime_in[img,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_pengumuman/edit/'.$id))->withInput(); 
                    }
                    $data = $this->data->getSpecificData('pengumuman', array('id' => $id));
                    if(!empty($data->img)){
                        if(file_exists('public/uploads/pengumuman/'.$data->img)){
                            unlink('public/uploads/pengumuman/'.$data->img);
                        }                        
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('img'); 
                    $ext = $file->guessExtension();
                    $filename='pengumuman_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/pengumuman/', $filename);
                    
                    $this->data->updateData(array(
                        'img' => $filename,
                    ), array('id' => $id), 'pengumuman');
                }
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'File', 'rules' => 'uploaded[file]|max_size[file,2048]|ext_in[file,png,jpg,jpeg,pdf,docx,doc,xls,xlsx]'],
                    ]))
                    {
                        return redirect()->to(base_url('manage_pengumuman/edit/'.$id))->withInput(); 
                    }
                    $data = $this->data->getSpecificData('pengumuman', array('id' => $id));
                    if(!empty($data->file)){
                        if(file_exists('public/uploads/pengumuman/'.$data->file)){
                            unlink('public/uploads/pengumuman/'.$data->file);
                        }                        
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='pengumuman_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/pengumuman/', $filename);
                    
                    $this->data->updateData(array(
                        'file' => $filename,
                    ), array('id' => $id), 'pengumuman');
                }
                
                $this->data->updateData(array(
                    'date' => $this->request->getVar('date'),
                    'title' => $this->request->getVar('title'),
                    'content' => $this->request->getVar('content'),
                    'hit' => $this->request->getVar('hit'),
                    'status' => $this->request->getVar('status'),
                ), array('id' => $id), 'pengumuman');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_pengumuman')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('pengumuman', array('id' => $id));
            echo view('\App\Modules\manage_pengumuman\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('pengumuman', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_pengumuman')); 
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
        $data['total'] = $this->data->countSearchData('pengumuman', null, null, 'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'pengumuman',null,null,'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_pengumuman\Views\index.php', $data);
    }
}