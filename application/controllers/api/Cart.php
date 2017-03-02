<?php
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/17/2016
 * Time: 4:21 PM
 */
class Cart extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model("product_model",'pro');
    }

    function add_post(){
        $product = $this->pro->get($this->post('id_product'));
        if(is_object($product)){

            if(!$this->post('ipa')){
                $product_detail = $this->db->from($this->pro->get_stock_table())
                    ->where("product_id",$product->id )
                    ->where('option_id',1)
                    ->where('option_detail_id',1)->get()->row() ;
               
            }else{
                $product_detail = $this->pro->get_stock_by_product_stock_id($this->post('ipa')) ;
            }


            $size = $this->db->from($this->pro->get_option_table())->where('id',$product_detail->option_detail_id)->get()->row()->title ;
            $color = $this->db->from($this->pro->get_option_table())->where('id',$product_detail->option_id)->get()->row()->title ;

            $this->cart->insert([
                'id'      => $product->id."-".$product_detail->product_stock_id,
                'qty'     => $this->post('qty'),
                'price'   =>  $product_detail->price -  ( ($product->discount/100) * $product_detail->price  )   ,
                'name'    => $product->title,
                'options' => [
                    'model' =>  $product->model ,
                    'image' =>  $product->image ,
                    'discount' =>  $product->discount ,
                    'Size' => $size,
                    'size_id' =>   $product_detail->option_detail_id,
                    'Color' => $color ,
                    "color_id" => $product_detail->option_id
                ]
            ]);
            $this->response($this->_cart_info());

        }else{
            $this->response($this->_cart_info());
        }
    }

    function _cart_info(){
        foreach ($this->cart->contents() as $item ){
            $id = explode('-',$item['id']);
            $product_id = $id[0];
            $product_detail = $id[1];
            $product = $this->pro->get($product_id);
            $product_detail = $this->pro->get_stock_by_product_stock_id($product_detail) ;

            $cart['products'][] = [
                'id' => $product->id  ,
                'rowid' => $item['rowid']  ,
                'link' => base_url('category/'.url_title($product->title)."~".$product->id) ,
                'quantity' =>  $item['qty'] ,
                'image' =>  UP.$product->image ,
                'image_cart' =>  UPT.$product->image ,
                'name' =>  $product->title ,
                'price' => number_format($item['price'],2) ." QAR" ,
                'price_float' => $item['price'] ,
                'idCombination' => $product_detail->product_stock_id ,
                'attributes' => $product_detail->product_stock_id ,
            ];
        }
        $cart ["nbTotalProducts"] = count($this->cart->contents() ) ;
        $cart ["total"] =  $this->cart->format_number($this->cart->total());
        return $cart;
    }

    function remove_post(){
        $data = array(
            'rowid' => $this->post('rowid'),
            'qty'   => 0
        );

        $this->cart->update($data);
        $this->response($this->_cart_info());
    }

    function update_post(){

        $cart = $this->cart->contents();
        $item = $cart[$this->post('rowid')] ;
        sscanf($item['id'], "%d-%d", $id, $stock_id);

        $stock = $this->pro->get_stock_by_product_stock_id($stock_id) ;

        if($stock->qty < $this->post('qty') ){
            $response = $this->_cart_info() ;
            $response['hasError'] = true ;
            $response['errors'] = [
                "Selected Quantity is Grader then the available Quantity"
            ] ;
        }else{
            $data = array(
                'rowid' => $this->post('rowid'),
                'qty'   => $this->post('qty')
            );
            $this->cart->update($data);
            $response = $this->_cart_info() ;
        }

        $this->response($response);

    }
}

?>
