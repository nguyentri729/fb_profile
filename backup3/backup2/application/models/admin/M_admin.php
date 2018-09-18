<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	function tong_thanh_vien(){
		return $this->db->get('ctv_acc')->num_rows();
	}
	function tong_tien(){
		$this->db->select_sum('money', 'tien');
        return $this->db->get('ctv_acc')->result_array()[0]['tien'];
	}
	function tong_khach(){
		return $this->db->get('bot_reactions')->num_rows() + $this->db->get('bot_comment')->num_rows() + $this->db->get('vip_reactions')->num_rows() + $this->db->get('vip_comment')->num_rows();

	}
	function tong_buff(){
		return $this->db->get('buff_like')->num_rows() + $this->db->get('buff_follow')->num_rows() + $this->db->get('buff_rate')->num_rows() + $this->db->get('buff_reactions')->num_rows()+ $this->db->get('buff_share')->num_rows();
	}
	function get_name_ctv($id){
		$this->db->where('id', $id);
		$get = $this->db->get('ctv_acc');
		if($get->num_rows() >0){
			return $get->result_array()[0]['name'];
		}else{
			return 'Unknown';
		}
	}
	function string_activity($id_ctv,$action_type, $where_action,$id_action, $money, $time_creat){
		switch ($action_type) {
			case 'add':
				$action = 'thêm';
				break;
			case 'update':
				$action = 'cập nhật';
				break;
			case 'login':
				$action = 'đăng nhập';
				break;
			default:
				$action = 'không rõ';
				break;
		}
		switch ($where_action) {
			case 'vip_reactions':
				$where = 'vip cảm xúc';
				break;
			case 'vip_comment':
				$where = 'vip bình luận';
				break;
			case 'bot_reactions':
				$where = 'bot cảm xúc';
				break;
			case 'bot_comment':
				$where = 'bot bình luận';
				break;
			case 'buff_like':
				$where = 'tăng like';
				break;
			case 'buff_share':
				$where = 'tăng chia sẻ';
				break;
			case 'buff_follow':
				$where = 'tăng theo dõi';
				break;
			case 'buff_follow':
				$where = 'tăng rate';
				break;
			case 'buff_follow':
				$where = 'tăng like';
				break;
			default:
				$where = 'không rõ';
				break;
		}
		$tien = number_format($money).' đ ';
		$this->load->helper('date');
		$tg = mdate('%H:%i - %d/%m/%Y', $time_creat).'('.$this->m_func->timeAgo($time_creat).')';
		$string = $this->get_name_ctv($id_ctv)." đã $action ở mục $where hết $tien vào $tg.";
		return $string;
	}

}

/* End of file M_admin.php */
/* Location: ./application/models/admin/M_admin.php */