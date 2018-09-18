 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reactions extends CI_Controller{
	public $uid = '';

	public $info_member = '';
	public $data_khachhang = array();
	public function __construct(){
		parent::__construct();
		if ($this->m_func->check_login('ctv') == FALSE)
			{
			redirect('/CTV/Login');
			exit;
			}
		
		$this->load->model('ctv/service/vip/m_reactions', 'm_reactions');

		$this->info_member = $this->m_func->info_member($this->session->userdata('ctv_id') , 'ctv');

		if($this->input->get('loai_tuong_tac') !=''){
			header('Content-Type: application/json');
			$id = (int)$this->input->get('goi');

			$get = $this->m_reactions->get_info_package($id, $this->info_member['type_acc']);

			if($get != FALSE){
				$goi = $get;
			
				$array_return = array(
					'name' => $goi['name_package'],
					'max' => $goi['so_luong'],
					'post' => $goi['max_post'],
					'note' => $goi['mieu_ta'],
					'gia_clone' => $goi['gia_clone'],
					'gia_nguoithat' => $goi['gia_nguoithat']
				);
				$tg = (int)$this->input->get('time_cai');
				if($this->input->get('loai_tuong_tac') == 1){
					$gia = $array_return['gia_nguoithat'];
				}else{
					$gia = $array_return['gia_clone'];
				}
				$array_return['tinh_tien'] = $this->m_reactions->tinh_tien($tg, $gia);
				exit(json_encode($array_return));
			}else{
				exit('Không tìm thấy gói');
			}

		}

	}

	public function index() {

		if($this->input->post('url_or_uid') !=''){
			//Check giới hạn
			if($this->m_func->wait_server()){
				$this->m_func->noti(false, 'Bạn phải đợi 1 phút để thực hiện hành động tiếp theo.');
				exit($this->m_func->noti_result());
			}
			$this->form_validation->set_rules('name_vip', 'Tên VIP', 'required|min_length[5]|max_length[100]|xss_clean');
			$this->form_validation->set_rules('cam_xuc', 'Cảm xúc', 'callback_check_camxuc');
			$this->form_validation->set_rules('time_cai', 'Thời gia cài', 'required|integer|less_than_equal_to[999]|greater_than_equal_to[10]');
			$this->form_validation->set_rules('loai_acc_tuong_tac', 'Loại account tương tác', 'required|greater_than_equal_to[0]|less_than_equal_to[1]');
			$this->form_validation->set_rules('package_id', 'Package', 'required|callback_check_package');
			$this->form_validation->set_rules('ghi_chu', 'Ghi chú', 'required|min_length[5]|max_length[200]|xss_clean');
			$this->form_validation->set_rules('so_luong_dung', 'Số like dùng', 'required');
			$this->form_validation->set_rules('khoang_cach_moi_lan', 'khoảng cách mỗi lần', 'required');
			$this->form_validation->set_rules('so_luong_lan', 'Số lượng lần', 'required');
			$this->form_validation->set_rules('so_post_dung', 'Số post dùng', 'required');

			$this->form_validation->set_rules('url_or_uid', 'Link hoặc UID', 'required|callback_check_url');
			$this->form_validation->set_rules('tuoi_tu', 'Độ tuổi tương tác từ', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');

			$this->form_validation->set_rules('tuoi_den', 'Độ tuổi tương tác đến', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');
			$this->form_validation->set_rules('gioi_tinh', 'Giới tính', 'greater_than_equal_to[0]|less_than_equal_to[2]');

			
			if ($this->form_validation->run() == TRUE) {
				//Tính tiền
				$tg = $this->input->post('time_cai');

				$id_package = $this->input->post('package_id');

				$get = $this->m_reactions->get_info_package($id_package, $this->info_member['type_acc']);

				if($this->input->post('loai_acc_tuong_tac') == 1){
					$gia = $get['gia_nguoithat'];
				}else{
					$gia = $get['gia_clone'];
				}

				$thanh_tien = $this->m_reactions->tinh_tien($tg, $gia)['tien_da_giam'];
				//Kiem tra tai khoan
				if($this->m_func->check_tien($thanh_tien, $this->session->userdata('ctv_id'), 'ctv')){

					$cx = $this->input->post('cam_xuc');
					$cx_string = '';
					for ($i=0; $i < count($cx); $i++) { 
						$cx_string.= $cx[$i].'|';
					}
					$cx_string = rtrim($cx_string, '|');
					//$this->load->model('m_server');
					//$server  = $this->m_server->get_url_server('server_vip', 'vip_reactions');


					$arrayName = array(
						'uid_vip' 		=> $this->uid,
						'name_vip' 		=> $this->input->post('name_vip'),
						'so_luong_dung' => $this->input->post('so_luong_dung'),
						'so_luong_co' 	=> $get['so_luong'],
						'so_post_dung' => $this->input->post('so_post_dung'),
						'so_post_co' => $get['max_post'],
						'cam_xuc_su_dung' => $cx_string,
						'loai_acc_tuong_tac' => $this->input->post('loai_acc_tuong_tac'),
						'so_luong_lan' => $this->input->post('so_luong_lan'),
						'khoang_cach_moi_lan' =>  $this->input->post('khoang_cach_moi_lan'),
						'tuoi_tu' =>  $this->input->post('tuoi_tu'),
						'tuoi_den' => $this->input->post('tuoi_den'),
						'gioi_tinh' =>  $this->input->post('gioi_tinh'),
						'time_use' => time() + $tg * 86400,
						'ghi_chu' =>  $this->input->post('ghi_chu'),
						'server_luu_tru' => 0,
						'package_id' =>  $this->input->post('package_id'),
						'user_creat' => $this->session->userdata('ctv_id'),
						'time_creat' => time(),
						'active' => 1
					);

					$arr_formated = array(
						'name_vip' => $arrayName['name_vip'],
						'fb_id' => $arrayName['uid_vip'],
						'ngay_cai' => $tg,
						'reactions' => 1,
						'like_default' => $arrayName['so_luong_co'],
						'post_default' => $arrayName['so_post_dung'],
						'speed_like' => $arrayName['so_luong_lan'],
						'package' => $arrayName['so_luong_co'],
						'note' => 'cài đặt qua API'
					);
					

					
					if($this->db->insert('vip_reactions', $arrayName)){

						$add_api = $this->m_api->add_viplike($arr_formated);
						
						if($add_api['type'] == 'success'){


							$this->m_func->wait_server('add');

							$this->m_func->noti(true, 'Cài đặt thành công ! bạn có thể thêm lịch sử giao dịch ở phần tổng quan !');

								$this->m_ctv->chi_tieu_thang($this->session->userdata('ctv_id'), $thanh_tien);
								$this->m_ctv->add_activity($this->session->userdata('ctv_id'), 'add', 'vip_reactions', $thanh_tien, $this->db->insert_id());

							$this->m_func->tru_tien($this->session->userdata('ctv_id'), $thanh_tien, 'ctv');

						}else{
								//exit('Khong vao server duoc');
								$this->m_func->noti(false, $add_api['mess']);
								$this->db->where('id', $this->db->insert_id());
								$this->db->delete('vip_reactions');
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
		
		$data = array(
			'title' => 'Cài đặt VIP Reactions',
			'data' => array(
				'info_member' => $this->info_member ,
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name() ,
					'hash' => $this->security->get_csrf_hash()
				),
				'package' => $this->m_reactions->get_package($this->info_member['type_acc'])
			) ,
			'script' => 'script/CTV/Service/Vip/reactions',
			'view' => 'CTV/Service/Vip/reactions'
		);


		$this->load->view('CTV/layout', $data, FALSE);
	}
	public function QuanLyKhachHang(){

		if($this->input->get('chinh_sua') != ''){

			$input = (int)$this->input->get('chinh_sua');
			$this->db->where('user_creat', $this->session->userdata('ctv_id'));
			$this->db->where('id', $input);
			$get = $this->db->get('vip_reactions');
			if($get->num_rows() > 0){


				$data_khachhang = $get->result_array()[0];
				$this->data_khachhang = $data_khachhang;
				$data_package = $this->m_reactions->get_info_package($data_khachhang['package_id'], $this->info_member['type_acc']);
				if($this->input->get('tinh_tien_update') != ''){
					if($data_package == false){
						$thanh_tien = $this->m_reactions->tinh_tien(0, 0);
					}else{
						$tg = (int)$this->input->get('tinh_tien_update');
						if($data_khachhang['loai_acc_tuong_tac'] == 1){
							$gia = $data_package['gia_nguoithat'];
						}else{
							$gia = $data_package['gia_clone'];
						}
						$thanh_tien = $this->m_reactions->tinh_tien($tg, $gia);
					}

					
					header('Content-Type: application/json');
					exit(json_encode($thanh_tien));
				}
				if($this->input->post('name_vip') !=''){
					//Check giới hạn
					if($this->m_func->wait_server()){
						$this->m_func->noti(false, 'Bạn phải đợi 1 phút để thực hiện hành động tiếp theo.');
						exit($this->m_func->noti_result());
					}
					$this->form_validation->set_rules('name_vip', 'Tên VIP', 'required|min_length[5]|max_length[100]|xss_clean');
					$this->form_validation->set_rules('cam_xuc', 'Cảm xúc', 'callback_check_camxuc');
					$this->form_validation->set_rules('time_cai', 'Thời gia cài', 'required|integer|less_than_equal_to[999]|greater_than_equal_to[0]');					
					$this->form_validation->set_rules('ghi_chu', 'Ghi chú', 'required|min_length[5]|max_length[200]|xss_clean');
					$this->form_validation->set_rules('so_luong_dung', 'Số like dùng', 'required');
					$this->form_validation->set_rules('khoang_cach_moi_lan', 'khoảng cách mỗi lần', 'required');
					$this->form_validation->set_rules('so_luong_lan', 'Số lượng lần', 'required');
					$this->form_validation->set_rules('so_post_dung', 'Số post dùng', 'required');
					$this->form_validation->set_rules('package_id', 'Package ID', 'required|callback_check_package_update');
					$this->form_validation->set_rules('url_or_uid', 'Link hoặc UID', 'required|callback_check_url_update');
					$this->form_validation->set_rules('tuoi_tu', 'Độ tuổi tương tác từ', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');

					$this->form_validation->set_rules('tuoi_den', 'Độ tuổi tương tác đến', 'required|greater_than_equal_to[14]|less_than_equal_to[84]');
					$this->form_validation->set_rules('gioi_tinh', 'Giới tính', 'greater_than_equal_to[0]|less_than_equal_to[2]');
					$this->form_validation->set_rules('active', 'Hoạt động', 'greater_than_equal_to[0]|less_than_equal_to[1]');
					if ($this->form_validation->run() == TRUE) {


							if($data_khachhang['time_use'] - time() < 0){
								$time_default = time();
							}else{
								$time_default = $data_khachhang['time_use'];
							}

							$data_package = $this->m_reactions->get_info_package($this->data_khachhang['package_id'], $this->info_member['type_acc']);
							if($data_package == false){
								$thanh_tien   = 0;
								if($time_default == 0){
									$this->m_func->noti(false, 'Bạn không thể gia hạn vì gói like này đã bị xóa ! Vui lòng xóa khách hàng này rồi cài lại gói mới !');
									exit($this->m_func->noti_result());
								}
								$time_plus = 0;

							}else{

								$tg = (int)$this->input->post('time_cai');
								if($this->data_khachhang['loai_acc_tuong_tac'] == 1){
									$gia = $data_package['gia_nguoithat'];
								}else{
									$gia = $data_package['gia_clone'];
								}
								$thanh_tien = $this->m_reactions->tinh_tien($tg, $gia)['tien_da_giam'];
								$time_plus = $tg * 86400;
							}
						
						//Kiem tra tai khoan
						if($this->m_func->check_tien($thanh_tien, $this->session->userdata('ctv_id'), 'ctv')){

							$cx = $this->input->post('cam_xuc');
							$cx_string = '';
							for ($i=0; $i < count($cx); $i++) { 
								$cx_string.= $cx[$i].'|';
							}
							$cx_string = rtrim($cx_string, '|');


							$this->load->model('m_server');



							$link_server = $this->m_server->get_url_by_id($data_khachhang['server_luu_tru'], 'server_vip');

							$arrayName = array(

								'uid_vip' 		=> $this->uid,
								'name_vip' 		=> $this->input->post('name_vip'),
								'so_luong_dung' => $this->input->post('so_luong_dung'),
								'so_luong_co' 	=> $data_khachhang['so_luong_co'],
								'so_post_dung' => $this->input->post('so_post_dung'),
								'so_post_co' =>  $data_khachhang['so_post_co'],
								'cam_xuc_su_dung' => $cx_string,
								'loai_acc_tuong_tac' =>  $data_khachhang['loai_acc_tuong_tac'],
								'so_luong_lan' => $this->input->post('so_luong_lan'),
								'khoang_cach_moi_lan' =>  $this->input->post('khoang_cach_moi_lan'),
								'tuoi_tu' =>  $this->input->post('tuoi_tu'),
								'tuoi_den' => $this->input->post('tuoi_den'),
								'gioi_tinh' =>  $this->input->post('gioi_tinh'),
								'time_use' => $time_default + $time_plus,
								'ghi_chu' =>  $this->input->post('ghi_chu'),
								'server_luu_tru' => $data_khachhang['server_luu_tru'],
								'package_id' => $data_khachhang['package_id'],
								'user_creat' => $this->session->userdata('ctv_id'),
								'time_creat' => time(),
								'active' => $this->input->post('active')
							);

							$arr_formated = array(
								'edit_id' =>  $this->uid, 
								'name_vip' => $this->input->post('name_vip'),
								'like_use' => $this->input->post('so_luong_dung'),
								'speed_like' => $this->input->post('so_luong_lan'),
								'active' => $this->input->post('active'),
								'reactions' => 1,
								'gia_han' => $tg,
							);

							$this->db->where('id', $data_khachhang['id']);
							if($this->db->update('vip_reactions', $arrayName)){

								$api_post = $this->m_api->update_viplike($arr_formated);
								
								if($api_post['type'] == 'success'){

									$this->m_func->wait_server('add');
									$this->m_func->noti(true, 'Đã cập nhật thành công ! Bạn có thể xem lịch sử giao dịch để biết thêm thông tin');

									$this->m_ctv->chi_tieu_thang($this->session->userdata('ctv_id'), $thanh_tien);
									$this->m_ctv->add_activity($this->session->userdata('ctv_id'), 'update', 'vip_reactions', $thanh_tien, $data_khachhang['id']);

										//Trừ tiền 
										$this->m_func->tru_tien($this->session->userdata('ctv_id'), $thanh_tien, 'ctv');
								}else{
									$this->m_func->noti(false, 'Thông báo đến admin ! Khách cài ko cần để ý chỉ biết lỗi là được : ' .$api_post['mess']);
								}

							}else{
								$this->m_func->noti(false, 'Hệ thống đang gặp vấn đề ! Thử lại sau ít phút !' );
							}


						

						}else{
							$this->m_func->noti(false, 'Tài khoản của bạn không đủ để gia hạn');
						}



					}else{
						$this->m_func->noti(false, validation_errors());
					}


					exit($this->m_func->noti_result());
				}				
				$data = array(
					'title' => 'Quản lý khách hàng VIP',
					'data' => array(
						'info_member' => $this->info_member ,
						'csrf' => array(
							'name' => $this->security->get_csrf_token_name() ,
							'hash' => $this->security->get_csrf_hash()
						),
						'data_khachhang' => $data_khachhang,
						'data_package'  => $data_package
					) ,
					'script' => 'script/CTV/Service/Vip/edit_reactions',
					'view' => 'CTV/Service/Vip/edit_reactions'
				);


				$this->load->view('CTV/layout', $data, FALSE);


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
			$get = $this->db->get('vip_reactions');
			if($get->num_rows() > 0){
				
				$me_cx = $get->result_array()[0];
				//$this->load->model('m_server');
				//$link_server = $this->m_server->get_url_by_id($me_cx['server_luu_tru'], 'server_vip');
				$this->db->where('id', $input);
				$delete = $this->db->delete('vip_reactions');
				if($delete){



					//$curl = $this->m_func->curl_api($link_server.'/api/vip_reactions.php?type=delete&id_main='.$input.'', 'GET');

					$this->db->where('id', $input);
					$get_ff = $this->db->get('vip_reactions');
					
						

						$this->m_api->delete_viplike($me_cx['uid_vip']);

						$this->m_func->noti(true, 'Đã xóa thành công !');


					

					
					
				}else{
					$this->m_func->noti(false, 'Không thể xóa ! dsadsd');
				}

				exit($this->m_func->noti_result());
			}

		}else{
			$data = array(
				'title' => 'Quản lý khách hàng VIP',
				'data' => array(
					'info_member' => $this->info_member ,
					'csrf' => array(
						'name' => $this->security->get_csrf_token_name() ,
						'hash' => $this->security->get_csrf_hash()
					),

					'data_kh' => $this->m_reactions->get_ds_kh($this->info_member['id'])
				) ,
				'assets' => array(
					'css' => array('/assets/plugins/DataTables/datatables.min.css'),
					'script' => array('/assets/plugins/DataTables/datatables.min.js')
				), 
				'script' => 'script/CTV/Service/Vip/quanli_reactions',
				'view' => 'CTV/Service/Vip/quanli_reactions'
			);


			$this->load->view('CTV/layout', $data, FALSE);
		}



	}


	function check_url($url){
		$uid = $this->m_func->get_uid_from_url($url);

		if($uid == FALSE){
			$this->form_validation->set_message('check_url', 'URL không hợp lệ hoặc do lỗi ! Thử lại sau');
			return FALSE;
		}else{
			$this->db->where('uid_vip', $uid);
			$this->db->where('user_creat', $this->session->userdata('ctv_id'));
			if($this->db->get('vip_reactions')->num_rows() > 0){
				$this->form_validation->set_message('check_url', 'Khách hàng đã tồn tại trên hệ thống');
				return FALSE;
			}else{
				$this->uid = $uid;
				return TRUE;
				
			}
		}
	}

	function check_url_update($url){
		$uid = $this->m_func->get_uid_from_url($url);

		if($uid == FALSE){
			$this->form_validation->set_message('check_url', 'URL không hợp lệ hoặc do lỗi ! Thử lại sau');
			return FALSE;
		}else{
			$this->uid = $uid;
			return TRUE;

		}
	}

	function check_package($id){
			$id = (int)$id;
			$get = $this->m_reactions->get_info_package($id, $this->info_member['type_acc']);


			if($get == FALSE){
				$this->form_validation->set_message('check_package', '{field} hiện tại không tồn tại !');
				return FALSE;
			}else{
				if($this->input->post('so_luong_dung') > $get['so_luong']){
					$this->form_validation->set_message('check_package', 'Số lượng dùng không được lớn hơn số like tối đa của gói');
					return FALSE;
					
				}
				if($this->input->post('so_post_dung') > $get['max_post']){
					$this->form_validation->set_message('check_package', 'Số post dùng không được lớn hơn số post tối đa của gói');
					return FALSE;
					
				}

				$sl = $get['so_luong'] / 3;

				if($this->input->post('so_luong_lan')>$sl){
					$this->form_validation->set_message('check_package', 'Số like mỗi lần phải lớn hơn '.$sl.'');
					return FALSE;
					
				}
				if($this->input->post('so_post_dung') > $get['max_post']){
					$this->form_validation->set_message('check_package', 'Số post dùng không được lớn hơn số post tối đa của gói');
					return FALSE;
				}	

				return TRUE;
			}
	}
	function check_package_update($id){
			$id = (int)$id;
			if($id != $this->data_khachhang['package_id']){
				$this->form_validation->set_message('check_package_update', 'Package này không được bạn cài đặt ! ');
				return FALSE;
			}
			$get = $this->m_reactions->get_info_package($id, $this->info_member['type_acc']);

				if($this->input->post('so_luong_dung') > $this->data_khachhang['so_luong_co']){
					$this->form_validation->set_message('check_package_update', 'Số lượng dùng không được lớn hơn số like tối đa của gói');
					return FALSE;
					
				}
				if($this->input->post('so_post_dung') > $this->data_khachhang['so_post_co']){
					$this->form_validation->set_message('check_package_update', 'Số post dùngkhông được lớn hơn số post tối đa của gói');
					return FALSE;
					
				}

				$sl = $this->data_khachhang['so_luong_dung'] / 3;

				if($this->input->post('so_luong_lan') > $sl){
					$this->form_validation->set_message('check_package_update', 'Số like mỗi lần phải nhỏ hơn '.$sl.'');
					return FALSE;
				}


				if($this->input->post('so_post_dung') > $this->data_khachhang['so_post_co']){
					$this->form_validation->set_message('check_package_update', 'Số post dùng không được lớn hơn số post tối đa của gói');
					return FALSE;
				}	

				return TRUE;
			
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
}

/* End of file Reactions.php */
/* Location: ./application/controllers/CTV/Services/Vip/Reactions.php */



 


