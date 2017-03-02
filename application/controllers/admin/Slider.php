<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 4/28/2016
 * Time: 8:13 PM
 */
class Slider extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_checkLogin();
        $this->controller =  get_class();
        $this->load->model("slider_model",'model');
    }

    function index(){
        $d['records'] = $this->model->get_many_by('status',1 );
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
        $this->form_validation->set_rules('form[image]', 'Image', 'required');

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
        $this->view("create",$d);
    }

    public function do_upload()
    {
        parent::do_upload(true,1170,true);  
    }


}