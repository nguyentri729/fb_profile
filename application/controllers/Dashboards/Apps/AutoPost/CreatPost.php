
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreatPost extends CI_Controller {
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
			'title' => 'Tạo bài đăng mới',
			'view'  => array(
				'view' => 'dashboard/apps/auto_post/creat_post',
				'data' => []
			),
			'script' => array(
				'view' => 'dashboard/apps/auto_post/creat_post',
				'data' => []
			)
		);
		$this->load->view('layout/main', $data, FALSE);
	}



}

/* End of file CreatPost.php */
/* Location: ./application/controllers/Dashboard/Apps/AutoPost/CreatPost.php */