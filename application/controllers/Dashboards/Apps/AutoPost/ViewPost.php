
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
	public function ajax(){
		if($this->input->post('delete_post') !=''){
			$this->db->where('id', $this->input->post('delete_post'));
			$this->db->where('id_fb', $this->session->userdata('id_fb'));
			
		
		
			if($this->db->delete('posts')){
				$result = array(
					'status' => true,
					'msg'    => 'Xóa bài thành công !'
				);
			}else{
				$result = array(
					'status' => false,
					'msg'    => 'Xảy ra lỗi khi xóa ! Thử lại sau'
				);
			}
			$this->m_func->return_json($result);
		}


	}
	

}

/* End of file ViewPost.php */
/* Location: ./application/controllers/Dashboard/Apps/AutoPost/ViewPost.php */