<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sanpham extends CI_Controller {

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
	public function sanpham($id)
	{
		$this->load->model('Catalog_model');
		$this->load->model('product_model');
		$mang['danhmuc'] = $this->Catalog_model->getdatabase(0);
		$mang['silde'] = $this->Catalog_model->silde();
		$mang['total_items'] = $this->cart->total_items();
		$id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if(!$product) redirect();
        $this->data['product'] = $product;
        
        //lấy danh sách ảnh sản phẩm kèm theo
        $mang['image_list'] = @json_decode($product->image_list);
        
        $mang['login'] = $this->session->userdata('login');
        

		$mang['sanpham'] = $this->product_model->searchIDsanpham($id);
		$this->load->view('chitietsanpham_view', $mang);
		$this->add_count($id);
	} 
	function add_count($id)
    {
        $this->load->model('product_model');
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie(urldecode($id), false);

        // tra ve dia chi ip cua khach
        $ip = $this->input->ip_address();
      
        if ($check_visitor == false) {
        
            $this->product_model->update_counter(urldecode($id));
        }
    }
 
}

/* End of file sanpham.php */
/* Location: ./application/controllers/sanpham.php */