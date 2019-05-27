<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Api extends Base {

	/**
	 * `Addresss` Processing API
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

	/**
	 * `Brand` Processing API
	 * @param string $com
	 */
	public function brand($com = 'create') {
		$this->load->model('Brands_model');
		$result = array('status' => 'fail');
		if ($com === 'create') {
			if ($this->post_exist()) {
				$params = array(
					'name' => $this->input->post('brand_name'),
					'type' => $this->input->post('brand_type')
				);

				$picture = $this->input->post('brand_image');
				if ($picture) {
					if (strpos($picture, 'data:image/png;base64') === 0) {
						$picture = str_replace(array('data:image/png;base64,', ' '), array('', '+'), $picture);
						$data = base64_decode($picture);
						$file = 'public/uploads/brands/' . md5($picture) . '.png';
						if (file_put_contents($file, $data)) {
							$params['image'] = $file;
							$this->Brands_model->add_brand($params);
							redirect('admin/brand');
						}
					}
				} else {
					$this->Brands_model->add_brand($params);
					redirect('admin/brand');
				}
			} else {
				$this->bad_request();
			}
		} elseif ($com === 'update') {
			if ($this->post_exist()) {
				$id = $this->input->post('brand_id');

				$params = array(
					'name'   => $this->input->post('brand_name'),
					'type'   => $this->input->post('brand_type'),
					'status' => $this->input->post('brand_status')
				);

				if ($this->input->post('image_changed') === 'no') {
					$this->Brands_model->update_brand($id, $params);
					redirect('admin/brand');
				} else {
					$picture = $this->input->post('brand_image');
					if ($picture) {
						if (strpos($picture, 'data:image/png;base64') === 0) {
							$picture = str_replace(array('data:image/png;base64,', ' '), array('', '+'), $picture);
							$data = base64_decode($picture);
							$file = 'public/uploads/brands/' . md5($picture) . '.png';
							if (file_put_contents($file, $data)) {
								$params['image'] = $file;
								$this->Brands_model->update_brand($id, $params);
								redirect('admin/brand');
							}
						}
					} else {
						$row = $this->Brands_model->get_by_id($id);
						if ($row['image']) {
							unlink($row['image']);
						}
						$params['image'] = NULL;
						$this->Brands_model->update_brand($id, $params);
						redirect('admin/brand');
					}
				}
			} else {
				$this->bad_request();
			}
		} elseif ($com === 'delete') {
			if ($this->post_exist()) {
				$id = $this->input->post('id');
				$row = $this->Brands_model->get_by_id($id);
				if ($row['image']) {
					unlink($row['image']);
				}
				$this->Brands_model->delete_brand($id);
				$result['status'] = 'success';
			} else {
				$this->bad_request();
			}
		}
		echo json_encode($result);
	}

	/**
	 * `Inventory` Processing API
	 * @param string $com
	 */
	public function inventory($com = 'list') {
		$this->load->model('Inventories_model');
		if ($com === 'list') {
			$data = array();

			$inventories = $this->Inventories_model->getRows($_POST);

			foreach ($inventories as $inventory) {
				$data[] = array($type->id, $type->value, $status, null);
			}

			$output = array(
				'draw' => $_POST['draw'],
				'recordsTotal' => $this->Inventories_model->countAll(),
				'recordsFiltered' => $this->Inventories_model->countFiltered($_POST),
				'data' => $data,
			);

			echo json_encode($output);
		}
	}
}