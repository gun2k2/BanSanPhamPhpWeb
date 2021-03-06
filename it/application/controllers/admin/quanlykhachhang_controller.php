<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quanlykhachhang_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$controller = $this->uri->segment(1);
		$message = $this->session->flashdata('message');
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

		 $this->load->model('admin/quanlykhachhang_model');
	
		 $dulieu = $this->quanlykhachhang_model->getdatabase();
		 $dulieu = array('dulieutucontroller'=> $dulieu);
		$this->session->set_flashdata('message');
	 	//lay noi dung của biến message
	 	$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view
		$this->load->view('admin/quanlykhachhang_view',$dulieu,false);
		
	}

	function check_email()
	{

		$email = 	$this->input->post('email');
		
		$where = array('email' => $email);
		$this->load->model('admin/quanlykhachhang_model');
		if($this->quanlykhachhang_model->check_user($where))
		{
				//tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Email đã tồn tại');
			 //neu co roi thi
			return FALSE;
		}
		else
		{
			return true;
		}
	}
	function check_username()
	{

		$username = 	$this->input->post('username');
		
		$where = array('username' => $username);
		$this->load->model('admin/quanlykhachhang_model');
		if($this->quanlykhachhang_model->check_user($where))
		{
				//tra ve thong bao loi
			$this->form_validation->set_message(__FUNCTION__,'Tài Khoản đã tồn tại');
			 //neu co roi thi
			return FALSE;
		}
		else
		{
			return true;
		}
	}
	public function add()
	{
		
		 $this->load->library('form_validation');
		 //hien thi loi
		 $this->load->helper('form');
					
		if ($this->input->post()) 
		 	{
	

		 	$this->form_validation->set_rules('email', 'Email Đăng Nhập','required|callback_check_email');
		 	$this->form_validation->set_rules('username', 'Username Đăng Nhập','required|callback_check_username');
		 	$this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[5]');
		 	$this->form_validation->set_rules('re_password', 'Mật Khẩu', 'matches[password]');
		 
		 	 //nhap liệu chính xác
			if($this->form_validation->run())// tra ve gai tri true thi 
		 	 	//add vao csdl
		 	 {
		 	 		$name 	  = 	$this->input->post('name');
		 			$email 	  = 	$this->input->post('email');	
		 	 		$sdt 	  = 	$this->input->post('sdt');
		 	 		$username = 	$this->input->post('username');
		 	 		$password =		$this->input->post('password');
		 	 		$diachi   =		$this->input->post('diachi');
		 	 		$province = 	$this->input->post('province');
		 	 		$district = 	$this->input->post('district');
		 	 		$ward 	  = 	$this->input->post('ward');
		 	 		$noidung  = 	$this->input->post('noidung');
		
			 	
		 	 	
		 	 	$data = array('name' => $name,
		 	 				  'email' => $email,
		 	 				  'sdt' => $sdt, 
		 	 				  'username' => $username ,
		 	 				  'password' => $password ,
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
		 	 		redirect(base_url('admin/quanlykhachhang_controller')); 
		 	 }
		}
		 $this->load->model('admin/quanlykhachhang_model');

		 	 $ketqua['mangtinh'] = $this->quanlykhachhang_model->province();

			 $this->load->view('admin/addkhachhang_view',$ketqua );	
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
 
	 function deleteData($idnhanduoc)
	{
		$this->load->model('admin/quanlykhachhang_model');
		if ($this->quanlykhachhang_model->deleteDataById($idnhanduoc)) 
		{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
		}	
		else
		{
			 	$this->session->set_flashdata('message', 'Không xóa dược');
		}
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/quanlykhachhang_controller')); 	
	}

	
	 function editData($id)
	{
		$this->load->model('admin/quanlykhachhang_model');
		$ketqua['mangketqua'] = $this->quanlykhachhang_model->editById($id);

		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		

		$ketqua['mangtinh'] = $this->quanlykhachhang_model->province();


		 //truyen ket qua cho viewedit de sua du lieu
		$this->load->view('admin/editkhachhang_view', $ketqua, FALSE);

	}
	 function updateDulieu()
	{
		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		$id 	  =     $this->input->post('id');
		//neu ma du liệu post len thi kiem tra
	
		
		if ($this->input->post()) 
			{
	
			$this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[5]');
			$this->form_validation->set_rules('re_password', 'Mật Khẩu', 'matches[password]');

				
	
			if($this->form_validation->run())// tra ve gai tri true thi 
			 	//add vao csdl
			 {	
			 		$name 	  = 	$this->input->post('name');
		 			$email 	  = 	$this->input->post('email');	
		 	 		$sdt 	  = 	$this->input->post('sdt');
		 	 		$username = 	$this->input->post('username');
		 	 		$password =		$this->input->post('password');
		 	 		$diachi   =		$this->input->post('diachi');
		 	 		$province = 	$this->input->post('province');
		 	 		$district = 	$this->input->post('district');
		 	 		$ward 	  = 	$this->input->post('ward');
		 	 		$noidung  = 	$this->input->post('noidung');


				$this->load->model('admin/quanlykhachhang_model');

			if ($this->quanlykhachhang_model->updateDataById($id,$name,$email,$sdt,$username,$password,$diachi,$province ,$district,$ward,$noidung)) 
				{			
				// truoc khi return false thi co mot thong bao

					$this->session->set_flashdata('message', 'Edit dữ liệu thành công');
					redirect(base_url('admin/quanlykhachhang_controller')); 
				}
			else
			{
				
				$this->session->set_flashdata('message', 'Edit dữ liệu thất bại');
					redirect(base_url('admin/quanlykhachhang_controller/editData/'.$id)); 
				
			}

			// chuyen toi trang danh sach quyen tri vien
			

			}
			else 
			{
				$this->session->set_flashdata('message', 'Chinh sua that bai');
				redirect(base_url('admin/quanlykhachhang_controller/editData/'.$id)); 
			}

			}

	}

}

/* End of file quanlykhachhang_controller.php */
/* Location: ./application/controllers/quanlykhachhang_controller.php */