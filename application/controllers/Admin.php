<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Admin extends Base {

	/**
	 * 主页
	 */
	public function index() {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			$hparams = array('title' => '控制台', 'lineawesome' => true);
			$fparams = array();
			$user = $this->user->getUsername();
			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar');
			$this->load->view('backend/index');
			$this->load_footer($fparams, true);
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 登录
	 */
	public function signin() {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			redirect('admin');
		} else {
			$data = array();
			if ($this->post_exist()) {
				$data     = $this->input->post();
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->model('Users_model');
				$user = $this->Users_model->get_by_name($username);
				if ($user) {
					$password = md5(SALT . $password);
					if ($password === $user['password']) {
						$this->session->set_userdata('user', $user['id']);
						redirect('admin');
					} else {
						$data['message'] = '密码不正确';
					}
				} else {
					$data['message'] = '未注册的账户';
				}
			}
			$this->load->view('backend/signin', $data);
		}
	}

	/**
	 * 退出
	 */
	public function logout() {
		if ($this->login) {
			$this->session->unset_userdata('user');
		}
		redirect('admin');
	}

	/**
	 * 角色管理
	 */
	public function role() {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			if ($this->privilege('permission')) {
				$hparams = array('title' => '角色管理', 'lineawesome' => true);
				$fparams = array();
				$user = $this->user->getUsername();
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', array('com' => 'role'));
				$this->load->view('backend/role');
				$this->load_footer($fparams, true);
			} else {
				$this->not_authorized();
			}
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 用户管理
	 */
	public function user() {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			if ($this->privilege('user')) {
				$hparams = array(
					'title' => '用户管理',
					'lineawesome' => true,
					'datatable' => true
				);
				$fparams = array(
					'name' => 'user',
					'datatable' => true
				);
				$user = $this->user->getUsername();
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', array('com' => 'user'));
				$this->load->view('backend/user');
				$this->load_footer($fparams, true);
			} else {
				$this->not_authorized();
			}
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 分类管理
	 */
	public function category() {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			if ($this->privilege('category')) {
				$this->load->model('Categories_model');

				$hparams = array(
					'title' => '分类管理',
					'lineawesome' => true,
					'switchery' => true
				);
				$fparams = array(
					'name' => 'category',
					'switchery' => true
				);

				$user = $this->user->getUsername();
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));

				$lv = (isset($_GET['l'])?$_GET['l']:null);
				$id = (isset($_GET['i'])?$_GET['i']:null);
				if (!$lv) { $lv = '1'; }
				$crumb = array();
				$title = array();
				if ((int)$lv > 1) {
					$tlv = (int)$lv;
					$tid = (int)$id;
					$name = '【主类别】';
					for (;;) {
						$crumb[$tlv] = base_url('admin/category?l=' . $tlv . '&i=' . $tid);
						$title[((int)$lv===$tlv)?1:($tlv + 1)] = $name;
						$tlv--;
						if ($tlv === 0) {
							break;
						}
						$row = $this->Categories_model->get_by_id($tid);
						$tid = $row['parent'];
						$name = $row['name'];
					}
				}
				$data = array(
					'crumb' => $crumb,
					'title' => $title,
					'level' => $lv,
					'id'    => $id,
					'rows'  => $this->Categories_model->get_categories($lv, $id)
				);
				$this->load->view('backend/sidebar', array('com' => 'category'));
				$this->load->view('backend/category', $data);
				$this->load_footer($fparams, true);
			} else {
				$this->not_authorized();
			}
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 地址管理
	 */
	public function address() {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			if ($this->privilege('address')) {
				$type = isset($_GET['type'])?$_GET['type']:'province';
				$id   = null;
				$data = array();

				if ($type === 'province') {
					$this->load->model('Provinces_model');
					$data['rows'] = $this->Provinces_model->get_all_provinces(false);
				} else {
					$id = $_GET['data'];
					$this->load->model('Cities_model');
					$data['rows'] = $this->Cities_model->get_all_cities($id, false);
				}

				$data['type'] = $type;
				$data['data'] = $id;

				$hparams = array(
					'title' => '地址管理',
					'lineawesome' => true,
					'switchery' => true
				);
				$fparams = array(
					'name' => 'address',
					'switchery' => true
				);

				$user = $this->user->getUsername();
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', array('com' => 'address'));
				$this->load->view('backend/address', $data);
				$this->load_footer($fparams, true);
			} else {
				$this->not_authorized();
			}
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 品牌管理
	 * @param null $com
	 * @param null $sub
	 */
	public function brand($com = null, $sub = null) {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			if ($this->privilege('brand')) {
				if ($com === 'create') {
					$hparams = array(
						'title' => '添加新品牌',
						'lineawesome' => true,
						'cropper' => true
					);
					$fparams = array(
						'name' => 'brand/create',
						'cropper' => true
					);

					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', array('com' => 'brand'));
					$this->load->view('backend/brand/create');
					$this->load_footer($fparams, true);
				} elseif ($com === 'edit') {
					$hparams = array(
						'title' => '编辑品牌',
						'lineawesome' => true,
						'switchery' => true,
						'cropper' => true
					);
					$fparams = array(
						'name' => 'brand/edit',
						'switchery' => true,
						'cropper' => true
					);

					$this->load->model('Brands_model');
					$data = $this->Brands_model->get_by_id($sub);

					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', array('com' => 'brand'));
					$this->load->view('backend/brand/edit', array('row' => $data));
					$this->load_footer($fparams, true);
				} else {
					$hparams = array(
						'title' => '所有品牌',
						'lineawesome' => true
					);
					$fparams = array(
						'name' => 'brand'
					);

					$this->load->model('Brands_model');
					$data = $this->Brands_model->get_all_brands();

					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', array('com' => 'brand'));
					$this->load->view('backend/brand', array('rows' => $data));
					$this->load_footer($fparams, true);
				}
			} else {
				$this->not_authorized();
			}
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 库存管理
	 * @param null $com
	 * @param null $sub
	 */
	public function inventory($com = null, $sub = null) {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			if ($this->privilege('inventory')) {
				if ($com === 'create') {
					$hparams = array(
						'title' => '添加新库存',
						'lineawesome' => true,
						'select2' => true
					);
					$fparams = array(
						'name' => 'inventory/create',
						'select2' => true
					);

					$data = array();

					$this->load->model('Categories_model');
					$data['levels'] = $this->Categories_model->get_categories(1);

					$this->load->model('Brands_model');
					$data['brands1'] = $this->Brands_model->get_all_brands(1, 1);
					$data['brands2'] = $this->Brands_model->get_all_brands(2, 1);
					$data['brands3'] = $this->Brands_model->get_all_brands(3, 1);

					$arr = array();
					$this->load->model('Provinces_model');
					$this->load->model('Cities_model');
					$provinces = $this->Provinces_model->get_all_provinces();
					foreach ($provinces as $province) {
						$cities = $this->Cities_model->get_all_cities($province['id']);
						$arr[] = array('id' => $province['id'], 'name' => $province['name']);
						foreach ($cities as $city) {
							$arr[] = array('id' => $province['id'] . '-' . $city['id'], 'name' => $province['name'] . $city['name']);
						}
					}
					$data['cities'] = $arr;

					$this->load->model('Inventories_model');
					$data['inventories'] = $this->Inventories_model->get_all_inventories();

					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', array('com' => 'inventory'));
					$this->load->view('backend/inventory/create', $data);
					$this->load_footer($fparams, true);
				} elseif ($com === 'edit') {
					$hparams = array(
						'title' => '编辑库存',
						'lineawesome' => true,
						'switchery' => true,
						'select2' => true
					);
					$fparams = array(
						'name' => 'inventory/edit',
						'switchery' => true,
						'select2' => true
					);

					$data = array();

					$this->load->model('Categories_model');
					$data['levels'] = $this->Categories_model->get_categories(1);

					$this->load->model('Brands_model');
					$data['brands1'] = $this->Brands_model->get_all_brands(1, 1);
					$data['brands2'] = $this->Brands_model->get_all_brands(2, 1);
					$data['brands3'] = $this->Brands_model->get_all_brands(3, 1);

					$arr = array();
					$this->load->model('Provinces_model');
					$this->load->model('Cities_model');
					$provinces = $this->Provinces_model->get_all_provinces();
					foreach ($provinces as $province) {
						$cities = $this->Cities_model->get_all_cities($province['id']);
						$arr[] = array('id' => $province['id'], 'name' => $province['name']);
						foreach ($cities as $city) {
							$arr[] = array('id' => $province['id'] . '-' . $city['id'], 'name' => $province['name'] . $city['name']);
						}
					}
					$data['cities'] = $arr;

					$this->load->model('Inventories_model');
					$data['inventories'] = $this->Inventories_model->get_all_inventories();
					$data['row'] = $this->Inventories_model->get_by_id($sub);

					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', array('com' => 'inventory'));
					$this->load->view('backend/inventory/edit', $data);
					$this->load_footer($fparams, true);
				} else {
					$hparams = array(
						'title' => '所有库存',
						'lineawesome' => true,
						'datatable' => true
					);
					$fparams = array(
						'name' => 'inventory',
						'datatable' => true
					);
					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', array('com' => 'inventory'));
					$this->load->view('backend/inventory');
					$this->load_footer($fparams, true);
				}
			} else {
				$this->not_authorized();
			}
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 订单管理
	 */
	public function order() {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			if ($this->privilege('order')) {
				$hparams = array(
					'title' => '订单管理',
					'lineawesome' => true,
					'datatable' => true
				);
				$fparams = array(
					'name' => 'order',
					'datatable' => true
				);
				$user = $this->user->getUsername();
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', array('com' => 'order'));
				$this->load->view('backend/order');
				$this->load_footer($fparams, true);
			} else {
				$this->not_authorized();
			}
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 我的账户
	 */
	public function profile() {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			$hparams = array('title' => '我的账户', 'lineawesome' => true);
			$fparams = array();
			$user = $this->user->getUsername();
			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar', array('com' => 'profile'));
			$this->load->view('backend/profile');
			$this->load_footer($fparams, true);
		} else {
			redirect('admin/signin');
		}
	}
}