<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/4/2016
 * Time: 3:34 PM
 */
class Front_Controller extends CI_Controller
{
    var $tag = array(
        'title'=>'Najd Clothing',
        'meta_key'=>'',
        'meta_des'=>'',
    );
    var $menu = array();

    function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        if( ! $this->input->is_ajax_request()){
            $this->load->model("category_model","cat");
            $menu = $this->cat->get_many_by_order(array('category_id'=>0 ));
            foreach ($menu as &$sub){
                $this->cat->getChildMenus($sub->id,$sub);
            }
            $this->menu = &$menu ;
            $this->load->model("product_model",'pro');
        }
    }

    function view($page,$data=array()){
        if($this->session->has_userdata('customer') && !isset( $data['customer']) ) {
            $this->load->model('Customer_model','cus');
            $data['customer'] = $this->cus->get($this->session->userdata('customer'));
        }
        $data['tags'] = $this->tag;
        $data['menus'] = $this->menu;
        $this->load->view("front/$page",$data);
    }

    public function getTag($field)
    {
        return $this->tag[$field];
    }

    public function setTag($field,$tag)
    {
        $this->tag[$field] = $tag;
    }

    function _getCategory(&$args){
        foreach ($args as &$category_id){
            $category_id = $this->cat->get_by(array('id'=>$category_id,'status'=>1));
        }
    }

    function email_template($subject="",$data=[],$page=null,$receiver ="", $sender=EMAIL){

        if( is_null($page) )
            return FALSE ;

        ob_start();
        $this->load->view("front/email/$page",$data);
        $content = ob_get_contents();
        ob_clean();

        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($sender, TITLE);
        $this->email->to($receiver  );
        $this->email->subject($subject);
        $this->email->message($content);
        return $this->email->send() ? TRUE : FALSE ;
    }

}