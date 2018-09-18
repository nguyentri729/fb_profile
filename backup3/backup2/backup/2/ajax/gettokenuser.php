<?php session_start();
require_once '../xacnhan2.php';
$username = $_SESSION['username'];
$orin = trim($_SERVER['HTTP_ORIGIN']);
if(!isset($username) || $orin != $BASEU){
    die();
}

//die(Login("100025080043362","BU@CojgdxYfMw3Ei"));
$data = Login($_POST['u'],$_POST['p']);
if(strpos($data,"\"access_token\":") == true){
    $data = json_decode($data,true);
    echo $token = $data["access_token"];
    //$cookie = "c_user=".$data["session_cookies"][0]["value"].";xs=".$data["session_cookies"][1]["value"].";";
    //echo $_GET['u']."|".$_GET['p']."|".$cookie."|".$token;
}else{
    $data = json_decode($data,true);
    echo $token = $data["error_msg"];
}

function Login($uid,$pass){
$pass = urlencode($pass);
$uid = urlencode($uid);
$samsung = rand(3,8);
$androidv = rand(1,6);
$serisim = rand(100000,999999);
$deviceid = RandString(8)."-".RandString(4)."-".RandString(4)."-".RandString(4)."-".RandString(12);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://b-api.facebook.com/method/auth.login",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "meta_inf_fbmeta=NO_FILE&adid=a5f0439bcbbd68f2&format=json&device_id=".$deviceid."&email=".$uid."&password=".$pass."&cpl=true&family_device_id=".$deviceid."&sim_serials=%5B%2289014103".$serisim."510720%22%5D&credentials_type=password&generate_session_cookies=1&error_detail_type=button_with_disabled&source=register_api&machine_id=g4BZWjyDlHsixf01CFa2dhiB&locale=vi_VN&client_country_code=US&method=auth.login&fb_api_req_friendly_name=authenticate&fb_api_caller_class=com.facebook.account.login.protocol.Fb4aAuthHandler&api_key=882a8490361da98702bf97a021ddc14d&access_token=350685531728%7C62f8ce9f74b12f84c123cc23437a4a32",
      CURLOPT_HTTPHEADER => array(
        "accept-encoding: gzip, deflate",
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded",
        "host: b-api.facebook.com",
        "user-agent: Dalvik/1.6.0 (Linux; U; Android 4.1.".$androidv."; Samsung Galaxy S".$samsung." - 4.1.".$androidv." - API 16 - 720x1280 Build/JRO03S) [FBAN/FB4A;FBAV/153.0.0.54.88;FBPN/com.facebook.katana;FBLC/vi_VN;FBBV/84570987;FBCR/Android;FBMF/Linux;FBBD/generic;FBDV/Samsung Galaxy S".$samsung." - 4.1.".$androidv." - API 16 - 720x1280;FBSV/4.1.1;FBCA/x86:unknown;FBDM/{density=2.0,width=720,height=1280};FB_FW/1;]",
        "x-fb-connection-quality: EXCELLENT",
        "x-fb-connection-type: WIFI",
        "x-fb-friendly-name: authenticate",
        "x-fb-http-engine: Liger",
        "x-fb-net-hni: 310260",
        "x-fb-sim-hni: 310270"
      ),
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
function RandString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} ?>