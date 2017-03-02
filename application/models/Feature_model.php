<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/13/2016
 * Time: 10:13 AM
 */
class Feature_model extends MY_Model
{

    protected $_table = 'feature_list';
    protected $primary_key = 'feature_list_id';
    protected $protected_attributes = array('feature_list_id');

    protected $after_get = array('remove_sensitive_fields');
    protected $before_create = array("prop_data");
    protected $join = array();

    function __construct()
    {
        parent::__construct();
    }

    protected function remove_sensitive_fields($data)
    {
        unset($data->date); 
        unset($data->user_id);
        return $data;
    }

    protected function prop_data($data)
    {
        $data['date'] = date("Y-m-d H:i:s");
        $data['user_id'] = $this->session->userdata("user")->id;
        return $data;
    }
    
    function add_feature_pro($array){
        $this->db->from('feature_product_list');
        $this->db->truncate();
        foreach ($array as $feature_list_id => $product_id_list){
            foreach ($product_id_list as $product_id)
                $d[] = array('feature_list_id'=>$feature_list_id,'product_id'=>$product_id);
        }
        if(isset($d))
            return $this->db->insert_batch('feature_product_list',$d) ? true : false ;
        return true ;
    }

    function get_feature(){
        $where = func_get_args();
        $this->_table = 'feature_product_list';
        if(!empty($where))
            $this->_set_where($where);
        return $this->get_all();
    }

}