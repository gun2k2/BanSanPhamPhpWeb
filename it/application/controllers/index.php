<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		
	}

	public function index()
	{
	
	
		$this->load->model('Catalog_model');
		$this->load->model('product_model');

		$mang['total_items'] = $this->cart->total_items();

		$mang['login'] = $this->session->userdata('login');

		$mang['danhmuc'] = $this->Catalog_model->getdatabase(0);
		
		$mang['silde'] = $this->Catalog_model->silde();
		$input = array();
		$input['limit'] = array(10,0);
		$mang['sanpham'] = $this->product_model->getlist($input);

		$input['order'] = array('view','DESC');
		$mang['noibat'] = $this->product_model->getlist($input);

		
		

		$this->load->view('index_view',$mang,FALSE );
	 	

	}
	
 


	

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */