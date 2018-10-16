<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoPost extends CI_Controller {

	public function index()
	{
		header('Content-Type: application/json');
		$time_st = time();
		$this->db->select('posts.*, members.access_token');
		$this->db->from('posts');
		$this->db->where("auto_post.time_use > $time_st");
		$this->db->where("posts.time_post < $time_st");
		$this->db->where("posts.active = 1");
		$this->db->join('auto_post', 'auto_post.id_fb = posts.id_fb');
		$this->db->join('members', 'auto_post.id_fb = members.id_fb');
		$query = $this->db->get();
		echo json_encode($query->result_array());
		


	}
	private function get_token($id_fb){
		$this->db->where('id_fb', $id_fb);
		$get = $this->db->get('members');
		if($get->num_rows() > 0){
			return $get->result_array()[0]['access_token'];
		}else{
			return false;
		}
	}

}

/* End of file AutoPost.php */
/* Location: ./application/controllers/CronJobs/AutoPost.php */