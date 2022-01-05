<?php 
namespace App\Modules\projects\Controllers;
use App\Controllers\BaseController;

class Projects extends BaseController
{
	public function __construct() {
	    helper(['fungsi']);
	}
	
	public function index()
	{
	    $data['pengaturan'] = $this->data->getSpecificData('pengaturan', array('id' => 1));
		$data['model']= $this->data;
        echo view('\App\Modules\projects\Views\index.php', $data);
	}
}