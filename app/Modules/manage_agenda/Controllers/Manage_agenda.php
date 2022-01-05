<?php 
namespace App\Modules\manage_agenda\Controllers;
use App\Controllers\BaseController;


class Manage_agenda extends BaseController
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
        $data['total'] = $this->data->countSearchData('agenda', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'agenda', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_agenda\Views\index.php', $data);
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
                'date' => ['label' => 'Start Date', 'rules' => 'trim|required'],
                'end_date' => ['label' => 'End Date', 'rules' => 'trim|required'],
                'time' => ['label' => 'Time', 'rules' => 'trim|required'],
                'place' => ['label' => 'Place', 'rules' => 'trim|required'],
                'title' => ['label' => 'Title', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_agenda/tambah'))->withInput(); 
            } else
            {
                $this->data->adddata('agenda', array(
                    'date' => $this->request->getVar('date'),
                    'end_date' => $this->request->getVar('end_date'),
                    'time' => $this->request->getVar('time'),
                    'place' => $this->request->getVar('place'),
                    'title' => $this->request->getVar('title'),
                    'content' => $this->request->getVar('content'),
                    'hit' => $this->request->getVar('hit'),
                    'status' => $this->request->getVar('status'),
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_agenda')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\manage_agenda\Views\tambah.php', $data);
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
                'date' => ['label' => 'Start Date', 'rules' => 'trim|required'],
                'end_date' => ['label' => 'End Date', 'rules' => 'trim|required'],
                'time' => ['label' => 'Time', 'rules' => 'trim|required'],
                'place' => ['label' => 'Place', 'rules' => 'trim|required'],
                'title' => ['label' => 'Title', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_agenda/edit/'.$id))->withInput(); 
            } else
            {
                $this->data->updateData(array(
                    'date' => $this->request->getVar('date'),
                    'end_date' => $this->request->getVar('end_date'),
                    'time' => $this->request->getVar('time'),
                    'place' => $this->request->getVar('place'),
                    'title' => $this->request->getVar('title'),
                    'content' => $this->request->getVar('content'),
                    'hit' => $this->request->getVar('hit'),
                    'status' => $this->request->getVar('status'),
                ), array('id' => $id), 'agenda');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_agenda')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('agenda', array('id' => $id));
            echo view('\App\Modules\manage_agenda\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('agenda', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_agenda')); 
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
        $data['total'] = $this->data->countSearchData('agenda', null, null, 'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'agenda',null,null,'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_agenda\Views\index.php', $data);
    }
}