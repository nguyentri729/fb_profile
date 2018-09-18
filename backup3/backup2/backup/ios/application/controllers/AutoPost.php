
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoPost extends CI_Controller {

	public function index(){
		$data = array(
			'back' => array(
				'title' => 'Đăng bài',
				'href_back' => base_url('Dashboard')
			),
			'view' => 'page/auto_post',
			'data' => array(
				'info_member' => $this->m_func->info_member()
			),
			'data_script' => [],
			'script' => ''
		);
		$this->load->view('layout', $data, FALSE);
	}
	public function CreatPost(){
		$data = array(
			'back' => array(
				'title' => 'Tạo bài đăng mới',
				'href_back' => base_url('AutoPost')
			),
			'view' => 'page/creat_post',
			'data' => array(
				'info_member' => $this->m_func->info_member()
			),
			'data_script' => [],
			'config' => array(
				'data_time_picker' => true
			),
			'script' => 'script/creatpost'
		);
		$this->load->view('layout', $data, FALSE);
	}
}

/* End of file AutoPost.php */
/* Location: ./application/controllers/AutoPost.php */