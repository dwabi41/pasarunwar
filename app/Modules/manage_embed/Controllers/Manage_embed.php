<?php 
namespace App\Modules\manage_embed\Controllers;
use App\Controllers\BaseController;


class Manage_embed extends BaseController
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
        $data['total'] = $this->data->countSearchData('embed', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'embed', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_embed\Views\index.php', $data);
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
                'type' => ['label' => 'Type', 'rules' => 'trim|required'],
                'embed' => ['label' => 'Embed', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_embed/tambah'))->withInput(); 
            } else
            {
                $this->data->adddata('embed', array(
                    'type' => $this->request->getVar('type'),
                    'embed' => $this->request->getVar('embed'),
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_embed')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\manage_embed\Views\tambah.php', $data);
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
                'type' => ['label' => 'Type', 'rules' => 'trim|required'],
                'embed' => ['label' => 'Embed', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_embed/edit/'.$id))->withInput(); 
            } else
            {
                $this->data->updateData(array(
                    'type' => $this->request->getVar('type'),
                    'embed' => $this->request->getVar('embed'),
                ), array('id' => $id), 'embed');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_embed')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('embed', array('id' => $id));
            echo view('\App\Modules\manage_embed\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('embed', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_embed')); 
    }
}