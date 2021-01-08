<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class giohang extends CI_Controller {

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

	/*
     * Phuoc thuc them san pham vao gio hang
     */
    function add()
    {
        //lay ra san pham muon them vao gio hang
        $this->load->model('product_model');
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            redirect();
        }
        //tong so san pham
        $qty = 1;
        $price = $product->price;
        if($product->discount > 0)
        {
            $price = $product->price - $product->discount;
        }
        
        //thong tin them vao gio hang
        $data = array();
        $data['id'] = $product->id;
        $data['qty'] = $qty;
        $data['name'] = url_title($product->name);
        $data['image_link']  = $product->image_link;
        $data['price'] = $price;
        $this->cart->insert($data);
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('giohang'));
    }
    
    /*
     * Hien thị ra danh sách sản phẩm trong gio hàng
     */
    function index()
    {
    	$this->load->model('Catalog_model');
		$this->load->model('product_model');
		$mang['danhmuc'] = $this->Catalog_model->getdatabase(0);
		$mang['silde'] = $this->Catalog_model->silde();
        //thong gio hang
        $mang['carts'] = $this->cart->contents();

        //tong so san pham co trong gio hang
        $mang['total_items'] = $this->cart->total_items();

        $mang['login'] = $this->session->userdata('login');

        
        $this->load->view('xemgiohang_view', $mang);
    }
    
    /*
     * Cập nhật giỏ hàng
     */
    function update()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row)
        {
            //tong so luong san pham
            $total_qty = $this->input->post('qty_'.$row['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('giohang'));
    }
    
    /*
     * Xoa sản phẩm trong gio hang
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        //trường hợp xóa 1 sản phẩm nào đó trong giỏ hàng
        if($id > 0)
        {
            //thong gio hang
            $carts = $this->cart->contents();
            foreach ($carts as $key => $row)
            {
                if($row['id'] == $id)
                {
                    //tong so luong san pham
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        }else{
            //xóa toàn bô giỏ hang
            $this->cart->destroy();
        }
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('giohang'));
    }

}

/* End of file giohang.php */
/* Location: ./application/controllers/giohang.php */