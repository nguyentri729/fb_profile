
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckToken extends CI_Controller {

	public function index(){
		$delete = 0; $success = 0;
		
		set_time_limit(0);
		$get= $this->db->query("SELECT * FROM access_token WHERE location IS NULL order by rand() LIMIT 20");
		foreach ($get->result_array() as $token) {
		
			$profile = json_decode($this->m_func->curl_api("https://graph.facebook.com/me?access_token={$token['access_token']}&method=GET"), true);
			if(isset($profile['id'])){
				$this->db->where('id', $token['id']);
				$this->db->update('access_token', array('location' => $profile['locale']));
				$success++;
			}else{
				$this->db->where('id', $token['id']);
				$this->db->delete('access_token');
				$delete++;
			}
		}
		echo 'success: '.$success; 
		echo '<br>';
		echo 'fail: '.$delete;
	}

}

/* End of file CheckToken.php */
/* Location: ./application/controllers/Dev/CheckToken.php */