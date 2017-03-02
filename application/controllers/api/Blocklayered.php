<?php
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/14/2016
 * Time: 12:16 PM
 */
class Blocklayered extends REST_Controller
{

    function filter_get(){
        $this->load->model("category_model",'cat');
        $this->load->model("product_model",'pro');
        $limit =( ($this->input->get('p')? $this->input->get('p') : 1)  - 1 )*LIMIT ;

        if($this->input->get('category_id')){
            $pro = $this->pro->getProductsByCategory_id( $this->input->get('category_id'),$limit);
            $count = $this->pro->getProductsCountByCategory_id( $this->input->get('category_id') );
        }else if( $this->input->get('grade_id') ){
            $pro = $this->pro->getProductByGradeId( $this->input->get('grade_id') ,$limit );
            $count = $this->pro->getProductByGradeIdCount( $this->input->get('grade_id') );
        }



        $d['query'] = $this->db->last_query();
        ob_start();
        $this->load->view('front/inc/product_list_ul',array('products'=>$pro , 'link'=>$this->get('url') ));
        $product_list = ob_get_contents();
        ob_clean();





        $d['pagination'] = $this->_pagination($count,count($pro)) ;
        $d['pagination_bottom'] = $this->_pagination_bottom($count,count($pro)) ;
        $d['productList'] = $product_list ;
        $d['nbRenderedProducts'] = count($pro) ;
        $d['nbAskedProducts'] = LIMIT ;
        $d['current_friendly_url'] = "#/page-".($this->input->get('p')) ;

        $d['categoryCount'] =  "<span class=\"heading-counter\">There are ".$this->pro->getProductsCountByCategory_id($this->input->get('category_id'))." products.</span>";


        $this->response($d);
    }

    function _pagination($count,$p){
        ob_start();
        ?>
        <div id="pagination" class="pagination clearfix">
            <ul class="pagination">
                <?php if(ceil($count /  LIMIT ) > 1 )  for ($i = 0; $i < ceil($count /  LIMIT ); $i++): ?>
                    <?php if ($i + 1 == $this->input->get('p') || (!$this->input->get('p') && $i == 0)): ?>
                        <li class="active current">
                            <span>   <span><?=$i+1?></span>  </span>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="<?= current_url() ?>?page_id=<?= $i + 1 ?>">
                                <span><?= $i + 1 ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>
            </ul>
        </div>
        <?php
        $pagination = ob_get_contents();
        ob_clean();
        return $pagination ;
    }

    function _pagination_bottom($count,$p){
        ob_start();
        ?>
        <div id="pagination_bottom" class="pagination clearfix">
            <ul class="pagination">
                <?php if(ceil($count /  LIMIT ) > 1 )  for ($i = 0; $i < ceil($count /  LIMIT ); $i++): ?>
                    <?php if ($i + 1 == $this->input->get('p') || (!$this->input->get('p') && $i == 0)): ?>
                        <li class="active current">
                            <span>   <span><?=$i+1?></span>  </span>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="<?= current_url() ?>?page_id=<?= $i + 1 ?>">
                                <span><?= $i + 1 ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>
            </ul> 
        </div>
        <?php
        $pagination = ob_get_contents();
        ob_clean();
        return $pagination ;
    }
}