<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{	
		if($this->input->cookie('c_email') != '' AND $this->input->cookie('c_session') != ''){
			$this->db->where('c_session', $this->input->cookie('c_session'));
			$get = $this->db->get('ctv_sessions');
			if($get->num_rows() > 0){
				$this->db->where('c_session', $this->input->cookie('c_session'));
				$this->db->delete('ctv_sessions');
			}
		}
		 delete_cookie('c_email');
		 delete_cookie('c_session');
		 session_unset('ctv_id');
		 redirect('/CTV/Login');
		 
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/CTV/Logout.php */