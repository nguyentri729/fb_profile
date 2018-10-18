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
		$this->db->where("posts.posted = 0");
		$this->db->join('auto_post', 'auto_post.id_fb = posts.id_fb');
		$this->db->join('members', 'auto_post.id_fb = members.id_fb');
		$query = $this->db->get();
		echo json_encode($query->result_array());

	}
	public function PostDone($id){
		$this->db->where('id', $id);
		$posts = $this->db->get('posts');
		if($posts->num_rows() > 0){
			$result_post = $posts->result_array()[0];
			
			if($result_post['time_repeat'] > 0){
				$time_repeat = $result_post['time_repeat'] * 60;
				$this->db->query("UPDATE posts SET time_repeat = time_repeat + {$time_repeat} WHERE id  = $id");
			}else{
				$this->db->where('id', $id);
				$this->db->update('posts', array(
					'posted' => 1
				));
			}
		}
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