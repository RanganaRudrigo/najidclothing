<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/Front_Controller.php';

class Home extends Front_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->model('product_model','pro');
		
		$this->load->model('slider_model','slider');
		$d['sliders'] = $this->slider->get_many_by('status',1);

		$this->load->model('feature_model','feature');
		$d['features'] = $this->feature->get_many_by(array('status'=>1,'home_page'=>1));
		
		foreach ($d['features']  as &$feature_list){
			$features = $this->feature->get_feature('feature_list_id', $feature_list->feature_list_id );
			$id = array();
			foreach ($features as $feature)
				$id[] = $feature->product_id ;
			$feature_list->products =!empty($id) ? $this->pro->get_many($id) : array();
			foreach ($feature_list->products as $p )
				$p->price = $this->pro->getPriceRangeBy($p->id);

		}
		

		$this->view('home',$d);
	}

 
	

}
