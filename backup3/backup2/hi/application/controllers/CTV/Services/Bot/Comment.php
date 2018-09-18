<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('ctv') == FALSE){
			redirect('/CTV/Login');
			exit;
		}
		$this->load->model('ctv/service/bot/m_comment', 'm_comment');
		if($this->input->get('thanh_tien')){
			$tg = (int)$this->input->get('thanh_tien');
			header('Content-Type: application/json; charset=UTF-8');
			echo json_encode($this->m_comment->thanh_tien($tg, $this->session->userdata('ctv_id')));
			exit;
		}
	}

	public function index()
	{

		if($this->input->post()){

			//Check giới hạn
			if($this->m_func->wait_server()){
				$this->m_func->noti(false, 'Bạn phải đợi 1 phút để thực hiện hành động tiếp theo.');
				exit($this->m_func->noti_result());
			}

			$this->form_validation->set_rules('access_token', 'Access Token', 'required|xss_clean|callback_check_token');

			$this->form_validation->set_rules('time_cai', 'Thời gian cài', 'required|integer|less_than_equal_to[999]|greater_than_equal_to[10]');

			$this->form_validation->set_rules('type_reactions', 'Cách bình luận', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');

			$this->form_validation->set_rules('ghi_chu', 'Ghi chú', 'required|min_length[5]|max_length[200]|xss_clean');

			$this->form_validation->set_rules('time_start', 'Thời gian bắt đầu bình luận', 'required|greater_than_equal_to[0]|less_than_equal_to[23]|callback_time_tha_check_start');

			$this->form_validation->set_rules('time_end', 'Thời gian kết thúc bình luận', 'required|greater_than_equal_to[0]|less_than_equal_to[23]|callback_time_tha_check_end');

			$this->form_validation->set_rules('post_mot_lan', 'Bài viết mỗi lần quét', 'required|greater_than_equal_to[1]|less_than_equal_to[50]');

			
			$this->form_validation->set_rules('khoang_cach_lan', 'Khoảng cách mỗi lần', 'required|greater_than_equal_to[1]|less_than_equal_to[50]');

			$this->form_validation->set_rules('max_post_ngay', 'Giới hạn bài / ngày', 'required|greater_than_equal_to[1]');
			
			$this->form_validation->set_rules('group_tt', 'Tương tác Group', 'greater_than_equal_to[0]|less_than_equal_to[1]');


			$this->form_validation->set_rules('page_tt', 'Tương tác page', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');


			$this->form_validation->set_rules('profile_tt', 'Tương tác trang cá nhân', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');

			$this->form_validation->set_rules('list_tt', 'Tương tác theo list', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');

			$this->form_validation->set_rules('age_start', 'Độ tuổi tương tác từ', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');

			$this->form_validation->set_rules('age_end', 'Độ tuổi tương tác đến', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');

			$this->form_validation->set_rules('gender', 'Giới tính', 'greater_than_equal_to[0]|less_than_equal_to[2]');

			$this->form_validation->set_rules('ds_list', 'Danh sách UID tương tác', 'xss_clean');

			$this->form_validation->set_rules('cum_tu_ko_tt', 'Cụm từ không tương tác', 'xss_clean');
			
			$this->form_validation->set_rules('nguoi_ko_tt', 'Người không tương tác', 'xss_clean');


			if ($this->form_validation->run() == TRUE) {
				$tg = $this->input->post('time_cai');

				//Tính tiền
				$thanh_tien = $this->m_comment->thanh_tien($tg, $this->session->userdata('ctv_id'))['tien_da_giam'];

				$tien_co = $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv')['money'];
				//Kiểm tra tài khoản
				if($this->m_func->check_tien($thanh_tien, $this->session->userdata('ctv_id'), 'ctv')){

					$info_token = $this->m_graph->check_token($this->input->post('access_token'));

					//Lấy thông tin server
					$this->load->model('m_server');
					$server  = $this->m_server->get_url_server('server_bot', 'bot_comment');


					//Mảng dữ liệu
					$arrayName = array(
						'access_token' => $this->input->post('access_token'),
						'name' => $info_token['name'],
						'id_fb' => $info_token['id'],
						'time_use' => time() + $tg * 86400,
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
						'server_luu_tru' => $server['id'],
						'token_die' => 0,
						'cookie_die' => 0,
						'time_creat' => time(),
						'user_creat' => $this->session->userdata('ctv_id'),
						'active' => 1,
					);


					//Thêm vào server chính
					if($this->db->insert('bot_comment', $arrayName)){

							//Thêm vào server con 
							if($this->m_server->add($server['link'], $arrayName, $this->db->insert_id())){


								//Thời gian chờ
								$this->m_func->wait_server('add');


								$this->m_func->noti(true, 'Đã cài đặt thành công ! Bạn có thể xem lịch sử giao dịch để biết thêm thông tin');

								$this->m_ctv->chi_tieu_thang($this->session->userdata('ctv_id'), $thanh_tien);
								$this->m_ctv->add_activity($this->session->userdata('ctv_id'), 'add', 'bot_comment', $thanh_tien, $this->db->insert_id());

								//Trừ tiền 
								$this->m_func->tru_tien($this->session->userdata('ctv_id'), $thanh_tien, 'ctv');

							}else{
								
								$this->m_func->noti(false, 'Server con của chúng tôi đang gặp vấn đề ! Vui lòng thử lại sau ít phút !');

								//Xóa trên server chính
								$this->db->where('id', $this->db->insert_id());
								$this->db->delete('bot_comment');
							}


					}else{
						$this->m_func->noti(false, 'Hệ thống đang gặp vấn đề ! Thử lại sau ít phút !' );
					}

				}else{
					$this->m_func->noti(false, 'Tài khoản của bạn không đủ để giao dịch');
				}
			} else {
				$this->m_func->noti(false, validation_errors());
				
			}

			exit($this->m_func->noti_result());
		}

		$data =  array(
			'title' => 'Cài đặt bot bình luận',
			'data'  => array(
				'info_member' => $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv'),
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
	        		'hash' => $this->security->get_csrf_hash()
				)
			),
			'script' => 'script/CTV/Service/Bot/comment',
			'view' => 'CTV/Service/Bot/comment'
		);
		$this->load->view('CTV/layout', $data, FALSE);
	}



	public function QuanLyKhachHang(){

		if($this->input->get('chinh_sua') != ''){

			$input = (int)$this->input->get('chinh_sua');
			//Get ds
			$this->db->where('user_creat', $this->session->userdata('ctv_id'));
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

					
					$this->form_validation->set_rules('max_post_ngay', 'Giới hạn bài / ngày', 'required|greater_than_equal_to[1]');
					
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

					

					if ($this->form_validation->run() == TRUE){

						//Thành tiền
						$tg = $this->input->post('time_cai');
						$thanh_tien = $this->m_comment->thanh_tien($tg, $this->session->userdata('ctv_id'))['tien_da_giam'];
						$tien_co = $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv')['money'];


						//Kiểm tra tài khoản
						if($this->m_func->check_tien($thanh_tien, $this->session->userdata('ctv_id'), 'ctv')){

							//Thời gian mặc định khi gia hạn
							if($me_cx['time_use'] - time() < 0){
								$time_default = time();
							}else{
								$time_default = $me_cx['time_use'];
							}

							$info_token = $this->m_graph->check_token($this->input->post('access_token'));

							//Kiểm tra ID
							if($info_token['id'] != $me_cx['id_fb']){
								$this->m_func->noti(false, 'Access Token không phải là của khách hàng này !');
								exit($this->m_func->noti_result());

							}

							//Lấy thông tin server
							$this->load->model('m_server');
							$link_server = $this->m_server->get_url_by_id($me_cx['server_luu_tru'], 'server_bot');
							//Mảng dữ liệu
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
								'user_creat' => $this->session->userdata('ctv_id'),
								'active' => $this->input->post('active')
							);
							//Thêm vào server
							$this->db->where('id', $input);
							if($this->db->update('bot_comment', $arrayName)){

								if($this->m_server->update($link_server.'/api/bot_comment.php', $arrayName, $input)){

										$this->m_func->wait_server('add');
										$this->m_func->noti(true, 'Đã cập nhật thành công ! Bạn có thể xem lịch sử giao dịch để biết thêm thông tin');

									$this->m_ctv->chi_tieu_thang($this->session->userdata('ctv_id'), $thanh_tien);
									$this->m_ctv->add_activity($this->session->userdata('ctv_id'), 'update', 'bot_comment', $thanh_tien, $input);

										//Trừ tiền 
										$this->m_func->tru_tien($this->session->userdata('ctv_id'), $thanh_tien, 'ctv');

								}else{
										$this->m_func->noti(false, 'Server con của chúng tôi đang gặp vấn đề ! Vui lòng thử lại sau ít phút !');
								}

							}else{
								$this->m_func->noti(false, 'Hệ thống đang gặp vấn đề ! Thử lại sau ít phút !' );
							}



						}else{
							$this->m_func->noti(false, 'Tài khoản của bạn không đủ để giao dịch');
						}
					
					


					} else {
						$this->m_func->noti(false, validation_errors());
						
					}
					
					exit($this->m_func->noti_result());
				}



				$data =  array(
					'title' => 'Chỉnh sửa bot comment',
					'data'  => array(
						'info_member' => $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv'),
						'csrf' => array(
							'name' => $this->security->get_csrf_token_name(),
			        		'hash' => $this->security->get_csrf_hash()
						),
						'data_khachhang' => $get->result_array()[0]
					),
					'script' => 'script/CTV/Service/Bot/edit_comment',
					'view' => 'CTV/Service/Bot/edit_comment'
				);
				$this->load->view('CTV/layout', $data, FALSE);

			}else{
				$data['heading'] = 'Không thể tìm thấy khách hàng';
				$data['message'] = 'Chúng tôi không tìm thấy khách của bạn.';
				$this->load->view('errors/html/error_general', $data, FALSE);
			}
		}elseif ($this->input->get('comment') != '') {

			$input = (int)$this->input->get('comment');
			//Get ds
			$this->db->where('user_creat', $this->session->userdata('ctv_id'));
			$this->db->where('id', $input);
			$get = $this->db->get('bot_comment');
			if($get->num_rows() > 0){
				//Ajax xóa comment
				if($this->input->post('delete_id') !=''){
					$id_bl = (int)$this->input->post('delete_id');
					$this->db->where('id', $id_bl);
					$this->db->where('user_creat', $this->session->userdata('ctv_id'));
					if($this->db->get('bot_comment_noidung')->num_rows() > 0){
						$this->db->where('id', $id_bl);
						if($this->db->delete('bot_comment_noidung')){
								$this->m_func->noti(true, 'Xóa bình luận thành công!');
						}else{
							$this->m_func->wait_server('add');
							$this->m_func->noti(false, 'Không thể xóa bình luận này ! Lỗi');
						}
					}else{
						$this->m_func->noti(false, 'Không thể xóa bình luận này ! Lỗi');
					}
					exit($this->m_func->noti_result());

				}				
				//Ajax thêm bình luận
				if($this->input->post()){


					$this->form_validation->set_rules('message', 'Nội dung bình luận', 'max_length[255]|xss_clean|callback_check_message');
					$this->form_validation->set_rules('image', 'Hình ảnh kèm theo', 'xss_clean|valid_url|callback_check_image');
					$this->form_validation->set_rules('sticker', 'Nhãn dán kèm theo', 'xss_clean|numeric');
					if ($this->form_validation->run() == TRUE) {
						$this->db->where('id_main', $input);

						if($this->db->get('bot_comment_noidung')->num_rows() > 5){
							$this->m_func->noti(false, 'Bạn chỉ có thể thêm tối đa 5 bình luận');
						}else{

							$array_insert = array(
								'id_main' => $input,
								'message' => $this->input->post('message'),
								'image_url' =>  $this->input->post('image'),
								'sticker_id' =>  $this->input->post('sticker'),
								'time_creat' => time(),
								'user_creat' => $this->session->userdata('ctv_id')

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



				$this->db->where('id_main', $input);
				$bl = $this->db->get('bot_comment_noidung');
				$data =  array(
					'title' => 'Thêm bình luận',
					'data'  => array(
						'info_member' => $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv'),
						'csrf' => array(
							'name' => $this->security->get_csrf_token_name(),
			        		'hash' => $this->security->get_csrf_hash()
						),
						'data_khachhang' => $get->result_array()[0],
						'data_bl' => $bl->result_array()
					),
					'assets' => array(
						'css' => array('/assets/plugins/emoji/dist/emojionearea.css'),
						'script' => array('/assets/plugins/emoji/dist/emojionearea.js')
					), 
					'script' => 'script/CTV/Service/Bot/add_comment',
					'view' => 'CTV/Service/Bot/add_comment'
				);

				$this->load->view('CTV/layout', $data, FALSE);

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
			$this->db->where('user_creat', $this->session->userdata('ctv_id'));
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
				'title' => 'Quản lý khách hàng bot comment',
				'data'  => array(
					'info_member' => $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv'),
					'csrf' => array(
						'name' => $this->security->get_csrf_token_name(),
		        		'hash' => $this->security->get_csrf_hash()
					),
					'data_khachhang' => $this->m_comment->get_dskhach($this->session->userdata('ctv_id'))
				),
				'assets' => array(
					'css' => array('/assets/plugins/DataTables/datatables.min.css'),
					'script' => array('/assets/plugins/DataTables/datatables.min.js')
				), 
				'script' => 'script/CTV/Service/Bot/quanli_comment',
				'view' => 'CTV/Service/Bot/quanli_comment'
			);
			$this->load->view('CTV/layout', $data, FALSE);
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
	function check_token($token){
		$check = $this->m_graph->check_token($token);
		if($check == FALSE){
                $this->form_validation->set_message('check_token', '{field} không hợp lệ hoặc hết hạn');
                return FALSE;
        }else{
        		return TRUE;
            	$this->db->where('id_fb', $check['id']);
            	$this->db->where('user_creat', $this->session->userdata('ctv_id'));
            	$get = $this->db->get('bot_comment');
            	if($get->num_rows() > 0){
	                $this->form_validation->set_message('check_token', 'Bạn đã cài đặt khách hàng này trước đó ! ');
	                return FALSE;
            	}else{
            		return TRUE;
            	}
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
/* Location: ./application/controllers/CTV/Services/Bot/Comment.php */