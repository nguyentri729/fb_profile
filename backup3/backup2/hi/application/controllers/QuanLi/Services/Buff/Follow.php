

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Follow extends CI_Controller {
	public $info_member = '';
	public $uid_page = '';
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('quanli') == FALSE){
			redirect('/QuanLi/Login');
			exit;
		}
		$this->load->model('ctv/service/buff/m_like', 'm_like');
		$this->load->model('m_captcha', 'm_captcha');
		
		
	}
	public function index()
	{
		
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
				
				$get = $this->db->get('buff_follow');
				if($get->num_rows() > 0){

					$this->load->model('m_server');
					//Lấy server
					$link_server = $this->m_server->get_url_by_id($get->result_array()[0]['server_luu_tru'], 'server_buff');
					$status_arr = json_decode($this->m_func->curl_api($link_server.'/api/buff_follow.php?type=view_status&id_main='.$id.'', 'GET'), true);
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
			'title' => 'Dịch vụ tăng follow',
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
			'script' => 'script/CTV/Service/Buff/follow',
			'view' => 'QuanLi/Service/Buff/follow'
		);
		$this->load->view('QuanLi/layout', $data, FALSE);
	}

	function check_url($url){
		$uid = $this->m_func->get_uid_from_url($url);

		if($uid == FALSE){
			$this->form_validation->set_message('check_url', 'URL không hợp lệ hoặc do lỗi ! Thử lại sau');
			return FALSE;
		}else{
			$this->uid_page = $uid;
			return TRUE;
		}
	}
}

/* End of file Reactions.php */
/* Location: ./application/controllers/CTV/Services/Bot/Reactions.php */