<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_thongke extends CI_Model {

	function num_row($table){
		return $this->db->get($table)->num_rows();
	}	

}

/* End of file M_thongke.php */
/* Location: ./application/models/quanli/M_thongke.php */