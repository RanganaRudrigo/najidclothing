<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/9/2016
 * Time: 10:54 AM
 */
class Category_model extends MY_Model
{
    protected $_table = 'category';
    protected $primary_key = 'id';
    protected $protected_attributes = array('id');

    protected $after_get = array('remove_sensitive_fields');
    protected $before_create = array("prop_data"); 
    protected $join = array();

    function __construct()
    {
        parent::__construct();
        $this->join = array(
            array("$this->_table B", "B.id = $this->_table.category_id", "B.title as parent_title ,B.id as parent_id , B.category_id as super_parent_id ")
        );
    }

    protected function remove_sensitive_fields($data)
    {
        unset($data->date);
        unset($data->status);
        return $data;
    }

    protected function prop_data($data)
    {
        $data['date'] = date("Y-m-d H:i:s");
        $data['user_id'] = $this->session->userdata("user")->id;
        return $data;
    }


    function getParentsInfo($id, &$categories = array())
    {
        if (empty($categories)) {
            $category = $this->get($id);
            $categories[0] = (object)array('parent_title' => $category->title, 'parent_id' => $category->id, 'super_parent_id' => $category->category_id);
        }
        $this->relation_tables("$this->_table B");
        $category = $this->get($id);
        if (is_object($category)) {
            $categories[count($categories)] = $category;
        }
        if (is_object($category) && $category->super_parent_id != 0) {
            $this->getParentsInfo($category->parent_id, $categories);
        }

        return array_reverse($categories);
    }

    function getParentsInfoBySearch($str = '*')
    {
        $results = $this->get_many_by_like($str);
        $d = array();
        foreach ($results as $row) {
            $categories = array();
            $categories[0] = (object)array('parent_title' => $row->title, 'parent_id' => $row->id, 'super_parent_id' => $row->category_id);
            if($row->category_id == 0) {$d[] = $categories;continue ;}
            $d[] = $this->getParentsInfo($row->id, $categories);
        }
        return $d;
    }

    function get_many_by_like($str)
    {
        return $this->db->from($this->_table)
            ->select("id,title,category_id")
            ->where('status', 1)
            ->like("title", $str)
            ->get()->result();
    }

    function get_many_by_order(){
        $this->_database->order_by('order_no');
        $this->_database->where('status',1);
        $where = func_get_args();
        $this->_set_where($where);
        return $this->get_all();
    }

    function getChildMenus($id,&$menu){
        $sub = $this->get_many_by_order(array('category_id'=>$id));
        foreach ($sub as $s ){
            $this->getChildMenus($s->id,$s);
        }
        $menu->sub = $sub ;
        return $menu;
    }

}