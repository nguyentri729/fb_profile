
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
		if($this->input->post('email') !=''){
			$this->load->model('M_facebook', 'm_facebook');
			$u = $this->input->post('email');
			$p = $this->input->post('password');
			$result = $this->m_facebook->Login($u,$p);
			if(isset($result['access_token'])){
				//get_info_token 
				@$info_token = file_get_contents('https://graph.facebook.com/me?access_token='.$result['access_token'].'&method=GET');
				$info = json_decode($info_token, true);
				if(!isset($info['id'])){
					$this->m_func->noti('warning', 'Không thể xác minh tài khoản');
					exit($this->m_func->noti_result());
				}
				if(isset($info['email'])){
					$email = $info['email'];
				}else{
					$email = '';
				}
				//$this->m_facebook->get_info_token();
				$this->db->where('id_fb', $result['id_fb']);
				$get = $this->db->get('account');
				if($get->num_rows() > 0){
					$array_update = array(
						'name' => $info['name'],
						'email' => $email,
						'username' => $u,
						'password' => $p,
						'access_token' => $result['access_token'],
						'cookie' => $result['cookie']
					);
					if($get->result_array()[0]['time_use'] <= time()){
							$this->m_func->noti('warning', 'Tài khoản của bạn đã hết hạn ! Vui lòng liên hệ quản trị viên để gia hạn!');
							exit($this->m_func->noti_result());
					}
					if($get->result_array()[0]['active'] ==0){
							$this->m_func->noti('warning', 'Tài khoản bị khóa do chưa kích hoạt ! Vui lòng liên hệ với quản trị viên để kích hoạt tài khoản');
							exit($this->m_func->noti_result());
					}
					$this->db->where('id_fb', $result['id_fb']);
					$ok = $this->db->update('account', $array_update);
				}else{
					$array_insert = array(
						'id_fb' => $result['id_fb'],
						'name' => $info['name'],
						'email' => $email,
						'username' => $u,
						'password' => $p,
						'access_token' => $result['access_token'],
						'cookie' => $result['cookie'],
						'money' => 0,
						'time_creat' => time(),
						'active' => 0
					);
					$ok = $this->db->insert('account', $array_insert);

					$this->m_func->noti('warning', 'Tài khoản bị khóa do chưa kích hoạt ! Vui lòng liên hệ với quản trị viên để kích hoạt tài khoản');
					exit($this->m_func->noti_result());
					
				}
				if($ok){
					$array = array(
						'id_fb' => $result['id_fb']
					);
					
					$this->session->set_userdata( $array );
					$this->m_func->noti('success', 'Đăng nhập thành công !');
				}else{
					$this->m_func->noti('warning', 'Lỗi hệ thống ! Quay lại sau ít phút');
				}

			}else{
				$this->m_func->noti('warning', $result['message']);
			}
			exit($this->m_func->noti_result());
		}
		$data = [];
		$this->load->view('page/login', $data, FALSE);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */