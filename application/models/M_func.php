
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_func extends CI_Model {

	function return_json($arr, $exit = true){
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($arr);
		if($exit){
			exit();
		}
	}
	function check_login(){
		if($this->session->has_userdata('id_fb')){
			$id_fb = $this->session->userdata('id_fb');
			$this->db->where('id_fb', $id_fb);
			$get = $this->db->get('members');
			if($get->num_rows() > 0){
				if($get->result_array()[0]['active'] == 0){
					return false;
				}
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	//Function get gia
	function get_gia($loai = 'auto_post'){
		$this->db->where('dich_vu', $loai);
		$get = $this->db->get('bang_gia');
		if($get->num_rows() > 0){
			return $get->result_array()[0]['gia_ngay'];
		}else{
			return false;
		}
	}
	//Kiem tra tai khoan
	function check_money($tien = 0, $id_fb = ''){


		if($id_fb == ''){
			$this->db->where('id_fb', $this->session->userdata('id_fb'));
		}else{
			$this->db->where('id_fb', $id_fb);
		}
		
		$get = $this->db->get('members');
		if($get->num_rows() > 0){
			if($get->result_array()[0]['money'] >= round($tien)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	//ham tru tien
	function tru_tien($so_tien, $id_fb = ''){
		if($id_fb == ''){
			$this->db->where('id_fb', $this->session->userdata('id_fb'));
		}else{
			$this->db->where('id_fb', $id_fb);
		}
		$this->db->set('money', 'money -'.round($so_tien).'', FALSE);
		return $this->db->update('members');
	}
	//check ton tai trong bang
	function isset_table($table, $field, $value){
		$this->db->where($field, $value);
		$get = $this->db->get($table);
		if($get->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}



}

/* End of file M_func.php */
/* Location: ./application/models/M_func.php */