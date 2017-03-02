<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/5/2016
 * Time: 2:46 PM
 */
class Option extends MY_Controller
{
    var $method = "";
    function __construct()
    {
        parent::__construct();
        $this->_checkLogin();
        $this->controller =  get_class();
        $this->obj = new stdClass() ;
        $this->load->model("option_model",'model');
    }

    function color($view='view',$id=0){
        $this->method = 'color' ;
        $this->obj->option_id = 2 ;
        $this->_controller($view,$id);
    }
    
    function size($view='view',$id=0){
        $this->method = 'size' ;
        $this->obj->option_id = 3 ;
        $this->_controller($view,$id);
    }

    function _controller($view,$id){
        switch ($view){
            case 'view' :
                $d['records'] = $this->model->get_many_by( array('status'=>1 , 'option_id' => $this->obj->option_id )  ) ;
                $this->view("{$this->method}_list",$d);
                break;
            case 'create' :

                $this->_from();
                break;
            case 'edit' :
                $this->obj = $this->model->get($id);
                $this->_from();
                break;
            default : show_404();break;
        }
    }

    function _from(){
        $this->form_validation->set_rules('form[title]', "$this->method Name", 'required');
        if($this->obj->option_id == 1 )
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
        $this->view("{$this->method}_create",$d);
    }

    public function do_upload()
    {
        parent::do_upload(true, 50,true); // TODO: Change the autogenerated stub
    }


}