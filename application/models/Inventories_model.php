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
	 * @param bool $filter
	 * @return mixed
	 */
	public function get_all_inventories($filter = true) {
		$this->db->order_by('id', 'asc');
		if ($filter) {
			$result = $this->db->get_where('inventories', array('status' => 1))->result_array();
		} else {
			$result = $this->db->get('inventories')->result_array();
		}
		return $result;
	}

	/**
	 * Get inventories by level
	 * @param $level
	 * @param $level_id
	 * @return mixed
	 */
    public function get_by_level($level, $level_id) {
	    $this->db->order_by('id', 'asc');
	    $rows = $this->db->get_where('inventories', array('level_' . $level, $level_id))->result_array();
	    foreach ($rows as &$row) {
		    if ($row['images']) {
			    $row['images'] = unserialize($row['images']);
		    }

		    if ($row['brands']) {
			    $row['brands'] = unserialize($row['brands']);
		    }

		    if ($row['branches']) {
			    $row['branches'] = unserialize($row['branches']);
		    }

		    if ($row['place_of']) {
			    $row['place_of'] = unserialize($row['place_of']);
		    }
	    }
	    return $rows;
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
		$row = $this->db->get_where('inventories', array('id' => $inventory_id))->row_array();

		if ($row['images']) {
			$row['images'] = unserialize($row['images']);
		}

		if ($row['brands']) {
			$row['brands'] = unserialize($row['brands']);
		}

		if ($row['branches']) {
			$row['branches'] = unserialize($row['branches']);
		}

		if ($row['place_of']) {
			$row['place_of'] = unserialize($row['place_of']);
		}

		return $row;
	}
}
