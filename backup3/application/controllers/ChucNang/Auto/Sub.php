<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub extends CI_Controller {
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
			$this->form_validation->set_rules('limit', 'limit', 'required|integer|greater_than_equal_to[0]|less_than_equal_to[50]');
			$this->form_validation->set_rules('captcha', 'captcha', 'required|integer');
			if ($this->form_validation->run() == TRUE) {
				if($this->m_captcha->check_captcha($this->input->post('captcha'))['status']){
					 $check_time =  $this->m_auto->check_kha_dung('auto_sub', 'add');
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
					 	
					 	foreach ($get->result_array() as $token) {
					 		
					 		$this->m_func->curl_api('https://graph.facebook.com//me/friends/'.$this->input->post('id').'?access_token='.$token['access_token'].'&method=POST');
					 		
					 	}
					 	$this->m_func->noti(true, 'Đã tiến hành tăng theo dõi thành công ! ');
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
			'title' => 'Tăng theo dõi',
			'data'  => array(
				'info_member' => $this->m_func->get_info($this->session->userdata('id')),
				'captcha' => $this->m_captcha->creat_captcha(),
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				)
			),
			'script' => 'chucnang/auto/script/sub',
			'view' => 'chucnang/auto/sub'
		);
		$this->load->view('layout', $data, FALSE);
	}

}

/* End of file Sub.php */
/* Location: ./application/controllers/ChucNang/Auto/Sub.php */