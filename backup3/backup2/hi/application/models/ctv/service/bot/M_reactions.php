<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reactions extends CI_Model {

	function thanh_tien($thoi_gian, $id){


		if($this->m_func->info_member($id, 'ctv')['type_acc'] == 2){
			$type = 'dai_ly';
		}else{
			$type = 'ctv';
		}

		$get_gia = $this->m_func->get_gia('bot_reactions', $type);
		


		if($thoi_gian >= 60 AND $thoi_gian <= 120){
			$giam_gia = 10;
		}elseif ($thoi_gian >= 120 AND $thoi_gian < 360) {
			$giam_gia = 12;
		}elseif($thoi_gian >= 360){
			$giam_gia = 20;
		}else{
			$giam_gia = 0;
		}

		$tien_chua_giam = $get_gia * $thoi_gian;
		$so_tien_giam = ($tien_chua_giam / 100) * $giam_gia;
		$tien_da_giam = $tien_chua_giam - $so_tien_giam;


		
		$tt = array(
			'tien_chua_giam' => $tien_chua_giam,
			'so_tien_giam'   => $so_tien_giam,
			'tien_da_giam'   => $tien_da_giam
		);
		return $tt;
	}		
	function get_dskhach($id){
		$this->db->order_by('id', 'desc');
		$this->db->where('user_creat', $id);
		return $this->db->get('bot_reactions')->result_array();
	}

}

/* End of file M_reactions.php */
/* Location: ./application/models/ctv/service/bot/M_reactions.php */