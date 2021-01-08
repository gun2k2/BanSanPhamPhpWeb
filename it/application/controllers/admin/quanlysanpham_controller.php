<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quanlysanpham_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$controller = $this->uri->segment(1);
		$message = $this->session->flashdata('message');
		$this->load->model('admin/quanlysanpham_model');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view
		switch ($controller) {
			case 'admin':
	 			// xu ly du lieu khi truy van vao adm
				
				$this->check_login();
		 		break;
			
			
			
			default:
				// xu ly du lieu o trang ngoai
				break;
		}
	}

	private function check_login()
	{
		$controller = $this->uri->rsegment('1'); // bien controller để kiem tra cột controller hien tại mà adm ngta truy cap vao bang controller nao
		//$controller = strtolower($controller); 

		$login = $this->session->userdata('loginadmin');
		//neu ma chua dang nhập ma truy cập vào 1 controller khác controller login thì chuyển về login
		if (!$login && $controller != 'login') 
		{ 
			redirect(base_url('admin/loginadmin_controller'));
		}
		if ($login && $controller == 'login') 
		{
			redirect(base_url('admin/index'));
		}
		elseif (!in_array($controller , array('loginadmin_controller','index'))) // neu controller hien tại truy cập vào khong phai 1 trong  2 controller này thì  chung ta thuc hiện kiểm tra quyền tại đây ( 2 controller mặc định adm nào cũng duoc phép truy cập)
		 {	
				
				 $admin_id = $this->session->userdata('admin_id'); // lấy ra admin đăng nhập
				 $admin_root = $this->config->item('root_admin'); // 	admin chính thống
				 if ($admin_id != $admin_root) { // nếu admin đăng nhập hiện tại khác admin gốc thì kiểm trang

				 	$permissions_admin = $this->session->userdata('permissions');// lấy ra mảng quyền của admin
					//lấy ra controller và action của controller
				 	$controller  = $this->uri->rsegment(1);
				 	$action = $this->uri->rsegment(2);

				 	$check = true;
					if (!isset($permissions_admin->{$controller})) // nếu không tòn tại cái controller trong mảng quyền 
				 	{
						$check  = false;	// không có quyền
				 	}
				 	$permissions_actions = $permissions_admin->{$controller}; // lấy ra các action quyền của controller 
				 	if (!in_array($action,$permissions_actions )) // nếu action  đang truy cập trên thanh url không thuộc mảng quyền thì adm đó không có quyền truy cập vào
				 	{
				 		$check  = false;	// không có quyền
				 	}	

					if (!$check) {
						//hiển thi ra 1 câu thông báo cho adm đó biết
						$this->session->set_flashdata('message', 'Ban khong co quyen truy cap vao');
			 		redirect(base_url('admin/index'));
						
				 	}
				 }
				
		}

	}

	
	function logout()
	{
			if ($this->session->userdata('loginadmin'))
			 {
					$this->session->unset_userdata('loginadmin');
					redirect(base_url('admin/loginadmin_controller'));
			 }
	}


	public function index()
	{
		
		// lấy danh sách sản phẩm
		$list['list'] = $this->quanlysanpham_model->getdatabase();
		// lấy danh sách danh mục sản phẩm
		$this->load->model('admin/quanlydanhmuc_model');
		$catalog_id = $this->input->get('catalog');
		$catalog_id = intval($catalog_id);
		$input['where']= array();
		if ($catalog_id > 0) 
		{
			$input['where']['catalog_id'] = $catalog_id;
		}
		 $list['catalogs'] = $this->quanlydanhmuc_model->getlist(0); 
	
		 $this->session->set_flashdata('message');
	 	//lay noi dung của biến message
	 	$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view
		$this->load->view('admin/quanlysanpham_view', $list);
	}

	public function add()
	{

		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		$this->load->model('admin/quanlydanhmuc_model');

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {   
        	 
        
                //them vao csdl
               $name  = $this->input->post('name');
                $catalog_id  = $this->input->post('catalog_id');
                $masp 	  = 	$name.$catalog_id;
                $hangsx       = $this->input->post('hangsx');
                $baohanh       = $this->input->post('baohanh');
                $trangthai       = $this->input->post('trangthai');
                $noidung       = $this->input->post('noidung');
                $price       = $this->input->post('price');
                $price       = str_replace(',', '', $price);
                
               
                $discount = $this->input->post('discount');
                $discount = str_replace(',', '', $discount);
                
                
                //lay ten file anh minh hoa duoc update len
                $this->load->library('Upload_library');
                $upload_path = './images/product';
                $upload_data = $this->upload_library->upload($upload_path, 'image'); 
             
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
                //upload cac anh kem theo
                $image_list = array();
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list = json_encode($image_list);
                
                //luu du lieu can them
                $data = array(
                    'name'       => $name,
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
            
                //them moi vao csdl
                if($this->quanlysanpham_model->add($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
               redirect(base_url('admin/quanlysanpham_controller'));
            
        }
			$list['list'] = $this->quanlydanhmuc_model->getlist(0); 
			 $this->load->view('admin/addsanpham_view', $list, false);	
	}
		public function deleteData($idnhanduoc)
	{
		$this->load->model('admin/quanlysanpham_model');
		if ($this->quanlysanpham_model->deleteDataById($idnhanduoc)) 
		{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
		}	
		else
		{
			 	$this->session->set_flashdata('message', 'Không xóa dược');
		}
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/quanlysanpham_controller')); 	
	}

	public function editData($id)
	{
		$this->load->model('admin/quanlydanhmuc_model');

		$ketqua['mangketqua'] = $this->quanlysanpham_model->editById($id);	

		$ketqua['list'] = $this->quanlydanhmuc_model->getlist(0); 
		if (!$ketqua['mangketqua']) {
			$this->session->set_flashdata('message', 'Không Tồn tại');
			redirect(base_url('admin/quanlysanpham_controller')); 	
		}
		 //truyen ket qua cho viewedit de sua du lieu
		$this->load->view('admin/editsanpham_view', $ketqua, FALSE);

	}
	public function updateDulieu()
	{
		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		$id 	  =     $this->input->post('id');
		//neu ma du liệu post len thi kiem tra
		if ($this->input->post()) 
			{
			 	
			    $name  = $this->input->post('name');
                $catalog_id  = $this->input->post('catalog_id');
                $masp 	  = 	$name.$catalog_id;
                $hangsx       = $this->input->post('hangsx');
                $baohanh       = $this->input->post('baohanh');
                $trangthai       = $this->input->post('trangthai');
                $noidung       = $this->input->post('noidung');
                $price       = $this->input->post('price');
                $price       = str_replace(',', '', $price);
                
               
                $discount = $this->input->post('discount');
                $discount = str_replace(',', '', $discount);
                
                
                //lay ten file anh minh hoa duoc update len
                $this->load->library('Upload_library');
                $upload_path = './images/product';
                $upload_data = $this->upload_library->upload($upload_path, 'image'); 
             
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
                //upload cac anh kem theo
                $image_list = array();
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list = json_encode($image_list);
                
                //luu du lieu can them
                $data = array(
                    'name'       => $name,
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

			if ($this->quanlysanpham_model->updateDataById($id,$name,$catalog_id,$masp,$hangsx,$baohanh,$trangthai,$noidung,$price,$image_link,$image_list,$discount )) 
				{			
				// truoc khi return false thi co mot thong bao

					$this->session->set_flashdata('message', 'Edit dữ liệu thành công');
					redirect(base_url('admin/quanlysanpham_controller')); 
				}
			else
			{
				
				$this->session->set_flashdata('message', 'Edit dữ liệu thất bại');
					redirect(base_url('admin/quanlysanpham_controller/editData/'.$id)); 
				
			}
		
			}
	}


}

/* End of file quanlysanpham_controller.php */
/* Location: ./application/controllers/quanlysanpham_controller.php */