<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	function getlistsetinput($input =array())
	{
		// Thêm điều kiện cho câu truy vấn truyền qua biến $input['where'] 
		//(vi du: $input['where'] = array('email' => 'hocphp@gmail.com'))
		if ((isset($input['where'])) && $input['where'])
		{
			$this->db->where($input['where']);
		}
		
		//tim kiem like
		// $input['like'] = array('name' => 'abc');
	    if ((isset($input['like'])) && $input['like'])
		{
			$this->db->like($input['like'][0], $input['like'][1]); 
		}
		
		// Thêm sắp xếp dữ liệu thông qua biến $input['order'] 
		//(ví dụ $input['order'] = array('id','DESC'))
		if (isset($input['order'][0]) && isset($input['order'][1]))
		{
			$this->db->order_by($input['order'][0], $input['order'][1]);
		}
		
		
		// Thêm điều kiện limit cho câu truy vấn thông qua biến $input['limit'] 
		//(ví dụ $input['limit'] = array('10' ,'0')) 
		if (isset($input['limit'][0]) && isset($input['limit'][1]))
		{
			$this->db->limit($input['limit'][0], $input['limit'][1]);
		}
	}

	function getlist($input=array())
	{
		//xử lí các dữ liệu đầu vào	
		$this->getlistsetinput($input);
	
		//thực hiện truy vấn dữ liệu
		$query  = $this->db->get('product');
		return $query->result();
	}
function getdatabase($id=null)
	{


		if ($id == null) 
		{
			$this->db->select('*');
			$this->db->order_by('id', 'asc'); 
		}
		else
		{
			$this->db->where('catalog_id', $id);
			$this->db->order_by('id', 'asc');
		}
		$ketqua = $this->db->get('product');

		$ketqua = $ketqua ->result_array();
		return $ketqua;

	} 

	public function searchIDsanpham($id)
	{
		$this->db->where('id', $id);
		$ketqua = $this->db->get('product');
		
		return $ketqua->result_array();
	}

	function update_counter($id)
    {
   
     
        $this->db->where('id', urldecode($id));
        $this->db->select('view'); 
        $count = $this->db->get('product')->row();
      
        $this->db->where('id', urldecode($id));
        $this->db->set('view', ($count->view + 1));
        return $this->db->update('product');   

          
       
        
    }

     function get_info($id, $field = '')
	{
		if (!$id)
		{
			return FALSE;
		}
	 	
	 	$where = array();
	 	$where['id'] = $id;
	 	
	 	return $this->get_info_rule($where, $field);
	}

	function get_info_rule($where = array(), $field= '')
	{
	    if($field)
	    {
	        $this->db->select($field);
	    }
		$this->db->where($where);
		$query = $this->db->get('product');
		if ($query->num_rows())
		{
			return $query->row();
		}
		
		return FALSE;
	}



}

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */