<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/5/2016
 * Time: 12:50 PM
 */
class Product extends MY_Controller
{ 
    function __construct()
    {
        parent::__construct();
        $this->_checkLogin();
        $this->controller =  get_class();
        $this->obj = new stdClass() ;
        $this->obj->country_id = 173 ;
        $this->load->model("Product_model",'model');
        $this->load->model("school_model",'school');
        $this->load->model("grade_model",'grade');
        $this->load->model("option_model",'option');
    }

    function index(){
        $d['records'] = $this->model->get_many_by( 'status' ,1   ) ;
        $this->view("list",$d);
    }

    function create(){
        $this->form_validation->set_rules('form[model]', 'Model Code', "required|is_unique[{$this->model->table()}.model]");
        $this->_from();
    }

    function edit($id){
        $this->obj = $this->model->get($id);
        $this->_from();
    }

    function _from(){
        $this->form_validation->set_rules('form[title]', 'Product Name', 'required');
        $this->form_validation->set_rules('option[price]', '', 'price');
        if ($this->form_validation->run() == TRUE){
            if(!empty($this->obj->id)){
                if($this->model->update($this->obj->id , $this->input->post('form'))){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }
            }else{
                if($this->model->insert($this->input->post('form'))){
                    $this->obj->id = $this->db->insert_id();
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }
            }
            $this->_more_image();
            $this->_product_category();
            $this->_product_school();
            $this->model->insert_option($this->obj->id,$this->input->post('option')) ;
            redirect(current_url());
        }else{
            if($this->input->post()){
                $this->session->set_flashdata('error', validation_errors() );
                $this->obj = (object) $this->input->post('form');
            }
        }
        $d['result'] = $this->obj  ;
        if($this->obj->id){
            $option = $this->model->get_option_by_id( $this->obj->id);
            $d['default'] = $option['default'];
            $d['option'] = $option['more'];
            unset($option);
        }else{
            
        }
        

        $d['product_category'] = $this->_get_product_category();
        $d['product_school'] = $this->_get_product_school();
        $d['product_image'] = $this->_get_more_image();
        $this->view("create",$d);
    }

    function _product_category(){
        if(!empty($this->obj->id)){
            $this->db->where("product_id",$this->obj->id);
            $this->db->delete($this->model->get_category_table());
            foreach ($this->input->post('product_category') as $category_id ){
                $this->db->insert($this->model->get_category_table(),array('product_id'=>(int)$this->obj->id, 'category_id' =>(int) $category_id ));
            }
        }
    }

    function _get_product_category(){
        $categories = $this->model->get_product_category($this->obj->id)  ;
        $this->load->model("category_model",'cat');
        $return = array();
        foreach ($categories as $k => $category ){
            $results = $this->cat->getParentsInfo($category->category_id);
            foreach ($results as $row){
                $return[$k]['text'] .= empty($return[$k]['text']) ? $row->parent_title : " &gt; $row->parent_title";
            }
            $return[$k]['id']  = end($results)->parent_id ;
        }
        return $return ;
    }
    
    function _product_school(){
        if(!empty($this->obj->id)){
            $this->db->where("product_id",$this->obj->id);
            $this->db->delete($this->model->get_grade_table());
            foreach ($this->input->post('product_school') as $grade_id ){
                $this->db->insert($this->model->get_grade_table(),array('product_id'=>(int)$this->obj->id, 'grade_id' =>(int) $grade_id ));
            }
        }
    }
  
    function _get_product_school(){
        $grades = $this->model->get_product_grade($this->obj->id)  ;
        foreach ($grades as $grade){
            $g[] = $grade->grade_id;
        }
        if(isset($g)){
            $this->load->model("grade_model",'grade');
            return $this->grade->get_many_grade_id($g);
        }
        return array();
    }

    function _more_image(){
        if(!empty($this->obj->id)){
            $this->db->where("product_id",$this->obj->id);
            $this->db->delete($this->model->get_image_table());
            $images = array(); 
            foreach ($this->input->post('image') as $image ){
                $images[] = array('product_id' => $this->obj->id , 'image' => $image );
            }
            if(!empty($images))
                $this->db->insert_batch($this->model->get_image_table(),$images);
        }
    }
    
    function _get_more_image(){
        return $this->model->get_more_image($this->obj->id);
    }
    
    function updateStock($id){
        $this->obj = $this->model->get($id);
        if(!is_object($this->obj)) show_404();
        $d['result'] = $this->obj  ;
        $d['data_option']['Color'] = array('id'=>2 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 2 )  )  ) ;
        $d['data_option']['Size'] = array('id'=>3 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 3 )  )  ) ;
        if($this->input->post()){
            $this->form_validation->set_rules('option[price]', '', 'price');
            if ($this->form_validation->run() == TRUE){
                if( $this->model->insert_option($id,$this->input->post('option'))) {
                    $this->session->set_flashdata('valid', 'Record Updated Successfully');
                }else {
                    $this->session->set_flashdata('error', 'Record Updated Failure !!!');
                }
            }
           // exit(0);
            redirect(current_url());
        }

        $d['option'] = $this->model->get_option_by_id($id);
        
        $this->view("update_stock",$d);
    }

    function do_upload()
    {
        parent::do_upload(true,260); // TODO: Change the autogenerated stub
    }

    function feature($view){
        $this->method = 'feature';
        $this->load->model('feature_model','feature');

        switch ($view){
            case 'add' :
                $d['products'] = $this->model->get_many_by(array('status'=>1,'public'=>1));
                $d['records'] = $this->feature->get_many_by(array('status'=>1));
                if($this->input->post('pro')) { 
                    if(  $this->feature->add_feature_pro($this->input->post('pro')) ){
                        $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                    }else{
                        $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                    }
                    redirect(current_url());
                }
                $d['selected_products']  = $this->feature->get_feature( );
                $this->view('feature_add_product',$d);
                break;
            case 'update' :
               $this->feature->update($this->input->post('id'),array($this->input->post('name')=>$this->input->post('val'))) ; break;
            case 'create' :
            default:
                if($this->input->post('form[name]')) {
                    if( $this->feature->insert($this->input->post('form'))){
                        $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                    }else{
                        $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                    }
                   redirect(current_url());
                }
                $d['records'] = $this->feature->get_all();
                $this->view('feature_create',$d);
                break;
        }


    }
    
}