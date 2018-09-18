<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	public function __construct(){
		parent::__construct();
		set_time_limit(0);
		if($this->m_func->check_login() == FALSE){
			redirect('/HackLike');
			exit;
		}
		$this->load->model('m_captcha');
		$this->load->model('m_auto');
	}
	public function index()
	{
		if($this->input->post('id') !=''){

			$this->form_validation->set_rules('id', 'ID POST', 'required|min_length[1]|max_length[999]|xss_clean');
			$this->form_validation->set_rules('limit', 'limit', 'required|integer|greater_than_equal_to[0]|less_than_equal_to[10]');
			$this->form_validation->set_rules('captcha', 'captcha', 'required|integer');
			$this->form_validation->set_rules('noidung', 'noidung', 'required|min_length[1]');
			if ($this->form_validation->run() == TRUE) {
				if($this->m_captcha->check_captcha($this->input->post('captcha'))['status']){
					 $check_time =  $this->m_auto->check_kha_dung('auto_comment', 'add');
					 if($check_time['status']){
					 	$this->m_func->check_token();
					 	$this->db->order_by('id', 'RANDOM');
					 	$this->db->limit($this->input->post('limit'));
					 	if($this->session->userdata('vn')){
					 		$this->db->where('location', 'vi_VN');
					 		$get = $this->db->get('access_token');
					 		
					 	}else{
					 		$get = $this->db->get('token_tay');
					 		
					 	}
					 	
					 	$nd_split = explode(PHP_EOL, $this->input->post('noidung'));
					 	foreach ($get->result_array() as $token) {
					 		$noidung = $nd_split[rand(0, count($nd_split)-1)];
					 		$this->m_func->curl_api('https://graph.facebook.com/'.$this->input->post('id').'/comments?message='.urlencode($noidung).'&access_token='.$token['access_token'].'&method=POST');	
					 	}
					 	$this->m_func->noti(true, 'Tăng bình luận thành công !');
					 }else{
					 	$this->m_func->noti(false, 'Vui lòng đợi để tiếp tục !');
					 }
				}else{
					$this->m_func->noti(false, 'Captcha bạn vừa nhập không hợp lệ');	
				}
			} else {
				$this->m_func->noti(false, validation_errors());
			}
			exit($this->m_func->noti_result());
		}
		$data =  array(
			'title' => 'Tăng bình luận bài viết',
			'data'  => array(
				'info_member' => $this->m_func->get_info($this->session->userdata('id')),
				'captcha' => $this->m_captcha->creat_captcha(),
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				)
			),
			'script' => 'chucnang/auto/script/comment',
			'view' => 'chucnang/auto/comment'
		);
		$this->load->view('layout', $data, FALSE);
	}

}

/* End of file Comment.php */
/* Location: ./application/controllers/ChucNang/Auto/Comment.php */