
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->m_func->check_login()){
			redirect('/Dashboard');
		}
	}
	public function index()
	{
		$data = array();
		$this->load->view('pages/login_member', $data, FALSE);
	}
	public function ajax(){

		if($this->input->get('access_token') !=''){

			$result = array(
				'status' => false,
				'msg'    => 'error code 1'
			);
			$token = $this->input->get('access_token');
			//check access token
			$profile = $this->m_facebook->check_token($token);

			if($profile != false){

				$this->db->where('id_fb', $profile['id']);
				$get = $this->db->get('members');
				if($get->num_rows() > 0){
					$this->db->where('id_fb', $profile['id']);
					$arr_update = array(
						'name'  => $profile['name'],
						'access_token' => $token,
						'time_last_login' => time(),
						'active' => 1
					);
					if($this->db->update('members', $arr_update)){
						$result = array(
							'status' => true,
							'msg'    => 'Đăng nhập thành công ! Đợi xíu chuyển trang'
						);

					}else{
						$result = array(
							'status' => false,
							'msg'    => 'Lỗi hệ thống ! Quay lại sau'
						);
					}

				}else{

					$arr_insert = array(
						'id_fb' => $profile['id'],
						'name'  => $profile['name'],
						'access_token' => $token,
						'cookie' => '',
						'fb_dtsg' => '',
						'money' => 0,
						'chatfuel_id' => '',
						'time_creat' => time(),
						'time_last_login' => time(),
						'active' => 1
					);
					if($this->db->insert('members', $arr_insert)){
							$result = array(
							'status' => true,
							'msg'    => 'Đăng nhập thành công ! Nhấn OK để tiếp tục !'
							);
					}else{
						$result = array(
							'status' => false,
							'msg'    => 'Lỗi hệ thống ! Quay lại sau'
						);
					}

				}
			}else{
				$result = array(
					'status' => false,
					'msg'    => 'Mã access token không thể sử dụng !'
				);

			}
			if($result['status']){
				$this->session->set_userdata('id_fb', $profile['id']);
			}
			$this->m_func->return_json($result);
		}
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */