
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Cài đặt',
			'view'  => array(
				'view' => 'dashboard/pages/setting',
				'data' => []
			),
			'script' => array(
				'view' => 'dashboard/pages/setting',
				'data' => []
			)
		);
		$this->load->view('layout/main', $data, FALSE);
	}		

}

/* End of file Setting.php */
/* Location: ./application/controllers/Dashboards/Pages/Setting.php */