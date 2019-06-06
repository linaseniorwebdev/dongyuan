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

			$this->load->model('Dashboard_model');

			$data = array();
			$data['users'] = $this->Dashboard_model->get_users();
			$data['products'] = $this->Dashboard_model->get_products();
			$data['orders'] = $this->Dashboard_model->get_orders();

			$hparams = array(
				'title' => '控制台',
				'lineawesome' => true,
				'feather' => true
			);
			$fparams = array();

			$permission = $this->status();

			$user = $this->user->getUsername();
			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar', $permission);
			$this->load->view('backend/index', $data);
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
					if ((int)$user['status'] === 0) {
						$data['message'] = '您的帐户已禁用。请联系管理员。';
					} else {
						$password = md5(SALT . $password);
						if ($password === $user['password']) {
							$this->session->set_userdata('user', $user['id']);
							redirect('admin');
						} else {
							$data['message'] = '密码不正确';
						}
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
	 * @param null $com
	 */
	public function role($com = null) {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			if ($this->privilege('permission')) {
				if ($com === 'edit') {
					$hparams = array(
						'title' => '角色编辑',
						'lineawesome' => true,
						'switchery' => true,
						'feather' => true
					);
					$fparams = array(
						'name' => 'role/edit',
						'switchery' => true
					);

					$permission = $this->status();
					$permission['com'] = 'role';
					$user = $this->user->getUsername();

					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
					$this->load->view('backend/role/edit');
					$this->load_footer($fparams, true);
				} else {
					$hparams = array(
						'title' => '角色管理',
						'lineawesome' => true,
						'datatable' => true,
						'feather' => true
					);
					$fparams = array(
						'name' => 'role',
						'datatable' => true
					);
					$permission = $this->status();
					$permission['com'] = 'role';
					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
					$this->load->view('backend/role');
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
					'datatable' => true,
					'feather' => true
				);
				$fparams = array(
					'name' => 'user',
					'datatable' => true
				);
				$permission = $this->status();
				$permission['com'] = 'user';
				$user = $this->user->getUsername();
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', $permission);
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
					'switchery' => true,
					'feather' => true
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
				$permission = $this->status();
				$permission['com'] = 'category';
				$this->load->view('backend/sidebar', $permission);
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
					'switchery' => true,
					'feather' => true
				);
				$fparams = array(
					'name' => 'address',
					'switchery' => true
				);

				$permission = $this->status();
				$permission['com'] = 'system';
				$permission['sub'] = 'address';
				$user = $this->user->getUsername();
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', $permission);
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
						'cropper' => true,
						'feather' => true
					);
					$fparams = array(
						'name' => 'brand/create',
						'cropper' => true
					);

					$permission = $this->status();
					$permission['com'] = 'brand';
					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
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

					$permission = $this->status();
					$permission['com'] = 'brand';
					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
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

					$permission = $this->status();
					$permission['com'] = 'brand';
					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
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
						'select2' => true,
						'feather' => true
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

					$permission = $this->status();
					$permission['com'] = 'inventory';
					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
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

					$permission = $this->status();
					$permission['com'] = 'inventory';
					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
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
					$permission = $this->status();
					$permission['com'] = 'inventory';
					$user = $this->user->getUsername();
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
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
					'datatable' => true,
					'feather' => true
				);
				$fparams = array(
					'name' => 'order',
					'datatable' => true
				);
				$permission = $this->status();
				$permission['com'] = 'order';
				$user = $this->user->getUsername();
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', $permission);
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

			$data = array('id' => $this->user->getId());

			if ($this->post_exist()) {
				$this->load->model('Users_model');

				$id = $this->input->post('id');
				$ps = $this->input->post('ps');
				$rp = $this->input->post('rp');
				if ($ps) {
					if ($ps !== $rp) {
						$data['error'] = '密码不匹配';
					} else {
						$this->Users_model->update_user($id, array('password' => md5(SALT . $ps)));
						$data['message'] = '密码修改成功';
					}
				}
			}

			$hparams = array(
				'title' => '我的账户',
				'lineawesome' => true,
				'feather' => true
			);
			$fparams = array();

			$permission = $this->status();
			$permission['com'] = 'system';
			$permission['sub'] = 'profile';
			$user = $this->user->getUsername();

			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar', $permission);
			$this->load->view('backend/profile', $data);
			$this->load_footer($fparams, true);
		} else {
			redirect('admin/signin');
		}
	}
	
	/**
	 * 广告管理
	 * @param string $com
	 */
	public function slider($com = 'list') {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			
			if ($com === 'list') {
				$hparams = array(
					'title' => '广告管理',
					'lineawesome' => true,
					'datatable' => true,
					'feather' => true
				);
				$fparams = array(
					'name' => 'slider',
					'datatable' => true
				);
				
				$permission = $this->status();
				$permission['com'] = 'system';
				$permission['sub'] = 'slider';
				$user = $this->user->getUsername();
				
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', $permission);
				$this->load->view('backend/slider');
				$this->load_footer($fparams, true);
			} elseif ($com === 'create') {
				$hparams = array(
					'title' => '创建新广告',
					'lineawesome' => true,
					'feather' => true
				);
				$fparams = array(
					'name' => 'slider/create'
				);
				
				$permission = $this->status();
				$permission['com'] = 'system';
				$permission['sub'] = 'slider';
				$user = $this->user->getUsername();
				
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', $permission);
				$this->load->view('backend/slider/create');
				$this->load_footer($fparams, true);
			} elseif ($com === 'edit') {
				if ($this->post_exist()) {
					$hparams = array(
						'title' => '广告编辑',
						'lineawesome' => true,
						'switchery' => true,
						'feather' => true
					);
					$fparams = array(
						'name' => 'slider/edit',
						'switchery' => true
					);
					
					$permission = $this->status();
					$permission['com'] = 'system';
					$permission['sub'] = 'slider';
					$user = $this->user->getUsername();
					
					$this->load->model('Ads_model');
					$data = $this->Ads_model->get_by_id($this->input->post('id'));
					
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
					$this->load->view('backend/slider/edit', array('row' => $data));
					$this->load_footer($fparams, true);
				} else {
					$this->bad_request();
				}
			} else {
				$this->bad_request();
			}
		} else {
			redirect('admin/signin');
		}
	}
	
	/**
	 * 资讯管理
	 * @param string $com
	 */
	public function notice($com = 'list') {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				redirect('admin/logout');
			}
			
			if ($com === 'list') {
				$hparams = array(
					'title' => '资讯管理',
					'lineawesome' => true,
					'datatable' => true,
					'feather' => true
				);
				$fparams = array(
					'name' => 'notice',
					'datatable' => true
				);
				
				$permission = $this->status();
				$permission['com'] = 'system';
				$permission['sub'] = 'notice';
				$user = $this->user->getUsername();
				
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', $permission);
				$this->load->view('backend/notice');
				$this->load_footer($fparams, true);
			} elseif ($com === 'create') {
				$hparams = array(
					'title' => '创建新资讯',
					'lineawesome' => true,
					'summernote' => true,
					'feather' => true
				);
				$fparams = array(
					'name' => 'notice/create',
					'summernote' => true
				);
				
				$permission = $this->status();
				$permission['com'] = 'system';
				$permission['sub'] = 'notice';
				$user = $this->user->getUsername();
				
				$this->load_header($hparams, true);
				$this->load->view('backend/topbar', array('username' => $user));
				$this->load->view('backend/sidebar', $permission);
				$this->load->view('backend/notice/create');
				$this->load_footer($fparams, true);
			} elseif ($com === 'edit') {
				if ($this->post_exist()) {
					$hparams = array(
						'title' => '广告编辑',
						'lineawesome' => true,
						'summernote' => true,
						'switchery' => true,
						'feather' => true
					);
					$fparams = array(
						'name' => 'notice/edit',
						'summernote' => true,
						'switchery' => true
					);
					
					$permission = $this->status();
					$permission['com'] = 'system';
					$permission['sub'] = 'slider';
					$user = $this->user->getUsername();
					
					$this->load->model('Notices_model');
					$data = $this->Notices_model->get_by_id($this->input->post('id'));
					
					$this->load_header($hparams, true);
					$this->load->view('backend/topbar', array('username' => $user));
					$this->load->view('backend/sidebar', $permission);
					$this->load->view('backend/notice/edit', array('row' => $data));
					$this->load_footer($fparams, true);
				} else {
					$this->bad_request();
				}
			} else {
				$this->bad_request();
			}
		} else {
			redirect('admin/signin');
		}
	}
}
