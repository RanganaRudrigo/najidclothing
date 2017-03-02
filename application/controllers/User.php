<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/20/2016:27 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/Front_Controller.php';


class User extends Front_Controller
{

    function index(){

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

        $d['page'] = 'my_account';
        $d['title'] = 'My Account';

        $this->view("user",$d);
    }

    function login(){
        $this->load->model('Customer_model','cus');
        if($this->input->post('SubmitLogin')) {
            $this->_checkLogin();
        }
        else if($this->input->post('submitAccount')) {
            $this->_createAccount();
        }else{
            $this->_checkLogin();
        }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
    function _createAccount(){

        $this->form_validation->set_rules('email', 'Email', "required|valid_email|is_unique[{$this->cus->table()}.email]");
        $this->form_validation->set_rules('gender', 'Title', 'required');
        $this->form_validation->set_rules('firstname', 'FirstName', 'required');
        $this->form_validation->set_rules('lastname', 'LastName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|sha1');
        if($this->form_validation->run()){
            $post =$this->input->post() ;
            $this->load->helper('string');
            $post['safe'] = random_string('alnum', 8);
            $post['token'] = random_string('alnum', 16);
            unset($post['submitAccount']);
            if($this->cus->insert($post)){
                $this->session->set_flashdata('notification',
                    ['success' => 'Your Account Created Successfully.. <br/> <small>Please check your email and activate your account</small>  ']
                );
                $customer_id = $this->cus->insert_id() ;
                $this->session->set_userdata('customer',$customer_id);
                
                $customer = $this->cus->get( $customer_id );
                $this->email_template("Account Verification",['customer'=>$customer],'account_verification',$customer->email);
                redirect(base_url('user/my-account'));
            }else{
                $this->session->set_flashdata('notification',
                    ['error' => 'Please Try Again ']
                );
            }

        }else{
            if($this->input->post('submitAccount')){
                $this->session->set_flashdata('notification',
                    ['error' => validation_errors()]
                ); 
            }
        } 
        $this->view("user",array('page'=>'create_account','title' => 'Authentication'));
    }

    function _checkLogin(){

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('passwd', 'Password', 'required|sha1');
        if($this->form_validation->run()){

            $cus = $this->cus->get_by(array('email'=>$this->input->post('email') , 'password'=>$this->input->post('passwd') ));

            if(is_object($cus)){
                $this->session->set_userdata('customer',$cus->id);
                redirect(
                    $this->session->has_userdata('backurl') ? $this->session->userdata('backurl') : base_url()
                );
            }else{
                $this->session->set_flashdata('notification',
                    ['error' => "Invalid password."]
                );
                redirect(current_url());
            }
        }else{
            if($this->input->post('SubmitLogin')){
                $this->session->set_flashdata('notification',
                    ['error' => validation_errors()]
                );
                redirect(current_url());
            }
        }

        $this->view("user",array('page'=>'login_create','title'=>'Authentication'));

    }

    function address(){
 
        $this->form_validation->set_rules('firstname', 'FirstName', 'required');
        $this->form_validation->set_rules('lastname', 'LastName', 'required'); 
        $this->form_validation->set_rules('address1', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('postcode', 'Post Code', 'required');
        $this->form_validation->set_rules('id_country', 'Country', 'required');
        $this->form_validation->set_rules('zone_id', 'State', 'required');
        $this->form_validation->set_rules('phone_mobile', 'Phone No', 'required');

        if($this->form_validation->run()){
            $post =$this->input->post() ;
            unset($post['submitAddress']);
            $this->load->model('Customer_model','cus');
            $this->cus->update($this->session->userdata('customer') , $post);

            if($this->input->post('submitAddress')){
                $this->session->set_flashdata('notification',
                    ['success' => "Your Address Saved successfully" ]
                );
            }
            redirect(
                $this->session->has_userdata('backurl') ? $this->session->userdata('backurl') :
                    base_url('user/my-account')
            );
        }else{
            if($this->input->post('submitAddress')){
                $this->session->set_flashdata('notification',
                    ['error' => validation_errors()]
                );
            }
        }


        $this->load->model('Country_model','country');
        $d['countries'] = $this->country->get_all();

        $d['page'] = 'add_address';
        $d['title'] = 'Your addresses';

        $this->view("user",$d);
    }

    function identity(){
        $this->load->model('Customer_model','cus');
        $this->form_validation->set_rules('email', 'Email', "required|valid_email");
        $this->form_validation->set_rules('gender', 'Title', 'required');
        $this->form_validation->set_rules('firstname', 'FirstName', 'required');
        $this->form_validation->set_rules('lastname', 'LastName', 'required');
        if($this->input->post('password[new]')) {
            $this->form_validation->set_rules('password[old]', 'Current Password', 'required|sha1|callback_check_password',['check_password'=>"Your current Password not matched"]);
            $this->form_validation->set_rules('password[confirmation]', 'Password Confirmation', 'required|matches[password[new]]');
            $this->form_validation->set_rules('password[new]', 'Password', 'required|min_length[5]|sha1');
        }

        if($this->form_validation->run()){
            $post = $this->input->post() ;
            unset($post['submitAccount']);
            unset($post['password']);
            if($this->input->post('password[new]')) {
                $post['password'] = $this->input->post('password[new]') ;
            }
            if($this->cus->update( $this->session->userdata('customer') ,$post)){
                $this->session->set_flashdata('notification',
                    ['success' => 'Your Account Update Successfully..']
                );
                redirect(base_url('user/my-account'));
            }else{
                $this->session->set_flashdata('notification',
                    ['error' => 'Please Try Again ']
                );
            }

        }else{
            if($this->input->post('submitAccount')){
                $this->session->set_flashdata('notification',
                    ['error' => validation_errors()]
                );
            }
        }
        $this->view("user",array('page'=>'info_account','title' => 'Authentication'));
    }

    function check_password($current){
        $this->load->model('Customer_model','cus');
        return is_object($this->cus->get_by(array('email'=>$this->input->post('email') , 'password'=> $current ))) ;
    }

    function order(){

        if($this->input->get('update')) {
            $this->session->set_userdata('backurl',current_url()."?step=1");
            redirect(base_url('user/address'));
        }
        if($this->input->get('terms')) {
            $this->session->set_userdata('backurl',current_url()."?step=2");
            redirect(base_url('terms-and-condition'));
        }

        switch ($this->input->get('step')){
            case 1 :

                if($this->input->post()){
                    if( $this->input->post('message') )
                    $this->session->set_userdata('order_process',[
                        'message' => $this->input->post('message')
                    ]);
                    redirect(current_url()."?step=2");
                }

                if(! $this->session->has_userdata('customer')) {
                    $this->session->set_userdata('backurl',current_url()."?step=1");
                    redirect(base_url('user/login'));
                }
                $this->load->model('Customer_model','cus');
                $data['customer'] = $this->cus->get($this->session->userdata('customer'));
                $this->load->model('Country_model','country');
                $d['country'] = $this->country->get( $data['customer']->id_country);
                $d['zone'] = $this->country->getZoneId( $data['customer']->zone_id);
                $d['carts'] = $this->cart->contents() ;
                $d['page'] = 'address';
                $d['title'] = 'Your Address';
                break;
            case 2 :
                if($this->input->post()){
                    redirect(current_url()."?step=payment");
                }
                $d['carts'] = $this->cart->contents() ;
                $d['page'] = 'shipping';
                $d['title'] = 'Your Shipping Address';
                break;
            case 'payment':
                $d['carts'] = $this->cart->contents() ;
                $d['page'] = 'payment';
                $d['title'] = ' Your payment method ';
                break;
            default :
                $d['carts'] = $this->cart->contents() ;
                $d['page'] = 'cart';
                $d['title'] = 'Your Cart';
                break;
        }

        $this->view("cart",$d);
    }

    function payment(){

        if( ! ($this->input->get('type') == "bank" || $this->input->get('type') == "cash" ) ){
            show_404();
        }

        if(! $this->session->has_userdata('customer')) {
            $this->session->set_userdata('backurl',current_url()."?type=".$this->input->get('type'));
            redirect(base_url('user/login'));
        }

        if( count($this->cart->contents()) == 0 )
            redirect(base_url('user/order'));


//            --------------------------- add order  ----------------------------------

        $this->load->model("order");
        $this->db->trans_begin();
        $order = [
            'customer_id' => $this->session->userdata('customer') ,
            'total' => $this->cart->total() ,
            'shipment_amount' => 0 ,
            'date' => date("Y-m-d H:i:s") ,
            'status' => 0 ,
            'payment_type' => $this->input->get('type') == 'bank' ? 1 : 2
        ]; 
       // $this->order->insert($order);
       // $order_id = $this->db->insert_id();
        $order_id = 1 ;
        foreach($this->cart->contents() as $item ){
            sscanf($item['id'], "%d-%d", $product_id, $product_stock_id );

            $order_detail[] = [
                'order_id' => $order_id ,
                'product_id' => $product_id,
                'product_stock_id' => $product_stock_id,
                'qty' => $item['qty'],
                'price' => $item['price'] ,
                'discount' => $item['options']['discount']
            ] ;
        }
      //  $this->order->insert_order_detail($order_detail);

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();

        }else{
            $this->db->trans_commit();
            //$this->cart->destroy();
            if($this->input->get('type') == "bank")
                $this->_bank($order_id);
            else
                $this->_payment_status($order_id); // if cash on delivery no need any other process so just response the details
        }
//            -------------------------------------------------------------

    }
    
    function _bank($order_id){

    }

    function _order_email($order_id){
        $this->load->model("order");

        $order = $this->order->get($order_id);
        switch ($order->status){
            case 0 : $order->status = "Pending"; break;
            case 1 : $order->status = "packaged"; break;
            case 2 : $order->status = "shipped"; break;
            case 3 : $order->status = "delivered"; break;
            case 4 : $order->status = "completed"; break;
            case 5 :
            default: $order->status = "cancelled"; break;
        }
        switch ($order->payment_type){
            case 1 : $order->payment_type = "Bank "; break;
            case 2 : $order->payment_type = "Cash on Delivery"; break;
        }

        $order_detail = $this->order->get_order_details($order_id);
        foreach ($order_detail as &$item ){
            $stock = $this->pro->get_stock_by_product_stock_id($item->product_stock_id) ;
            $item->size = $stock->option_detail_id != 1 ?
               "Size : ".$this->db->from($this->pro->get_option_table())->where('id',$stock->option_detail_id)->get()->row()->title : "" ;

            $item->color = $stock->option_id != 1 ?
                "Color : ". $this->db->from($this->pro->get_option_table())->where('id',$stock->option_id)->get()->row()->title  : "";
            
            $item->product = $this->pro->get( $item->product_id);
            $item->total = ( $item->price - (  ($item->discount / 100) * $item->price   )) * $item->qty ;
        }

        $d['order'] = $order;
        $d['order_detail'] = $order_detail;

        $this->load->model('Customer_model','cus');
        $d['customer'] = $this->cus->get( $order->customer_id );

       // $this->load->view("front/email/order_detail",$d);

        $this->email_template("Order Detail",$d,'order_detail',$d['customer']->email);

    }

    function _payment_status($order_id){

        $this->_order_email($order_id);

        $order = $this->order->get($order_id);
        switch ($order->status){
            case 0 : $order->status = "Pending"; break;
            case 1 : $order->status = "packaged"; break;
            case 2 : $order->status = "shipped"; break;
            case 3 : $order->status = "delivered"; break;
            case 4 : $order->status = "completed"; break;
            case 5 :
            default: $order->status = "cancelled"; break;
        }
        switch ($order->payment_type){
            case 1 : $order->payment_type = "Bank "; break;
            case 2 : $order->payment_type = "Cash on Delivery"; break;
        }

        $d['order'] = $order; 
        
        $this->load->model('Customer_model','cus');
        $d['customer'] = $this->cus->get( $order->customer_id );
        
        $d['page'] = 'status';
        $d['title'] = 'Order confirmation';
        $this->view("cart",$d);
    }

    function verify(){
        if($this->input->get('token')){
            $this->load->model('Customer_model','cus');
            $this->load->helper('string');
            $customer = $this->cus->get_by(['token' => $this->input->get('token') ]);
            if(is_object($customer)) {
                $update = [
                    'approved' => 1 ,
                    'token' => random_string('alnum', 16)
                ];
                $this->cus->update($customer->id,$update);
                $this->session->set_flashdata('notification',
                    ['success' => 'Your Account Successfully Activated ']
                );
                redirect(base_url('user/my-account'));
            }
        }

        $this->session->set_flashdata('notification',
            ['error' => 'Invalid Token ']
        );
        redirect(base_url('user/my-account'));
    }

    /*
     * Order list
     * */
    function order_history(){

        $this->load->model("order");

        if($this->input->is_ajax_request() ||  $this->input->get('order_id') ){
            $order = $this->order->get( $this->input->get('order_id'));

            switch ($order->status){
                case 0 : $order->status = "Pending"; break;
                case 1 : $order->status = "packaged"; break;
                case 2 : $order->status = "shipped"; break;
                case 3 : $order->status = "delivered"; break;
                case 4 : $order->status = "completed"; break;
                case 5 :
                default: $order->status = "cancelled"; break;
            }
            switch ($order->payment_type){
                case 1 : $order->payment_type = "Bank "; break;
                case 2 : $order->payment_type = "Cash on Delivery"; break;
            }

            $order_details = $this->order->get_order_details($order->order_id);
            $this->load->model("product_model",'pro');
            foreach ($order_details as &$item){
                $stock = $this->pro->get_stock_by_product_stock_id($item->product_stock_id) ;
                $item->size = $stock->option_detail_id != 1 ?
                    "Size : ".$this->db->from($this->pro->get_option_table())->where('id',$stock->option_detail_id)->get()->row()->title : "" ;

                $item->color = $stock->option_id != 1 ?
                    "Color : ". $this->db->from($this->pro->get_option_table())->where('id',$stock->option_id)->get()->row()->title  : "";

                $item->product = $this->pro->get( $item->product_id);
                $item->total = ( $item->price - (  ($item->discount / 100) * $item->price   )) * $item->qty ;
            } 
            $this->load->model('Customer_model','cus');
            $customer = $this->cus->get( $order->customer_id );

            $this->load->model('Country_model','country');
            $country = $this->country->get( $customer->id_country);
            $zone = $this->country->getZoneId( $customer->zone_id);

            ob_start();
            $this->load->view("front/order/order_detail",['order' => $order ,
                'customer' => $customer ,
                'country' => $country ,
                'zone' => $zone ,
                'order_details' => $order_details ]);
            $content = ob_get_contents();
            ob_clean();
            if($this->input->is_ajax_request()){
                echo $content;
                exit;
            }else{
                $d['content'] = $content ;
            }

        }

        if(! $this->session->has_userdata('customer')) {
            $this->session->set_userdata('backurl',current_url());
            redirect(base_url('user/login'));
        }



        $orders = $this->order->get_many( [ "customer_id" => $this->session->userdata('customer') ] );

        foreach ($orders as &$order){
            $order->total = 0 ;
            $order_detail = $this->order->get_order_details($order->order_id);
            foreach ($order_detail as $item)
                $order->total += ( $item->price - (  ($item->discount / 100) * $item->price   )) * $item->qty ;
            switch ($order->status){
                case 0 : $order->status = "Pending"; break;
                case 1 : $order->status = "packaged"; break;
                case 2 : $order->status = "shipped"; break;
                case 3 : $order->status = "delivered"; break;
                case 4 : $order->status = "completed"; break;
                case 5 :
                default: $order->status = "cancelled"; break;
            }
            switch ($order->payment_type){
                case 1 : $order->payment_type = "Bank wise "; break;
                case 2 : $order->payment_type = "Cash on Delivery"; break;
            }

        }

        $d['page'] = 'order_history';
        $d['title'] = 'Order History';
        $d['orders'] = $orders;

        $this->view("user",$d );
    }

}