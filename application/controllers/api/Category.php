<?php

require APPPATH . '/libraries/REST_Controller.php';

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/9/2016
 * Time: 12:53 PM
 */
class Category extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("category_model",'cat');
    }

    function search_get(){ 
        $results = $this->cat->getParentsInfoBySearch($this->get('str'));
        $result = array();
        foreach ($results as $k => $row){

            foreach ($row as $r ){
                $result[$k]['text'] .= empty($result[$k]['text']) ? $r->parent_title : " &gt; $r->parent_title";
            }
            $result[$k]['id'] = end($row)->parent_id ;
        }

        $this->response($result, REST_Controller::HTTP_OK);

    }

}