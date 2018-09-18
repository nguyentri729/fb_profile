
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_captcha');

	}
	public function index()
	{
		if($this->m_func->check_login('admin') == TRUE){
			
			redirect('/Admin/Dashboard');
			exit;
			
		}else{
			if($this->input->post()){
					$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
					$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[8]|max_length[50]');
					$this->form_validation->set_rules('captcha', 'Mật khẩu', 'required');

					if ($this->form_validation->run() == TRUE) {
						$check_captcha = $this->m_captcha->check_captcha($this->input->post('captcha'));
						if($check_captcha['status']){
							$email = $this->input->post('email');
							$password = $this->m_func->creat_pass($this->input->post('password'));
	
							$this->db->where('email', $email);
							$this->db->where('password', $password);
							$get = $this->db->get('admin_acc');
							if($get->num_rows() > 0){

								if($get->result_array()[0]['active'] == 0){	
									$this->m_func->noti(false, 'Tài khoản của bạn đã bị khóa, vui lòng liên hệ với QTV để được hỗ trợ.');
								}else{

										$login_session = array(
											'admin_id' => $get->result_array()[0]['id']
										);
										$this->session->set_userdata( $login_session );
										$this->m_func->noti(true, 'Đăng nhập thành công ! Đợi chuyển trang');
								}

							}else{
								$this->m_func->noti(false, 'Email hoặc mật khẩu không đúng');
							}
						}else{
							$this->m_func->noti(false, 'Captcha không hợp lệ');
						}
					}else{
						$this->m_func->noti(false, validation_errors());
					}
				exit($this->m_func->noti_result());
			}
			$data = array(
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
	        		'hash' => $this->security->get_csrf_hash()
				),
				'captcha' => $this->m_captcha->creat_captcha()
			);
			$this->load->view('Admin/login', $data, FALSE);	
		}

	}
	public function Logout(){
		session_destroy();
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Admin/Login.php */