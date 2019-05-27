<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Global_model');
		$this->load->model('Users_model');
		$this->load->model('Categories_model');
//		$this->load->model('Gallery_model');
		$this->load->model('Inventories_model');
		$this->load->model('Brands_model');
		$this->load->model('Ads_model');
		$this->load->helper('directory');
		$this->load->library('session');
		$this->load->helper('url');
	}
	private function checkLogin() {

		$userInfo = $this->getUserInfo();
		$sess_flag = false;
		if (!isset($userInfo['id'])) {
			$sess_flag = false;
		}else{
			if($userInfo['id'] > 0) $sess_flag = true;
		}
		if($sess_flag == false){
			$this->load->helper('url');
			$baseurl = $this->Global_model->get_baseurl();
			redirect($baseurl."/page/login", 'refresh');
		}else{
			return true;
		}
	}

	public function index() {
		$data = array(
			'title' => '主页',
			'userdata' => '',
		);
		$category_rows = $this->Categories_model->get_categories(1);
		if ($category_rows){
			foreach ($category_rows as &$row) {
				$row2s = $this->Categories_model->get_categories(2, $row['id']);
				$goods_rows = $this->Inventories_model->get_by_level('one', $row['id']);
				if ($row2s){
					foreach ($row2s as &$row2) {
						$row3s = $this->Categories_model->get_categories(3, $row2['id']);
						$row2['children'] = $row3s;
					}
				}
				$row['children'] = $row2s;
				$row['goods_data'] = $goods_rows;
			}
		}

		$ads_rows = $this->Ads_model->get_all_ads(1);
		$brand_rows = $this->Brands_model->get_all_brands(1);

		$data['categories'] = $category_rows;

//		var_dump($category_rows);
//		exit();

		$data['ads'] = $ads_rows;
		$data['brand'] = $brand_rows;

		$userInfo = $this->getUserInfo();
		if (!$userInfo){
			$this->load->view('front/header', $data);
			$this->load->view('front/mainpage', $data);
			$this->load->view('front/footer');
		}else {
			$data['userdata'] = $userInfo;
			$this->load->view('front/header', $data);
			$this->load->view('front/mainpage', $data);
			$this->load->view('front/footer', $data);
		}
	}

	public function login() {
		$this->load->view('front/login');
	}

	public function register() {
		$this->load->view('front/register');
	}
	public function forgetPass() {
		$this->load->view('front/forgetPass');
	}

	public function productinfo() {
		$data = array(
			'title' => '商品详情',
			'userdata' => '',
		);
		$productId = $this->input->get('productId');

		$product_data = $this->Inventories_model->get_by_id($productId);
		$data['product_info'] = $product_data;

//		foreach ($product_data['related'] as $row){
//		    $related_goods = $this->Inventories_model->get_by_id($row);
//        }

		$one_category_info = $this->Categories_model->get_by_id($product_data['level_one']);
		$data['category_one'] = $one_category_info;

		if ($product_data['level_two'] != 0){

			$two_category_info = $this->Categories_model->get_by_id($product_data['level_two']);
			$data['category_two'] = $two_category_info;

			if ($product_data['level_three'] == 0) {

				$products = $this->Inventories_model->get_by_level('two',$product_data['level_two']);
				$data['more_goods'] = $products;
			}

		}else {
			$products = $this->Inventories_model->get_by_level('one', $product_data['level_one']);
			$data['more_goods'] = $products;
		}
		if ($product_data['level_three'] != 0){

			$three_category_info = $this->Categories_model->get_by_id($product_data['level_three']);
			$data['category_three'] = $three_category_info;

			$products = $this->Inventories_model->get_by_level('three', $product_data['level_three']);
			$data['more_goods'] = $products;
		}

		$brand_data = $this->Brands_model->get_by_id($product_data['brands']);
		$data['brand'] = $brand_data;

		$this->load->view('front/header', $data);
		$this->load->view('front/goodsInfo', $data);
		$this->load->view('front/footer');
	}

	public function cartList() {
        $data = array(
            'title' => '订购清单',
            'userdata' => '',
        );

        $userInfo = $this->getUserInfo();
        if (!$userInfo){
            $this->load->view('front/header', $data);
            $this->load->view('front/shoppingCart', $data);
            $this->load->view('front/footer');
        }else {
            $data['userdata'] = $userInfo;
            $this->load->view('front/header', $data);
            $this->load->view('front/shoppingCart', $data);
            $this->load->view('front/footer', $data);
        }

    }

    public function orderList() {
        $data = array(
            'title' => '我的订单',
            'userdata' => '',
        );

        $userInfo = $this->getUserInfo();
        if (!$userInfo){
            $this->load->view('front/header', $data);
            $this->load->view('front/myOrder', $data);
            $this->load->view('front/footer');
        }else {
            $this->checkLogin();
        }

    }

    public function goodsList() {
        $data = array(
            'title' => '商品列表',
            'userdata' => '',
        );

        $userInfo = $this->getUserInfo();
        if (!$userInfo){
            $this->load->view('front/header', $data);
            $this->load->view('front/goodsList', $data);
            $this->load->view('front/footer');
        }else {
            $data['userdata'] = $userInfo;
            $this->load->view('front/header', $data);
            $this->load->view('front/goodsList', $data);
            $this->load->view('front/footer', $data);
        }
    }

    public function searchList() {
        $data = array(
            'title' => '商品详情',
            'userdata' => '',
        );
        $categoryId = $this->input->get('categoryId');

        $userInfo = $this->getUserInfo();
        if (!$userInfo){
            $this->load->view('front/header', $data);
            $this->load->view('front/searchList', $data);
            $this->load->view('front/footer');
        }else {
            $data['userdata'] = $userInfo;
            $this->load->view('front/header', $data);
            $this->load->view('front/searchList', $data);
            $this->load->view('front/footer', $data);
        }
    }

}