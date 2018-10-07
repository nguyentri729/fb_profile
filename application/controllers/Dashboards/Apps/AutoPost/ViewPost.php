
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewPost extends CI_Controller {
	
	
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
			'title' => 'Quản lý bài đăng',
			'view'  => array(
				'view' => 'dashboard/apps/auto_post/view_post',
				'data' => []
			),
			'script' => array(
				'view' => 'dashboard/apps/auto_post/view_post',
				'data' => []
			)
		);
		$this->load->view('layout/main', $data, FALSE);
	}
	

}

/* End of file ViewPost.php */
/* Location: ./application/controllers/Dashboard/Apps/AutoPost/ViewPost.php */