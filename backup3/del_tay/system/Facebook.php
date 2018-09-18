<?php
/**
* Facebook Class
*/
class Facebook
{
	public function curl_url($url){
	    $ch = @curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_ENCODING, '');
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'Expect:'
	    ));
	    $page = curl_exec($ch);
	    curl_close($ch);
	    return $page;
	}
	
	public function convert_token_to_cookie($token){
		$get_app = json_decode($this->curl_url('https://graph.facebook.com/app?access_token='.$token.''), true);
		if(isset($get_app['id'])){
			$get_cookie = json_decode($this->curl_url('https://api.facebook.com/method/auth.getSessionforApp?access_token='.$token.'&format=json&new_app_id='.$get_app['id'].'&generate_session_cookies=1'), true);
			if(isset($get_cookie['session_cookies'])){
				$ss_cookies = $get_cookie['session_cookies'];
				$cookie = $ss_cookies[0]['name'].'='.$ss_cookies[0]['value'].'; '.$ss_cookies[1]['name'].'='.$ss_cookies[1]['value'].'; '.$ss_cookies[2]['name'].'='.$ss_cookies[2]['value'].'; '.$ss_cookies[3]['name'].'='.$ss_cookies[3]['value'].'; ';
				return $cookie;
			}
		}else{
			return false;
		}
	}
	public function post_data_cookie($site,$data,$cookie, $browser = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36'){
	    $datapost = curl_init();
	    $headers = array("Expect:");
	    curl_setopt($datapost, CURLOPT_URL, $site);
	    curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
	    curl_setopt($datapost, CURLOPT_HEADER, TRUE);
	    curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($datapost, CURLOPT_USERAGENT, $browser);
	    curl_setopt($datapost, CURLOPT_POST, TRUE);
	    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($datapost, CURLOPT_COOKIE,$cookie);
	    ob_start();
	    return curl_exec ($datapost);
	    ob_end_clean();
	    curl_close ($datapost);
	    unset($datapost); 
	}
	public function curl_post($url, $method, $postinfo, $cookie_file_path, $proxy = ''){

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_HEADER, true);
	    curl_setopt($ch, CURLOPT_NOBODY, false);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_COOKIE, $cookie_file_path);
	    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    
	    if($proxy!=''){
	    	$pr = explode(':', $proxy);
			curl_setopt($ch, CURLOPT_PROXY, $pr[0]);
			curl_setopt($ch, CURLOPT_PROXYPORT, $pr[1]);
		/*
	    	curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);*/
	    }
	    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	    if ($method == 'POST') {
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
	    }
	    $html = curl_exec($ch);
	  	$code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);
	    return $code;
	}
	public function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	public function get_info($cookie){
		$curl = $this->curl_get("https://mbasic.facebook.com/profile.php",$cookie);

		if(preg_match('#name="fb_dtsg" value="(.+?)"#is',$curl, $_jickme)){
		        $fb_dtsg = $_jickme[1];
		}
		if(preg_match('#name="target" value="(.+?)"#is',$curl, $_jickme)){
		        $id = $_jickme[1];
		 }
		if(empty($fb_dtsg) || empty($id)){
		      return false;
		}else{
			  $return_array = array(
			  	'id_fb' => $id,
			  	'fb_dtsg' => $fb_dtsg
			  );
			  return $return_array;
		}
	}
	public function curl_get($url,$cookie){
	    $ch = @curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    $head[] = "Connection: keep-alive";
	    $head[] = "Keep-Alive: 300";
	    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	    $head[] = "Accept-Language: en-us,en;q=0.5";
	    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
	    curl_setopt($ch, CURLOPT_ENCODING, '');
	    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'Expect:'
	    ));
	    $page = curl_exec($ch);
	    curl_close($ch);
	    return $page;
	}
}
$fb = new Facebook; 