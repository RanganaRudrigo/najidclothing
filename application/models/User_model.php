<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 4/28/2016
 * Time: 12:11 AM
 */
class User_model extends MY_Model
{
    protected $_table = 'user_tab';
    protected $primary_key = 'id';
    protected $protected_attributes = array( 'id' );

    protected $after_get = array('remove_sensitive_fields');

    protected function remove_sensitive_fields($user){
        unset($user->password);
        unset($user->date);
        unset($user->user_id);
        unset($user->status);
        unset($user->code);
        return $user;
    }

}