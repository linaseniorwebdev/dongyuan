<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Api extends Base {


	public function category($com = 'list') {
		$this->load->model('Categories_model');
		if ($com === 'list') {

		} elseif ($com === 'update') {
			$id     = $this->input->post('item_id_edit');
			$params = array(
				'name'   => $this->input->post('item_name_edit'),
				'status' => $this->input->post('item_status_edit')
			);

			$this->Categories_model->update_category($id, $params);

			redirect($this->input->post('redirect_uri'));
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