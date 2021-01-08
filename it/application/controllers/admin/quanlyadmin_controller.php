<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quanlyadmin_controller extends CI_Controller {

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

		 $this->load->model('admin/quanlyadmin_model');
	
		 $dulieu = $this->quanlyadmin_model->getdatabase();
		 $dulieu = array('dulieutucontroller'=> $dulieu);
		$this->session->set_flashdata('message');
	 	//lay noi dung của biến message
	 	$message = $this->session->flashdata('message');
	 	$this->data['message'] = $message; //$message la noi dung thong bao ta se truyen qua view
		$this->load->view('admin/quanlyadmin_view',$dulieu,false);
		
	}

	function check_username()
	{

		$email = 	$this->input->post('email');
		$where = array('email' => $email);
		$this->load->model('admin/Quanlyadmin_model');
		if($this->Quanlyadmin_model->check_user($where))
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
	public function add()
	{
		
		 $this->load->library('form_validation');
		 //hien thi loi
		 $this->load->helper('form');
					
		if ($this->input->post()) 
		 	{
	

		 	$this->form_validation->set_rules('email', 'Email Đăng Nhập','required|callback_check_username');
		 	$this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[5]');
		 	$this->form_validation->set_rules('re_password', 'Mật Khẩu', 'matches[password]');
		 
		 	 //nhap liệu chính xác
			if($this->form_validation->run())// tra ve gai tri true thi 
		 	 	//add vao csdl
		 	 {
		 	 		$name 	  = 	$this->input->post('name');
		 			$email 	  = 	$this->input->post('email');
			 		$password = 	$this->input->post('password');
			 		$password = md5($password);	
			 		$ngaysinh = 	$this->input->post('ngaysinh');
		 	 		$gioitinh = 	$this->input->post('gioitinh');
		 	 		$sdt 	  = 	$this->input->post('sdt');
		 	 		$province = 	$this->input->post('province');
		 	 		$district = 	$this->input->post('district');
		 	 		$ward 	  = 	$this->input->post('ward');
		
			 	
		 	 	
		 	 	$data = array('name' => $name,'email' => $email,'password'=> $password, 'ngaysinh' => $ngaysinh,'gioitinh' => $gioitinh, 'sdt' => $sdt, 'province' => $province, 'district'=> $district, 'ward' => $ward );
		 	 	$permissions = $this->input->post('permissions');
			 	$data['permissions'] = json_encode($permissions); //chung ta luu vao cot permissions, va luu no dưới dạng chuỗi 

		 			$this->load->model('admin/quanlyadmin_model');

		 			if ($this->Quanlyadmin_model->add($data)) 
		 			{	
		 				//message la ten bien mà ta muon gan du lieu
		 				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
		 				
		 	 		}
		 	 		else
		 	 		{
		 	 			$this->session->set_flashdata('message', 'Không thêm dược');
		 	 		}
		 	 		// chuyen toi trang danh sach quyen tri vien
		 	 		redirect(base_url('admin/quanlyadmin_controller')); 
		 	 }

		 	 }
		 	 $this->config->load('permissions',true);
			 $config_permissions =  $this->config->item('permissions');
			// load view ra
			 $ketqua['config_permissions'] = $config_permissions;
			
		 	 $this->load->model('admin/quanlyadmin_model');

		 	 $ketqua['mangtinh'] = $this->quanlyadmin_model->province();

			 $this->load->view('admin/addadmin_view', $ketqua );	
	}

	function district()
	{	 $this->load->model('admin/quanlyadmin_model');
		
		if ($this->input->post('province_id'))
		 {

			echo $this->quanlyadmin_model->district($this->input->post('province_id'));
		}
	}

	function ward()

	{	 $this->load->model('admin/quanlyadmin_model');
		
		if ($this->input->post('district_id'))
		 {

			echo $this->quanlyadmin_model->ward($this->input->post('district_id'));
		}
	}
 
	public function deleteData($idnhanduoc)
	{
		$this->load->model('admin/quanlyadmin_model');
		if ($this->quanlyadmin_model->deleteDataById($idnhanduoc)) 
		{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');	
		}	
		else
		{
			 	$this->session->set_flashdata('message', 'Không xóa dược');
		}
		// chuyen toi trang danh sach quyen tri vien
		redirect(base_url('admin/quanlyadmin_controller')); 	
	}

	
	public function editData($id)
	{
		$this->load->model('admin/quanlyadmin_model');
		$ketqua['mangketqua'] = $this->quanlyadmin_model->editById($id);

		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		

		$ketqua['mangtinh'] = $this->quanlyadmin_model->province();


		 //truyen ket qua cho viewedit de sua du lieu
		$this->load->view('admin/editadmin_view', $ketqua, FALSE);

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
	
			$this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[5]');
			$this->form_validation->set_rules('re_password', 'Mật Khẩu', 'matches[password]');

				
	
			if($this->form_validation->run())// tra ve gai tri true thi 
			 	//add vao csdl
			 {	
			 		$id 	  =     $this->input->post('id');
			 		$name 	  = 	$this->input->post('name');
					$email = 		$this->input->post('email');
			 		$password = 	$this->input->post('password');
			 		$password = md5($password);	
			 		$ngaysinh = 	$this->input->post('ngaysinh');
			 		$gioitinh = 	$this->input->post('gioitinh');
			 		$sdt = 			$this->input->post('sdt');
			 		$province = 	$this->input->post('province');
			 		$district = 	$this->input->post('district');
			 		$ward = 	$this->input->post('ward');


				$this->load->model('admin/quanlyadmin_model');

			if ($this->quanlyadmin_model->updateDataById($id,$name,$email ,$password,$ngaysinh,$gioitinh,$sdt,$province ,$district,$ward)) 
				{			
				// truoc khi return false thi co mot thong bao

					$this->session->set_flashdata('message', 'Edit dữ liệu thành công');
					redirect(base_url('admin/quanlyadmin_controller')); 
				}
			else
			{
				
				$this->session->set_flashdata('message', 'Edit dữ liệu thất bại');
					redirect(base_url('admin/quanlyadmin_controller/editData/'.$id)); 
				
			}

			// chuyen toi trang danh sach quyen tri vien
			

			}
			else 
			{
				$this->session->set_flashdata('message', 'Chinh sua that bai');
				redirect(base_url('admin/quanlyadmin_controller/editData/'.$id)); 
			}

			}
			
			


	}

	public function updateDulieuuser()
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
			 		$id 	  =     $this->input->post('id');
			 		$name 	  = 	$this->input->post('name');
					$email = 	$this->input->post('email');
					$password1 = 	$this->input->post('password1');
			 		$password = 	$this->input->post('password');
			 		$ngaysinh = 	$this->input->post('ngaysinh');
			 		$gioitinh = 	$this->input->post('gioitinh');
			 		$sdt = 	$this->input->post('sdt');
			 		$diachi = 	$this->input->post('diachi');
			 		$province = 	$this->input->post('province');
			 		$district = 	$this->input->post('district');
			 		$ward = 	$this->input->post('ward');

			 	$this->load->model('Checkexists_model');
				$this->load->model('admin/Quanlyuser_model');


					if($this->Checkexists_model->check_exists($password1) && $this->Quanlyuser_model->updateDataById($id,$name,$email ,$password,$ngaysinh,$gioitinh,$sdt,$diachi,$province ,$district,$ward)) // kiem tra xem co ton tai hay k
		 			{
						// chung to chung ta dang nhap thanh cong

							$this->session->set_flashdata('message', 'Cập Nhập Thông Tin Thành Công');
							redirect(base_url('home_controller/profile/'.$id)); 

					}
					else
					{
						$this->session->set_flashdata('message', 'Password hien tai khong dung!');
						
						redirect(base_url('home_controller/profile/'.$id)); 
						
					}

			
			

			// chuyen toi trang danh sach quyen tri vien
			

			}
			else 
			{
				$this->session->set_flashdata('message', 'Cập Nhập Thông Tin Thất Bạisss');
				redirect(base_url('home_controller/profile/'.$id)); 
			}

			}
			
			


	}

}

/* End of file quanlyadmin_controller.php */
/* Location: ./application/controllers/quanlyadmin_controller.php */