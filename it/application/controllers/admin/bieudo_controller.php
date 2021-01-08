<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bieudo_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('admin/bieudo_view');
	}

}

/* End of file bieudo_controller.php */
/* Location: ./application/controllers/bieudo_controller.php */