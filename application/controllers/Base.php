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

//		$this->load->model('System_model');
//		$this->vars = $this->System_model->get_all_system_variables();
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
			$this->load->view('frontend/header', $params);
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
			$this->load->view('frontend/footer', $params);
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
			$value = (int)$this->Permissions_model->get_value($this->user->getPermission(), $field);
			return $value === 1;
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
}
