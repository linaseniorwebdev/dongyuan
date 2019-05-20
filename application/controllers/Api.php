<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Api extends Base {


	public function category($com = 'list') {
		$this->load->model('Categories_model');
		if ($com === 'list') {

		} elseif ($com === 'update') {

		} elseif ($com === 'create') {
			$result = array('status' => 'fail');

			if ($this->post_exist()) {
				$params = array(
					'name'  => $this->input->post('name'),
					'level' => $this->input->post('level')
				);

				if ((int)$this->input->post('level') > 1) {
					$params['parent'] = $this->input->post('parent');
				}

				$this->Categories_model->add_category($params);
				$result['status'] = 'success';
			}

			echo json_encode($result);
		}
	}
}