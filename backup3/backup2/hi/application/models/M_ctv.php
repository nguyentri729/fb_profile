<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ctv extends CI_Model {

	function chi_tieu_thang($user, $sotien){
		$this->db->query("UPDATE ctv_acc SET chi_tieu_thang = chi_tieu_thang + $sotien WHERE id = {$user}");
	}
	function add_activity($id, $action, $where, $money, $id_action){
		$arrayName = array(
			'user_creat' => $id,
			'action_type' => $action,
			'id_action' => $id_action,
			'where_action' => $where,
			'money' => $money,
			'time_creat' => time()
		);
		$this->db->insert('activity', $arrayName);
	}

	function string_activity($action_type, $where_action,$id_action, $money, $time_creat){
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
		$string = "Bạn đã $action ở mục $where hết $tien vào $tg.";
		return $string;
	}
	function tong_khach($id){
		$tong = 0;
		$this->db->where('user_creat', $id);
		$tong += $this->db->get('bot_reactions')->num_rows();
		$this->db->where('user_creat', $id);
		$tong += $this->db->get('bot_comment')->num_rows();
		$this->db->where('user_creat', $id);
		$tong += $this->db->get('vip_reactions')->num_rows();
		$this->db->where('user_creat', $id);
		$tong += $this->db->get('vip_comment')->num_rows();
		return $tong;
	}
}

/* End of file M_ctv.php */
/* Location: ./application/models/M_ctv.php */