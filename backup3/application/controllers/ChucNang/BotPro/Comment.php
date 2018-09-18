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
		if($this->input->get('delete_bot') == 'true'){
				$this->db->where('id_fb', $this->session->userdata('id'));
				$this->db->delete('bot_comment_noidung');
				$this->db->where('id_fb', $this->session->userdata('id'));
				if($this->db->delete('bot_comment_pro')){
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
			
			if ($this->form_validation->run() == TRUE) {
				$this->db->where('id_fb', $this->session->userdata('id'));

				if($this->db->get('bot_comment_pro')->num_rows() == 0){
					

					$arrayName = array(
						'id_fb' => $this->session->userdata('id'),
						'time_start' => $this->input->post('time_start'),
						'time_end' => $this->input->post('time_end'),
						'age_start' =>  $this->input->post('age_start'),
						'age_end' =>  $this->input->post('age_end'),
						'gender' =>  $this->input->post('gender'),
						'cum_tu_ko_tt' =>  $this->input->post('cum_tu_ko_tt'),
						'nguoi_ko_tt' =>  $this->input->post('nguoi_ko_tt'),
						
						'time_creat' => time()
					);
					if($this->db->insert('bot_comment_pro', $arrayName)){
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

				if($this->input->post()){
					$this->form_validation->set_rules('message', 'Nội dung bình luận', 'max_length[255]|xss_clean|callback_check_message');
					$this->form_validation->set_rules('image', 'Hình ảnh kèm theo', 'xss_clean|valid_url|callback_check_image');
					$this->form_validation->set_rules('sticker', 'Nhãn dán kèm theo', 'xss_clean|numeric');
					if ($this->form_validation->run() == TRUE) {
						$this->db->where('id_fb', $this->session->userdata('id'));

						if($this->db->get('bot_comment_noidung')->num_rows() > 3){
							$this->m_func->noti(false, 'Bạn chỉ có thể thêm tối đa 3 mẫu bình luận');
						}else{

							$array_insert = array(
								'id_fb' => $this->session->userdata('id'),
								'message' => $this->input->post('message'),
								'image_url' =>  $this->input->post('image'),
								'sticker_id' =>  $this->input->post('sticker'),
								'time_creat' => time()

							);
							if($this->db->insert('bot_comment_noidung', $array_insert)){
								$this->m_func->noti(true, 'Thêm bình luận thành công ! ');
							}else{
								$this->m_func->noti(false, 'Hệ thống đang gặp lỗi! Thử lại sau ít phút');
							}

						}


					} else {
						$this->m_func->noti(false, validation_errors());
					}

					exit($this->m_func->noti_result());
				}

				if($this->input->get('delete_id') !=''){
					$id = (int)$this->input->get('delete_id');
					$this->db->where('id', $id);
					$this->db->where('id_fb', $this->session->userdata('id'));
					if($this->db->delete('bot_comment_noidung')){
						$this->m_func->noti(true, 'Đã xóa bình luận');
					}else{
						$this->m_func->noti(false, 'Hệ thống đang gặp lỗi! Thử lại sau ít phút');
					}
					exit($this->m_func->noti_result());
				}

				$this->db->where('id_fb', $this->session->userdata('id'));
				$data_bl = $this->db->get('bot_comment_noidung')->result_array();
		$data =  array(
			'title' => 'Cài đặt bot bình luận cực chất',
			'data'  => array(
				'info_member' => $this->m_func->get_info($this->session->userdata('id')),
				'captcha' => $this->m_captcha->creat_captcha(),
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				),
				'data_bl' => $data_bl
			),
			'assets' => array(
				'css' => array(
					'/assets/plugins/sweetalert/sweetalert.css',
					'/assets/plugins/emoji/dist/emojionearea.css'
				),
				'script' => array('/assets/plugins/sweetalert/sweetalert.min.js', '/assets/plugins/emoji/dist/emojionearea.js')
			),
			'script' => 'chucnang/botpro/script/comment',
			'view' => 'chucnang/botpro/comment'
		);
		$this->load->view('layout', $data, FALSE);
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

		function check_message($message){
		if($this->input->post('sticker') == '' AND $this->input->post('image') == '' AND $this->input->post('message') == ''){
            $this->form_validation->set_message('check_message', 'Không được để trống');
            return FALSE;
		}else{
			return TRUE;
		}
	}
	function check_image($image){
		if($this->input->post('image') != '' AND $this->input->post('sticker') != ''){
            $this->form_validation->set_message('check_image', 'Bạn chỉ được chọn hình ảnh hoặc sticker');
            return FALSE;
		}else{
			return TRUE;
		}
	}	
}

/* End of file Comment.php */
/* Location: ./application/controllers/ChucNang/BotPro/Comment.php */