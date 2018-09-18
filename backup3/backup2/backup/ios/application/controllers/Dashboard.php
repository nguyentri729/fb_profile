
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->m_func->check_login() == FALSE){
			redirect('/Login');
			exit();
		}
	}
	public function index()
	{
		$data = array(
			'view' => 'page/index',
			'data' => array(
				'info_member' => $this->m_func->info_member()
			),
			'data_script' => [],
			'script' => ''
		);
		$this->load->view('layout', $data, FALSE);
	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */