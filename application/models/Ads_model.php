<?php

class Ads_model extends CI_Model {

    /**
     * Get all fields of table
     * @return mixed
     */
    public function get_table_fields() {
        return $this->db->list_fields('ads');
    }

	/**
	 * Get all ads
	 * @param null $status
	 * @return mixed
	 */
    public function get_all_ads($status = null) {
        $this->db->order_by('id', 'asc');
        
        if ($status !== null) {
	        return $this->db->get_where('ads', array('status' => $status))->result_array();
        }
        
	    return $this->db->get('ads')->result_array();
    }

	/**
	 * Function to add new ad
	 * @param $params
	 * @return int
	 */
	public function add_ad($params) {
		$params['created_at'] = date('Y-m-d H:i:s');
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('ads', $params);
		return $this->db->insert_id();
	}

	/**
	 * Function to update ad
	 * @param $id
	 * @param $params
	 * @return bool
	 */
	public function update_ad($id, $params) {
		$params['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		return $this->db->update('ads', $params);
	}

	/**
	 * Function to delete ad
	 * @param $id
	 * @return mixed
	 */
	public function delete_ad($id) {
		return $this->db->delete('ads', array('id' => $id));
	}

	/**
	 * Function to get ad by id
	 * @param $ad_id
	 * @return array
	 */
	public function get_by_id($ad_id) {
		return $this->db->get_where('ads', array('id' => $ad_id))->row_array();
	}
}
