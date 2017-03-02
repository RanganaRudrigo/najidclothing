<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/Front_Controller.php';
/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/13/2016
 * Time: 12:06 PM
 */
class Category extends Front_Controller
{ 

    function index(){
        foreach (func_get_args() as $k => $v) if($k%2) $parameters[] = $v;
        if(!isset($parameters)) show_404();
         
//        ---------------------------- get category list and products under category ----------------------------------------------
        $this->_getCategory($parameters);
        $d['categories'] = $parameters ;
        $d['limit'] =( ($this->input->get('page_id')? $this->input->get('page_id') : 1)  - 1 )*LIMIT ;
        $d['products'] = $this->pro->getProductsByCategory_id( end($parameters)->id , $d['limit'] );
        $d['count'] = $this->pro->getProductsCountByCategory_id(end($parameters)->id );
        foreach ($d['products'] as &$pro ){
            $pro->price = $this->pro->getPriceRangeBy($pro->id);
        }

//        -------------------------- end ------------------------------------------------

//        -------------------------- get feature and feature products ---------------------------------------------------
        $this->load->model('feature_model','feature');
        $d['features'] = $this->feature->get_many_by(array('status'=>1,'product_list'=>1));
        foreach ($d['features']  as &$feature_list){
            $features = $this->feature->get_feature('feature_list_id', $feature_list->feature_list_id );
            $id = array();
            foreach ($features as $feature)
                $id[] = $feature->product_id ;
            $feature_list->products =!empty($id) ? $this->pro->get_many($id) : array();
            foreach ($feature_list->products as $p )
                $p->price = $this->pro->getPriceRangeBy($p->id);
        }
//        --------------------------- end -----------------------------------------------------

//        -------------------------- filer option ( color and size ) ---------------------------------------------------

        $this->load->model("option_model",'option');
        $d['data_option']['Color'] = array('id'=>2 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 2 )  )  ) ;
        $d['data_option']['Size'] = array('id'=>3 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 3 )  )  ) ;
//        --------------------------- end -----------------------------------------------------

         

        $this->view('product_list',$d);
    }
 
    function search(){
        if( ! $this->input->get('search_query') ) show_404();

        $this->load->model("school_model",'school');
        $this->load->model("grade_model",'grade');
        $grade = $this->grade->get_by( ['status' => 1 , 'code' => $this->input->get('search_query') ] ) ;
        if(is_object($grade)) { $school = $this->school->get_by( ['status' => 1 , 'id' => $grade->school_id ] ) ;}


        if(is_object($grade) && is_object($school) ){
 
            $d['grade'] = $grade ;
            $d['school'] = $school ;


            $d['limit'] =( ($this->input->get('page_id')? $this->input->get('page_id') : 1)  - 1 )*LIMIT ;
            $d['products'] = $this->pro->getProductByGradeId($grade->id ,$d['limit'] );
           
            $d['count'] = $this->pro->getProductByGradeIdCount($grade->id   );

        }else{
            $d['products'] = array();
            $d['count'] = 0 ;
        }

        //        -------------------------- get feature and feature products ---------------------------------------------------
        $this->load->model('feature_model','feature');
        $d['features'] = $this->feature->get_many_by(array('status'=>1,'product_list'=>1));
        foreach ($d['features']  as &$feature_list){
            $features = $this->feature->get_feature('feature_list_id', $feature_list->feature_list_id );
            $id = array();
            foreach ($features as $feature)
                $id[] = $feature->product_id ;
            $feature_list->products =!empty($id) ? $this->pro->get_many($id) : array();
            foreach ($feature_list->products as $p )
                $p->price = $this->pro->getPriceRangeBy($p->id);
        }
//        --------------------------- end -----------------------------------------------------

//        -------------------------- filer option ( color and size ) ---------------------------------------------------

        $this->load->model("option_model",'option');
        $d['data_option']['Color'] = array('id'=>2 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 2 )  )  ) ;
        $d['data_option']['Size'] = array('id'=>3 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 3 )  )  ) ;
//        --------------------------- end -----------------------------------------------------
  
        $this->view('product_search',$d);

    }
    
    
}