<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 4/27/2016
 * Time: 11:47 PM
 */
class Home extends CI_Controller
{
    function index(){ 
        if($this->session->has_userdata('user') == FALSE){
            $d['error'] ="";
            $this->form_validation->set_rules('UserLogin[username]','','required');
            $this->form_validation->set_rules('UserLogin[password]','','required');
            if($this->form_validation->run()){
                $this->load->model('user_model','user');
                $user = $this->user->get_by( array(
                    'name' =>  $this->input->post('UserLogin[username]') ,
                    'password' =>  sha1($this->input->post('UserLogin[password]'))
                ) ) ;
               if(is_object($user)) {
                   $this->session->set_userdata("user",$user);
                   if($this->session->userdata('url'))
                       redirect($this->session->userdata('url'));
                   redirect(base_url()."admin");
               }else{
                   $d['error'] = true ;
               }
            }
            $this->load->view('admin/login',$d);
        }else{
            if($this->session->has_userdata('url'))
                redirect($this->session->userdata('url'));
            $this->load->view('admin/dashboard');
        }
    }

    function logout(){
        $this->session->sess_destroy();
    }

}