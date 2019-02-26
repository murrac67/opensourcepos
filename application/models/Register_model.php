<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Register class
 */
class Register_model extends CI_Model
{
	/*
	Returns all the items for each category
	*/
  
	public function items($category)
	{
    $this->load->database();
    $query = $this->db->get_where('ospos_items', array('category' => $category));
    return $query->row_array();
	}

}
