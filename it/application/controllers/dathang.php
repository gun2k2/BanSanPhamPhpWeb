<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dathang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('cart');
		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'trangchu':
		 		// xu ly du lieu khi truy van vao adm
				//$this->load->helper('admin');
				$this->check_login();
				break;
			 
			default:
				// xu ly du lieu o trang ngoai
				break;
		}
	}
private function check_login()
	{
		$controller = $this->uri->rsegment('3'); // bien controller để kiem tra cột controller hien tại mà adm ngta truy cap vao bang controller nao
		$login = $this->session->userdata('login');
		//neu ma chua dang nhập ma truy cập vào 1 controller khác controller login thì chuyển về login
	
	
		if (!$login && $controller != 'login') 
		{
			redirect(base_url('index'));
		}
		if ($login && $controller == 'login') 
		{
			redirect(base_url('trangchu'));
		}
	}

	function logout()
	{
			if ($this->session->userdata('login'))
			 {
					$this->session->unset_userdata('login');
					redirect(base_url('login'));
			 }
			 redirect(base_url('dang-nhap'));
	}

	public function dathang()
	{

		$this->load->library('form_validation');
		 //hien thi loi
		 $this->load->helper('form');
					
		if ($this->input->post()) 
		 	{
		 
		 	 		$name 	  = 	$this->input->post('name');
		 			$email 	  = 	$this->input->post('email');	
		 	 		$sdt 	  = 	$this->input->post('sdt');
		 	 		$diachi   =		$this->input->post('diachi');
		 	 		$province = 	$this->input->post('province');
		 	 		$district = 	$this->input->post('district');
		 	 		$ward 	  = 	$this->input->post('ward');
		 	 		$noidung  = 	$this->input->post('noidung');
		
			 	
		 	 	
		 	 	$data = array('name' => $name,
		 	 				  'email' => $email,
		 	 				  'sdt' => $sdt, 
		 	 				  'diachi' => $diachi ,
		 	 				  'province' => $province, 
		 	 				  'district'=> $district, 
		 	 				  'ward' => $ward,
		 	 				  'noidung'=> $noidung );
		 			$this->load->model('admin/quanlykhachhang_model');

		 			if ($this->quanlykhachhang_model->add($data)) 
		 			{	
		 				//message la ten bien mà ta muon gan du lieu
		 				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
		 				
		 	 		}
		 	 		else 
		 	 		{
		 	 			$this->session->set_flashdata('message', 'Không thêm dược');
		 	 		}
		 	 		// chuyen toi trang danh sach quyen tri vien
		 	 		redirect(base_url('giohang')); 
		 	 
		}

		$this->load->model('Catalog_model');
		$this->load->model('product_model');
		$mang['total_items'] = $this->cart->total_items();
		$mang['danhmuc'] = $this->Catalog_model->getdatabase(0);
		$mang['silde'] = $this->Catalog_model->silde();

		$this->load->model('admin/quanlykhachhang_model');

		$mang['mangtinh'] = $this->quanlykhachhang_model->province();
		$this->load->view('dathang_view',$mang);
	}
	
	function district()
	{	 $this->load->model('admin/quanlykhachhang_model');
		
		if ($this->input->post('province_id'))
		 {

			echo $this->quanlykhachhang_model->district($this->input->post('province_id'));
		}
	}

	function ward()

	{	 $this->load->model('admin/quanlykhachhang_model');
		
		if ($this->input->post('district_id'))
		 {

			echo $this->quanlykhachhang_model->ward($this->input->post('district_id'));
		}
	}

}

/* End of file dathang.php */
/* Location: ./application/controllers/dathang.php */