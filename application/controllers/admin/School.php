<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/3/2016
 * Time: 4:28 PM
 */
class School extends MY_Controller
{
    var $obj = null;
    var $method = "";

    function __construct()
    {
        parent::__construct();
        $this->_checkLogin();
        $this->controller =  get_class();
        $this->obj = new stdClass() ;
        $this->obj->country_id = 173 ;
        $this->load->model("school_model",'model');
        $this->load->model("Country_model",'country');
    }

    function index(){
        $d['records'] = $this->model->get_many_by( 'status' ,1   ) ;
        $this->view("list",$d);
    }

    function create(){
        $this->_from();
    }

    function edit($id){ 
        $this->obj = $this->model->get($id); 
        $this->_from();
    }

    function _from(){
        $this->form_validation->set_rules('form[title]', 'Company Name', 'required');
        if ($this->form_validation->run() == TRUE){
            if(!empty($this->obj->id)){
                if($this->model->update($this->obj->id , $this->input->post('form'))){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }
            }else{
                if($this->model->insert($this->input->post('form'))){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }
            }
            redirect(current_url());
        }else{
            if($this->input->post()){
                $this->session->set_flashdata('error', validation_errors() );
                $this->obj = (object) $this->input->post('form');
            }
        }
        $d['result'] = $this->obj  ;
        $d['zone'] = $this->country->getZone(array('country_id'=>$this->obj->country_id));
        $d['country'] = $this->country->get_all();
        $this->view("create",$d);
    }

    function do_upload()
    {
        parent::do_upload(true,239,true); // TODO: Change the autogenerated stub
    }

    function grade($view='view',$id=0){
        $this->load->model("grade_model",'grade');
        $this->method = $view ;
        switch ($view){
            case 'view' :
                if($id) {
                    $d['records'] = $this->grade->get_many_by( array('status'=>1 , 'school_id' => $id )  ) ;
                }else{
                    $d['records'] = $this->grade->get_many_by( 'status' ,1   ) ;
                }
                $this->view("grade_list",$d);
                break;
            case 'create' :
                $this->obj->school_id = $id ;
                $this->form_validation->set_rules('form[code]', 'Grade Code', "required|is_unique[{$this->grade->table()}.code]");
                $this->_grade();
                break;
            case 'edit' :
                $this->obj = $this->grade->get($id);
                $this->_grade();
                break;
            default : show_404();break;
        }
    }

    function _grade(){

        $this->form_validation->set_rules('form[title]', 'Grade Name', 'required');

        if ($this->form_validation->run() == TRUE){
            if(!empty($this->obj->id)){
                if($this->grade->update($this->obj->id , $this->input->post('form'))){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'The Grade Code value is already used in our system');
                }
            }else{
                if($this->grade->insert($this->input->post('form'))){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }
            } 
        }else{
            if($this->input->post()){
                $this->session->set_flashdata('error', validation_errors() );
                $this->obj = (object) $this->input->post('form');
            }
        }
        if($this->input->post()){
            redirect(current_url());
        }
        $d['result'] = $this->obj  ;
        $d['schools'] = $this->model->get_many_by( 'status' ,1   ) ;
        $this->view("grade_create",$d);
    }
}