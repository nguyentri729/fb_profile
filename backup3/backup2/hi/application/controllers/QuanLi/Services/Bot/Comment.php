
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	public $uid = '';
	public $data_khachhang = array();
	public $info_member = array();
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('quanli') == FALSE){
			redirect('/QuanLi/Login');
			exit();
		}
		$this->load->model('quanli/m_quanli', 'm_quanli');
		$this->load->model('ctv/service/bot/m_comment', 'm_reactions');
	}
	public function index(){


			if($this->input->get('chinh_sua') != ''){
				$input = (int)$this->input->get('chinh_sua');			
				$this->db->where('id', $input);
				$get = $this->db->get('bot_comment');
				if($get->num_rows() > 0){
					//Xử lý cập nhật
					$me_cx = $get->result_array()[0];
					if($this->input->post()){

						//Check giới hạn
						if($this->m_func->wait_server()){
							$this->m_func->noti(false, 'Bạn phải đợi 1 phút để thực hiện hành động tiếp theo.');
							exit($this->m_func->noti_result());
						}

						$this->form_validation->set_rules('access_token', 'Access Token', 'required|xss_clean|callback_check_token_update');

						$this->form_validation->set_rules('time_cai', 'Thời gia cài', 'required|integer|less_than_equal_to[999]|greater_than_equal_to[0]');

						$this->form_validation->set_rules('type_reactions', 'Cách thả', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');

						$this->form_validation->set_rules('ghi_chu', 'Ghi chú', 'required|min_length[5]|max_length[200]|xss_clean');

						$this->form_validation->set_rules('time_start', 'Thời gian bắt đầu thả', 'required|greater_than_equal_to[0]|less_than_equal_to[23]|callback_time_tha_check_start');

						$this->form_validation->set_rules('time_end', 'Thời gian kết thúc thả', 'required|greater_than_equal_to[0]|less_than_equal_to[23]|callback_time_tha_check_end');

						$this->form_validation->set_rules('post_mot_lan', 'Bài viết mỗi lần quét', 'required|greater_than_equal_to[1]|less_than_equal_to[50]');

						
						$this->form_validation->set_rules('khoang_cach_lan', 'Khoảng cách mỗi lần', 'required|greater_than_equal_to[1]|less_than_equal_to[50]');

						$this->form_validation->set_rules('max_post_ngay', 'Giới hạn bài / ngày', 'required|greater_than_equal_to[1]|less_than_equal_to[50]');
						
						$this->form_validation->set_rules('group_tt', 'Tương tác Group', 'greater_than_equal_to[0]|less_than_equal_to[1]');


						$this->form_validation->set_rules('page_tt', 'Tương tác page', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');

						$this->form_validation->set_rules('active', 'Trạng thái', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');

						$this->form_validation->set_rules('profile_tt', 'Tương tác trang cá nhân', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');

						$this->form_validation->set_rules('list_tt', 'Tương tác theo list', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');

						$this->form_validation->set_rules('age_start', 'Độ tuổi tương tác từ', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');

						$this->form_validation->set_rules('age_end', 'Độ tuổi tương tác đến', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');

						$this->form_validation->set_rules('gender', 'Giới tính', 'greater_than_equal_to[0]|less_than_equal_to[2]');

						$this->form_validation->set_rules('ds_list', 'Danh sách UID tương tác', 'xss_clean');

						$this->form_validation->set_rules('cum_tu_ko_tt', 'Cụm từ không tương tác', 'xss_clean');
						
						$this->form_validation->set_rules('nguoi_ko_tt', 'Người không tương tác', 'xss_clean');

						
						$this->form_validation->set_rules('user_creat', 'Người tạo', 'required|callback_check_usercreat');
						if ($this->form_validation->run() == TRUE) {
							$tg = $this->input->post('time_cai');
						
								//Time default
								if($me_cx['time_use'] - time() < 0){
									$time_default = time();
								}else{
									$time_default = $me_cx['time_use'];
								}
								$info_token = $this->m_graph->check_token($this->input->post('access_token'));
								


								if($info_token['id'] != $me_cx['id_fb']){
									$this->m_func->noti(false, 'Access Token không phải là của khách hàng này !');
									exit($this->m_func->noti_result());

								}

								$this->load->model('m_server');
								//Lấy server
								$link_server = $this->m_server->get_url_by_id($me_cx['server_luu_tru'], 'server_bot');
								$arrayName = array(
									'access_token' => $this->input->post('access_token'),
									'name' => $info_token['name'],
									'id_fb' => $info_token['id'],
									'time_use' => $time_default + ($tg * 86400),
									'time_start' => $this->input->post('time_start'),
									'time_end' => $this->input->post('time_end'),
									'post_mot_lan' =>  $this->input->post('post_mot_lan'),
									'khoang_cach_lan' => $this->input->post('khoang_cach_lan'),
									'max_post_ngay' =>  $this->input->post('max_post_ngay'),
									'group_tt' =>  $this->input->post('group_tt'),
									'page_tt' =>  $this->input->post('page_tt'),
									'profile_tt' =>  $this->input->post('profile_tt'),
									'list_tt' =>  $this->input->post('list_tt'),
									'age_start' =>  $this->input->post('age_start'),
									'age_end' =>  $this->input->post('age_end'),
									'gender' =>  $this->input->post('gender'),
									'ds_list' =>  $this->input->post('ds_list'),
									'cum_tu_ko_tt' =>  $this->input->post('cum_tu_ko_tt'),
									'type_reactions' =>  $this->input->post('type_reactions'),
									'nguoi_ko_tt' =>  $this->input->post('nguoi_ko_tt'),
									
									'ghi_chu' =>  $this->input->post('ghi_chu'),
									'server_luu_tru' => $me_cx['server_luu_tru'],
									'token_die' => 0,
									'cookie_die' => 0,
									'time_creat' => time(),
									'user_creat' =>  $this->input->post('user_creat'),
									'active' => $this->input->post('active')
								);


								$this->db->where('id', $input);
								
								if($this->db->update('bot_comment', $arrayName)){
										//Gửi đến server
										

										if($this->m_server->update($link_server.'/api/bot_comment.php', $arrayName, $input)){

											$this->m_func->wait_server('add');
											$this->m_func->noti(true, 'Đã cập nhật thành công ! Bạn có thể xem lịch sử giao dịch để biết thêm thông tin');
											

										}else{
											
											$this->m_func->noti(false, 'Server con của chúng tôi đang gặp vấn đề ! Vui lòng thử lại sau ít phút !');

										}	
								}else{
									$this->m_func->noti(false, 'Hệ thống đang gặp vấn đề ! Thử lại sau ít phút !' );
								}	



								


							
						} else {
							$this->m_func->noti(false, validation_errors());
							
						}
						
						exit($this->m_func->noti_result());
					}
					$data =  array(
						'title' => 'Chỉnh sửa bot reactions',
						'data'  => array(
							'info_member' => $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv'),
							'csrf' => array(
								'name' => $this->security->get_csrf_token_name(),
				        		'hash' => $this->security->get_csrf_hash()
							),
							'data_khachhang' => $get->result_array()[0]
						),

						'script' => 'script/CTV/Service/Bot/edit_comment',
						'view' => 'QuanLi/Service/Bot/edit_comment'
					);
					$this->load->view('QuanLi/layout', $data, FALSE);

				}else{
					$data['heading'] = 'Không thể tìm thấy khách hàng';
					$data['message'] = 'Chúng tôi không tìm thấy khách của bạn.';
					$this->load->view('errors/html/error_general', $data, FALSE);
				}
			}elseif ($this->input->get('delete_kh') != ''){
			//Check giới hạn
			if($this->m_func->wait_server()){
				$this->m_func->noti(false, 'Bạn phải đợi 1 phút để thực hiện hành động tiếp theo.');
				exit($this->m_func->noti_result());
			}
			$input = (int)$this->input->get('delete_kh');
			//Get ds
			
			$this->db->where('id', $input);
			$get = $this->db->get('bot_comment');
			if($get->num_rows() > 0){
				$me_cx = $get->result_array()[0];
				$this->load->model('m_server');
				$link_server = $this->m_server->get_url_by_id($me_cx['server_luu_tru'], 'server_bot');
				$this->db->where('id', $input);
				$delete = $this->db->delete('bot_comment');
				if($delete){

					$curl = $this->m_func->curl_api($link_server.'/api/bot_comment.php?type=delete&id_main='.$input.'', 'GET');
					$this->m_func->wait_server('add');
					if($curl == 'true'){

						$this->m_func->noti(true, 'Đã xóa thành công !');
					}else{
						$this->m_func->noti(false, 'Không thể xóa !');
					}
				}else{
					$this->m_func->noti(false, 'Không thể xóa !');
				}

				exit($this->m_func->noti_result());
			}

		}else{
				$data =  array(
					'title' => 'Quản lý tổng quan',
					'data'  => array(
						'info_member' => array(),
						'csrf' => array(
							'name' => $this->security->get_csrf_token_name(),
					        'hash' => $this->security->get_csrf_hash()
						),
						'data_khachhang' => $this->db->get('bot_comment')->result_array()
					),
					'assets' => array(
						'css' => array('/assets/plugins/DataTables/datatables.min.css'),
						'script' => array('/assets/plugins/DataTables/datatables.min.js')
					), 
					'script' => 'script/CTV/Service/Bot/quanli_comment',
					'view' => 'QuanLi/Service/Bot/quanli_comment'
				);
				$this->load->view('QuanLi/layout', $data, FALSE);
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
	function check_token_update($token){
		$check = $this->m_graph->check_token($token);
		if($check == FALSE){
                $this->form_validation->set_message('check_token_update', '{field} không hợp lệ hoặc hết hạn');
                return FALSE;
        }else{
            	return TRUE;
        }
	}
	function check_usercreat($id){
		$this->db->where('id', $id);
		$get = $this->db->get('ctv_acc');
		if($get->num_rows() > 0){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_usercreat', 'ID chuyển này không tồn tại !');
			return FALSE;
		}
	}

}

/* End of file Reactions.php */
/* Location: ./application/controllers/QuanLi/DichVu/Reactions.php */