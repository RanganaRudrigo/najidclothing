<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/3/2016
 * Time: 4:36 PM
 */
class School_model extends MY_Model
{
    protected $_table = 'school';
    protected $primary_key = 'id';
    protected $protected_attributes = array( 'id' );

    protected $after_get = array('remove_sensitive_fields');
    protected $before_create = array("prop_data");
     
    protected function remove_sensitive_fields($data){
        unset($data->date);
        unset($data->status);
        return $data;
    }

    protected function prop_data($data){
        $data['date'] = date("Y-m-d H:i:s");
        $data['user_id'] =  $this->session->userdata("user")->id;
        return $data;
    }

    function get_many_by_like($str)
    {
        return $this->db->from($this->_table)
            ->select("id,title")
            ->where('status', 1)
            ->like("title", $str)
            ->get()->result();
    }

}