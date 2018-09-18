
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reactions extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('quanli') == FALSE){
			redirect('/QuanLi/Login');
			exit();
		}
	}
	public function index()
	{
		$this->load->model('quanli/m_thongke', 'm_thongke');
		$data =  array(
			'title' => 'Quản lý tổng quan',
			'data'  => array(
				'info_member' => array(),
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				)
			),
			'view' => 'QuanLi/dashboard'
		);
		$this->load->view('QuanLi/layout', $data, FALSE);

	}

}

/* End of file Reactions.php */
/* Location: ./application/controllers/QuanLi/DichVu/Reactions.php */