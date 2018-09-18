<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login() == FALSE){
			redirect('/HackLike');
			exit;
		}
		$this->load->model('m_captcha');
		
	}
	public function index()
	{
		$this->db->where('id_fb', $this->session->userdata('id'));
		$data_bot  = $this->db->get('bot_comment')->result_array();
		if($this->input->post('cmt_n') !=''){
			$this->form_validation->set_rules('cmt_n', 'Nội dung bình luận', 'required|min_length[1]|max_length[999]|xss_clean');
			if ($this->form_validation->run()) {
				if(count($data_bot) == 0){
					$ins = array(
						'id_fb' => $this->session->userdata('id'),
						'comment' => $this->input->post('cmt_n'),
						'time_creat' => time()
					);
					if($this->db->insert('bot_comment', $ins)){
						echo '<script>alert("Cài đặt bot bình luận thành công");window.location = "";</script>';
					}else{
						echo '<script>alert("Cài đặt bot bình luận không thành công"); window.location = "";</script>';
					}
					
				}else{
					echo '<script>alert("Bạn đã cài đặt bot rồi !");window.location = "";</script>';
				}
			}
		}

		if($this->input->post('go_bot') == 'ok'){
			$this->db->where('id_fb', $this->session->userdata('id'));
			if($this->db->delete('bot_comment')){
				echo '<script>alert("Bạn đã GỠ CÀI ĐẶT BOT thành công!!!");window.location = "";</script>';
			}else{
				echo '<script>alert("Không thể gỡ do lỗi !");window.location = "";</script>';
			}
			
		}

		$data =  array(
			'title' => 'Cài đặt bot bình luận',
			'data'  => array(
				'info_member' => $this->m_func->get_info($this->session->userdata('id')),
				'captcha' => $this->m_captcha->creat_captcha(),
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				),
				'data_bot' => $data_bot
				
			),
			'script' => 'chucnang/bot/script/comment',
			'view' => 'chucnang/bot/comment'
		);
		$this->load->view('layout', $data, FALSE);
	}

}

/* End of file Comment.php */
/* Location: ./application/controllers/ChucNang/Bot/Comment.php */