<?php 
namespace App\Modules\manage_foto_project\Controllers;
use App\Controllers\BaseController;


class Manage_foto_project extends BaseController
{
	public function __construct() {
		helper(['form', 'url']);
		$this->numOfContentsPerPage=50;
	}
	public function foto_project($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $page = $this->request->getVar('page') ? $this->request->getVar('page')-1 : 0;
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['uri']= $this->uri;
		$data['pager']= $this->pager;
        $data['perPage'] = $this->numOfContentsPerPage;
        $data['total'] = $this->data->countSearchData('foto_project', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'foto_project', null, null, 'id_project="'.$id.'"', 'id', 'DESC');
        echo view('\App\Modules\manage_foto_project\Views\index.php', $data);
    }
    public function tambah($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        if ($this->request->getMethod() == "post")
        {
            if (! $this->validate([
                'id_project' => ['label' => 'Id Project', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_foto_project/tambah/'.$id))->withInput(); 
            } else
            {
                if ($this->request->getFileMultiple('file')) {
                    if (! $this->validate([
                        'file' => ['label' => 'foto_project', 'rules' => 'uploaded[file]|max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_foto_project/tambah/'.$id))->withInput(); 
                    }
                    $imagefile = $this->request->getFiles();
                    foreach($imagefile['file'] as $file) {
                        $filename = $file->getRandomName();
                        $file->move('public/uploads/foto_project/', $filename);
                        $this->data->adddata('foto_project', array(
                            'id_project' => $this->request->getVar('id_project'),
                            'img' => $filename,
                        ));
                    }
                }
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_foto_project/foto_project/'.$this->request->getVar('id_project'))); 
            }
        } else
        {
    		$data['uri']= $this->uri;
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\manage_foto_project\Views\tambah.php', $data);
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
                'id_project' => ['label' => 'Id Project', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_foto_project/edit/'.$id))->withInput(); 
            } else
            {   
                if($this->request->getFile('file')->isValid()){
                    if (! $this->validate([
                        'file' => ['label' => 'foto_project', 'rules' => 'uploaded[file]|max_size[file,2048]|is_image[file]|mime_in[file,image/png,image/jpg,image/jpeg]'],
                    ]))
                    {
                         return redirect()->to(base_url('manage_foto_project/edit/'.$id))->withInput(); 
                    }
                    $data = $this->data->getSpecificData('foto_project', array('id' => $id));
                    if(!empty($data->img)){
                        if(file_exists('public/uploads/foto_project/'.$data->img)){
                            unlink('public/uploads/foto_project/'.$data->img);
                        }                        
                    }
                    $now= date('ydmhms');
                    $file = $this->request->getFile('file'); 
                    $ext = $file->guessExtension();
                    $filename='foto_project_'.$now.'_.'.$ext;
                    $file->move('public/uploads/foto_project/', $filename);
                    
                    $this->data->updateData(array(
                        'img' => $filename,
                    ), array('id' => $id), 'foto_project');
                }
                
                $this->data->updateData(array(
                    'id_project' => $this->request->getVar('id_project'),
                ), array('id' => $id), 'foto_project');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_foto_project/foto_project/'.$this->request->getVar('id_project'))); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('foto_project', array('id' => $id));
            echo view('\App\Modules\manage_foto_project\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $data['data'] = $this->data->getSpecificData('foto_project', array('id' => $id));
        $this->data->deletedata('foto_project', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_foto_project/foto_project/'.$data['data']->id_project)); 
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
        $data['total'] = $this->data->countSearchData('foto_project', null, null, 'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'foto_project',null,null,'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_foto_project\Views\index.php', $data);
    }
}