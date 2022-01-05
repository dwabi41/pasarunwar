<?php 
namespace App\Modules\home\Controllers;
use App\Controllers\BaseController;

class Home extends BaseController
{
	public function __construct() {
	    helper(['fungsi']);
	}
	
	public function index()
	{
	    $data['pengaturan'] = $this->data->getSpecificData('pengaturan', array('id' => 1));
		$data['model']= $this->data;
        echo view('\App\Views\frontend\partials\index.php', $data);
	}
	public function tes()
	{
	    $data['pengaturan'] = $this->data->getSpecificData('pengaturan', array('id' => 1));
		$data['model']= $this->data;
        echo view('\App\Views\frontend\partials\tes.php', $data);
	}
	public function coba()
	{
	    $data['pengaturan'] = $this->data->getSpecificData('pengaturan', array('id' => 1));
		$data['model']= $this->data;
        echo view('\App\Views\frontend\partials\index_detail.php', $data);
	}
}