<?php

class Inventories_model extends CI_Model {

	/**
	 * Get all fields of table
	 * @return mixed
	 */
    protected $dbtable;
    protected $cate_table;


    protected $primaryKey  = 'id';
    protected $inventory_name  = 'name';
    protected $created_at  = 'created_at';
    protected $updated_at  = 'updated_at';

    public function __construct()
    {
        $this->load->database();
        $this->dbtable     = $this->db->dbprefix('inventories');
        $this->cate_table     = $this->db->dbprefix('categories');
    }

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

	public function get_inventories($one_lv = null) {

        $this->db->select($this->dbtable.".*");
        $this->db->from($this->dbtable);
        if($one_lv != null) $this->db->where('one_level = '.$one_lv);

        $this->db->order_by($this->primaryKey, 'asc');
        $query = $this->db->get();

        return $result = $query->result_array();
    }

    public function get_by_level($one_lv = 0, $two_lv = 0, $three_lv = 0) {
	    $cond = array(
	        'one_level' => $one_lv,
	        'two_level' => $two_lv,
            'three_level' => $three_lv
        );
        $this->db->select($this->dbtable.".*");
        $this->db->from($this->dbtable);
        $this->db->where($cond);

        $this->db->order_by($this->primaryKey, 'asc');
        $query = $this->db->get();

        return $result = $query->result_array();
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
