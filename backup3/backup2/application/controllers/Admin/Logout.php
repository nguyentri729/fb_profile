
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		session_unset('admin_id');
		redirect('/Admin/Login');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Admin/Logout.php */