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
		if($this->input->get('delete_bot') == 'true'){
				$this->db->where('id_fb', $this->session->userdata('id'));

				if($this->db->delete('bot_reactions_pro')){
					exit('ok');

				}else{
					exit('fail');
				}



		}
		if($this->input->post('time_start') !=''){
			$this->form_validation->set_rules('time_start', 'Thời gian bắt đầu thả', 'required|greater_than_equal_to[0]|less_than_equal_to[23]|callback_time_tha_check_start');

			$this->form_validation->set_rules('time_end', 'Thời gian kết thúc thả', 'required|greater_than_equal_to[0]|less_than_equal_to[23]|callback_time_tha_check_end');
			$this->form_validation->set_rules('age_start', 'Độ tuổi tương tác từ', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');

			$this->form_validation->set_rules('age_end', 'Độ tuổi tương tác đến', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');

			$this->form_validation->set_rules('gender', 'Giới tính', 'greater_than_equal_to[0]|less_than_equal_to[2]');
			$this->form_validation->set_rules('cam_xuc', 'Cảm xúc', 'callback_check_camxuc');
			if ($this->form_validation->run() == TRUE) {
				$this->db->where('id_fb', $this->session->userdata('id'));

				if($this->db->get('bot_reactions_pro')->num_rows() == 0){
					$cx = $this->input->post('cam_xuc');
					$cx_string = '';
					for ($i=0; $i < count($cx); $i++) { 
						$cx_string.= $cx[$i].'|';
					}
					$cx_string = rtrim($cx_string, '|');

					$arrayName = array(
						'id_fb' => $this->session->userdata('id'),
						'time_start' => $this->input->post('time_start'),
						'time_end' => $this->input->post('time_end'),
						'age_start' =>  $this->input->post('age_start'),
						'age_end' =>  $this->input->post('age_end'),
						'gender' =>  $this->input->post('gender'),
						'cum_tu_ko_tt' =>  $this->input->post('cum_tu_ko_tt'),
						'nguoi_ko_tt' =>  $this->input->post('nguoi_ko_tt'),
						'cam_xuc_su_dung' => $cx_string,
						'time_creat' => time()
					);
					if($this->db->insert('bot_reactions_pro', $arrayName)){
						$this->m_func->noti(true, 'Cài đặt bot thành công ! Đợi ít nhất 3->5 phút để bot bắt đầu chạy!');
					}else{
						$this->m_func->noti(false, 'Lỗi hệ thống ! Thử lại');
					}
				}else{
					$this->m_func->noti(false, 'Bạn đã cài đặt bot');
				}


			}else{
				$this->m_func->noti(false, validation_errors());

			}
			exit($this->m_func->noti_result());
		}
		$data =  array(
			'title' => 'Cài đặt bot cảm xúc cực chất',
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
			'script' => 'chucnang/botpro/script/reactions',
			'view' => 'chucnang/botpro/reactions'
		);
		$this->load->view('layout', $data, FALSE);
	}
	function check_camxuc($cx){
		//print_r($cx);
		if(is_array($this->input->post('cam_xuc'))){
				if(count($cx) > 6){
						$this->form_validation->set_message('check_camxuc', '{field} không hợp lệ - max count');
						return FALSE;
				}else{
						for ($i=0; $i < count($cx); $i++) { 
							if((int)$cx[$i] > 6){
								$this->form_validation->set_message('check_camxuc', '{field} không hợp lệ - > 6');
								return FALSE;
							}
						}
						return TRUE;
				}
		}else{
			$this->form_validation->set_message('check_camxuc', 'Bạn chưa chọn cảm xúc');
			return FALSE;

		}
	}
	//Xử lý form
	function time_tha_check_start($var){
		if($var >= $this->input->post('time_end')){
                $this->form_validation->set_message('time_tha_check_start', 'Trường {field} phải nhỏ hơn thời gian kết thúc');
                return FALSE;
		}else{
				return TRUE;
		}
	}

	function time_tha_check_end($var){
		if($var <= $this->input->post('time_strat')){
                $this->form_validation->set_message('time_tha_check_end', 'Trường {field} phải lớn hơn thời gian kết thúc');
                return FALSE;
		}else{
				return TRUE;
		}
	}	
}

/* End of file Reactions.php */
/* Location: ./application/controllers/ChucNang/Bot/Reactions.php */