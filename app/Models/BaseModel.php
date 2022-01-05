<?php

namespace App\Models;

class BaseModel extends \CodeIgniter\Model 
{
    public function __construct() {
        $this->db = \Config\Database::connect();
	}
	public function adddata($table, $data)
    {
        $builder = $this->db->table($table);
        $builder->insert($data);
    }
	public function updatedata($data, $where, $table)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->update($data);
    }
	public function deletedata($table, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->delete();
    }
	public function searchdatasort($limit, $start, $table, $referencedTable, $condition, $where, $id, $sort)
    {
        $builder = $this->db->table($table);
        $builder->select('*');
        $builder->orderBy($id, $sort);
        if (isset($limit) && isset($start))
            $builder->limit($limit, $start);
        if (isset($referencedTable))
            $builder->join($referencedTable, $condition);
        if (isset($where))
            $builder->where($where);
        $query = $builder->get();
        if ($query->getNumRows() > 0)
        {
            foreach ($query->getResult() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }
        return false;
    }
    public function countsearchdata($table, $referencedTable, $condition, $where)
    {
        $builder = $this->db->table($table);
        $builder->select('*');
        if (isset($referencedTable))
            $builder->join($referencedTable, $condition);
        if (isset($where))
            $builder->where($where);
        $query = $builder->get();
        return $query->getNumRows();
    }
    public function getspecificdata($table, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $row = $builder->get()->getRow();
        return $row;
    }
    public function login($username, $password)
    {
        $builder = $this->db->table('users');
        $builder->where('username', $username);
        $row = $builder->get()->getRow();
        if ($row)
        {
            if(password_verify($password, $row->password))
                return $row;
            else
                return false;
        } else
        {
            return false;
        }
    }
    
    function returnparentmenus()
    {
        $sql = "SELECT t0.id AS lvl0_id, t0.MENU_TITLE AS lvl0_name, t0.MENU_PARENT AS lv10_menuparent,t0.URL as lv10_link, t1.id AS lvl1_id, t1.MENU_TITLE as lvl1_name,t1.MENU_PARENT AS lv11_menuparent,t1.URL as lv11_link, t2.id AS lvl2_id, t2.MENU_TITLE as lvl2_name,t2.MENU_PARENT AS lv12_menuparent,t2.URL as lv12_link, t3.id AS lvl3_id, t3.MENU_TITLE as lvl3_name,t3.MENU_PARENT AS lv13_menuparent,t3.URL as lv13_link FROM menumanager AS t0 LEFT JOIN menumanager AS t1 ON t1.MENU_PARENT = t0.id LEFT JOIN menumanager AS t2 ON t2.MENU_PARENT = t1.id LEFT JOIN menumanager AS t3 ON t3.MENU_PARENT = t2.id  ";
        $sql .= " ORDER BY t0.MENU_ORDER,t1.MENU_ORDER,t2.MENU_ORDER,t3.MENU_ORDER ";
        $query = $this->db->query($sql);
        $result = $query->getResultArray();
        $query->freeResult();
        return $result;
    }

    function updateMenu($id, $parentId, $order)
    {
        $builder = $this->db->table('menumanager');
        $builder->limit(1, 0);
        $builder->selectMax('MENU_ORDER');
        $row1 = $builder->get()->getRow();
        $myorder = $row1->MENU_ORDER == 0 ? 1 : $row1->MENU_ORDER + 1;
        $data = array(
            'MENU_PARENT' => $parentId,
            'MENU_SORT'   => $order,
            'MENU_ORDER'  => $myorder
        );
        $builder->where('id', $id);
        $builder->update($data);
        return $id;
    }

    function resetMenuManagerOrder()
    {
        $builder = $this->db->table('menumanager');
        $data = array(
            'MENU_ORDER' => 0
        );
        $builder->update($data);
    }

    function getTopOrderPlusOne()
    {
        $builder = $this->db->table('menumanager');
        $builder->selectMax('MENU_ORDER');
        $row1 = $builder->get()->getRow();
        return $row1->MENU_ORDER + 1;
    }

    function getParentOrder($parentId)
    {
        $builder = $this->db->table('menumanager');
        $builder->limit(1, 0);
        $builder->where(array('MENU_PARENT' => $parentId));
        $builder->orderBy('MENU_ORDER', 'DESC');
        $row = $builder->get()->getRow();
        if (isset($row))
            return $row->MENU_ORDER + 1;
            
        $builder = $this->db->table('menumanager');
        $builder->where(array('id' => $parentId));
        $row = $builder->get()->getRow();
        if (isset($row))
            return $row->MENU_ORDER + 1;
    }

    function incrementOrder($number)
    {
        $sql = 'UPDATE menumanager SET `MENU_ORDER` = `MENU_ORDER`+1 WHERE `MENU_ORDER`> ' . $number;
        $this->db->query($sql);
    }
}