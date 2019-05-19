<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Admin extends Base {

	/**
	 * 主页
	 */
	public function index() {
		if ($this->login) {
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
			$hparams = array('title' => '控制台', 'lineawesome' => true);
			$fparams = array();
			$user = $this->user->getUsername();
			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar', array('com' => 'role'));
			$this->load->view('backend/role');
			$this->load_footer($fparams, true);
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 用户管理
	 */
	public function user() {
		if ($this->login) {
			$hparams = array('title' => '控制台', 'lineawesome' => true);
			$fparams = array();
			$user = $this->user->getUsername();
			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar', array('com' => 'user'));
			$this->load->view('backend/user');
			$this->load_footer($fparams, true);
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 分类管理
	 */
	public function category() {
		if ($this->login) {
			$hparams = array('title' => '控制台', 'lineawesome' => true);
			$fparams = array();
			$user = $this->user->getUsername();
			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar', array('com' => 'category'));
			$this->load->view('backend/category');
			$this->load_footer($fparams, true);
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 地址管理
	 */
	public function address() {
		if ($this->login) {
			$hparams = array('title' => '控制台', 'lineawesome' => true);
			$fparams = array();
			$user = $this->user->getUsername();
			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar', array('com' => 'address'));
			$this->load->view('backend/address');
			$this->load_footer($fparams, true);
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 库存管理
	 */
	public function inventory() {
		if ($this->login) {
			$hparams = array('title' => '控制台', 'lineawesome' => true);
			$fparams = array();
			$user = $this->user->getUsername();
			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar', array('com' => 'inventory'));
			$this->load->view('backend/inventory');
			$this->load_footer($fparams, true);
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 订单管理
	 */
	public function order() {
		if ($this->login) {
			$hparams = array('title' => '控制台', 'lineawesome' => true);
			$fparams = array();
			$user = $this->user->getUsername();
			$this->load_header($hparams, true);
			$this->load->view('backend/topbar', array('username' => $user));
			$this->load->view('backend/sidebar', array('com' => 'order'));
			$this->load->view('backend/order');
			$this->load_footer($fparams, true);
		} else {
			redirect('admin/signin');
		}
	}

	/**
	 * 我的账户
	 */
	public function profile() {
		if ($this->login) {
			$hparams = array('title' => '控制台', 'lineawesome' => true);
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