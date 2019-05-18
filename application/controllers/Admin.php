<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Admin extends Base {

	public function index() {
		$hparams = array('title' => '控制台', 'lineawesome' => true);
		$fparams = array();
		$this->load_header($hparams, true);
		$this->load->view('backend/topbar');
		$this->load->view('backend/sidebar');
		$this->load->view('backend/index');
		$this->load_footer($fparams, true);
	}
}