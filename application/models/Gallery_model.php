<?php


class Gallery_model extends CI_Model
{
    protected $dbtable;
    protected $primaryKey  = 'id';

    public function __construct()
    {
        $this->load->database();
        $this->dbtable     = $this->db->dbprefix('inventory_galleries');
    }
    /**
     * Get all fields of table
     * @return mixed
     */
    public function get_table_fields() {
        return $this->db->list_fields('inventory_galleries');
    }

    public function get_galleries($id = null) {

        $this->db->select($this->dbtable.".*");
        $this->db->from($this->dbtable);
        if($id != null) $this->db->where('inventory = '.$id);
        $this->db->order_by($this->primaryKey, 'asc');
        $query = $this->db->get();

        return $result = $query->result_array();
    }
}