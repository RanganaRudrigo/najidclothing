<?php

require APPPATH . '/libraries/REST_Controller.php';

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/4/2016
 * Time: 10:10 AM
 */
class Zone extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Country_model",'country');
    }

    function getZoneByCountryId_get(){
       $country_id =$this->get('country_id');

        if(empty($country_id)) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $this->set_response( $this->country->getZone(array('country_id'=> $country_id )) , REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } 
    }

}