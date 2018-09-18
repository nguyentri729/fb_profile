
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->m_func->check_login()==false){
			redirect('/Login');
		}
	}
	public function index()
	{
		$data = array(
			'title' => 'Tổng quan',
			'view'  => array(
				'view' => 'dashboard/dashboard',
				'data' => []
			)
		);
		$this->load->view('layout/main', $data, FALSE);
	}
	


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */