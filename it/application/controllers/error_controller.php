<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class error_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function E401()
	{
		$this->load->view('error401_view');
	}
	public function E404()
	{
		$this->load->view('error404_view');
	}
	public function E500()
	{
		$this->load->view('error500_view');
	}

}

/* End of file error_controller.php */
/* Location: ./application/controllers/error_controller.php */