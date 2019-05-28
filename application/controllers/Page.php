<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Page extends Base {

	public function index() {
		$this->load->model('Ads_model');
		$this->load->model('Brands_model');
		$this->load->model('Categories_model');
		$this->load->model('Inventories_model');

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

		$data['ads'] = $ads_rows;
		$data['brand'] = $brand_rows;
		if ($this->login){
			$data['userdata'] = $this->user->getUsername();
			$this->load->view('front/header', $data);
			$this->load->view('front/mainpage', $data);
			$this->load->view('front/footer', $data);
		} else {
			$this->load->view('front/header', $data);
			$this->load->view('front/mainpage', $data);
			$this->load->view('front/footer');
		}
	}

	public function signin() {
        if ($this->login) {
            redirect('/');
        } else {
            $this->load->view('front/login');
        }
	}

	public function register() {
        if ($this->login) {
            redirect('/');
        } else {
            $this->load->view('front/register');
        }
	}

	public function forgetPass() {
		$this->load->view('front/forgetPass');
	}

	public function get_products($category_id) {
		$this->load->model('Categories_model');
		$this->load->model('Inventories_model');

        $categoryInfo = $this->Categories_model->get_by_id($category_id);
        if ((int)$categoryInfo['level'] === 1) {
            $results = $this->Inventories_model->get_by_level('one', $category_id);
            $child2_categories = $this->Categories_model->get_categories(2, $category_id);
            foreach ($child2_categories as &$row){
                $child3_categories = $this->Categories_model->get_categories(3, $row['id']);
                $row['children'] = $child3_categories;
            }
        } elseif ((int)$categoryInfo['level'] === 2) {
            $results = $this->Inventories_model->get_by_level('two', $category_id);
            $child_categories = $this->Categories_model->get_categories(3, $category_id);
            $parent_category = $this->Categories_model->get_by_id($categoryInfo['parent']);
        } else {
            $results = $this->Inventories_model->get_by_level('three', $category_id);
            $category_two = $this->Categories_model->get_by_id($categoryInfo['parent']);
            $category_one = $this->Categories_model->get_by_id($category_two['parent']);
        }
    }

    public function get_places($goods_data, $cond = null){
        $r = array();
        $places = array();

        if ($cond == null) {
            foreach ($goods_data['place_of'] as $item){
                $s = explode('-', $item);
                $r[] = $s;
            }

            foreach ($r as $item){
                $province = $this->Provinces_model->get_by_id($item[0]);
                $city = $this->Cities_model->get_by_id($item[1]);
                $e = array(
                    'prov' => $province,
                    'city' => $city,
                    'id' => $goods_data['place_of']
                );
                $places[] = $e;
            }
        }else{
            foreach ($goods_data as &$item){

            }
        }

        return$places;
    }

	public function productinfo() {
		$this->load->model('Brands_model');
		$this->load->model('Categories_model');
		$this->load->model('Cities_model');
		$this->load->model('Inventories_model');
		$this->load->model('Provinces_model');

		$data = array(
			'title' => '商品详情',
			'userdata' => '',
		);

		$productId = $this->input->get('productId');
		$product_data = $this->Inventories_model->get_by_id($productId);
		$data['product_info'] = $product_data;
		$one_category_info = $this->Categories_model->get_by_id($product_data['level_one']);
		$data['category_one'] = $one_category_info;

		$products = array();
		if ($product_data['level_two']){
			$two_category_info = $this->Categories_model->get_by_id($product_data['level_two']);
			$data['category_two'] = $two_category_info;
			if ($product_data['level_three']) {
				$products = $this->Inventories_model->get_by_level('two',$product_data['level_two']);
			}
		} else {
			$products = $this->Inventories_model->get_by_level('one', $product_data['level_one']);
		}

		if ($product_data['level_three']){
			$three_category_info = $this->Categories_model->get_by_id($product_data['level_three']);
			$data['category_three'] = $three_category_info;
			$products = $this->Inventories_model->get_by_level('three', $product_data['level_three']);
		}

		$data['more_goods'] = $products;

		$brand_data = $this->Brands_model->get_by_id($product_data['brands'][0]);
		$data['brand'] = $brand_data;

        $places = $this->get_places($product_data);
		$data['place'] = $places;

        if ($this->login){
	        $data['userdata'] = $this->user->getUsername();
	        $this->load->view('front/header', $data);
	        $this->load->view('front/goodsInfo', $data);
	        $this->load->view('front/footer', $data);
        } else {
	        $this->load->view('front/header', $data);
	        $this->load->view('front/goodsInfo', $data);
	        $this->load->view('front/footer', $data);
        }
	}

	public function cartList() {
		if ($this->login) {
			$this->load->model('Carts_model');
			$this->load->model('Cities_model');
			$this->load->model('Provinces_model');

			$userInfo = $this->user->getUsername();
			$userid = $this->user->getId();
			$cart_results = $this->Carts_model->get_all_carts_by_user_id($userid);

			if ($cart_results){
                foreach ($cart_results as &$item){

                    $s = explode('-', $item['detail']['place_of']);
					$province = $this->Provinces_model->get_by_id($s[0]);
					$city = $this->Cities_model->get_by_id($s[1]);
					$item['place_real'] = $province['name'] .  $city['name'];
                }
            }


			var_dump($cart_results);
			exit();

			$data = array(
				'title' => '订购清单',
				'userdata' => $userInfo,
				'carts_rel' => $cart_results
			);

			$this->load->view('front/header', $data);
			$this->load->view('front/shoppingCart', $data);
			$this->load->view('front/footer', $data);
		} else {
			redirect('page/signin');
		}
    }

    public function orderList() {
	    if ($this->login) {
	    	$this->load->model('Orders_model');

		    $userInfo = $this->user->getUsername();
		    $userid = $this->user->getId();
		    $order_results = $this->Orders_model->get_all_orders_by_user_id($userid);

		    $data = array(
			    'title' => '我的订单',
			    'userdata' => $userInfo,
			    'orders' => $order_results
		    );
		    $this->load->view('front/header', $data);
		    $this->load->view('front/myOrder', $data);
		    $this->load->view('front/footer', $data);
	    } else {
	    	redirect('page/signin');
	    }
    }

    public function goodsList() {
        $data = array(
            'title' => '商品列表',
            'userdata' => '',
        );

        if ($this->login){
	        $data['userdata'] = $this->user->getUsername();
	        $this->load->view('front/header', $data);
	        $this->load->view('front/goodsList', $data);
	        $this->load->view('front/footer', $data);
        } else {
	        $this->load->view('front/header', $data);
	        $this->load->view('front/goodsList', $data);
	        $this->load->view('front/footer');
        }
    }

    public function searchList() {
		$this->load->model('Brands_model');
		$this->load->model('Categories_model');
		$this->load->model('Inventories_model');

        $data = array(
            'title' => '商品详情',
            'userdata' => '',
        );
        $categoryId = $this->input->get('categoryId');
        $pageSize = $this->input->get('pageSize');
        $pageNum = $this->input->get('pageNum');
        $keyword = $this->input->get('keyword');

        $categoryInfo = $this->Categories_model->get_by_id($categoryId);

        if ($categoryInfo['level'] == 1){
            $results = $this->Inventories_model->get_by_level('one', $categoryId);
            $child2_categories = $this->Categories_model->get_categories(2, $categoryId);
            foreach ($child2_categories as &$row){
                $child3_categories = $this->Categories_model->get_categories(3, $row['id']);
                $row['children'] = $child3_categories;

            }
            $data['category_info'] = $categoryInfo;
            $data['category_two'] = $child2_categories;
            $data['products'] = $results;

        }elseif ($categoryInfo['level'] == 2) {

            $results = $this->Inventories_model->get_by_level('two', $categoryId);
            $child_categories = $this->Categories_model->get_categories(3, $categoryId);
            $category_one = $this->Categories_model->get_by_id($categoryInfo['parent']);

            $data['category_info'] = $categoryInfo;
            $data['products'] = $results;
            $data['category_one'] = $category_one;
            $data['category_three'] = $child_categories;

        }else {
            $results = $this->Inventories_model->get_by_level('three', $categoryId);
            $category_two = $this->Categories_model->get_by_id($categoryInfo['parent']);
            $category_one = $this->Categories_model->get_by_id($category_two['parent']);

            $data['category_info'] = $categoryInfo;
            $data['products'] = $results;
            $data['category_one'] = $category_one;
            $data['category_two'] = $category_two;
        }

        $data['brands1_active']   = $this->Brands_model->get_all_brands(1,1);
        $data['brands1_inactive'] = $this->Brands_model->get_all_brands(1,0);
        $data['brands2_active']   = $this->Brands_model->get_all_brands(2,1);
        $data['brands2_inactive'] = $this->Brands_model->get_all_brands(2,0);
        $data['brands3_active']   = $this->Brands_model->get_all_brands(3,1);
        $data['brands3_inactive'] = $this->Brands_model->get_all_brands(3,0);

        if ($this->login){
	        $data['userdata'] = $this->user->getUsername();
	        $this->load->view('front/searchList', $data);
        } else {
	        $this->load->view('front/searchList', $data);
        }
    }
}
