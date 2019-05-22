<?php

class Orders_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
	public function get_table_fields() {
		return $this->db->list_fields('orders');
	}

	/**
	 * Get all orders
	 */
	public function get_all_orders() {
		$this->db->order_by('id', 'desc');
		return $this->db->get('orders')->result_array();
	}

	/**
	 * Function to add new order
	 * @param $params
	 * @return int
	 */
	public function add_order($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('orders', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update order
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_order($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('orders', $params);
	}

	/**
	 * Function to delete order
	 * @param $id
	 * @return mixed
	 */
	public function delete_order($id) {
		return $this->db->delete('orders', array('id' => $id));
	}

	/**
	 * Function to get order by id
	 * @param $order_id
	 * @return array
	 */
	public function get_by_id($order_id) {
		return $this->db->get_where('orders', array('id' => $order_id))->row_array();
	}
}
