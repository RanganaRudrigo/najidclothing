<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/5/2016
 * Time: 12:51 PM
 */
class Product_model extends MY_Model
{
    protected $_table = 'product';
    protected $primary_key = 'id';
    protected $protected_attributes = array('id');

    protected $after_get = array('remove_sensitive_fields');
    protected $before_create = array("prop_data");

    protected $join = array();

    protected $_stock = 'product_stock';
    protected $_log = 'product_stock_log';
    protected $_category = 'product_category';
    protected $_grade = 'product_school_grade';
    protected $_option = 'option_detail';
    protected $_image = 'product_images';

    function __construct()
    {
        parent::__construct();
        $this->join = array(
            array($this->_stock, "$this->_stock.product_id = $this->_table.id", ""),
            array($this->_category, "$this->_category.product_id = $this->_table.id", ""),
            array($this->_grade, "$this->_grade.product_id = $this->_table.id", ""),
            array($this->_image, "$this->_image.product_id = $this->_table.id", "")
        );
    }

    protected function remove_sensitive_fields($data)
    {
        unset($data->date);
        unset($data->status);
        return $data;
    }

    protected function prop_data($data)
    {
        $data['date'] = date("Y-m-d H:i:s");
        $data['user_id'] = $this->session->userdata("user")->id;
        return $data;
    }

