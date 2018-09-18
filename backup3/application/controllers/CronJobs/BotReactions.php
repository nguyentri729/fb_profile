
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BotReactions extends CI_Controller {

	public function index()
	{
		
		$this->db->select('bot_reactions.reactions, access_token.access_token, access_token.id_fb');
		$this->db->from('bot_reactions');
		$this->db->limit(10);
		$this->db->order_by('bot_reactions.id', 'RANDOM');
		$this->db->join('access_token','bot_reactions.id_fb=access_token.id_fb');
						
		$get = $this->db->get()->result_array();


		foreach ($get as $bot) {
			//get_home
			$feed = json_decode($this->m_func->curl_api('https://graph.facebook.com/me/home?access_token='.$bot['access_token'].'&method=GET&fields=message&limit=5'), true);
			if(isset($feed['data'])){
				foreach ($feed['data'] as $post) {

					if($bot['reactions'] == 'SMART'){
						if(isset($post['message'])){
							$cam_xuc = $this->smart_reactions($post['message']);
						}else{
							$cam_xuc = 'LIKE';
						}
						
					}else{
						$cam_xuc = $bot['reactions'];
					}
					$this->m_func->curl_api("https://graph.facebook.com/{$post['id']}/reactions?type=$cam_xuc&access_token={$bot['access_token']}&method=POST");
				}
			}
		}
	}
	function smart_reactions($nd = ''){
		if(preg_match("(yêu|thương|tim|thả tim|<3|ny|đáng yêu|thả tim|tym|anh yêu|vk|ck|ny|love|chồng|vợ|hay|😘)", $nd)){
			return 'LOVE';
		}
		if(preg_match("(đánh vợ|bạo hành|đánh vợ|phẫn nộ|K bằng con chó|tức)", $nd)){
			return 'ANGRY';
		}
		if(preg_match("(😂|:V|hihi|haha|hi|jav|😜)", $nd)){
			return 'HAHA';
		}
		if(preg_match("(wow|ohh|ghê vậy hả|thật kinh ngạc|ngạc nhiên|vậy luôn|vãi lờ|kinh vậy|kinh dị)", $nd)){
			return 'WOW';
		}
		if(preg_match("(nghèo|hoàn cảnh khó khăn|mất|ra đi|hảo tâm|tấm lòng hảo tâm|hội từ thiện|buồn|cần tâm sự)", $nd)){
			return 'SAD';
		}
		return 'LIKE';
	}

}

/* End of file BotReactions.php */
/* Location: ./application/controllers/CronJobs/BotReactions.php */