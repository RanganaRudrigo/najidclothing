<?php
/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/21/15
 * Time: 6:09 AM
 */

Class MY_Form_validation extends CI_Form_validation {



    public function price($str){
        $this->CI->form_validation->set_message('price', 'The {field} field must contain a price value.');
        if((bool) preg_match("/([0-9,]+(\.[0-9]{2})?)/", $str)){
            trim($str);
            $str = str_replace(',','',$str);
            return $str;
        }
        return FALSE;
    }
   
}