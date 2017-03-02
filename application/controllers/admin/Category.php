<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/9/2016
 * Time: 10:54 AM
 */
class Category extends MY_Controller
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
        $this->load->model("category_model",'model');
    }

    function index(){

        $con = $this->input->get("category_id") ?   array('status'=>1 , 'category_id' => (int) $this->input->get("category_id") )
            :  $con = array('status'=>1 , 'category_id' => 0 ) ;

        if($this->input->get("category_id")){
            $d['parent'] = $this->model->getParentsInfo($this->input->get("category_id"));
        }
        $d['records'] = $this->model->get_many_by( $con  ) ;
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
        if($this->input->get("category_id")){
            $d['parent'] = $this->model->getParentsInfo($this->input->get("category_id"));
        }
        $this->form_validation->set_rules('form[title]', 'Category Name', 'required');
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

        $this->view("create",$d);
    }

    function do_upload()   {
       
        parent::do_upload(true,870,true);
    }

    function rearrange(){

        if($this->input->is_ajax_request() ) {
            foreach ($this->input->post('order') as $order_no => $id )
                $this->db->update($this->model->table() , array( 'order_no' => $order_no +1) , array('id' => $id) );
            exit;
        }

        $d['id'] = $this->input->get('category_id') ?  $this->input->get('category_id') : 0 ;
        $d['records'] = $this->db->from($this->model->table())
            ->where(array('status ' => 1  , "category_id" => $d['id'] ))
            ->order_by('order_no')->get()->result();
        $this->load->view('admin/category_rearrange' , $d );
    }


}