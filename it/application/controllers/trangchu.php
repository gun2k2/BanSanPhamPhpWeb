<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class trangchu extends CI_Controller {

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
					redirect(base_url('dang-nhap'));
			 }
			 redirect(base_url('dang-nhap'));
	}
	public function index()
	{
		$this->load->model('Catalog_model');
		$this->load->model('product_model');
		$mang['total_items'] = $this->cart->total_items();
		$mang['danhmuc'] = $this->Catalog_model->getdatabase(0);
		$mang['silde'] = $this->Catalog_model->silde();
		$input = array();
	
		$mang['sanpham'] = $this->product_model->getlist($input);

		$this->load->view('trangchu_view',$mang,FALSE );
		
	}



}

/* End of file trangchu.php */
/* Location: ./application/controllers/trangchu.php */