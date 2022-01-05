<?php 
namespace App\Modules\technical_support\Controllers;
use App\Controllers\BaseController;


class Technical_support extends BaseController
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
        if ($this->request->getMethod() == "post")
        {
            if (! $this->validate([
                'nama' => ['label' => 'Nama', 'rules' => 'trim|required'],
                'email' => ['label' => 'Email', 'rules' => 'trim|required'],
                'title' => ['label' => 'Title', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('technical_support/'))->withInput(); 
            } else
            {
                $pengaturan = $this->data->getSpecificData('pengaturan', array('id' => 1));
                $email_smtp = \Config\Services::email();

                $email_smtp->setFrom($this->request->getVar('email'), $this->request->getVar('nama'));
                $email_smtp->setTo("team@rumahmedia.com");
                
                $email_smtp->setSubject("Technical Support ".$pengaturan->company." | ".$this->request->getVar('title'));
                $email_smtp->setMessage("<table width='100%' cellspacing='1' cellpadding='1' border='0' style='border-collapse:collapse;border: 1px solid #000000;'>
                  <tr>
                    <td colspan='3' style='background:#000000;color:#FFFFFF;'><div align='center' class='style1'>Help Support Website ".$pengaturan->company." </div></td>
                  </tr>
                  <tr>
                    <td width='5%'>&nbsp;</td>
                    <td width='1%'>&nbsp;</td>
                    <td width='94%'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>".date('l j F Y h:i:s A')."</td>
                  </tr>
                  <tr>
                    <td>Website</td>
                    <td>:</td>
                    <td>".$pengaturan->website."</td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>".$this->request->getVar('nama')."</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>".$this->request->getVar('email')."</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Title</td>
                    <td>:</td>
                    <td>".$this->request->getVar('title')."</td>
                  </tr>
                  <tr>
                    <td>Content</td>
                    <td>:</td>
                    <td>".$this->request->getVar('content')."</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>");
                
                
                if(! $email_smtp->send()){
        			session()->setFlashData('msg', 
                    '<div class="alert alert-danger">
                        <h4>Gagal </h4>
                        <p>Anda gagal mengirim pesan</p>
                    </div>');
        		}else{
        			session()->setFlashData('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil </h4>
                        <p>Anda berhasil mengirim pesan</p>
                    </div>');
        		}
                return redirect()->to(base_url('technical_support')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
            echo view('\App\Modules\technical_support\Views\tambah.php', $data);
        }
    }
}