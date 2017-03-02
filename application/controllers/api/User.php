<?php
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/23/2016
 * Time: 11:08 AM
 */
class User extends REST_Controller
{

    function login_post(){

        $this->load->model('Customer_model','cus');
        
        $this->form_validation->set_rules('email_create', 'Email', 'required|valid_email');
        if($this->form_validation->run() ){
            $cus = $this->cus->get_by('email',$this->post('email_create'));
            if(is_object($cus)) {
                $response['hasError'] = true ;
                $response['errors'] = array("An account using this email address has already been registered.
                         Please enter a valid password or request a new one.");
                $response['page'] = "" ;
            }else{
                ob_start();
                $d['email'] = $this->input->post('email_create')  ;
                $this->load->view("front/user/create_account",$d);
                $content = ob_get_contents();
                ob_clean();

                $response['hasError'] = false ;
                $response['errors'] = array( );
                $response['page'] = $content ;

            }
        }else{
            $response['hasError'] = true ;
            $response['errors'] = array(validation_errors());
        }
        $this->response($response);
    }

}

?>
