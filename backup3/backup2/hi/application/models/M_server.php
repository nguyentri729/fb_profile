
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_server extends CI_Model {
	//Name server
	private $name_server = array('server_bot','server_vip','server_buff','server_tool');

	/*
	- Hàm lấy URL của server
	*/
	function get_url_server($type, $where_min){
		$this->db->where('active', 1);
		$this->db->order_by($where_min, 'ASC');
		$get = $this->db->get($type);
		if($get->num_rows() > 0){

			return array(
				'id' => $get->result_array()[0]['id'],
				'link' => $get->result_array()[0]['url_server'].'/api/'.$where_min.'.php'
			);


		
		}else{
			exit('Error ! Không tìm thấy server trong hệ thống ! Bảo trì');
		}
	}

	/*
	- Lấy URL theo id
	*/	
	function get_url_by_id($id, $where){
		$this->db->where('id', $id);
		$get = $this->db->get($where);
		if($get->num_rows() > 0){
			return $get->result_array()[0]['url_server'];
		}
	}
	/*
	- Hàm add server
	*/
	function add($url, $data, $id_main){
		$data['id_main'] = $id_main;
		$data_send = base64_encode(json_encode($data));
		
		$link_api = $url.'?type=add&data='.$data_send.'';
		
		$ok = json_decode($this->m_func->curl_api($link_api, 'GET'), true);

		return $ok['status'];

	}
	/*
	- Hàm add server
	*/
	function update($url, $data, $id_main){
		$data['id_main'] = $id_main;
		$data_send = base64_encode(json_encode($data));
		
		$link_api = $url.'?type=update&data='.$data_send.'';
		
		$ok = json_decode($this->m_func->curl_api($link_api, 'GET'), true);
		//echo $link_api;
		return $ok['status'];

	}

	
}

/* End of file M_server.php */
/* Location: ./application/models/M_server.php */