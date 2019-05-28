<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Api extends Base {

	/**
	 * `Address` Processing API
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
			if ($this->post_exist()) {
				$level = $this->input->post('level');
				$id    = $this->input->post('id');

				if ($id) {
					$levels = $this->Categories_model->get_categories($level, $id);
				} else {
					$levels = $this->Categories_model->get_categories($level);
				}

				echo json_encode($levels);
			} else {
				$this->bad_request();
			}
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
			$this->load->model('Api_model');

			$this->Api_model->setTable('inventories');
			$this->Api_model->setColumnSearch(array('name', 'brief', 'serial_no'));

			$this->load->model('Categories_model');
			$this->load->model('Brands_model');

			$data = array();

			$inventories = $this->Api_model->getRows($_POST);
			// #, 分类, 名称, 描述, 图片, 品牌, 型号, 更新日期, 状态, 操作
			$idx = 0;
			foreach ($inventories as $inventory) {
				$idx++;

				// Category Processing...
				$level1 = $this->Categories_model->get_by_id($inventory->level_one);
				$level2 = $this->Categories_model->get_by_id($inventory->level_two);
				$level3 = $this->Categories_model->get_by_id($inventory->level_three);
				$category = $level1['name'] . ' → ' . $level2['name'] . ' → ' . $level3['name'];

				// Image Processing...
				$image = '';
				$rows_image = array();
				if ($inventory->images) {
					$rows_image = unserialize($inventory->images);
					$image = '<img src="' . $rows_image[0] . '" style="width: 40px;" alt="Image" />';
				}

				// Brand Processing...
				$brand = '';
				$rows_brand = array();
				if ($inventory->brands) {
					$rows_brand = unserialize($inventory->brands);
					$brand_row = $this->Brands_model->get_by_id($rows_brand[0]);
					$brand = '<img src="' . $brand_row['image'] . '" style="width: 40px;" alt="Image" />';
				}

				$updated = date( 'Y年m月d日', strtotime($inventory->updated_at));

				$data[] = array($idx, $category, $inventory->name, $inventory->brief, $image, $brand, $inventory->serial_no, $updated, $inventory->status, null, json_encode($rows_image), json_encode($rows_brand));
			}

			$output = array(
				'draw' => $_POST['draw'],
				'recordsTotal' => $this->Api_model->countAll(),
				'recordsFiltered' => $this->Api_model->countFiltered($_POST),
				'data' => $data,
			);

			echo json_encode($output);
		} elseif ($com === 'create') {
			if ($this->post_exist()) {
				$images = array();
				$total = count($_FILES['images']['name']);
				for ($i = 0; $i < $total; $i++) {
					$_FILES['userfile']['name']     = $_FILES['images']['name'][$i];
					$_FILES['userfile']['type']     = $_FILES['images']['type'][$i];
					$_FILES['userfile']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
					$_FILES['userfile']['error']    = $_FILES['images']['error'][$i];
					$_FILES['userfile']['size']     = $_FILES['images']['size'][$i];

					$config = array(
						'file_name'     => uniqid('', false),
						'allowed_types' => 'jpg|jpeg|png|gif',
						'max_size'      => 3000,
						'overwrite'     => FALSE,
						'upload_path'   => 'public/uploads/inventories'
					);

					$this->upload->initialize($config);

					if ($this->upload->do_upload()) {
						$row = $this->upload->data();
						$images[] = 'public/uploads/inventories/' . $row['file_name'];
					}
				}

				$brands = array(
					$this->input->post('brand1'),
					$this->input->post('brand2'),
					$this->input->post('brand3')
				);

				$branches = array();
				$models = $this->input->post('i_models');
				$prices = $this->input->post('i_prices');
				for ($i = 0, $len = count($models); $i < $len; $i++) {
					$branches[] = array(
						'model' => $models[$i],
						'price' => $prices[$i]
					);
				}
				array_pop($branches);

				$places = $this->input->post('i_place_of');
				if ($places) {
					$places = explode(',', $places);
				} else {
					$places = array();
				}

				$names = $this->input->post('i_names');
				$links = $this->input->post('i_links');
				$ldata = array();
				for ($i = 0, $len = count($links) - 1; $i < $len; $i++) {
					$ldata[] = array(
						'name' => $names[$i],
						'link' => urlencode($links[$i])
					);
				}

				$params = array(
					'level_one' => $this->input->post('level1'),
					'level_two' => $this->input->post('level2'),
					'level_three' => $this->input->post('level3'),
					'name' => $this->input->post('i_name'),
					'brief' => $this->input->post('i_brief'),
					'images' => serialize($images),
					'brands' => serialize($brands),
					'branches' => serialize($branches),
					'serial_no' => $this->input->post('i_serial_no'),
					'place_of' => serialize($places),
					'related' => $this->input->post('i_related'),
					'links' => serialize($ldata)
				);

				$this->Inventories_model->add_inventory($params);

				redirect('admin/inventory');
			} else {
				$this->bad_request();
			}
		}
	}

	/**
	 * `Cart` Processing API
	 * @param string $com
	 */
	public function cart($com = 'list') {
		$this->load->model('Carts_model');
		if ($com === 'create') {
			if ($this->post_exist()) {
				$detail = array(
					'inventory_name' => $this->input->post('inventory_name'),
					'brand_name'     => $this->input->post('brand_name'),
					'serial_no'      => $this->input->post('serial_no'),
					'place_of'       => $this->input->post('place_of'),
					'price'          => $this->input->post('price')
				);

				$params = array(
					'user'   => $this->session->user,
					'amount' => $this->input->post('amount'),
					'detail' => serialize($detail)
				);

				$cart_id = $this->Carts_model->add_cart($params);

				echo json_encode(array('status' => 'success', 'cart' => $cart_id));
			} else {
				$this->bad_request();
			}
		}
	}

	/**
	 * `Order` Processing API
	 * @param string $com
	 */
	public function order($com = 'list') {
		$this->load->model('Orders_model');
		if ($com === 'create') {
			if ($this->post_exist()) {
				$invs = $this->input->post('inventory_name');
				$bras = $this->input->post('brand_name');
				$sers = $this->input->post('serial_no');
				$plas = $this->input->post('place_of');
				$pris = $this->input->post('price');
				$amos = $this->input->post('amount');

				$detail = array();
				for ($i = 0, $len = count($invs); $i < $len; $i++) {
					$detail[] = array(
						'receipt_name'     => $this->input->post('receipt_name'),
						'receipt_phone'    => $this->input->post('receipt_phone'),
						'shipping_address' => $this->input->post('shipping_address'),
						'inventory_name'   => $invs[$i],
						'brand_name'       => $bras[$i],
						'serial_no'        => $sers[$i],
						'place_of'         => $plas[$i],
						'price'            => $pris[$i],
						'amount'           => $amos[$i]
					);
				}

				$params = array(
					'user'  => $this->session->user,
					'number' => uniqid('DYO', false),
					'detail' => serialize($detail)
				);

				$order_id = $this->Orders_model->add_order($params);

				echo json_encode(array('status' => 'success', 'order' => $order_id));
			} else {
				$this->bad_request();
			}
		}
	}
}