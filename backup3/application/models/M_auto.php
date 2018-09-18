<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auto extends CI_Model {

	function check_kha_dung($table, $type ='check'){
		$this->db->where('id_fb', $this->session->userdata('id'));
		$get = $this->db->get($table);
		$result = array(
			'status' => false,
			'data' => ''
		);
		if($get->num_rows() > 0){
			$info = $get->result_array()[0];
			if(time() >= $info['time_run']){
				$result = array(
					'status' => true
				);
				if($type == 'add'){
					$this->db->where('id_fb', $this->session->userdata('id'));
					$update = array(
						'time_run' => time() + 30*60
					);
					$this->db->update($table, $update);
				}

			}else{
				$result = array(
					'status' => false,
					'data' => $info['time_run'] - time()
				);
			}

			
		}else{
			if($type == 'add'){
				$insert = array(
					'id_fb' => $this->session->userdata('id'),
					'time_creat' => time(),
					'time_run' => time() + 30*60
				);
				$this->db->insert($table, $insert);
			}

			$result = array(
				'status' => true
			);
			
		}
		return $result;
	}

}

/* End of file M_auto.php */
/* Location: ./application/models/M_auto.php */