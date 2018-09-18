<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->m_func->check_login('ctv') == FALSE){
			redirect('/CTV/Login');
			exit;
		}
		$this->load->model('ctv/m_login', 'm_login');
	}
	public function index()
	{
		if($this->input->get('logout_all_session') == 'click'){
			$my_cookie = $this->input->cookie('c_session');
			$this->db->query("DELETE FROM `ctv_sessions` WHERE `c_session` != '$my_cookie'");
			redirect('/CTV/Profile');
		}
		if($this->input->post('old_pass') !=''){
			$this->form_validation->set_rules('old_pass', 'Mật khẩu cũ', 'required|min_length[6]|max_length[50]|callback_check_old_pass');
			$this->form_validation->set_rules('renew_pass', 'Nhập lại mật khẩu cũ', 'required|min_length[6]|max_length[50]');
			$this->form_validation->set_rules('new_pass', 'Mật khẩu mới', 'required|min_length[6]|max_length[50]|callback_check_new_pass');
			if ($this->form_validation->run() == TRUE) {
				$this->db->where('id', $this->session->userdata('ctv_id'));

				$pass_md5 = $this->m_login->creat_pass($this->input->post('renew_pass'));
				$this->db->where('id', $this->session->userdata('ctv_id'));
				if($this->db->update('ctv_acc', array('password' => $pass_md5))){
					$this->m_func->noti(true, 'Đổi mật khẩu thành công');
				}else{
					$this->m_func->noti(false, 'Lỗi khi đổi mật khẩu');
				}

			}else{
				$this->m_func->noti(false, validation_errors());
			}
			exit($this->m_func->noti_result());
		}
		$data =  array(

			'title' => 'Trang cá nhân',
			'data'  => array(
				'info_member' => $this->m_func->info_member($this->session->userdata('ctv_id'), 'ctv'),
				'csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
	        		'hash' => $this->security->get_csrf_hash()
				)
			),
			'script' => 'script/CTV/profile',
			'view' => 'CTV/profile'
		);
		$this->load->view('CTV/layout', $data, FALSE);
	}
	function check_old_pass($pass){
		
		$pass_md5 = $this->m_login->creat_pass($pass);
		$this->db->where('id', $this->session->userdata('ctv_id'));
		$this->db->where('password', $pass_md5);
		$get = $this->db->get('ctv_acc');
		if($get->num_rows() > 0){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_old_pass', '{field} không chính xác');
            return FALSE;			
		}
	}
	function check_new_pass($pass){
		if($pass != $this->input->post('renew_pass')){
			$this->form_validation->set_message('check_new_pass', '{field} không giống nhau');
            return FALSE;	
		}else{
			return TRUE;
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/CTV/Profile.php */