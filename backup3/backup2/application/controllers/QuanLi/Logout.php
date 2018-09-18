<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		session_destroy();
		redirect('/QuanLi/Login');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/QuanLi/Logout.php */