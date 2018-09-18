<?php

class Test extends CI_Controller {
      public function index(){

		echo $this->m_func->creat_pass('12345678');

      }

	function get_uid_from_url($url){
		
		$url_arr = parse_url($url);
		$uid = '';
		
		if(isset($url_arr['path'])){
			if($url_arr['path'] == '/profile.php'){
				
				if(isset($url_arr['query'])){
					
					parse_str($url_arr['query'], $ok);
					if(isset($ok['id'])){
						$uid = $ok['id'];
						
					}

				}
			}else{
				$username =  $url_arr['path'];
				$this->load->model('m_token');
				$token = $this->m_token->get_random_token();
				$uid = $this->m_graph->get_uid_from_username($username, $token);

			}
		}else{
			if(is_numeric($url)){
				$uid = $url;
			}
		}

		if(is_numeric($uid)){
			return $uid;
		}else{
			return false;
		}

	}

	function check_url($url){
		$url_arr = parse_url($url);
		$uid = '';
		if(isset($url_arr['path'])){
			if($url_arr['path'] == '/profile.php'){
				
				if(isset($url_arr['query'])){
					
					parse_str($url_arr['query'], $ok);
					if(isset($ok['id'])){
						$uid = $ok['id'];
					}

				}
			}else{
				$this->load->model('m_token');
				$token = $this->m_token->get_random_token();
				$uid = $this->m_graph->get_uid_from_username($url_arr['path'], $token);
			}
		}
		if(is_numeric($uid)){
			return $uid;
		}else{
			return false;
		}
	}


}