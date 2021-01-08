<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quanlyadmin_model extends CI_Model {

	function getdatabase()
	{


		$this->db->select('*');
		$ketqua = $this->db->get('admin');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}

	function district($province_id)
	{
		$this->db->where('province_id', $province_id);
		$this->db->order_by('name', 'asc');
		$ketqua = $this->db->get('district');
		$output = '<option value="">--Chọn Quận/Huyện--</option>';
		foreach ($ketqua->result_array() as $value) 
		{
			$output .= '<option value="'.$value["district_id"].'">'.$value["name"].'</option>'; 	
		}

		
		return $output;
	}

	function ward($district_id)
	{	
		$this->db->where('district_id', $district_id);
		$this->db->order_by('name', 'asc');
		$ketqua = $this->db->get('ward');
		$output = '<option value="">--Xã/Phường--</option>';
		foreach ($ketqua->result_array() as $value) 
		{
			$output .= '<option value="'.$value["ward_id"].'">'.$value["name"].'</option>'; 	
		}

		
		return $output;
	} 

	function province()
	{
		
		$this->db->order_by('name', 'asc');
		
		$ketqua = $this->db->get('province');

		$ketqua = $ketqua ->result_array();
		return $ketqua;
	}
	function kttinh($id)
	{


		$this->db->where('province_id', $id);
		$ketqua = $this->db->get('province');

		$ketqua = $ketqua ->result_array();
		foreach ($ketqua as $key => $value) {
			return $value['name'];
			break;
		}
		//return $ketqua['name'];
	}
	function kthuyen($id)
	{


		$this->db->where('district_id', $id);
		$ketqua = $this->db->get('district');

		$ketqua = $ketqua ->result_array();
		foreach ($ketqua as $key => $value) {
			return $value['name'];
			break;
		}
		//return $ketqua['name'];
	}
	function ktxa($id)
	{


		$this->db->where('ward_id', $id);
		$ketqua = $this->db->get('ward');

		$ketqua = $ketqua ->result_array();
		foreach ($ketqua as $key => $value) {
			return $value['name'];
			break;
		}
		//return $ketqua['name'];
	}
	public function add($data)
	{
			
		
		 $this->db->insert('admin', $data);
		return	$this->db->insert_id();
	}
	public function deleteDataById($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('admin');
	}

	public function editById($i)

	{

		$this->db->select('*');
		$this->db->where('id', $i);
		$dulieu= $this->db->get('admin');
		$dulieu= $dulieu->result_array();
		return $dulieu;
	}
	public function updateDataById($id,$name,$email ,$password,$ngaysinh,$gioitinh,$sdt,$province ,$district,$ward)
	{
		
		$dulieucanupdate= array('name'=> $name,'password'=> $password, 'ngaysinh' => $ngaysinh,'gioitinh' => $gioitinh,  'province' => $province, 'district'=> $district, 'ward' => $ward  );
		$this->db->where('id', $id);
		return $this->db->update('admin', $dulieucanupdate);
	}

	function check_user($where = array())
	{
		$this->db->where($where);
		// thuc hiện cau truy vấn dữ liệu
		$query = $this->db->get('admin');

		if ($query->num_rows() > 0) {
			return TRUE;
			
		}
		else
		{
			FALSE;
		}
	}


}

/* End of file quanlyadmin_model.php */
/* Location: ./application/models/admin/quanlyadmin_model.php */