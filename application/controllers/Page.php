<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Page extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Global_model');
		$this->load->model('Users_model');
		$this->load->model('Categories_model');
		$this->load->model('Provinces_model');
		$this->load->model('Cities_model');
		$this->load->model('Inventories_model');
		$this->load->model('Brands_model');
		$this->load->model('Ads_model');
		$this->load->model('Orders_model');
		$this->load->model('Carts_model');
		$this->load->helper('directory');
		$this->load->library('session');
		$this->load->helper('url');
	}
    private function checkLogin() {

        $userInfo = $this->user->getUsername();
        $sess_flag = false;
        if (!isset($userInfo)) {
            $sess_flag = false;
        }else{
            $sess_flag = true;
        }
        if($sess_flag == false){
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

//		var_dump($goods_rows);
//		exit();

		$data['ads'] = $ads_rows;
		$data['brand'] = $brand_rows;
        $userInfo = $this->user->getUsername();
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
        if($this->login) {
            redirect('/');
        } else {
            $this->load->view('front/login');
        }
	}

	public function register() {
        if($this->login) {
            redirect('/');
        } else {
            $this->load->view('front/register');
        }
	}
	public function forgetPass() {
		$this->load->view('front/forgetPass');
	}

	public function get_products($id) {

        $categoryInfo = $this->Categories_model->get_by_id($id);

        if ($categoryInfo['level'] == 1){

            $category_rows = $this->Categories_model->get_categories(1, $id);

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
            return array('parent' => '', 'products' => $category_rows);

        }elseif ($categoryInfo['level'] == 2) {
            $category_rows = $this->Categories_model->get_categories(1, $id);
            $parent_one = $this->Categories_model->get_category(1, $id);

            foreach ($category_rows as &$row) {
                $row2s = $this->Categories_model->get_categories(3, $row['id']);
                $goods_rows = $this->Inventories_model->get_by_level('tow', $row['id']);

                $row['children'] = $row2s;
                $row['goods_data'] = $goods_rows;

            }
            return array('products' =>$category_rows, 'parent_one' => $parent_one);

        }else {
            $products = $this->Inventories_model->get_by_level('three', $id);
            $parent_two = $this->Categories_model->get_category(2, $id);
            $parent_one = $this->Categories_model->get_category(1, $parent_two['id']);

            return array('products' => $products, 'parent_one' => $parent_one, 'parent_two' => $parent_two);
        }

    }

	public function productinfo() {
		$data = array(
			'title' => '商品详情',
			'userdata' => '',
		);
		$productId = $this->input->get('productId');

		$product_data = $this->Inventories_model->get_by_id($productId);


		$data['product_info'] = $product_data;


		$one_category_info = $this->Categories_model->get_by_id($product_data['level_one']);
		$data['category_one'] = $one_category_info;

		if ($product_data['level_two'] != null){

			$two_category_info = $this->Categories_model->get_by_id($product_data['level_two']);
			$data['category_two'] = $two_category_info;

			if ($product_data['level_three'] == null) {

				$products = $this->Inventories_model->get_by_level('two',$product_data['level_two']);

			}

		}else {
			$products = $this->Inventories_model->get_by_level('one', $product_data['level_one']);

		}

		if ($product_data['level_three'] != null){

			$three_category_info = $this->Categories_model->get_by_id($product_data['level_three']);
			$data['category_three'] = $three_category_info;

			$products = $this->Inventories_model->get_by_level('three', $product_data['level_three']);

		}

		$data['more_goods'] = $products;

		$brand_data = $this->Brands_model->get_by_id($product_data['brands'][0]);
		$data['brand'] = $brand_data;


		$r = array();
        $places = array();
		foreach ($product_data['place_of'] as $item){
		    $s = explode("-", $item);
		    array_push($r, $s);
        }
		foreach ($r as $item){

		    $province = $this->Provinces_model->get_by_id($item[0]);
		    $city = $this->Cities_model->get_by_id($item[1]);
            $e = array(
                'prov' => $province,
                'city' => $city,
                'id' => $product_data['place_of']
            );
            array_push($places, $e);
        }
		$data['place'] = $places;


        $userInfo = $this->user->getUsername();
        if (!$userInfo){
            $this->load->view('front/header', $data);
            $this->load->view('front/goodsInfo', $data);
            $this->load->view('front/footer', $data);
        }else {
            $data['userdata'] = $userInfo;
            $this->load->view('front/header', $data);
            $this->load->view('front/goodsInfo', $data);
            $this->load->view('front/footer', $data);
        }
	}

	public function cartList() {

        $this->checkLogin();
        $userInfo = $this->user->getUsername();
        $userid = $this->user->getId();
        $cart_results = $this->Carts_model->get_all_carts_by_user_id($userid);

        $r = array();
        foreach ($cart_results as &$item){
            $s = explode("-", $item['detail']['place_of']);
            $province = $this->Provinces_model->get_by_id($s[0]);
            $city = $this->Cities_model->get_by_id($s[1]);
            $item['place_real'] = $province['name'] . $city['name'];
        }

        $data = array(
            'title' => '订购清单',
            'userdata' => $userInfo,
            'carts_rel' => $cart_results
        );

        $this->load->view('front/header', $data);
        $this->load->view('front/shoppingCart', $data);
        $this->load->view('front/footer', $data);
    }

    public function orderList() {
	    $this->checkLogin();
        $userInfo = $this->user->getUsername();
        $userid = $this->user->getId();
	    $order_results = $this->Orders_model->get_all_orders_by_user_id($userid);

	    var_dump($order_results[0]);
	    exit();
        $data = array(
            'title' => '我的订单',
            'userdata' => $userInfo,
            'orders' => $order_results
        );

        $this->load->view('front/header', $data);
        $this->load->view('front/myOrder', $data);
        $this->load->view('front/footer', $data);

    }

    public function goodsList() {
        $data = array(
            'title' => '商品列表',
            'userdata' => '',
        );

        $userInfo = $this->user->getUsername();
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
        $this->load->view('front/searchList', $data);
        $categoryId = $this->input->get('categoryId');

    }

}