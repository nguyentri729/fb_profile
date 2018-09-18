<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('admin') == FALSE){
			redirect('/Admin/Login');
		}
		$this->load->model('admin/m_admin', 'm_admin');

	}
	public function index()
	{
		if($this->input->get('xoa_log')){
			$this->db->truncate('activity');
			redirect('/Admin/Dashboard');
		}
		$data =  array(

			'title' => 'Quản trị viên',
			'data'  => array(
				'info_member' => $this->m_func->info_member($this->session->userdata('admin_id'), 'admin')
			),
			'script' => 'Admin/script/dashboard',
			'view' => 'Admin/html/dashboard'
		);
		$this->load->view('Admin/layout', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Admin/Dashboard.php */