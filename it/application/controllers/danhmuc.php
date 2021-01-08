<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class danhmuc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('cart');
		
	}

 
	function logout()
	{
			if ($this->session->userdata('login'))
			 {
					$this->session->unset_userdata('login');
					redirect(base_url('dang-nhap'));
			 }
			 redirect(base_url('dang-nhap'));
	}
	function danhmuc($id)
	{
		$this->load->model('Catalog_model');
		$this->load->model('product_model');
		$mang['list']=$this->product_model->getdatabase($id);
		$mang['total_items'] = $this->cart->total_items();
		
	 	
		$mang['login'] = $this->session->userdata('login');
		

		$mang['danhmuc'] = $this->Catalog_model->getdatabase(0);
		//$mang['list'] = $this->product_model->getlist($input);
		
		$this->load->view('sanpham_view',$mang); 
		
	}

  
	function search()
	{	
		$this->load->model('Catalog_model');
		$this->load->model('product_model');
		$mang['total_items'] = $this->cart->total_items();
		$mang['danhmuc'] = $this->Catalog_model->getdatabase(0);
		$mang['silde'] = $this->Catalog_model->silde();
		$key =  $this->input->get('key-search');

		$this->data['key'] = trim($key); // xoa khoảng trống
		$input = array();
		$input['like'] = array('name',$key);
		//biến list để lưu tất cả sản phẩm phù hợp với tên tìm kiếm
		$mang['list'] = $this->product_model->getlist($input);
		//gui biến this qua view thông qua biến list;
		//$this->data['list']=$list;
		$mang['login'] = $this->session->userdata('login');

		$this->load->view('search', $mang, FALSE);
	}


}

/* End of file danhmuc.php */
/* Location: ./application/controllers/danhmuc.php */