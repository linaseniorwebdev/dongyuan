<?php

class Carts_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('carts');
	}

	/**
	 * Get all carts
	 * @return mixed
	 */
	public function get_all_carts() {
		$this->db->order_by('id', 'asc');
		return $this->db->get('carts')->result_array();
	}

	/**
	 * Function to add new cart
	 * @param $params
	 * @return int
	 */
	public function add_cart($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('carts', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update cart
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_cart($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('carts', $params);
	}

	/**
	 * Function to delete cart
	 * @param $id
	 * @return mixed
	 */
	public function delete_cart($id) {
		return $this->db->delete('carts', array('id' => $id));
	}

	/**
	 * Function to get cart by id
	 * @param $cart_id
	 * @return array
	 */
	public function get_by_id($cart_id) {
		$row = $this->db->get_where('carts', array('id' => $cart_id))->row_array();

		if ($row['detail']) {
			$row['detail'] = unserialize($row['detail']);
		}

		return $row;
	}

	/**
	 * Get all carts by user id
	 * @return mixed
	 */
	public function get_all_carts_by_user_id($user_id) {
		$this->db->order_by('id', 'asc');
		$rows = $this->db->get_where('carts', array('user' => $user_id))->result_array();
		foreach ($rows as &$row) {
			if ($row['detail']) {
				$row['detail'] = unserialize($row['detail']);
			}
		}
		return $rows;
	}
}
