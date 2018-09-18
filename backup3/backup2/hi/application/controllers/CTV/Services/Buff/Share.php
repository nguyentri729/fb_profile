
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Share extends CI_Controller {
	public $info_member = array();
	public $uid_page = '';
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('ctv') == FALSE){
			redirect('/CTV/Login');
			exit;
		}

		$this->load->model('ctv/service/buff/m_share', 'm_share');
		$this->load->model('m_captcha', 'm_captcha');

		$this->info_member = $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv');
		if($this->input->get('tinh_tien') !=''){
			$sl = (int)$this->input->get('tinh_tien');
			$loai = (int)$this->input->get('loai');
			header('Content-Type: application/json');
			exit(json_encode($this->m_share->get_gia($sl, $loai, $this->info_member['type_acc'])));
		}

	}
	public function index()
	{

		if($this->input->post()){
			if($this->m_func->wait_server()){
				$this->m_func->noti(false, 'Bạn phải đợi 1 phút để thực hiện hành động tiếp theo.');
				exit($this->m_func->noti_result());
			}
			$this->form_validation->set_rules('url_or_uid', 'Link hoặc UID', 'required|callback_check_url');
			$this->form_validation->set_rules('ghi_chu', 'Ghi chú', 'required|min_length[5]|max_length[200]|xss_clean');
			$this->form_validation->set_rules('so_luong', 'Số lượng', 'required|integer|less_than_equal_to[999999]|greater_than_equal_to[100]');
			$this->form_validation->set_rules('loai_mua', 'Loại mua', 'greater_than_equal_to[0]|less_than_equal_to[1]');
			if ($this->form_validation->run() == TRUE) {
				$sl = (int)$this->input->post('so_luong');
				$loai = (int)$this->input->post('loai_mua');
				$thanh_tien = $this->m_share->get_gia($sl, $loai, $this->info_member['type_acc'])['tien_da_giam'];

				if($this->m_func->check_tien($thanh_tien, $this->session->userdata('ctv_id'), 'ctv')){

					$this->load->model('m_server');
					$server  = $this->m_server->get_url_server('server_buff', 'buff_share');



					$arrayName = array(
						'uid'=> $this->uid_page,
						'so_luong'=> $sl,
						'type_clone'=> $loai,
						'ghi_chu' => $this->input->post('ghi_chu'),
						'user_creat'=> $this->session->userdata('ctv_id'),
						'time_creat'=> time(),
						'server_luu_tru'=> $server['id'],
						'active'   => 1
					);

					$array_add = array(
						'uid'=> $this->uid_page,
						'so_luong'=> $sl,
						'type_clone'=> $loai,
						'user_creat'=> $this->session->userdata('ctv_id'),
						'time_creat'=> time(),
						'server_luu_tru'=> $server['id'],
						'active'   => 1
					);
					if($this->db->insert('buff_share', $arrayName)){


						if($this->m_server->add($server['link'], $array_add, $this->db->insert_id())){


							$this->m_func->wait_server('add');
							$this->m_func->noti(true, 'Đã thêm thành công ! ID này đang trong quá trình xử lý.');
							$this->m_func->tru_tien($this->session->userdata('ctv_id'), $thanh_tien, 'ctv');
							$this->m_ctv->chi_tieu_thang($this->session->userdata('ctv_id'), $thanh_tien);

							$this->m_ctv->add_activity($this->session->userdata('ctv_id'), 'add', 'buff_share', $thanh_tien, $this->db->insert_id());

						}else{
							$this->m_func->noti(false, 'Server con của chúng tôi đang gặp vấn đề ! Vui lòng thử lại sau ít phút !');
							$this->db->where('id', $this->db->insert_id());
							$this->db->delete('buff_reactions');
						}
						
					}else{
						$this->m_func->noti(true, 'Hệ thống đang bận ! Thử lại sau !');
					}
					

				}else{
					$this->m_func->noti(false, 'Tài khoản của bạn không đủ để giao dịch');
				}
				
				

			}else{
				$this->m_func->noti(false, validation_errors());
			}
			
			exit($this->m_func->noti_result());
		}
		if($this->input->get('get_captcha') !=''){
			header('Content-Type: application/json');
			$captcha = $this->m_captcha->creat_captcha();
			exit(json_encode(array('image' => $captcha['image'])));
		}
		if($this->input->get('id_view') !=''){
			$id = (int)$this->input->get('id_view');
			$captcha = $this->input->get('captcha');

			if($this->m_captcha->check_captcha($captcha)['status']){
				$this->db->where('id', $id);
				$this->db->where('user_creat', $this->session->userdata('ctv_id'));
				$get = $this->db->get('buff_share');
				if($get->num_rows() > 0){

					$this->load->model('m_server');
					//Lấy server
					$link_server = $this->m_server->get_url_by_id($get->result_array()[0]['server_luu_tru'], 'server_buff');
					$status_arr = json_decode($this->m_func->curl_api($link_server.'/api/buff_share.php?type=view_status&id_main='.$id.'', 'GET'), true);
					if($status_arr['status']){
						 $this->load->helper('date');
						$a = $status_arr['data'];

						$da_dap_ung = number_format($a['da_dap_ung']);
						$so_luong = number_format($a['so_luong']);
						$time_buff_next = mdate('%H:%i - %d/%m/%Y', $a['time_run']);

						$this->m_func->noti(true, "<b>ID: </b> {$a['uid']}<br><b>Đã đáp ứng được: </b> {$da_dap_ung}/{$so_luong}<br><b>Lần buff tiếp theo lúc: </b> {$time_buff_next}<br>");
					}else{
						$this->m_func->noti(false, 'Lỗi không thể lấy dữ liệu');
					}
					
				}else{
					$this->m_func->noti(false, 'Lỗi không thể lấy dữ liệu');
				}
			}else{
				$this->m_func->noti(false, 'Captcha không hợp lệ');
			}

			exit($this->m_func->noti_result());
		}
		$data =  array(
			'title' => 'Dịch vụ tăng chia sẻ',
			'data'  => array(
				'info_member' => $this->info_member,
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
	        		'hash' => $this->security->get_csrf_hash()
				)
			),
			'assets' => array(
				'css' => array('/assets/plugins/DataTables/datatables.min.css'),
				'script' => array('/assets/plugins/DataTables/datatables.min.js')
			), 
			'script' => 'script/CTV/Service/Buff/share',
			'view' => 'CTV/Service/Buff/share'
		);
		$this->load->view('CTV/layout', $data, FALSE);
	}
	function check_url($url){
		$this->uid_page = $url;
		return true;
	}

}

/* End of file Reactions.php */
/* Location: ./application/controllers/CTV/Services/Vip/Reactions.php */