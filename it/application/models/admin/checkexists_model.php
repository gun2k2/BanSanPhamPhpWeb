<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkexists_model extends CI_Model {

	function get_info_rule($where= array())
	{
		
		$this->db->where($where);
		$query = $this->db->get('admin');
		if ($query->num_rows()) {
			return $query->row();
			
		} 
		return FALSE;
	}

	function check_exists($where= array())
	{
		$this->db->where($where);
	
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('admin');

		if ($query->num_rows() > 0)
		{
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}

}

/* End of file checkexists_model.php */
/* Location: ./application/models/admin/checkexists_model.php */