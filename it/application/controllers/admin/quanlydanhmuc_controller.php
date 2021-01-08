<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quanlydanhmuc_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$controller = $this->uri->segment(1);
		$message = $this->session->flashdata('message');
		$this->load->model('admin/quanlydanhmuc_model');
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
		
		$list = $this->quanlydanhmuc_model->getdatabase();
		$list = array('list'=> $list);
		 $this->session->set_flashdata('message');
	 	//lay noi dung của biến message
	 	$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view
		$this->load->view('admin/quanlydanhmuc_view', $list);
	}
	public function add()
	{
		
		 $this->load->library('form_validation');
		 //hien thi loi
		 $this->load->helper('form');
					
		if ($this->input->post()) 
		 	{
			$this->form_validation->set_rules('name', 'Tên', 'required');
		 	 //nhap liệu chính xác
			if($this->form_validation->run())// tra ve gai tri true thi 
		 	 	//add vao csdl
		 	 {
		 	 		//them vao csdl
                $name       = $this->input->post('name');
                $parent_id  = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
                
                //luu du lieu can them
                $data = array(
                    'name'      => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)
                );

		 			if ($this->quanlydanhmuc_model->add($data)) 
		 			{	
		 				//message la ten bien mà ta muon gan du lieu
		 				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
		 				
		 	 		}
		 	 		else
		 	 		{
		 	 			$this->session->set_flashdata('message', 'Không thêm dược');
		 	 		}
		 	 		// chuyen toi trang danh sach quyen tri vien
		 	 		redirect(base_url('admin/quanlydanhmuc_controller')); 
		 	 }

		 	 }

		 	 
			$list = $this->quanlydanhmuc_model->getlist(0);
			$this->data['list'] = $list;

			 $this->load->view('admin/adddanhmuc_view',$this->data );	
	}

	
	public function deleteData($idnhanduoc)
	{
		$this->load->model('admin/quanlydanhmuc_model');
		if ($this->quanlydanhmuc_model->deleteDataById($idnhanduoc)) 
		{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
		}	
		else
		{
			 	$this->session->set_flashdata('message', 'Không xóa dược');
		}
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/quanlydanhmuc_controller')); 	
	}

	
	public function editData($id)
	{
		$this->load->model('admin/quanlydanhmuc_model');
		$ketqua['mangketqua'] = $this->quanlydanhmuc_model->editById($id);

		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		
		$ketqua['list'] = $this->quanlydanhmuc_model->getdatabase();
		if (!$ketqua['mangketqua']) {
			$this->session->set_flashdata('message', 'Không Tồn tại');
			redirect(base_url('admin/quanlydanhmuc_controller')); 	
		}
		 //truyen ket qua cho viewedit de sua du lieu
		$this->load->view('admin/editdanhmuc_view', $ketqua, FALSE);

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
	
			 	
			    $name       = $this->input->post('name');
                $parent_id  = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');

			if ($this->quanlydanhmuc_model->updateDataById($id,$name, $parent_id,$sort_order)) 
				{			
				// truoc khi return false thi co mot thong bao

					$this->session->set_flashdata('message', 'Edit dữ liệu thành công');
					redirect(base_url('admin/quanlydanhmuc_controller')); 
				}
			else
			{
				
				$this->session->set_flashdata('message', 'Edit dữ liệu thất bại');
					redirect(base_url('admin/quanlydanhmuc_controller/editData/'.$id)); 
				
			}
			}
	}

}

/* End of file quanlydanhmuc_controller.php */
/* Location: ./application/controllers/quanlydanhmuc_controller.php */