
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_quanli extends CI_Model {

	function get_info_ctv($id){
		$this->db->where('id', $id);
		return $this->db->get('ctv_acc')->result_array()[0];
	}

}

/* End of file M_quanli.php */
/* Location: ./application/models/quanli/M_quanli.php */