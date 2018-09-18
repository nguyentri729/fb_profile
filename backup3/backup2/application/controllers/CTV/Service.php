<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('ctv') == FALSE){
			redirect('/CTV/Login');
			exit;
		}else{
			redirect('/CTV/Services/Vip/Reactions');
		}
	}
	public function index()
	{
		/*$data =  array(
			'title' => 'Dịch vụ cung cấp',
			'data'  => array(
				'info_member' => $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv')
			),
			'script' => 'script/CTV/service',
			'view' => 'CTV/service'
		);
		$this->load->view('CTV/layout', $data, FALSE);*/
		redirect('/CTV/Services/Vip/Reactions');
	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/CTV/Dashboard.php */