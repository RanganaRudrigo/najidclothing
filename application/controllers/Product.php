<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/Front_Controller.php';

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/16/2016
 * Time: 3:27 PM
 */
class Product extends Front_Controller
{

    function index(){
        $parameters = func_get_args() ;
        if( count(($pro = explode("~",end($parameters))) ) != 2 )  show_404();
        $product_id = end($pro);

        if( ! is_object($product = $this->pro->get($product_id)) ){
            show_404();
        }

        unset($parameters);
        foreach (func_get_args() as $k => $v) if($k%2) $parameters[] = $v;
        
        $this->_getCategory($parameters);
        $product->price = $this->pro->getPriceRangeBy($product_id);

        $this->load->model("option_model",'option');

        $attributes['color'] = array('id'=>2 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 2 )  )  ) ;
        $attributes['size'] = array('id'=>3 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 3 )  )  ) ;
        $d['size'] = $attributes['size']['result']  ;
        $attr = array();
        foreach ($attributes as  $type => $attribute ){
            foreach ($attribute['result'] as $a ){
                $attr[] =  array('id_attribute'=> $a->id , 'id_attribute_group' => $attribute['id'] , 'attribute'=> $a->title , 'group' => $type );
            }
        }
        unset($attributes);

        $options = $this->pro->get_option_by_product_id_option_group_id($product_id,2);

        $option = array();
        foreach ($options as $ops ){
             foreach ($ops['size'] as $op )
            $option[$op->product_stock_id] = array(
                'attributes_values'=>array($op->option_detail_id=>$op->size,$op->option_id=>$op->color),
                'quantity' =>$op->qty,
                'price' =>$op->price,
                'minimal_quantity' => 1 ,
                'attributes' => [$op->option_detail_id,$op->option_id]
            );
        }

        if(empty($options)){
            $options['default'] = $this->pro->get_option_by_id_all($product_id);
            $op = $options['default'][0];
            $option[$op->product_stock_id] = array(
                'attributes_values'=>array($op->option_detail_id=>$op->size,$op->option_id=>$op->color),
                'quantity' =>$op->qty,
                'price' =>$op->price,
                'minimal_quantity' => 1 ,
                'attributes' => [$op->option_detail_id,$op->option_id]
            );

        }



//         ------------------- related products -----------------------------------------------------
        if(empty($parameters)){
            $cats = $this->pro->get_product_category($product_id);
            foreach ($cats as $cat)
                $category_id[] = $cat->category_id ;
        }else{
            foreach ($parameters as $p ){
                $category_id[] = $p->id ;
            }
        }

        $d['related'] = $this->pro->getProductsByCategory_id($category_id,0,1,40,array($product_id));


//         ------------------- related products  end -----------------------------------------------------

        $d['option'] = $option ;
        $d['options'] = $options ;
        $d['attribute'] = $attr ;
        $d['size'] = $attr ;
        $d['categories'] = $parameters ;
        $d['product'] = $product ;
        $d['images'] = $this->pro->get_more_image($product_id);


         $this->view('product_detail',$d);

    }

    function school(){
        $parameters = func_get_args() ;
        if( count(($pro = explode("~",end($parameters))) ) != 2 )  show_404();
        $product_id = end($pro);

        if( ! is_object($product = $this->pro->get($product_id)) ){
            show_404();
        }

        unset($parameters);

        foreach (func_get_args() as $k => $v) if($k%2) $parameters[] = $v;



        $this->load->model("option_model",'option');

        $attributes['color'] = array('id'=>2 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 2 )  )  ) ;
        $attributes['size'] = array('id'=>3 , 'result' => $this->option->get_many_by( array('status'=>1 , 'option_id' => 3 )  )  ) ;
        $d['size'] = $attributes['size']['result']  ;
        $attr = array();
        foreach ($attributes as  $type => $attribute ){
            foreach ($attribute['result'] as $a ){
                $attr[] =  array('id_attribute'=> $a->id , 'id_attribute_group' => $attribute['id'] , 'attribute'=> $a->title , 'group' => $type );
            }
        }
        unset($attributes);

        $options = $this->pro->get_option_by_product_id_option_group_id($product_id,2);

        if(empty($options))
            $options['default'] = $this->pro->get_option_by_id_all($product_id);

        $option = array();
        foreach ($options as $ops ){
            foreach ($ops['size'] as $op )
                $option[$op->product_stock_id] = array(
                    'attributes_values'=>array($op->option_detail_id=>$op->size,$op->option_id=>$op->color),
                    'quantity' =>$op->qty,
                    'price' =>$op->price,
                    'minimal_quantity' => 1 ,
                    'attributes' => [$op->option_detail_id,$op->option_id]
                );
        }


//         ------------------- related products -----------------------------------------------------
        $cats = $this->pro->get_product_category($product_id);
        foreach ($cats as $cat)
            $category_id[] = $cat->category_id ;
        $d['related'] = $this->pro->getProductsByCategory_id($category_id,0,false,40,array($product_id));


//         ------------------- related products  end -----------------------------------------------------

        $d['option'] = $option ;
        $d['options'] = $options ;
        $d['attribute'] = $attr ;
        $d['size'] = $attr ;
        $d['categories'] = $parameters ;
        $d['product'] = $product ;
        $d['images'] = $this->pro->get_more_image($product_id);


           $this->view('product_detail',$d);
    }

}