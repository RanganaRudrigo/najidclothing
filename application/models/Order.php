<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 4/8/2016
 * Time: 11:13 AM
 */
class Order extends MY_Model
{

    protected $_table = 'order';
    protected $primary_key = 'order_id';
    protected $_order_detail = "order_detail";

    function getByOrderId($id){
        return $this->db->from("order")->where('id',$id)->get()->row();
    }

    function confirm($order){
        $this->db->where('id',$order->id);
        $this->db->update('order' , array(
            'status' =>  $this->input->get('vpc_TxnResponseCode') ,
            'receipt_no' => $this->input->get('vpc_ReceiptNo'),
            'transaction_no' => $this->input->get('vpc_TransactionNo')
        ) );

        $this->db->where("customer_id",$order->customer_id);
        $this->db->where("status",10);
        $this->db->delete("order");
    }

    function getByCustomerId($id){
        return $this->db->from("order")->where('customer_id',$id)->order_by('id','desc')->get()->result();
    }

    function changeDeliveryStatus($id,$status){
        $this->db->where('id',$id);
       return $this->db->update('order' , array(
            'delivery' =>  $status ,
        ) ) ? TRUE : FALSE ;
    }

    function insert_order_detail($data){
        $this->_table = "order_detail" ;
        parent::insert_many($data, FALSE); // TODO: Change the autogenerated stub
        $this->_table = "order" ;
    }

    function get_order_details($order_id){
        return $this->db->from($this->_order_detail)
            ->where("order_id",$order_id)
            ->get()->result();
    }

}