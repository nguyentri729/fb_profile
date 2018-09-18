<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommentVui extends CI_Controller {
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
		if($this->input->get('delete_bot') == 'true'){
				$this->db->where('id_fb', $this->session->userdata('id'));

				if($this->db->delete('bot_comment_vui')){
					exit('ok');

				}else{
					exit('fail');
				}
		}
		if($this->input->post('the_loai') !=''){
			$this->db->where('id_fb', $this->session->userdata('id'));
			$get = $this->db->get('bot_comment_vui');
			if($get->num_rows() <= 0){
				$arr = array(
					'id_fb' => $this->session->userdata('id'),
					'the_loai' => (int)$this->input->post('the_loai'),
					'time_creat' => time()
				);

				$status = $this->db->insert('bot_comment_vui', $arr);
				if($status){
					$this->m_func->noti(true, 'Thành công');
				}else{
					$this->m_func->noti(false, 'Lỗi !');
				}
			}
			exit($this->m_func->noti_result());
		}

		$data =  array(
			'title' => 'Cài đặt bot bình luận vui',
			'data'  => array(
				'info_member' => $this->m_func->get_info($this->session->userdata('id')),
				'captcha' => $this->m_captcha->creat_captcha(),
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				)
			),
			'assets' => array(
				'css' => array('/assets/plugins/sweetalert/sweetalert.css'),
				'script' => array('/assets/plugins/sweetalert/sweetalert.min.js')
			),
			'script' => 'chucnang/botpro/script/commentvui',
			'view' => 'chucnang/botpro/commentvui'
		);
		$this->load->view('layout', $data, FALSE);
	}
	
}

/* End of file CommentVui.php */
/* Location: ./application/controllers/ChucNang/Bot/CommentVui.php */