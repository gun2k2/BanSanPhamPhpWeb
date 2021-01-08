<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginadmin_controller extends CI_Controller {

	public function index()
	{

		$this->load->library('form_validation');
		//hien thi loi
		$this->load->helper('form');
		if ($this->input->post()) 
		{
			$this->form_validation->set_rules('loginadmin', 'loginadmin', 'callback_check_login');
			if ($this->form_validation->run())//neu phuong thuc này thưc hiện đúng thì adm dang nhap thanh cong
			 {
			 	$email = $this->input->post('email');

			 	$this->session->set_userdata('loginadmin', $email);//ten bien login, de chung ta biet duoc la admin da dang nhap thanh cong roi
				redirect(base_url('admin/index')); 
			}
		}

		$this->load->view('admin/loginadmin_view');
		
	}

	function check_login()
	{
		$email = 	$this->input->post('email');
		$password = 	$this->input->post('password');
		$password = md5($password);
		$this->load->model('admin/Checkexists_model');
		// cho mot mang gom tai khoan va mat khau dang nhap
		$where = array('email'=> $email, 'password' => $password );

		//ta dat mot cai admin
		$admin = $this->Checkexists_model->get_info_rule($where);
		if($admin) // kiem tra xem co ton tai hay k
		{ 
			$this->session->set_userdata('permissions', json_decode($admin->permissions));
			$this->session->set_userdata('admin_id', $admin->id);
			// chung to chung ta dang nhap thanh cong
			return true;
		}
		else
		{
			$this->form_validation->set_message(__FUNCTION__, 'username hoặc password sai!');
		// truoc khi return false thi co mot thong bao
			return FALSE;
		}
		
		
	}

}

/* End of file loginadmin_controller.php */
/* Location: ./application/controllers/admin/loginadmin_controller.php */