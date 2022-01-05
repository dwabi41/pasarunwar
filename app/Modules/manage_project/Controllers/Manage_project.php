<?php 
namespace App\Modules\manage_project\Controllers;
use App\Controllers\BaseController;


class Manage_project extends BaseController
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
        $data['total'] = $this->data->countSearchData('project', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'project', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_project\Views\index.php', $data);
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
                'id_category' => ['label' => 'Kategori', 'rules' => 'trim|required'],
                'id_subcategory' => ['label' => 'Subkategori', 'rules' => 'trim|required'],
                'company' => ['label' => 'Company', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_project/tambah'))->withInput(); 
            } else
            {
                $img='';
                if($this->request->getFile('img')->isValid()){
                    if (! $this->validate([
                        'img' => ['label' => 'Foto', 'rules' => 'uploaded[img]|max_size[img,2048]|is_image[img]|mime_in[img,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_project/tambah/'))->withInput(); 
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('img'); 
                    $ext = $file->guessExtension();
                    $img='project_'.$now.'_'.url_title($this->request->getVar('company'), '-', true).'.'.$ext;
                    $file->move('public/uploads/project/', $img);
                }
                $thumbnail='';
                if($this->request->getFile('thumbnail')->isValid()){
                    if (! $this->validate([
                        'thumbnail' => ['label' => 'Thumbnail', 'rules' => 'uploaded[thumbnail]|max_size[thumbnail,2048]|is_image[thumbnail]|mime_in[thumbnail,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_project/tambah/'))->withInput(); 
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('thumbnail'); 
                    $ext = $file->guessExtension();
                    $thumbnail='project_'.$now.'_'.url_title($this->request->getVar('company'), '-', true).'.'.$ext;
                    $file->move('public/uploads/project/', $thumbnail);
                }
                
                $this->data->adddata('project', array(
                    'id_category' => $this->request->getVar('id_category'),
                    'id_subcategory' => $this->request->getVar('id_subcategory'),
                    'company' => $this->request->getVar('company'),
                    'location' => $this->request->getVar('location'),
                    'content' => $this->request->getVar('content'),
                    'url' => $this->request->getVar('url'),
                    'create_date' => $this->request->getVar('create_date'),
                    'adsense' => $this->request->getVar('adsense'),
                    'hit' => $this->request->getVar('hit'),
                    'status' => $this->request->getVar('status'),
                    'img' => $img,
                    'thumbnail' => $thumbnail,
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_project')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['kategori'] = $this->data->searchdatasort(null,null, 'kategori_project', null, null, null, 'id', 'DESC');
    		$data['subkategori'] = $this->data->searchdatasort(null,null, 'subkategori_project', null, null, null, 'id', 'DESC');
            echo view('\App\Modules\manage_project\Views\tambah.php', $data);
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
                'id_category' => ['label' => 'Kategori', 'rules' => 'trim|required'],
                'id_subcategory' => ['label' => 'Subkategori', 'rules' => 'trim|required'],
                'company' => ['label' => 'Company', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_project/edit/'.$id))->withInput(); 
            } else
            {   
                if($this->request->getFile('img')->isValid()){
                    if (! $this->validate([
                        'img' => ['label' => 'Foto', 'rules' => 'uploaded[img]|max_size[img,2048]|is_image[img]|mime_in[img,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_project/edit/'.$id))->withInput(); 
                    }
                    $data = $this->data->getSpecificData('project', array('id' => $id));
                    if(!empty($data->img)){
                        if(file_exists('public/uploads/project/'.$data->img)){
                            unlink('public/uploads/project/'.$data->img);
                        }                        
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('img'); 
                    $ext = $file->guessExtension();
                    $filename='project_'.$now.'_'.url_title($this->request->getVar('company'), '-', true).'.'.$ext;
                    $file->move('public/uploads/project/', $filename);
                    
                    $this->data->updateData(array(
                        'img' => $filename,
                    ), array('id' => $id), 'project');
                }
                if($this->request->getFile('thumbnail')->isValid()){
                    if (! $this->validate([
                        'thumbnail' => ['label' => 'Thumbnail', 'rules' => 'uploaded[thumbnail]|max_size[thumbnail,2048]|is_image[thumbnail]|mime_in[thumbnail,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                        return redirect()->to(base_url('manage_project/edit/'.$id))->withInput(); 
                    }
                    $data = $this->data->getSpecificData('project', array('id' => $id));
                    if(!empty($data->thumbnail)){
                        if(file_exists('public/uploads/project/'.$data->thumbnail)){
                            unlink('public/uploads/project/'.$data->thumbnail);
                        }                        
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('thumbnail'); 
                    $ext = $file->guessExtension();
                    $filename='project_'.$now.'_'.url_title($this->request->getVar('company'), '-', true).'.'.$ext;
                    $file->move('public/uploads/project/', $filename);
                    
                    $this->data->updateData(array(
                        'thumbnail' => $filename,
                    ), array('id' => $id), 'project');
                }
                
                $this->data->updateData(array(
                    'id_category' => $this->request->getVar('id_category'),
                    'id_subcategory' => $this->request->getVar('id_subcategory'),
                    'company' => $this->request->getVar('company'),
                    'location' => $this->request->getVar('location'),
                    'content' => $this->request->getVar('content'),
                    'url' => $this->request->getVar('url'),
                    'create_date' => $this->request->getVar('create_date'),
                    'adsense' => $this->request->getVar('adsense'),
                    'hit' => $this->request->getVar('hit'),
                    'status' => $this->request->getVar('status'),
                ), array('id' => $id), 'project');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_project')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['kategori'] = $this->data->searchdatasort(null,null, 'kategori_project', null, null, null, 'id', 'DESC');
    		$data['subkategori'] = $this->data->searchdatasort(null,null, 'subkategori_project', null, null, null, 'id', 'DESC');
    		$data['data'] = $this->data->getSpecificData('project', array('id' => $id));
            echo view('\App\Modules\manage_project\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('project', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_project')); 
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
        $data['total'] = $this->data->countSearchData('project', null, null, 'company LIKE \'%' . $search . '%\' OR company LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'project',null,null,'company LIKE \'%' . $search . '%\' OR company LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_project\Views\index.php', $data);
    }
}