<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/5/2016
 * Time: 2:52 PM
 */
class Option_model extends MY_Model
{
    protected $_table = 'option_detail';
    protected $primary_key = 'id';
    protected $protected_attributes = array('id');

    protected $after_get = array('remove_sensitive_fields');
    protected $before_create = array("prop_data");

    protected $join = array();

    protected function remove_sensitive_fields($data)  {
        unset($data->date);
        unset($data->status);
        if( in_array($data->option_id,array(1,3)) ) unset($data->image);
        return $data;
    }

    protected function prop_data($data)
    {
        $data['date'] = date("Y-m-d H:i:s");
        $data['user_id'] = $this->session->userdata("user")->id;
        return $data;
    }

}