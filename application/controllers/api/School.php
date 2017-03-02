<?php
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/9/2016
 * Time: 3:52 PM
 */
class School extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("grade_model",'grade');
    }

    function search_school_grade_get(){
        $grades = $this->grade->get_school_grade_by_like(  $this->get('str') );
        $this->response($grades, REST_Controller::HTTP_OK);
    }

    function get_code_get(){
        $this->load->helper('string');
        $code = random_string();
        $codes=$this->grade->get_many_by(array('code'=>$code));
        if(count($codes) > 0 )
            $this->get_code_get();
        else
            $this->response(array('code'=>$code), REST_Controller::HTTP_OK);
    }

}