    function insert_option($id, $data)
    {
        $this->db->trans_start();
        foreach ($data['option_id'] as $i => $op) {
            foreach ($data as $k => $v) $d[$k] = $v[$i];
            $d['date'] = date("Y-m-d H:i:s");
            $d['product_id'] = $id;
            if (isset($d['product_stock_id'])) {
                $this->db->update($this->_stock, $d, "product_stock_id =" . $d['product_stock_id']);
            } else {
                $d['qty'] = 0;
                $this->db->insert($this->_stock, $d);
            }
            $log_id = isset($d['product_stock_id']) ? $d['product_stock_id'] : $this->db->insert_id();
            unset($d);
            if ($this->input->post("log[qty][$i]")) {
                $log[$i]['product_stock_id'] = $log_id;
                $log[$i]['date'] = date("Y-m-d H:i:s");
                $log[$i]['qty'] = $this->input->post("log[qty][$i]");
            }
        }
        if (isset($log)) {
            $this->db->insert_batch($this->_log, $log);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function get_option_by_id($id)
    {
        $options['default'] = $this->db->get_where($this->_stock, array('product_id' => $id, "option_id " => 1))->row();
        $options['more'] = $this->db->get_where($this->_stock, array('product_id' => $id, "option_id !=" => 1))->result();
        return $options;
    }

    /*
     * if you use this method must be load option model before
     * */
    function get_option_by_id_all($product_id)
    {

        return $this->db->from($this->_stock)
            ->where('product_id', $product_id)
            ->join($this->option->table() . " A ", "A.id = $this->_stock.option_id")
            ->join($this->option->table() . " B ", "B.id = $this->_stock.option_detail_id")
            ->select("$this->_stock.* , A.title as color , B.title as size")
            ->get()->result();
    }

    /*
    * if you use this method must be load option model before
    * */
    function get_option_by_product_id_option_group_id($product_id, $group_id)
    {

        $colors = $this->db->from($this->_stock)
            ->where('product_id', $product_id)
            ->join($this->option->table() . " A ", "A.id = $this->_stock.option_id")
            ->select("$this->_stock.option_id, A.title , A.image ")
            ->where(' A.option_id ', $group_id)
            ->group_by('A.id')
            ->get()->result();

        foreach ($colors as $color) {
            $options[$color->option_id] =
                array(
                    'id' => $color->option_id,
                    'title' => $color->title,
                    'color_code' => $color->image,
                    'size' => $this->db->from($this->_stock)
                        ->where('product_id', $product_id)
                        ->join($this->option->table() . " A ", "A.id = $this->_stock.option_id")
                        ->join($this->option->table() . " B ", "B.id = $this->_stock.option_detail_id")
                        ->select("$this->_stock.* , A.title as color , B.title as size")
                        ->where(' A.option_id ', $group_id)
                        ->where(' A.id ', $color->option_id)
                        ->get()->result()
                );

        }

        return isset($options) ? $options : array();

    }


    function get_category_table()
    {
        return $this->_category;
    }

    function get_grade_table()
    {
        return $this->_grade;
    }

    function get_image_table()
    {
        return $this->_image;
    }

    function get_option_table()
    {
        return $this->_option;
    }

    function get_stock_table()
    {
        return $this->_stock;
    }

    function get_more_image($product_id = 0)
    {
        return $this->db->from($this->_image)->where('product_id', $product_id)->get()->result();
    }

    function get_product_category($id)
    {
        if (empty($id)) return array();
        else {
            return $this->db->from($this->_category)->where("$this->_category.product_id", $id)->select("category_id")->get()->result();
        }
    }

    function get_product_grade($id)
    {
        if (empty($id)) return array();
        else {
            return $this->db->from($this->_grade)->where("$this->_grade.product_id", $id)->select("grade_id")->get()->result();
        }
    }

    function getPriceRangeBy($id)
    {
        return $this->db->from($this->_stock)
            ->where('product_id', $id)
            ->select_max('price', 'max')
            ->select_min('price', 'min')
            ->group_by('product_id')
            ->where('price >', 0)
            ->get()->row();
    }

    function getProductsByCategory_id($category_id, $limit = null, $public = true,$limiter=LIMIT,$remove_product_id=array())
    {

        if (!is_null($limit)) {
            $this->limit($limiter, $limit);
        }
        $this->_filter();
        $this->_database->group_by($this->_table.".id");
        $this->_database->select("$this->_table.*");
        $this->relation_tables($this->_category);
        if ($public) {
            $this->_database->where('public', 1);
        }
        if(is_array($category_id) )
            $this->_database->where_in('category_id', $category_id);
        else
            $this->_database->where('category_id', $category_id);

        if(!empty($remove_product_id)){
            $this->_database->where_not_in($this->_table.".id", $remove_product_id);
        }

        return $this->get_all();
    }

    function _filter()
    {
        if ($this->input->get('filter') || $this->input->get('size')) {
            $this->_database->join($this->_stock, "$this->_stock.product_id = $this->_table.id ");
            $this->_database->join($this->_option, "$this->_option.id = $this->_stock.option_id");
        }
        if ($this->input->get('filter')) {
            foreach ($this->input->get('filter') as $option_id => $option_more_ids) {
                $this->_database->group_start();
                $this->_database->where("$this->_option.option_id", (int)$option_id);
                foreach ($option_more_ids as $k => $option_more_id) {
                    if ($k) $this->_database->or_where("$this->_option.id", (int)$option_more_id);
                    else $this->_database->where("$this->_option.id", (int)$option_more_id);
                }
                $this->_database->group_end();
            }

        }

        if ($this->input->get('size')) {
            $this->_database->group_start();
            foreach ($this->input->get('size') as $k => $option_more_id) {
                if ($k)
                    $this->_database->or_where("$this->_stock.option_detail_id", (int)$option_more_id);
                else
                    $this->_database->where("$this->_stock.option_detail_id", (int)$option_more_id);
            }
            $this->_database->group_end();
        }
    }

    function getProductsCountByCategory_id($category_id, $public = true)
    {

        $this->relation_tables($this->_category);
        $this->_filter();
        if ($public) {
            $this->_database->where('public', 1);
        }
        $this->_database->where('category_id', $category_id);
        return $this->_database->count_all_results($this->_table);
    }

    function get_stock_by_product_stock_id($product_stock_id)
    {
        return $this->db->from($this->_stock)->where("product_stock_id", $product_stock_id)->get()->row();
    }

    function getProductByGradeId($grade_id,$limit){

        if (!is_null($limit)) {
            $this->limit(LIMIT, $limit);
        }
        $this->_filter();
        $this->_database->group_by($this->_table.".id");
        $this->_database->select("$this->_table.*");
        $this->relation_tables($this->_grade);
        $this->_database->where('grade_id', $grade_id);
        return $this->get_all();
    }

    function getProductByGradeIdCount($grade_id){
        $this->_filter();
        $this->relation_tables($this->_grade);
        $this->_database->where('grade_id', $grade_id);
        return $this->_database->count_all_results($this->_table);
    }

    

}