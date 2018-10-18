
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Giới thiệu',
			'view'  => array(
				'view' => 'dashboard/pages/info',
				'data' => []
			),
			'script' => array(
				'view' => 'dashboard/pages/info',
				'data' => []
			)
		);
		$this->load->view('layout/main', $data, FALSE);
	}		

}

/* End of file Info.php */
/* Location: ./application/controllers/Dashboards/Pages/Info.php */