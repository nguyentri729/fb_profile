<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	function creat_pass($pass){
		return $this->m_func->creat_pass($pass);
	}
	function login($email ='', $pass = '', $remember = false, $return_type = 'noti'){

		$this->db->where('email', $email);
		$this->db->where('password', $pass);
		$get = $this->db->get('ctv_acc');
		if($get->num_rows() > 0){
			if($get->result_array()[0]['active'] == 0){
				if($return_type == 'boolean'){
					return false;
				}else{
					$this->m_func->noti(false, 'Tài khoản của bạn đã bị khóa, vui lòng liên hệ với QTV để được hỗ trợ.');
				}
				
			}else{

				$login_session = array(
					'ctv_id' => $get->result_array()[0]['id']
				);
				if($remember == false){
				   $this->load->helper('string');
			       $email_set = array(
			           'name'   => 'c_email',
			           'value'  => $email,                            
			           'expire' => '7200',                                                                                   
			           'secure' => FALSE
			       );
			       $c_session = md5('123'.random_string('alnum', 10).'abc');
			       $session_set = array(
			           'name'   => 'c_session',
			           'value'  => $c_session,                            
			           'expire' => '7200',                                                                          
			           'secure' => FALSE
			       );

				}else{
				   $this->load->helper('string');
			       $email_set = array(
			           'name'   => 'c_email',
			           'value'  => $email,                            
			           'expire' => '9999999',                                                                                   
			           'secure' => FALSE
			       );
			       $c_session = md5('123'.random_string('alnum', 10).'abc');
			       $session_set = array(
			           'name'   => 'c_session',
			           'value'  => $c_session,                            
			           'expire' => '9999999',                                                                          
			           'secure' => FALSE
			       );
				}

			       //Get user agent
			       $ss_agent = $this->m_func->user_agent();
			       $ctv_ss = array(
					'c_email'=> $email,
					'c_session'=> $c_session,
					'ip_creat'=> $this->input->ip_address(),
					'user_agent'=> $ss_agent['agent'],
					'platform'=> $ss_agent['platform'],
					'time_creat'=> time()
			       );
			       if($this->db->insert('ctv_sessions', $ctv_ss)){
				       $this->input->set_cookie($email_set);
				       $this->input->set_cookie($session_set);
			       }
				$this->session->set_userdata( $login_session );
				if($return_type == 'boolean'){
					return true;
				}else{
					$this->m_func->noti(true, 'Đăng nhập thành công ! Đợi chuyển trang');
				}
			}
		}else{
			if($return_type == 'boolean'){
				return false;
			}else{
				$this->m_func->noti(false, 'Email hoặc mật khẩu không đúng');
			}
		}
	}

}

/* End of file M_login.php */
/* Location: ./application/models/ctv/M_login.php */