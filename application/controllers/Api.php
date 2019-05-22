<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Api extends Base {

	/**
	 * `Adresss` Processing API
	 * @param string $com
	 */
	public function address($com = 'list') {
		$this->load->model('Cities_model');
		$this->load->model('Provinces_model');
		if ($com === 'list') {

		} elseif ($com === 'update') {
			$id     = $this->input->post('item_id_edit');
			$params = array(
				'name'   => $this->input->post('item_name_edit'),
				'status' => $this->input->post('item_status_edit')
			);

			if ($this->input->post('type') === 'province') {
				$this->Provinces_model->update_province($id, $params);
			} else {
				$this->Cities_model->update_city($id, $params);
			}

			redirect($this->input->post('redirect_uri'));
		} elseif ($com === 'create') {
			if ($this->post_exist()) {
				if ($this->input->post('type') === 'province') {
					$params = array(
						'name'     => $this->input->post('name')
					);

					$this->Provinces_model->add_province($params);
				} else {
					$params = array(
						'name'     => $this->input->post('name'),
						'province' => $this->input->post('data')
					);

					$this->Cities_model->add_city($params);
				}
			}
		} elseif ($com === 'delete') {
			if ($this->post_exist()) {
				if ($this->input->post('type') === 'province') {
					$this->Provinces_model->delete_province($this->input->post('id'));
				} else {
					$this->Cities_model->delete_city($this->input->post('id'));
				}
			}
		}
	}

	/**
	 * `Category` Processing API
	 * @param string $com
	 */
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
			if ($this->post_exist()) {
				$params = array(
					'name'  => $this->input->post('name'),
					'level' => $this->input->post('level')
				);

				if ((int)$this->input->post('level') > 1) {
					$params['parent'] = $this->input->post('parent');
				}

				$this->Categories_model->add_category($params);
			}
		} elseif ($com === 'delete') {
			$this->Categories_model->delete_category($this->input->post('id'));
		}
	}
}