<?php

class Inventories_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('inventories');
	}

	/**
	 * Get all inventories
	 */
	public function get_all_inventories() {
		$this->db->order_by('id', 'asc');
		return $this->db->get('inventories')->result_array();
	}

	/**
	 * Get inventories by level
	 * @param $level
	 * @param $level_id
	 * @return mixed
	 */
    public function get_by_level($level, $level_id) {
	    $this->db->order_by('id', 'asc');
	    return $this->db->get_where('inventories', array('level_' . $level, $level_id))->result_array();
    }

	/**
	 * Function to add new inventory
	 * @param $params
	 * @return int
	 */
	public function add_inventory($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('inventories', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update inventory
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_inventory($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('inventories', $params);
	}

	/**
	 * Function to delete inventory
	 * @param $id
	 * @return mixed
	 */
	public function delete_inventory($id) {
		return $this->db->delete('inventories', array('id' => $id));
	}

	/**
	 * Function to get inventory by id
	 * @param $inventory_id
	 * @return array
	 */
	public function get_by_id($inventory_id) {
		return $this->db->get_where('inventories', array('id' => $inventory_id))->row_array();
	}
}
