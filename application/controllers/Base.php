<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/User.php';

class Base extends CI_Controller {

	public $user, $login;

	/**
	 * Default constructor
	 */
	public function __construct() {
		parent::__construct();

		if ($this->session->user) {
			$this->load->model('Permissions_model');
			$this->load->model('Users_model');
			$user = $this->Users_model->get_by_id($this->session->user);
			$this->user = User::init($user);
			$this->login = true;
			if ((int)$user['permission'] < 5) {
				$permission = $this->Permissions_model->get_by_id($user['permission']);
				$this->user->setUsername($permission['name']);
			}
		} else {
			$this->user = new User();
			$this->login = false;
		}
	}

	/**
	 * Load header file, with title
	 * @param $params
	 * @param null $admin
	 */
	public function load_header($params, $admin = null) {
		if ($admin) {
			$this->load->view('backend/header', $params);
		} else {
			$this->load->view('front/header', $params);
		}
	}

	/**
	 * Load footer file
	 * @param $params
	 * @param null $admin
	 */
	public function load_footer($params, $admin = null) {
		if ($admin) {
			$this->load->view('backend/footer', $params);
		} else {
			$this->load->view('front/footer', $params);
		}
	}

	/**
	 * Check if post data exist
	 */
	public function post_exist() {
		return isset($_POST) && count($_POST) > 0;
	}

	/**
	 * Check if get data exist
	 */
	public function get_exist() {
		return isset($_GET) && count($_GET) > 0;
	}
	
	/**
	 * Set output header as HTTP 400
	 */
	public function bad_request() {
		$this->output->set_status_header('400', 'Bad Request');
	}

	/**
	 * Set output header as HTTP 403
	 */
	public function not_authorized() {
		$this->output->set_status_header('403', 'Forbidden');
	}

	/**
	 * Set output header as HTTP 500
	 */
	public function server_error() {
		$this->output->set_status_header('500', 'Internal Server Error');
	}

	/**
	 * Check if current user has permission
	 * @param $field
	 * @return bool
	 */
	public function privilege($field) {
		if ($this->login) {
			$value = $this->Permissions_model->get_value($this->user->getPermission(), $field);
			return (int)$value === 1;
		}
		return false;
	}

	/**
	 * Get time based unique ID
	 */
	public function getUID() {
		$date = new DateTime();
		return $date->getTimestamp();
	}

	/**
	 * Get current user's permission status
	 */
	public function status() {
		if ($this->login) {
			if ($this->user->getPermission() === 5) {
				return array();
			}
			$rows = $this->Permissions_model->get_table_fields();
			$fields = array();
			$comments = array(
				'permission' => '角色管理',
				'ad'         => '广告管理',
				'notice'     => '咨询管理',
				'brand'      => '品牌管理',
				'user'       => '用户管理',
				'category'   => '分类管理',
				'address'    => '地址管理',
				'inventory'  => '库存管理',
				'order'      => '订货管理',
			);
			foreach ($rows as $row) {
				if (strpos($row, '_status') !== false) {
					$name = substr($row, 0, -7);
					$fields[$name] = array(
						'title' => $comments[$name],
						'value' => $this->privilege($name)
					);
				}
			}
			return $fields;
		}
		return array();
	}
}
