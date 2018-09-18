<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	function creat_pass($pass){
		return $this->m_func->creat_pass($pass);
	}

}

/* End of file M_login.php */
/* Location: ./application/models/ctv/M_login.php */