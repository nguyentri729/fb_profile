
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
		$this->load->model('ctv/service/vip/m_comment', 'm_comment');
	}
	public function index()
	{
		//Delete khách hàng
		if ($this->input->get('delete_kh') != ''){
			//Check giới hạn
			if($this->m_func->wait_server()){
				$this->m_func->noti(false, 'Bạn phải đợi 1 phút để thực hiện hành động tiếp theo.');
				exit($this->m_func->noti_result());
			}
			$input = (int)$this->input->get('delete_kh');
			//Get ds
			
			$this->db->where('id', $input);
			$get = $this->db->get('vip_comment');
			if($get->num_rows() > 0){
				$me_cx = $get->result_array()[0];
				$this->load->model('m_server');
				$link_server = $this->m_server->get_url_by_id($me_cx['server_luu_tru'], 'server_vip');
				$this->db->where('id', $input);
				$delete = $this->db->delete('vip_comment');
				if($delete){

					$curl = $this->m_func->curl_api($link_server.'/api/vip_comment.php?type=delete&id_main='.$input.'', 'GET');
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
		}


		//Edit khach hàng
		if($this->input->get('chinh_sua') != ''){
			$input = (int)$this->input->get('chinh_sua');
			$get = $this->db->get('vip_comment');
			if($get->num_rows() > 0){
				$data_khachhang = $get->result_array()[0];
				$this->data_khachhang = $data_khachhang;
				//get info ctv
				$this->info_member = $this->m_quanli->get_info_ctv($get->result_array()[0]['user_creat']);
				$data_package = $this->m_comment->get_info_package($data_khachhang['package_id'], $this->info_member['type_acc']);
				//Get tinh tien
				if($this->input->get('tinh_tien_update') != ''){
					if($data_package == false){
						$thanh_tien = $this->m_comment->tinh_tien(0, 0);
					}else{
						$tg = (int)$this->input->get('tinh_tien_update');
						if($data_khachhang['loai_acc_tuong_tac'] == 1){
							$gia = $data_package['gia_nguoithat'];
						}else{
							$gia = $data_package['gia_clone'];
						}
						$thanh_tien = $this->m_comment->tinh_tien($tg, $gia);
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
					$this->form_validation->set_rules('user_creat', 'Người tạo', 'required|callback_check_usercreat');
					$this->form_validation->set_rules('gioi_tinh', 'Giới tính', 'greater_than_equal_to[0]|less_than_equal_to[2]');
					$this->form_validation->set_rules('active', 'Hoạt động', 'greater_than_equal_to[0]|less_than_equal_to[1]');
					if ($this->form_validation->run() == TRUE) {

						if($data_khachhang['time_use'] - time() < 0){
							$time_default = time();
						}else{
							$time_default = $data_khachhang['time_use'];
						}



						$this->load->model('m_server');



						$link_server = $this->m_server->get_url_by_id($data_khachhang['server_luu_tru'], 'server_vip');

						$data_package = $this->m_comment->get_info_package($this->data_khachhang['package_id'], $this->info_member['type_acc']);
						if($data_package == false){
								$time_plus = 0;
						}else{
							$tg = (int)$this->input->post('time_cai');
							$time_plus = $tg * 86400;
						}

						$link_server = $this->m_server->get_url_by_id($data_khachhang['server_luu_tru'], 'server_vip');

						$arrayName = array(
								'uid_vip' 		=> $this->uid,
								'name_vip' 		=> $this->input->post('name_vip'),
								'so_luong_dung' => $this->input->post('so_luong_dung'),
								'so_luong_co' 	=> $data_khachhang['so_luong_co'],
								'so_post_dung' => $this->input->post('so_post_dung'),
								'so_post_co' =>  $data_khachhang['so_post_co'],
								
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
								'user_creat' => $this->input->post('user_creat'),
								'time_creat' => time(),
								'active' => $this->input->post('active')
						);
						$this->db->where('id', $data_khachhang['id']);
						if($this->db->update('vip_comment', $arrayName)){
							if($this->m_server->update($link_server.'/api/vip_comment.php', $arrayName, $data_khachhang['id'])){
									$this->m_func->wait_server('add');
									$this->m_func->noti(true, 'Đã cập nhật thành công ! Bạn có thể xem lịch sử giao dịch để biết thêm thông tin');
							}else{
								$this->m_func->noti(false, 'Server con của chúng tôi đang gặp vấn đề ! Vui lòng thử lại sau ít phút !');
							}
						}else{
							$this->m_func->noti(false, 'Hệ thống đang gặp vấn đề ! Thử lại sau ít phút !' );
						}




						//$this->m_func->noti(true, 'Cac lon boi');
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
					'script' => 'script/CTV/Service/Vip/edit_comment',
					'view' => 'QuanLi/Service/Vip/edit_comment'
				);
				$this->load->view('QuanLi/layout', $data, FALSE);
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
					'data_kh' => $this->db->get('vip_comment')->result_array()
				),
				'assets' => array(
					'css' => array('/assets/plugins/DataTables/datatables.min.css'),
					'script' => array('/assets/plugins/DataTables/datatables.min.js')
				), 
				'script' => 'script/CTV/Service/Vip/quanli_comment',
				'view' => 'QuanLi/Service/Vip/quanli_comment'
			);
			$this->load->view('QuanLi/layout', $data, FALSE);
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
	function check_package_update($id){
			$id = (int)$id;
			if($id != $this->data_khachhang['package_id']){
				$this->form_validation->set_message('check_package_update', 'Package này không được bạn cài đặt ! ');
				return FALSE;
			}
			$get = $this->m_comment->get_info_package($id, $this->info_member['type_acc']);

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

/* End of file Comment.php */
/* Location: ./application/controllers/QuanLi/DichVu/Comment.php */