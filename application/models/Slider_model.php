<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 4/28/2016
 * Time: 8:18 PM
 */
class Slider_model extends MY_Model
{
    protected $_table = 'slider';
    protected $primary_key = 'id';
    protected $protected_attributes = array( 'id' );

    protected $after_get = array('remove_sensitive_fields');
    protected $before_create = array("prop_data");

    protected function remove_sensitive_fields($slider){
        unset($slider->date);
        unset($slider->status);
        unset($slider->user_id);
        return $slider;
    }

    protected function prop_data($slider){
        $slider['date'] = date("Y-m-d H:i:s");
        $slider['user_id'] =  $this->session->userdata("user")->id;
        return $slider;
    }
 

}