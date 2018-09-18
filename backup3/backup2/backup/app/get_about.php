<?php

   $ok =  curl_post('https://ftios.vn/applications/main/ajax/action/store.php', 'POST', 'id=12', '_ga=GA1.2.1372609220.1532944041; _gid=GA1.2.1367197823.1532944041; PHPSESSID=5dedk5l43lbap7hj4g25hcb577; language=en; popup-store-about=stop; _gat_gtag_UA_114158385_2=1');
   var_dump($ok);
    function curl_post($url, $method, $postinfo, $cookie_file_path, $proxy = ''){
         $ch = curl_init();
       /* curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);*/
        curl_setopt($ch, CURLOPT_URL, $url);
       // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie_file_path);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36");
       
        
        if($proxy!=''){
            $pr = explode(':', $proxy);
            curl_setopt($ch, CURLOPT_PROXY, $pr[0]);
            curl_setopt($ch, CURLOPT_PROXYPORT, $pr[1]);
        /*
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);*/
        }
        //curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
        /*curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);*/
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
        }
       // curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        $html = curl_exec($ch);
        $code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $html;
    }