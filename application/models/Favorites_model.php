<?php

class Favorites_model extends CI_Model {

	/**
	 * Function to add new favorite
	 * @param $params
	 * @return int
	 */
	public function add_favorite($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('favorites', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update favorite
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_favorite($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('favorites', $params);
	}

	/**
	 * Function to delete favorite
	 * @param $id
	 * @return mixed
	 */
	public function delete_favorite($id) {
		return $this->db->delete('favorites', array('id' => $id));
	}
	
	/**
	 * Function to get favorites by user id
	 * @param $user_id
	 * @param $inventory_id
	 * @return mixed
	 */
	public function get_by_user_and_inventory($user_id, $inventory_id) {
		$rows = $this->db->get_where('favorites', array('user' => $user_id, 'inventory' => $inventory_id))->row_array();
		return $rows;
	}
	
	/**
	 * Get all favorites by user id
	 * @param $user_id
	 * @return mixed
	 */
	public function get_by_user_id($user_id) {
		$this->db->order_by('id', 'asc');
		$rows = $this->db->get_where('favorites', array('user' => $user_id))->result_array();
		return $rows;
	}
}
