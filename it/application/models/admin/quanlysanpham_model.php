<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quanlysanpham_model extends CI_Model {

	function getdatabase()
	{


		$this->db->select('*');
		$ketqua = $this->db->get('product');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}
	function getlist($where)
	{


		$this->db->where('parent_id', $where);
		$ketqua = $this->db->get('product');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}

	public function add($data)
	{
			
		
		 $this->db->insert('product', $data);
		return	$this->db->insert_id();
	}

	public function deleteDataById($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('product');
	}

	public function editById($i)

	{

		$this->db->select('*');
		$this->db->where('id', $i);
		$dulieu= $this->db->get('product');
		$dulieu= $dulieu->result_array();
		return $dulieu;
	}
	public function updateDataById($id,$name,$catalog_id,$masp,$hangsx,$baohanh,$trangthai,$noidung,$price,$image_link,$image_list,$discount )
	{ 
		
		$dulieucanupdate= array('name'       => $name,
                    'catalog_id' => $catalog_id,
                    'masp'      => $masp,
                    'hangsx'      => $hangsx,
                    'baohanh'      => $baohanh,
                    'trangthai'      => $trangthai,
                    'noidung'      => $noidung,
                    'price'      => $price,
                    'image_link' => $image_link,
                    'image_list' => $image_list,
                    'discount'   => $discount,
                  
			               		);
		$this->db->where('id', $id);
		return $this->db->update('product', $dulieucanupdate);
	}

}

/* End of file quanlysanpham_model.php */
/* Location: ./application/models/admin/quanlysanpham_model.php */