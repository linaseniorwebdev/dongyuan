<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Home extends Base {

	public function index()
	{
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

        }
        return $places;
    }

	public function goodsInfo()
    {
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

        foreach ($products as &$row){
            $more_goods_brands = $this->Brands_model->get_by_id($row['brands'][0]);
            $row['brands_name'] = $more_goods_brands;
        }

        $data['more_goods'] = $products;

        if ($product_data['related'] != null){
            $related_string = explode(',', $product_data['related']);
            if ($related_string){
                for ($i = 0; $i < sizeof($related_string); $i++){
                    $related_goods[] = $this->Inventories_model->get_by_id($related_string[$i]);
                    $data['related'] = $related_goods;
                }
            }
        }else {
            $data['related'] = '';
        }

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
            $this->load->view('front/footer');
        }
    }

    public function signin()
    {
        $data = array(
            'title' => '登录',
            'userdata' => '',
        );

        if ($this->login) {
            redirect('/');
        } else {
            $this->load->view('front/header', $data);
            $this->load->view('front/login');

        }
    }

    public function register()
    {
        $this->load->model('Permissions_model');

        $data = array(
            'title' => '注册',
            'userdata' => '',
        );

        if ($this->login) {
            redirect('/');
        } else {
            $results = $this->Permissions_model->get_all_permissions();
            $data['permit_data'] = $results;
            $this->load->view('front/header', $data);
            $this->load->view('front/register', $data);
        }
    }

    public function cartsList()
    {
        if ($this->login) {
            $this->load->model('Carts_model');
            $this->load->model('Cities_model');
            $this->load->model('Provinces_model');

            $userInfo = $this->user->getUsername();
            $userid = $this->user->getId();
            $cart_results = $this->Carts_model->get_all_carts_by_user_id($userid);

            if ($cart_results){

                foreach ($cart_results as &$item){
                    if ($item['detail']['place_of']){
                        $s = explode('-', $item['detail']['place_of']);
                        $province = $this->Provinces_model->get_by_id($s[0]);
                        $city = $this->Cities_model->get_by_id($s[1]);
                        $item['place_real'] = $province['name'] .  $city['name'];
                    }else{
                        $item['place_real'] = '';
                    }

                }
            }


            $data = array(
                'title' => '订购清单',
                'userdata' => $userInfo,
                'carts_rel' => $cart_results
            );

            $this->load->view('front/header', $data);
            $this->load->view('front/shoppingCart', $data);
            $this->load->view('front/footer', $data);
        } else {
            redirect('home/signin');
        }

    }

    public function orderList()
    {
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
            redirect('home/signin');
        }
    }

    public function searchList()
    {
        $this->load->model('Brands_model');
        $this->load->model('Categories_model');
        $this->load->model('Inventories_model');
        $this->load->helper('url');
        $this->load->library("pagination");

        $data = array(
            'title' => '商品搜索',
            'userdata' => '',
        );

        $num_rows = 0;
        $status = 0;

        $pageNum  = isset($_GET['pageNum'])? $_GET['pageNum']: 1;
        $pageSize = isset($_GET['pageSize'])? $_GET['pageSize']: 5;
        $search_key = isset($_GET['search_key'])? $_GET['search_key']: null;
        $categoryId = isset($_GET['categoryId'])? $_GET['categoryId']: null;
        $brandId = isset($_GET['brandId'])? $_GET['brandId']: null;

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
        $data['categories'] = $category_rows;

        if ($categoryId != null) {
            $categoryInfo = $this->Categories_model->get_by_id($categoryId);

            if ($categoryInfo['level'] == 1){

                $child2_categories = $this->Categories_model->get_categories(2, $categoryId);
                foreach ($child2_categories as &$row){
                    $child3_categories = $this->Categories_model->get_categories(3, $row['id']);
                    $row['children'] = $child3_categories;

                }
                $num_rows = $this->Inventories_model->getCounts('one', $categoryId);

                $data['category_info'] = $categoryInfo;
                $data['category_two'] = $child2_categories;


            }elseif ($categoryInfo['level'] == 2) {

                $child_categories = $this->Categories_model->get_categories(3, $categoryId);
                $category_one = $this->Categories_model->get_by_id($categoryInfo['parent']);

                $num_rows = $this->Inventories_model->getCounts('two', $categoryId);

                $data['category_info'] = $categoryInfo;
                $data['category_one'] = $category_one;
                $data['category_three'] = $child_categories;

            }else {
                $category_two = $this->Categories_model->get_by_id($categoryInfo['parent']);
                $category_one = $this->Categories_model->get_by_id($category_two['parent']);

                $num_rows = $this->Inventories_model->getCounts('three', $categoryId);

                $data['category_info'] = $categoryInfo;
                $data['category_one'] = $category_one;
                $data['category_two'] = $category_two;
            }

            $offset = ($pageNum - 1) * $pageSize;

            if ($categoryInfo['level'] == 1)
            {
                $results = $this->Inventories_model->get_by_level_pagination('one', $categoryId, $pageSize, $offset);
            }elseif ($categoryInfo['level'] == 2)
            {
                $results = $this->Inventories_model->get_by_level_pagination('two', $categoryId, $pageSize, $offset);
            }else {
                $results = $this->Inventories_model->get_by_level_pagination('three', $categoryId, $pageSize, $offset);
            }

            $data['products'] = $results;
            $status = 0;
        }
        else if ($search_key != null) {

            $wherestr = null;
            $where_arr = array();

            if($search_key) array_push($where_arr, "name like '%".$search_key."%'");

            if(sizeof($where_arr)) $wherestr = join(' or ', $where_arr);

            $num_rows = $this->Inventories_model->getCountsBykey($wherestr);

            $offset = ($pageNum - 1) * $pageSize;

            $results = $this->Inventories_model->get_by_keyword($wherestr, $pageSize, $offset);
            foreach ($results as &$row) {
                $three_category = $this->Categories_model->get_by_id($row['level_three']);
                $row['cate_name'] = $three_category['name'];
            }
            $data['products'] = $results;
            $data['search_key'] = $search_key;
            $status = 1;
        }
        else if ($brandId != null) {
            $brand_data = $this->Brands_model->get_by_id($brandId);
            $brandId = $brandId.'';
            $num_rows = $this->Inventories_model->get_count_brand($brandId);

            $total_pages = floor($num_rows / $pageSize);
            if($num_rows % $pageSize) $total_pages ++;

            $offset = ($pageNum - 1) * $pageSize;

            $results = $this->Inventories_model->get_by_brand($brandId, $pageSize, $offset);
            foreach ($results as &$row) {
                $three_category = $this->Categories_model->get_by_id($row['level_three']);
                $row['cate_name'] = $three_category['name'];
            }

            $data['products'] = $results;
            $data['brand_id'] = $brandId;
            $data['brand_data'] = $brand_data;
            $status = 2;
        }


        $data['brands1_active']   = $this->Brands_model->get_all_brands(1,1);
        $data['brands1_inactive'] = $this->Brands_model->get_all_brands(0,1);
        $data['brands2_active']   = $this->Brands_model->get_all_brands(1,2);
        $data['brands2_inactive'] = $this->Brands_model->get_all_brands(0,2);
        $data['brands3_active']   = $this->Brands_model->get_all_brands(1,3);
        $data['brands3_inactive'] = $this->Brands_model->get_all_brands(0,3);

        $total_pages = floor($num_rows / $pageSize);
        if($num_rows % $pageSize) $total_pages ++;

        $data['pageNum'] = $pageNum;
        $data['pageSize'] = $pageSize;
        $data['total'] = $num_rows;
        $data['total_pages'] = $total_pages;
        $data['status'] = $status;

        if ($this->login){
            $data['userdata'] = $this->user->getUsername();
            $this->load->view('front/header', $data);
            $this->load->view('front/searchList', $data);
            $this->load->view('front/footer', $data);
        } else {
            $this->load->view('front/header', $data);
            $this->load->view('front/searchList', $data);
            $this->load->view('front/footer', $data);
        }

    }

    public function goodsList()
    {
        $this->load->model('Brands_model');
        $this->load->model('Categories_model');
        $this->load->model('Cities_model');
        $this->load->model('Inventories_model');
        $this->load->model('Provinces_model');
        $data = array(
            'title' => '商品列表',
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
        $brand_rows = $this->Brands_model->get_all_brands(1);
        $data['brand'] = $brand_rows;
        $data['categories'] = $category_rows;


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

    public function brandsList()
    {
        $this->load->model('Brands_model');
        $data = array(
            'title' => '品牌',
            'userdata' => '',
        );

        $brand_data = $this->Brands_model->get_all_brands();
        $data['brands'] = $brand_data;

        if ($this->login){
            $data['userdata'] = $this->user->getUsername();
            $this->load->view('front/header', $data);
            $this->load->view('front/brands', $data);
            $this->load->view('front/footer', $data);
        } else {
            $this->load->view('front/header', $data);
            $this->load->view('front/brands', $data);
            $this->load->view('front/footer', $data);
        }
    }
}
