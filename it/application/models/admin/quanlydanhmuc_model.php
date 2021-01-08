<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quanlydanhmuc_model extends CI_Model {

	function getdatabase()
	{


		$this->db->select('*');
		$ketqua = $this->db->get('catalog');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}
	// hàm get list la hàm điều kiện 
	function getlist($where)
	{


		$this->db->where('parent_id', $where);
		$ketqua = $this->db->get('catalog');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}

	public function add($data)
	{
			
		
		 $this->db->insert('catalog', $data);
		return	$this->db->insert_id();
	}

	public function deleteDataById($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('catalog');
	}

	public function editById($i)

	{

		$this->db->select('*');
		$this->db->where('id', $i);
		$dulieu= $this->db->get('catalog');
		$dulieu= $dulieu->result_array();
		return $dulieu;
	}
	public function updateDataById($id,$name, $parent_id,$sort_order)
	{
		
		$dulieucanupdate= array('name'      => $name,
			                    'parent_id' => $parent_id,
			                    'sort_order' => intval($sort_order)
			               		);
		$this->db->where('id', $id);
		return $this->db->update('catalog', $dulieucanupdate);
	}

}

/* End of file quanlydanhmuc_model.php */
/* Location: ./application/models/admin/quanlydanhmuc_model.php */