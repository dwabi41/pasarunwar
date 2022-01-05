<?php 
namespace App\Modules\manage_pengaturan\Controllers;
use App\Controllers\BaseController;

class Manage_pengaturan extends BaseController
{
	public function __construct() {
		helper(['form', 'url']);
	}
	
	public function index()
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $search = $this->request->getVar('search');
        if (isset($search))
        {
            $this->search();
        } else
        {
    		$data['model']= $this->data;
            $data['validation'] = $this->validation;
            $data['data'] = $this->data->getSpecificData('pengaturan', array('id' => 1));
            echo view('\App\Modules\manage_pengaturan\Views\index.php', $data);
        }
    }
    public function editpengaturan()
    {
        if ($this->request->getMethod() == "post")
        {
            if (! $this->validate([
                'company' => ['label' => 'Company', 'rules' => 'trim|required'],
                'address' => ['label' => 'Address', 'rules' => 'trim|required'],
                'phone' => ['label' => 'Phone', 'rules' => 'trim|required'],
                'meta_title' => ['label' => 'Meta Title', 'rules' => 'trim|required'],
                'meta_description' => ['label' => 'Meta Description', 'rules' => 'trim|required'],
                'meta_keyword' => ['label' => 'Meta Keyword', 'rules' => 'trim|required'],
                'copyright' => ['label' => 'Copyright', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_pengaturan'))->withInput(); 
            } else
            {
                $this->data->updatedata(array(
                'company' => $this->request->getVar('company'),
                'address' => $this->request->getVar('address'),
                'phone' => $this->request->getVar('phone'),
                'fax' => $this->request->getVar('fax'),
                'email' => $this->request->getVar('email'),
                'website' => $this->request->getVar('website'),
                'copyright' => $this->request->getVar('copyright'),
                'meta_title' => $this->request->getVar('meta_title'),
                'meta_description' => $this->request->getVar('meta_description'),
                'meta_keyword' => $this->request->getVar('meta_keyword'),
                'judul_intro1' => $this->request->getVar('judul_intro1'),
                'judul_intro2' => $this->request->getVar('judul_intro2'),
                'intro1' => $this->request->getVar('intro1'),
                'intro2' => $this->request->getVar('intro2'),
                ), array('id' => 1), 'pengaturan');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_pengaturan')); 
            }
        } else
        {
            return redirect()->to(base_url('manage_pengaturan')); 
        }
    }
    public function editlogo()
    {   
        if ($this->request->getMethod() == "post")
        {
            if (! $this->validate([
                'header' => ['label' => 'Logo', 'rules' => 'uploaded[header]|max_size[header,2048]|is_image[header]|mime_in[header,image/png,image/jpg,image/jpeg]'],
            ]))
            {
                return redirect()->to(base_url('manage_pengaturan'))->withInput(); 
            } else
            {
                $data = $this->data->getSpecificData('pengaturan', array('id' => 1));
                if(file_exists('public/uploads/'.$data->header)){
                    unlink('public/uploads/'.$data->header);
                }
                $now= date('ydmhms');
                $file = $this->request->getFile('header'); 
                $ext = $file->guessExtension();
                $filename='Logo_'.$now.'_'.url_title($this->request->getVar('company'), '-', true).'.'.$ext;
                $file->move('public/uploads', $filename);
                $this->data->updatedata(array(
                'header' => $filename,
                ), array('id' => 1), 'pengaturan');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_pengaturan')); 
            }
        } else
        {
            return redirect()->to(base_url('manage_pengaturan')); 
        }
    }
    public function editfavicon()
    {   
        if ($this->request->getMethod() == "post")
        {
            if (! $this->validate([
                'favicon' => ['label' => 'Favicon', 'rules' => 'uploaded[favicon]|max_size[favicon,2048]|is_image[favicon]'],
            ]))
            {
                return redirect()->to(base_url('manage_pengaturan'))->withInput(); 
            } else
            {
                $data = $this->data->getSpecificData('pengaturan', array('id' => 1));
                if(file_exists('public/uploads/'.$data->favicon)){
                    unlink('public/uploads/'.$data->favicon);
                }
                $now= date('ydmhms');
                $file = $this->request->getFile('favicon'); 
                $ext = $file->guessExtension();
                $filename='Favicon_'.$now.'_'.url_title($this->request->getVar('company'), '-', true).'.'.$ext;
                $file->move('public/images', $filename);
                $this->data->updatedata(array(
                'favicon' => $filename,
                ), array('id' => 1), 'pengaturan');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_pengaturan')); 
            }
        } else
        {
            return redirect()->to(base_url('manage_pengaturan')); 
        }
    }
    public function editbackground()
    {   
        if ($this->request->getMethod() == "post")
        {
            if (! $this->validate([
                'background' => ['label' => 'Background', 'rules' => 'uploaded[background]|max_size[background,2048]|is_image[background]|mime_in[background,image/png,image/jpg,image/jpeg]'],
            ]))
            {
                return redirect()->to(base_url('manage_pengaturan'))->withInput(); 
            } else
            {
                $data = $this->data->getSpecificData('pengaturan', array('id' => 1));
                if(file_exists('public/uploads/'.$data->background)){
                    unlink('public/uploads/'.$data->background);
                }
                $now= date('ydmhms');
                $file = $this->request->getFile('background'); 
                $ext = $file->guessExtension();
                $filename='Background_'.$now.'_'.url_title($this->request->getVar('company'), '-', true).'.'.$ext;
                $file->move('public/uploads', $filename);
                $this->data->updatedata(array(
                'background' => $filename,
                ), array('id' => 1), 'pengaturan');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_pengaturan')); 
            }
        } else
        {
            return redirect()->to(base_url('manage_pengaturan')); 
        }
    }
    public function editabout()
    {   
        if ($this->request->getMethod() == "post")
        {
            if (! $this->validate([
                'about' => ['label' => 'About', 'rules' => 'uploaded[about]|max_size[about,2048]|is_image[about]|mime_in[about,image/png,image/jpg,image/jpeg]'],
            ]))
            {
                return redirect()->to(base_url('manage_pengaturan'))->withInput(); 
            } else
            {
                $data = $this->data->getSpecificData('pengaturan', array('id' => 1));
                if(file_exists('public/uploads/'.$data->about)){
                    unlink('public/uploads/'.$data->about);
                }
                $now= date('ydmhms');
                $file = $this->request->getFile('about'); 
                $ext = $file->guessExtension();
                $filename='About_'.$now.'_'.url_title($this->request->getVar('company'), '-', true).'.'.$ext;
                $file->move('public/uploads', $filename);
                $this->data->updatedata(array(
                'about' => $filename,
                ), array('id' => 1), 'pengaturan');
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_pengaturan')); 
            }
        } else
        {
            return redirect()->to(base_url('manage_pengaturan')); 
        }
    }
}