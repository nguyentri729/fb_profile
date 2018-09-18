<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	function __construct(){
		parent::__construct();
		header('Content-Type: application/json');
	}
	public function get_comment()
	{

		if($this->input->get('id') !=''){
			$result = array(
				'status' => false, 
			);
			$id_main = (int)$this->input->get('id');
			
			$this->db->limit(1);
			$this->db->order_by('id', 'RANDOM');
			$this->db->where('id_main', $id_main);
			$get = $this->db->get('vip_comment_noi_dung');
			if($get->num_rows() > 0){
				$result = array(
					'status' => true, 
					'data' => $get->result_array()[0]
				);
			}

			echo json_encode($result);
			
		}
	}

}

/* End of file Comment.php */
/* Location: ./application/controllers/API/Bot/Comment.php */