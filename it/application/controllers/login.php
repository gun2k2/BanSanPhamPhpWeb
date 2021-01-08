<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('cart');

		
	}

 
	public function index()
	{
		$this->load->model('Catalog_model');
		$this->load->model('product_model');
		$mang['total_items'] = $this->cart->total_items();
		$mang['danhmuc'] = $this->Catalog_model->getdatabase(0);
		$mang['silde'] = $this->Catalog_model->silde();
		$mang['login'] = $this->session->userdata('login');
		
		if ($this->input->post()) 
		{	
			//set tập lệnh 
			$this->form_validation->set_rules('login', 'login', 'callback_check_login'); // goi ham de kiem tra dieu kien nhap vao dung hay chua
			if ($this->form_validation->run())//neu phuong thuc này thưc hiện đúng thì adm dang nhap thanh cong
			 {
			 	$username = 	$this->input->post('username');
			 	$this->session->set_userdata('login', $username);//ten bien login, de chung ta biet duoc la admin da dang nhap thanh cong roi
			 	//$user = $this->get_user_info();
			 	//$this->session->set_userdata('user_id_login', $user->id);
				redirect(base_url('trangchu')); 
			}
		}

		$this->load->view('dangnhap_view',$mang,FALSE );
 
	}

function logout()
	{
			if ($this->session->userdata('login'))
			 {
					$this->session->unset_userdata('login');
					redirect(base_url('login'));
			 }
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
	

	function registration()
	{
		$this->load->library('form_validation');
		 //hien thi loi
		 $this->load->helper('form');
		 $this->load->model('Catalog_model');
		$this->load->model('product_model');
		$ketqua['total_items'] = $this->cart->total_items();
		$ketqua['danhmuc'] = $this->Catalog_model->getdatabase(0);
		$ketqua['silde'] = $this->Catalog_model->silde();
		$ketqua['login'] = $this->session->userdata('login');
					
		if ($this->input->post()) 
		 	{
	
		 	$this->form_validation->set_rules('email', 'Email Đăng Nhập','required|callback_check_email');
		 	$this->form_validation->set_rules('username', 'Username Đăng Nhập','required|callback_check_username');
	
		 
		 	 //nhap liệu chính xác
			if($this->form_validation->run())// tra ve gai tri true thi 
		 	 	//add vao csdl
		 	 {
		 	 		$name 	  = 	$this->input->post('name');
		 			$email 	  = 	$this->input->post('email');	
		 	 		$sdt 	  = 	$this->input->post('sdt');
		 	 		$username = 	$this->input->post('username');
		 	 		$password =		$this->input->post('password');
		 	 	
		
			 	
		 	 	
		 	 	$data = array('name' => $name,
		 	 				  'email' => $email,
		 	 				  'sdt' => $sdt, 
		 	 				  'username' => $username ,
		 	 				  'password' => $password ,
		 	 				  );
		 	 	
		 			$this->load->model('admin/quanlykhachhang_model');

		 			if ($this->quanlykhachhang_model->add($data)) 
		 			{	
		 				//message la ten bien mà ta muon gan du lieu
		 				$this->session->set_flashdata('message', 'Đăng Ký Thành Công');
		 				
		 	 		}
		 	 		else
		 	 		{
		 	 			$this->session->set_flashdata('message', 'Đăng Ký Thất Bại');
		 	 		}
		 	 		// chuyen toi trang danh sach quyen tri vien
		 	 		redirect(base_url('login')); 
		 	 }
		}

			 $this->load->view('dangky_view',$ketqua, false );	

	}



	 

	// ham kiem tra username va pssword co chinh xac k
	function check_login()
	{
		$username = 	$this->input->post('username');
		$password = 	$this->input->post('password');

		$this->load->model('admin/quanlykhachhang_model');
		// cho mot mang gom tai khoan va mat khau dang nhap
		$where = array('username'=> $username, 'password' => $password );
		if($this->quanlykhachhang_model->check_exists($where)) // kiem tra xem co ton tai hay k
		{
			// chung to chung ta dang nhap thanh cong
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__, 'tài khoản hoặc password sai!');
		// truoc khi return false thi co mot thong bao
			return FALSE;
		
	}

	


 	function forgotpassword()
 	{
 		$this->load->view('forgotpassword_view');
 	}

 	function resetlink()
 	{


 		$email = $this->input->post('email');
 		$result = $this->db->query("select * from user where email='".$email."'")->result_array();
 		if (count($result)>0) 
 		{
 				
 			$this->load->view('sendmail');
 			$this->session->set_flashdata('message', 'Check email !' );
 			redirect(base_url('login_controller/forgotpassword'));
 			
 		}



 		else
 		{
 			$this->session->set_flashdata('message', 'Email chưa đăng ký !' );
 			redirect(base_url('login_controller/forgotpassword')); 
 		}
 	}

 	function reset()
 	{
		$data['tokan'] = $this->input->get('tokan');
 		$_SESSION['tokan'] = $data['tokan'];
 		$this->load->view('resetpass_view');
 	}
 	function updatepass()
 	{
 		$_SESSION['tokan'];
 		$data= $this->input->post();
 		if ($data['password']==$data['re_password'])
 		 {
 $this->db->query("update user set password='".$data['password']."' where password='".$_SESSION['tokan']."'");
 		redirect(base_url('dang-nhap')); 
 		}
 		else
 		{
 			
 			$this->session->set_flashdata('message','Mật Khẩu Không Trùng Khớp !' );
 			redirect(base_url('login_controller/reset')); 
 		}
 		
 	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */