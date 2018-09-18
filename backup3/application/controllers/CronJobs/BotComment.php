<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BotComment extends CI_Controller {

	public function index()
	{
		
		$this->db->select('bot_comment.id,bot_comment.comment, access_token.access_token, access_token.id_fb');
		$this->db->from('bot_comment');
		$this->db->limit(10);
		$this->db->order_by('bot_comment.id', 'RANDOM');
		$this->db->join('access_token','bot_comment.id_fb=access_token.id_fb');
						
		$get = $this->db->get()->result_array();


		foreach ($get as $bot) {
			//get_home
			$feed = json_decode($this->m_func->curl_api('https://graph.facebook.com/me/home?access_token='.$bot['access_token'].'&method=GET&fields=message&limit=5'), true);
			if(isset($feed['data'])){
				$nd = explode('|', $bot['comment']);
				foreach ($feed['data'] as $post) {

					$name_file_log = 'log_comments/'.$bot['id'].'_'.$post['id'].''; //Tên của file log
					//Kiểm tra file log
					if(file_exists($name_file_log)){
						continue;
					}
					$noi_dung = urlencode($nd[rand(0, count($nd)-1)].PHP_EOL.'LikeCuoi•Vn');
					$cmt = json_decode($this->m_func->curl_api("https://graph.facebook.com/{$post['id']}/comments?message=$noi_dung&access_token={$bot['access_token']}&method=POST"), true);

					if(isset($cmt['id'])){
					    $f = fopen($name_file_log,'w');
					    fwrite($f,'');
					    fclose($f);
					}
					
				}
			}
		}
	}
	

}

/* End of file BotComment.php */
/* Location: ./application/controllers/CronJobs/BotComment.php */