<?php

class Brands_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('brands');
	}

	/**
	 * Get all brands
	 * @param null $type
	 * @param null $status
	 * @return mixed
	 */
	public function get_all_brands($status = null, $type = null) {
		$this->db->order_by('sales', 'desc');

		if ($type !== null) {
			if ($status !== null) {
				$result = $this->db->get_where('brands', array('type' => $type, 'status' => $status))->result_array();
			} else {
				$result = $this->db->get_where('brands', array('type' => $type))->result_array();
			}
		} else {
			if ($status !== null) {
				$result = $this->db->get_where('brands', array('status' => $status))->result_array();
			} else {
				$result = $this->db->get('brands')->result_array();
			}
		}

		return $result;

	}

	/**
	 * Function to add new brand
	 * @param $params
	 * @return int
	 */
	public function add_brand($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('brands', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update brand
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_brand($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('brands', $params);
	}

	/**
	 * Function to delete brand
	 * @param $id
	 * @return mixed
	 */
	public function delete_brand($id) {
		return $this->db->delete('brands', array('id' => $id));
	}

	/**
	 * Function to get brand by id
	 * @param $brand_id
	 * @return array
	 */
	public function get_by_id($brand_id) {
		return $this->db->get_where('brands', array('id' => $brand_id))->row_array();
	}
}
