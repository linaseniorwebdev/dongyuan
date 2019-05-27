<?php

class Links_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('links');
	}

	/**
	 * Get all links
	 * @param null $status
	 * @return mixed
	 */
	public function get_all_links($status = null) {
		$this->db->order_by('id', 'asc');

		if ($status){
			return $this->db->get('links', array('status' => $status))->result_array();
        }

		return $this->db->get('links')->result_array();

	}

	/**
	 * Function to add new link
	 * @param $params
	 * @return int
	 */
	public function add_link($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('links', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update link
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_link($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('links', $params);
	}

	/**
	 * Function to delete link
	 * @param $id
	 * @return mixed
	 */
	public function delete_link($id) {
		return $this->db->delete('links', array('id' => $id));
	}

	/**
	 * Function to get link by id
	 * @param $link_id
	 * @return array
	 */
	public function get_by_id($link_id) {
		return $this->db->get_where('links', array('id' => $link_id))->row_array();
	}
}
