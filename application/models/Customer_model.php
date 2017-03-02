<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/23/2016
 * Time: 11:37 AM
 */
class Customer_model extends MY_Model
{
    protected $_table = 'customer';
    protected $primary_key = 'id';
    protected $protected_attributes = array( 'id' );

    protected $after_get = array('remove_sensitive_fields');
    protected $before_create = array("prop_data");

    protected function remove_sensitive_fields($user){
        unset($user->password);
        unset($user->date_added);
        return $user; 
    }

    protected function prop_data($data)
    {
        $data['id_country'] = 173;
        return $data;
    }


 
    

}