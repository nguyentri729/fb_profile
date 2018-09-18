<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('ctv') == FALSE){
			redirect('/CTV/Login');
			exit;
		}
	}
	public function index()
	{
		$data =  array(

			'title' => 'Quản lý tổng quan',
			'data'  => array(
				'info_member' => $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv')
			),
			'script' => 'script/CTV/dashboard',
			'view' => 'CTV/dashboard'
		);
		$this->load->view('CTV/layout', $data, FALSE);
	}
	public function NapTien(){
		$data =  array(

			'title' => 'Nạp tiền vào tài khoản',
			'data'  => array(
				'info_member' => $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv')
			),
			'view' => 'CTV/naptien'
		);
		$this->load->view('CTV/layout', $data, FALSE);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/CTV/Dashboard.php */