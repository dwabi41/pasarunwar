<?php 
namespace App\Modules\manage_kontak_kami\Controllers;
use App\Controllers\BaseController;


class Manage_kontak_kami extends BaseController
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
        $data['total'] = $this->data->countSearchData('kontak_kami', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'kontak_kami', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_kontak_kami\Views\index.php', $data);
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
                'title' => ['label' => 'Title', 'rules' => 'trim|required'],
                'kontak' => ['label' => 'Kontak', 'rules' => 'trim|required'],
                'type' => ['label' => 'Type', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_kontak_kami/tambah'))->withInput(); 
            } else
            {
                $this->data->adddata('kontak_kami', array(
                    'title' => $this->request->getVar('title'),
                    'kontak' => $this->request->getVar('kontak'),
                    'type' => $this->request->getVar('type'),
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_kontak_kami')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\manage_kontak_kami\Views\tambah.php', $data);
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
                'title' => ['label' => 'Title', 'rules' => 'trim|required'],
                'kontak' => ['label' => 'Kontak', 'rules' => 'trim|required'],
                'type' => ['label' => 'Type', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_kontak_kami/edit/'.$id))->withInput(); 
            } else
            {
                $this->data->updateData(array(
                    'title' => $this->request->getVar('title'),
                    'kontak' => $this->request->getVar('kontak'),
                    'type' => $this->request->getVar('type'),
                ), array('id' => $id), 'kontak_kami');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_kontak_kami')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('kontak_kami', array('id' => $id));
            echo view('\App\Modules\manage_kontak_kami\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('kontak_kami', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_kontak_kami')); 
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
        $data['total'] = $this->data->countSearchData('kontak_kami', null, null, 'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'kontak_kami',null,null,'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_kontak_kami\Views\index.php', $data);
    }
}