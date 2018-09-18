
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reactions extends CI_Model {

	function get_package($where = 1){
		$this->db->where('doi_tuong_dung', $where);
		$this->db->where('active', 1);
		$this->db->where('type_package', 'reactions');
		return $this->db->get('package_vip')->result_array();
	}
	function tinh_tien($thoi_gian, $gia_ngay){

		$thanh_tien = $thoi_gian * $gia_ngay;
		if($thoi_gian >= 60 AND $thoi_gian <= 120){
			$giam_gia = 10;
		}elseif ($thoi_gian >= 120 AND $thoi_gian < 360) {
			$giam_gia = 12;
		}elseif($thoi_gian >= 360){
			$giam_gia = 20;
		}else{
			$giam_gia = 0;
		}
		$so_tien_giam = ($thanh_tien / 100) * $giam_gia;
		$tien_da_giam = $thanh_tien - $so_tien_giam;
		$tt = array(
			'tien_chua_giam' => $thanh_tien,
			'so_tien_giam'   => $so_tien_giam,
			'tien_da_giam'   => $tien_da_giam
		);
		return $tt;
	}
	function get_info_package($id, $where){
		$this->db->where('active', 1);
		$this->db->where('type_package', 'reactions');
		$this->db->where('id', $id);
		$this->db->where('doi_tuong_dung', $where);
		$get = $this->db->get('package_vip');
		if($get->num_rows() > 0){
			return $get->result_array()[0];
		}else{
			return false;
		}
	}
	function get_name_package($id){
		
		$this->db->where('type_package', 'reactions');
		$this->db->where('id', $id);
		
		$get = $this->db->get('package_vip');
		if($get->num_rows() > 0){
			return $get->result_array()[0]['name_package'];
		}else{
			return 'Unknown';
		}
	}

	function get_ds_kh($user_creat){
		$this->db->order_by('id', 'ASC');
		$this->db->where('user_creat', $user_creat);
		return $this->db->get('vip_reactions')->result_array();
	}
	

}

/* End of file M_reactions.php */
/* Location: ./application/models/ctv/service/vip/M_reactions.php */