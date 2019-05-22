<?php

class Provinces_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('provinces');
	}

	/**
	 * Get all provinces
	 */
	public function get_all_provinces() {
		$this->db->order_by('id', 'desc');
		return $this->db->get('provinces')->result_array();
	}

	/**
	 * Function to add new province
	 * @param $params
	 * @return int
	 */
	public function add_province($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('provinces', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update province
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_province($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('provinces', $params);
	}

	/**
	 * Function to delete province
	 * @param $id
	 * @return mixed
	 */
	public function delete_province($id) {
		return $this->db->delete('provinces', array('id' => $id));
	}

	/**
	 * Function to get province by id
	 * @param $province_id
	 * @return array
	 */
	public function get_by_id($province_id) {
		return $this->db->get_where('provinces', array('id' => $province_id))->row_array();
	}
}
