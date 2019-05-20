<?php

class Categories_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('categories');
	}

	/**
	 * Get categories
	 * @param int $lv
	 * @param null $id
	 * @return array
	 */
	public function get_categories($lv = 1, $id = null) {
		$this->db->order_by('id', 'asc');
		if ($id) {
			$result = $this->db->get_where('categories', array('level' => $lv, 'parent' => $id))->result_array();
		} else {
			$result = $this->db->get_where('categories', array('level' => $lv))->result_array();
		}
		return $result;
	}

	/**
	 * Function to add new category
	 * @param $params
	 * @return int
	 */
	public function add_category($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('categories', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update category
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_category($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('categories', $params);
	}

	/**
	 * Function to delete category
	 * @param $id
	 * @return mixed
	 */
	public function delete_category($id) {
		return $this->db->delete('categories', array('id' => $id));
	}

	/**
	 * Function to get category by id
	 * @param $category_id
	 * @return array
	 */
	public function get_by_id($category_id) {
		return $this->db->get_where('categories', array('id' => $category_id))->row_array();
	}
}
