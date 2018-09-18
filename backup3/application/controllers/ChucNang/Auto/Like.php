<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like extends CI_Controller {
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
			$this->form_validation->set_rules('limit', 'limit', 'required|integer|greater_than_equal_to[0]|less_than_equal_to[150]');
			$this->form_validation->set_rules('captcha', 'captcha', 'required|integer');
			if ($this->form_validation->run() == TRUE) {
				if($this->m_captcha->check_captcha($this->input->post('captcha'))['status']){
					 $check_time =  $this->m_auto->check_kha_dung('auto_like', 'add');
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

					 		if(!isset($check_page)){
					 			$hihi = $this->m_func->curl_api('https://graph.facebook.com/'.$this->input->post('id').'/?access_token='.$token['access_token'].'&method=GET');
					 			$check_page = json_decode($hihi, true);
					 			if(isset($check_page['name'])){
					 				$check_page = true;
					 			}else{
					 				$check_page = false;
					 			}
					 		}else{
					 			if($check_page){
									$this->m_func->noti(false, 'Ồ ! Có vẻ bạn đã điền nhầm ID trang cá nhân hoặc Page ! \nVui lòng sử dụng công cụ Lấy ID bài viết của chúng tôi để lấy đúng ID bài viết. ');	
									exit($this->m_func->noti_result());
					 			}else{
					 				$this->m_func->curl_api('https://graph.facebook.com/'.$this->input->post('id').'/likes?access_token='.$token['access_token'].'&method=POST');
					 			}
					 		}

					 		
					 		
					 	}
					 	$this->m_func->noti(true, 'Đã tiến hành tăng like thành công ! ');
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
			'title' => 'Tăng like bài viết',
			'data'  => array(
				'info_member' => $this->m_func->get_info($this->session->userdata('id')),
				'captcha' => $this->m_captcha->creat_captcha(),
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				)
			),
			'script' => 'chucnang/auto/script/like',
			'view' => 'chucnang/auto/like'
		);
		$this->load->view('layout', $data, FALSE);
	}

}

/* End of file Like.php */
/* Location: ./application/controllers/ChucNang/Auto/Like.php */