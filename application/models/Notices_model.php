<?php

class Notices_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('notices');
	}

	/**
	 * Get all notices
	 * @param null $status
	 * @return mixed
	 */
	public function get_all_notices($status = null) {
		$this->db->order_by('id', 'asc');
		if ($status !== null){
			return $this->db->get('notices', array('status' => $status))->result_array();
		}
		return $this->db->get('notices')->result_array();
	}

	/**
	 * Function to add new notice
	 * @param $params
	 * @return int
	 */
	public function add_notice($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('notices', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update notice
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_notice($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('notices', $params);
	}

	/**
	 * Function to delete notice
	 * @param $id
	 * @return mixed
	 */
	public function delete_notice($id) {
		return $this->db->delete('notices', array('id' => $id));
	}

	/**
	 * Function to get notice by id
	 * @param $notice_id
	 * @return array
	 */
	public function get_by_id($notice_id) {
		return $this->db->get_where('notices', array('id' => $notice_id))->row_array();
	}
}
