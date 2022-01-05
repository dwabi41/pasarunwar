<?php 
namespace App\Modules\manage_users\Controllers;
use App\Controllers\BaseController;


class Manage_users extends BaseController
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
        $data['total'] = $this->data->countSearchData('users', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'users', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_users\Views\index.php', $data);
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
                'username' => ['label' => 'Username', 'rules' => 'trim|required|is_unique[users.username]'],
                'nama' => ['label' => 'Nama', 'rules' => 'trim|required'],
                'email' => ['label' => 'Email', 'rules' => 'trim|required'],
                'password' => ['label' => 'Password', 'rules' => 'trim|required|matches[confirm_password]'],
            ]))
            {
                 return redirect()->to(base_url('manage_users/tambah'))->withInput(); 
            } else
            {
                $this->data->adddata('users', array(
                    'username' => $this->request->getVar('username'),
                    'nama' => $this->request->getVar('nama'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_users')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\manage_users\Views\tambah.php', $data);
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
                'username' => ['label' => 'Username', 'rules' => 'trim|required'],
                'nama' => ['label' => 'Nama', 'rules' => 'trim|required'],
                'email' => ['label' => 'Email', 'rules' => 'trim|required'],
                'password' => ['label' => 'Password', 'rules' => 'trim|required|matches[confirm_password]'],
            ]))
            {
                 return redirect()->to(base_url('manage_users/edit/'.$id))->withInput(); 
            } else
            {
                $this->data->updateData(array(
                    'username' => $this->request->getVar('username'),
                    'nama' => $this->request->getVar('nama'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                ), array('id' => $id), 'users');
                $this->session->set('logged_in', $this->data->login($this->request->getVar('username'), $this->request->getVar('password')));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_users')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('users', array('id' => $id));
            echo view('\App\Modules\manage_users\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('users', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_users')); 
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
        $data['total'] = $this->data->countSearchData('users', null, null, 'nama LIKE \'%' . $search . '%\' OR username LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'users',null,null,'nama LIKE \'%' . $search . '%\' OR username LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_users\Views\index.php', $data);
    }
}