<?php

class Cities_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('cities');
	}

	/**
	 * Get all cities by province id
	 * @param $province_id
	 * @return array
	 */
	public function get_all_cities($province_id) {
		$this->db->order_by('id', 'desc');
		return $this->db->get_where('cities', array('province' => $province_id))->result_array();
	}

	/**
	 * Function to add new city
	 * @param $params
	 * @return int
	 */
	public function add_city($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('cities', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update city
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_city($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('cities', $params);
	}

	/**
	 * Function to delete city
	 * @param $id
	 * @return mixed
	 */
	public function delete_city($id) {
		return $this->db->delete('cities', array('id' => $id));
	}

	/**
	 * Function to get city by id
	 * @param $city_id
	 * @return array
	 */
	public function get_by_id($city_id) {
		return $this->db->get_where('cities', array('id' => $city_id))->row_array();
	}
}
