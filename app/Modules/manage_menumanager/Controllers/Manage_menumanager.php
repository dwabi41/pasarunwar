<?php 
namespace App\Modules\manage_menumanager\Controllers;
use App\Controllers\BaseController;


class Manage_menumanager extends BaseController
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
        $data['total'] = $this->data->countSearchData('menumanager', null, null, null);
		$data['page']= $page;
		$data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage, 'menumanager', null, null, null, 'id', 'DESC');
        echo view('\App\Modules\manage_menumanager\Views\index.php', $data);
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
                'top_menu' => ['label' => 'Top Menu', 'rules' => 'trim|required'],
                'title_id' => ['label' => 'Title ID', 'rules' => 'trim|required'],
                'url' => ['label' => 'URL', 'rules' => 'trim|required'],
                'target' => ['label' => 'Target', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_menumanager/tambah'))->withInput(); 
            } else
            {
                $order = $this->data->getTopOrderPlusOne();
                if ($this->request->getVar('top_menu') != 0)
                {
                    $order = $this->data->getParentOrder($this->request->getVar('top_menu'));
                    $this->data->incrementOrder($order);
                }
                $this->data->adddata('menumanager', array(
                    'MENU_PARENT'     => $this->request->getVar('top_menu'),
                    'MENU_TITLE'      => $this->request->getVar('title_id'),
                    'URL'             => $this->request->getVar('url'),
                    'MENU_SORT'       => 1,
                    'MENU_KONTEN'     => $this->request->getVar('content_id'),
                    'MENU_TARGET'     => $this->request->getVar('target'),
                    'STATUS'          => $this->request->getVar('status'),
                    'MENU_ORDER'      => $order
                ));
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');
                return redirect()->to(base_url('manage_menumanager')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['top_menus'] = $this->data->searchdatasort(null, null, 'menumanager', null, null, null, 'id', 'DESC');
            echo view('\App\Modules\manage_menumanager\Views\tambah.php', $data);
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
                'top_menu' => ['label' => 'Top Menu', 'rules' => 'trim|required'],
                'title_id' => ['label' => 'Title ID', 'rules' => 'trim|required'],
                'url' => ['label' => 'URL', 'rules' => 'trim|required'],
                'target' => ['label' => 'Target', 'rules' => 'trim|required'],
                'status' => ['label' => 'Status', 'rules' => 'trim|required'],
            ]))
            {
                 return redirect()->to(base_url('manage_menumanager/edit/'.$id))->withInput(); 
            } else
            {
                if ($this->request->getVar('top_menu') != 0)
                {
                    $order = $this->data->getParentOrder($this->request->getVar('top_menu'));
                    $this->data->incrementOrder($order);
                    $this->data->updateData(array(
                        'MENU_PARENT'     => $this->request->getVar('top_menu'),
                        'MENU_TITLE'      => $this->request->getVar('title_id'),
                        'URL'             => $this->request->getVar('url'),
                        'MENU_KONTEN'     => $this->request->getVar('content_id'),
                        'MENU_TARGET'     => $this->request->getVar('target'),
                        'STATUS'          => $this->request->getVar('status'),
                        'MENU_ORDER'      => $order
                    ), array('id' => $id), 'menumanager');
                } else
                {
                    $this->data->updateData(array(
                        'MENU_PARENT'     => $this->request->getVar('top_menu'),
                        'MENU_TITLE'      => $this->request->getVar('title_id'),
                        'URL'             => $this->request->getVar('url'),
                        'MENU_KONTEN'     => $this->request->getVar('content_id'),
                        'MENU_TARGET'     => $this->request->getVar('target'),
                        'STATUS'          => $this->request->getVar('status')
                    ), array('id' => $id), 'menumanager');
                }
                session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');
                return redirect()->to(base_url('manage_menumanager')); 
            }
        } else
        {
            $data['validation'] = $this->validation;
    		$data['model']= $this->data;
    		$data['data'] = $this->data->getSpecificData('menumanager', array('id' => $id));
    		$data['top_menus'] = $this->data->searchdatasort(null, null, 'menumanager', null, null, null, 'id', 'DESC');
            echo view('\App\Modules\manage_menumanager\Views\edit.php', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $this->data->deletedata('menumanager', array('id' => $id));
        session()->setFlashData('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        return redirect()->to(base_url('manage_menumanager')); 
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
        $data['total'] = $this->data->countSearchData('menumanager', null, null, 'MENU_TITLE LIKE \'%' . $search . '%\' OR MENU_TITLE_EN LIKE \'%' . $search . '%\'');
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
		$data['pager']= $this->pager;
        $data['datas'] = $this->data->searchdatasort($this->numOfContentsPerPage,$page*$this->numOfContentsPerPage,'menumanager',null,null,'MENU_TITLE LIKE \'%' . $search . '%\' OR MENU_TITLE_EN LIKE \'%' . $search . '%\'', 'id', 'DESC');
        echo view('\App\Modules\manage_menumanager\Views\index.php', $data);
    }
    public function sorting()
    {
        if (!$this->session->logged_in)
        {
            return redirect()->to(base_url('backoffice')); 
        }
        $data['validation'] = $this->validation;
		$data['model']= $this->data;
        echo view('\App\Modules\manage_menumanager\Views\sorting.php', $data);
    }
    public function updateSorting()
    {
        $this->data->resetMenuManagerOrder();
        $response = json_decode($this->request->getVar('s'), true); // decoding received JSON to array
        if (is_array($response))
        {
            //start saving now
            $topmenusorder = 1;
            foreach ($response as $key => $block)
            {
                $menuid = $this->data->updateMenu($block['id'], 0, $topmenusorder);

                if (isset($block['children']))
                {
                    //loopMe($block['children']);
                    // loopChildren($block['link']['children']); /* children loop*/
                    $this->updateChildSubmenus($menuid, $block['children']);
                }
                $topmenusorder ++;
            }
        } //if is_array($response);
        echo 1;
        exit;
    }
    public function updateChildSubmenus($menuid, $e)
    {
        $topmenusorder = 1;
        foreach ($e as $key => $block)
        {
            //echo $block['link'].' '.$block['cls'].' '.$block['id'].' '.$block['label'].'<br/>'; /* echo parent*/
            $menu = $this->data->updateMenu($block['id'], $menuid, $topmenusorder);
            if (isset($block['children']))
            {
                $this->updateChildSubmenus($menu, $block['children']);
            }
            $topmenusorder ++;
        }
    }
    public function showmenus()
    {
        $categories = array();
        $pool = array();
        $q = $this->data->returnparentmenus();
        foreach ($q as $row)
        {
            if (in_array($row['lvl0_id'], $pool) === false && isset($row['lvl0_name']) && !is_null($row['lvl0_name']))
            {
                $c = array('id'   => $row['lvl0_id'],
                           'name' => $row['lvl0_name'],
                           'link' => $row['lv10_link'],
                           'level' => 0);
                $categories[] = $c;
            }
            if (in_array($row['lvl1_id'], $pool) === false && isset($row['lvl1_name']) && !is_null($row['lvl1_name']))
            {
                $c = array('id'    => $row['lvl1_id'],
                           'name'  => $row['lvl1_name'],
                           'link'  => $row['lv11_link'],
                           'level' => 1);
                $categories[] = $c;
            }
            if (in_array($row['lvl2_id'], $pool) === false && isset($row['lvl2_name']) && !is_null($row['lvl2_name']))
            {
                $c = array('id'    => $row['lvl2_id'],
                           'name'  => $row['lvl2_name'],
                           'link'  => $row['lv12_link'],
                           'level' => 2);
                $categories[] = $c;
            }
            if (in_array($row['lvl3_id'], $pool) === false && isset($row['lvl3_name']) && !is_null($row['lvl3_name']))
            {
                $c = array('id'    => $row['lvl3_id'],
                           'name'  => $row['lvl3_name'],
                           'link'  => $row['lv13_link'],
                           'level' => 3);
                $categories[] = $c;
            }
            $pool[] = $row['lvl0_id'];
            $pool[] = $row['lvl1_id'];
            $pool[] = $row['lvl2_id'];
            $pool[] = $row['lvl3_id'];
        }
        /*
        Sample outoput: [{"id":"1","name":"Home","class":null,"link":"#","level":0},{"id":"2","name":"How","class":null,"link":"#","level":0}]
        */
        echo json_encode($categories);
        exit;
    }
}