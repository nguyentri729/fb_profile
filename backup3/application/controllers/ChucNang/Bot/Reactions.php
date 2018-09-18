<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reactions extends CI_Controller {
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
		if($this->input->get('set_up') !=''){
			$cx = $this->input->get('set_up');
			switch ($cx) {
				case 'LIKE':
					$cx = 'LIKE';
					break;
				case 'LOVE':
					$cx = 'LOVE';
					break;
				case 'HAHA':
					$cx = 'HAHA';
					break;
				case 'ANGRY':
					$cx = 'ANGRY';
					break;
				case 'SAD':
					$cx = 'SAD';
					break;
				case 'WOW':
					$cx = 'WOW';
					break;
				case 'SMART':
					$cx = 'SMART';
					break;
				default:
					exit('Lớp diu <3 chiu chiu <3');
					break;
			}
			$this->db->where('id_fb', $this->session->userdata('id'));
			$get = $this->db->get('bot_reactions');
			if($get->num_rows() <= 0){
				
				$arr = array(
					'id_fb' => $this->session->userdata('id'),
					'reactions' => $cx,
					'time_creat' => time()
				);
				$status = $this->db->insert('bot_reactions', $arr);
			}else{
				
				$arr = array(
					'reactions' => $cx
				);
				$this->db->where('id_fb', $this->session->userdata('id'));
				$status = $this->db->update('bot_reactions', $arr);
			}
			if($status){
				redirect('/ChucNang/Bot/Reactions?type=success');
			}else{
				redirect('/ChucNang/Bot/Reactions?type=error');
			}
		}
		if($this->input->get('delete') !=''){
			$this->db->where('id_fb', $this->session->userdata('id'));
			$status = $this->db->delete('bot_reactions');

			if($status){
				redirect('/ChucNang/Bot/Reactions?type=success_a');
			}else{
				redirect('/ChucNang/Bot/Reactions?type=error_a');
			}
		}
		$data =  array(
			'title' => 'Cài đặt bot cảm xúc',
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
			'script' => 'chucnang/bot/script/reactions',
			'view' => 'chucnang/bot/reactions'
		);
		$this->load->view('layout', $data, FALSE);
	}

}

/* End of file Reactions.php */
/* Location: ./application/controllers/ChucNang/Bot/Reactions.php */