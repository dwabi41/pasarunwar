<?php 
namespace App\Modules\manage_berita\Controllers;
use App\Controllers\BaseController;


class Manage_berita extends BaseController
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
        $data['total'] = $this->data->countSearchData('berita', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'berita', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_berita\Views\index.php', $data);
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
                 return redirect()->to(base_url('manage_berita/tambah'))->withInput(); 
            } else
            {
                $filename='';
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'Foto', 'rules' => 'uploaded[file]|max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_berita/tambah/'))->withInput(); 
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='Berita_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/berita/', $filename);
                }
                
                $this->data->adddata('berita', array(
                    'date' => $this->request->getVar('date'),
                    'id_category' => $this->request->getVar('id_category'),
                    'title' => $this->request->getVar('title'),
                    'content' => $this->request->getVar('content'),
                    'caption' => $this->request->getVar('caption'),
                    'hit' => $this->request->getVar('hit'),
                    'status' => $this->request->getVar('status'),
                    'tags' => $this->request->getVar('tags'),
                    'keyword' => $this->request->getVar('keyword'),
                    'img' => $filename,
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_berita')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['kategori'] = $this->data->searchdatasort(null,null, 'kategori', null, null, null, 'id', 'DESC');
            echo view('\App\Modules\manage_berita\Views\tambah.php', $data);
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
                 return redirect()->to(base_url('manage_berita/edit/'.$id))->withInput(); 
            } else
            {   
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'Foto', 'rules' => 'uploaded[file]|max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_berita/edit/'.$id))->withInput(); 
                    }
                    $data = $this->data->getSpecificData('berita', array('id' => $id));
                    if(!empty($data->img)){
                        if(file_exists('public/uploads/berita/'.$data->img)){
                            unlink('public/uploads/berita/'.$data->img);
                        }                        
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='Berita_'.$now.'_'.url_title($this->request->getVar('title'), '-', true).'.'.$ext;
                    $file->move('public/uploads/berita/', $filename);
                    
                    $this->data->updateData(array(
                        'img' => $filename,
                    ), array('id' => $id), 'berita');
                }
                
                $this->data->updateData(array(
                    'date' => $this->request->getVar('date'),
                    'id_category' => $this->request->getVar('id_category'),
                    'title' => $this->request->getVar('title'),
                    'content' => $this->request->getVar('content'),
                    'caption' => $this->request->getVar('caption'),
                    'hit' => $this->request->getVar('hit'),
                    'status' => $this->request->getVar('status'),
                    'tags' => $this->request->getVar('tags'),
                    'keyword' => $this->request->getVar('keyword'),
                ), array('id' => $id), 'berita');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_berita')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['kategori'] = $this->data->searchdatasort(null,null, 'kategori', null, null, null, 'id', 'DESC');
    		$data['data'] = $this->data->getSpecificData('berita', array('id' => $id));
            echo view('\App\Modules\manage_berita\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('berita', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_berita')); 
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
        $data['total'] = $this->data->countSearchData('berita', null, null, 'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'berita',null,null,'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_berita\Views\index.php', $data);
    }
}