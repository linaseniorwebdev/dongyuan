<?php

class Dashboard_model extends CI_Model {

	/**
	 * Count All Users
	 */
	public function get_users() {
		$result = array();
		$query = $this->db->query('SELECT COUNT(id) AS total FROM dy_users;')->row_array();
		$result['total'] = $query['total'];
		$query = $this->db->query('SELECT COUNT(id) AS total FROM dy_users WHERE created_at >= (DATE(NOW()) - INTERVAL 7 DAY);')->row_array();
		$result['7days'] = $query['total'];
		return $result;
	}

	/**
	 * Count All Products
	 */
	public function get_products() {
		$result = array();
		$query = $this->db->query('SELECT COUNT(id) AS total FROM dy_inventories;')->row_array();
		$result['total'] = $query['total'];
		$query = $this->db->query('SELECT COUNT(id) AS total FROM dy_inventories WHERE updated_at >= (DATE(NOW()) - INTERVAL 7 DAY);')->row_array();
		$result['7days'] = $query['total'];
		return $result;
	}

	/**
	 * Count All Orders
	 */
	public function get_orders() {
		$result = array();
		$query = $this->db->query('SELECT COUNT(id) AS total FROM dy_orders;')->row_array();
		$result['total'] = $query['total'];
		$query = $this->db->query('SELECT COUNT(id) AS total FROM dy_orders WHERE created_at >= (DATE(NOW()) - INTERVAL 7 DAY);')->row_array();
		$result['7days'] = $query['total'];
		return $result;
	}
}
