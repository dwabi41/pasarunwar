<?php 
namespace App\Modules\backoffice\Controllers;
use App\Controllers\BaseController;

class Backoffice extends BaseController
{
	public function __construct() {
		helper(['form', 'url']);
	}
	
	public function index()
    {
        if ($this->session->logged_in)
        {
            return redirect()->to(base_url('manage_project')); 
    		/*$data['model']= $this->data;
    	    echo view('\App\Modules\backoffice\Views\dashboard.php', $data);*/
        } else
        {
            $data['validation'] = $this->validation;
            $data['data'] = $this->data->getSpecificData('pengaturan', array('id' => 1));
    	    echo view('\App\Modules\backoffice\Views\login-page.php', $data);
    		
        }
    }
    public function verifyLogin()
    {
        //This method will have the credentials validation
        
        if (! $this->validate([
            'username' => ['label' => 'Username', 'rules' => 'trim|required'],
            'password' => ['label' => 'Password', 'rules' => 'trim|required'],
            'captcha' => ['label' => 'Captcha', 'rules' => 'trim|required'],
        ]))
        {
            return redirect()->to(base_url('backoffice'))->withInput(); 
        } else
        {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $captcha = $this->request->getVar('captcha');
            //query the database
            $result = $this->data->login($username, $password);
            if ($result)
            {
                if ($captcha !== "kerobokan")
                {
                    session()->setFlashData('error', 'You must submit the word that appears in the image.');
                    return redirect()->to(base_url('backoffice'))->withInput(); 
                }
                $this->session->set('logged_in', $this->data->login($username, $password));
                return redirect()->to(base_url('backoffice'))->withInput(); 
            } else
            {
                session()->setFlashData('error', 'Invalid username or password');
                return redirect()->to(base_url('backoffice'))->withInput(); 
            }
        }
    }
    public function logout()
    {
        $this->session->remove('logged_in');
        session_destroy();
        return redirect()->to(base_url(). '/backoffice'); 
    }
	
}