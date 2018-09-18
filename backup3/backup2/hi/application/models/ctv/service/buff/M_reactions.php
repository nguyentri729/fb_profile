<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reactions extends CI_Model {

	function get_gia($sl, $loai, $type_clone){
		$this->db->where('dich_vu', 'buff_reactions');
		$get = $this->db->get('bang_gia_buff');
		if($get->num_rows() > 0){
			$data_bang_gia = $get->result_array()[0];
			switch ($loai) {
				case '1':
					if($type_clone == 1){
						$gia = $data_bang_gia['gia_that_ctv'];
					}else{
						$gia = $data_bang_gia['gia_that_dl'];
					}
					break;
				case '0':
					if($type_clone == 1){
						$gia = $data_bang_gia['gia_clone_ctv'];
					}else{
						$gia = $data_bang_gia['gia_clone_dl'];
					}
					break;
				default:
					$gia = 99999999999999999;
					break;
			}
			if($sl >= 1000 AND $sl <= 2000){
				$giam_gia = 2;
			}elseif ($sl >= 2000 AND $sl <= 5000) {
				$giam_gia = 5;
			}elseif($sl >= 10000){
				$giam_gia = 10;
			}else{
				$giam_gia = 0;
			}
			$tien_chua_giam = $gia * $sl;
			$so_tien_giam = ($tien_chua_giam / 100) * $giam_gia;
			$tien_da_giam = $tien_chua_giam - $so_tien_giam;
			$tt = array(
				'tien_chua_giam' => $tien_chua_giam,
				'so_tien_giam'   => $so_tien_giam,
				'tien_da_giam'   => $tien_da_giam
			);
			return $tt;
		}else{
			return false;
		}




	}

}

/* End of file M_like.php */
/* Location: ./application/models/ctv/service/buff/M_like.php */