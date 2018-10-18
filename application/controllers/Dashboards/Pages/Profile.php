
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Trang cá nhân',
			'view'  => array(
				'view' => 'dashboard/pages/profile',
				'data' => []
			),
			'script' => array(
				'view' => 'dashboard/pages/profile',
				'data' => []
			)
		);
		$this->load->view('layout/main', $data, FALSE);
	}		

}

/* End of file Profile.php */
/* Location: ./application/controllers/Dashboards/Pages/Profile.php */