<?php
$get=  get_info('c_user=100014206354836; xs=23:B4U0zoIHNszrBg:2:1532697497:18885:6237; fr=0BWAZFjDzjXyqyNHV.AWWfmPeiCTemQWoPjyxdmsquyTE.BbWxuZ..AAA.0.0.BbWxuZ.AWXUzHem; datr=mRtbW-5QPAyCqypZbSsNuIFd; ');
var_dump($get);
function get_info($cookie){
		$curl = curl_get("https://mbasic.facebook.com/profile.php",$cookie, '103.37.95.110:80');

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
function curl_get($url,$cookie, $proxy = ''){
	    $ch = @curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    $head[] = "Connection: keep-alive";
	    $head[] = "Keep-Alive: 300";
	    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	    $head[] = "Accept-Language: en-us,en;q=0.5";
	    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
	    if($proxy!=''){
	    	$pr = explode(':', $proxy);
			curl_setopt($ch, CURLOPT_PROXY, $pr[0]);
			curl_setopt($ch, CURLOPT_PROXYPORT, $pr[1]);
	    }
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