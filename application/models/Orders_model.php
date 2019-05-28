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
		$row = $this->db->get_where('orders', array('id' => $order_id))->row_array();

		if ($row['detail']) {
			$row['detail'] = unserialize($row['detail']);
		}

		return $row;
	}

	/**
	 * Get all orders by uer id
	 */
	public function get_all_orders_by_user_id($user_id) {
		$this->db->order_by('id', 'desc');
		$rows = $this->db->get_where('orders', array('user' => $user_id))->result_array();
		foreach ($rows as &$row) {
			if ($row['detail']) {
				$row['detail'] = unserialize($row['detail']);
			}
		}
		return $rows;
	}
}
