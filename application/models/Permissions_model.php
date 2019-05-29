<?php

class Permissions_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('permissions');
	}

	/**
	 * Get all permissions
	 * @param bool $filter
	 * @return mixed
	 */
	public function get_all_permissions($filter = true) {
		$this->db->order_by('id', 'desc');
		if ($filter) {
			$result = $this->db->get_where('permissions', array('status' => 1))->result_array();
		} else {
			$result = $this->db->get('permissions')->result_array();
		}
		return $result;
	}

	/**
	 * Function to add new permission
	 * @param $params
	 * @return int
	 */
	public function add_permission($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('permissions', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update permission
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_permission($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('permissions', $params);
	}

	/**
	 * Function to delete permission
	 * @param $id
	 * @return mixed
	 */
	public function delete_permission($id) {
		return $this->db->delete('permissions', array('id' => $id));
	}

	/**
	 * Function to get permission by id
	 * @param $permission_id
	 * @return array
	 */
	public function get_by_id($permission_id) {
		return $this->db->get_where('permissions', array('id' => $permission_id))->row_array();
	}

	/**
	 * Function to get specific field's value of certain row
	 * @param $permission_id
	 * @param $field_name
	 * @return mixed
	 */
	public function get_value($permission_id, $field_name) {
		$row = $this->get_by_id($permission_id);
		return $row[$field_name . '_status'];
	}
}
