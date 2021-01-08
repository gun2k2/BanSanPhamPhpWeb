<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

		function getdatabase()
	{


		$this->db->select('*');
		$ketqua = $this->db->get('contact');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}

	public function deleteDataById($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('contact');
	}
	

}

/* End of file contact_model.php */
/* Location: ./application/models/admin/contact_model.php */