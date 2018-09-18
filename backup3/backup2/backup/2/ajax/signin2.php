<?php session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('max_execution_time', 0);
require_once '../xacnhan2.php'; //lấy thông tin từ config
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME); // kết nối data
mysqli_set_charset($conn,'utf8');
//$orin = trim($_SERVER['HTTP_ORIGIN']);
//$BASEUs = str_replace("https","http",$BASEU);
if(isset($_SESSION['username'])){
die("Vui lòng đăng xuất trước!");    
}

//if($_POST['u'] && $_POST['p'] && $_POST['idfb'] && $orin == $BASEU || $orin == //$BASEUs){
    if($_POST['u'] && $_POST['p'] && $_POST['idfb'] ){
$idfb = str_replace(array('<',"'",'>','?','/',"\\",'--','eval','php'),array('','','','','','','','',''),strtoupper($_POST['idfb']));
$u = str_replace(array('<',"'",'>','?','/',"\\",'--','eval','php'),array('','','','','','','','',''),strtolower($_POST['u']));
$p = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['p']);
$check = checkuser($u,$idfb);
if($check==1){
    die("Tài khoản này đã được đăng ký, vui lòng chọn tên khác!");
}
//$data = checkcode($code);
//    if(isset($data['uid'])){
        addhethong($idfb,$u,$p,'0');
//        deletecode($code);
//        sendnoti($data['idbot'],'Bạn đã đăng ký thành công. Tài khoản:'.$u);
        die("Thành công!<br>Vui lòng đăng nhập!");
//    }else{
//        die("CODE không đúng!<br>Vui lòng lấy ở Chatbot");
//    }
}else{
    die("false");
}


function sendnoti($id,$text){
$text = urlencode($text);
global $botid;
global $blockid;
global $TOKENCHATFUEL;
$api_url = "https://api.chatfuel.com/bots/$botid/users/$id/send?chatfuel_token=$TOKENCHATFUEL&chatfuel_block_id=$blockid&noti=$text";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url); 
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$response = curl_exec($ch); 
curl_close($ch); 
return $response;
}
function checkuser($u,$idfb){
      global $conn;
      $u = str_replace(array('<',"'",'>','?','/',"\\",'--'),array('','','','','','',''),$u);
      $result = mysqli_query($conn, "SELECT `uid`, `username`, `password`, `money` FROM `taikhoanhethongvip` WHERE `username`='$u' OR `uid`='$idfb' LIMIT 1");
      $row = mysqli_num_rows($result);
      return $row;
}
function checkcode($code){
      global $conn;
      $code = str_replace(array('<',"'",'>','?','/',"\\",'--'),array('','','','','','',''),$code);
      $result = mysqli_query($conn, "SELECT `uid`, `idbot` FROM `codesignin` WHERE `code`='$code' LIMIT 1");
      $row = mysqli_fetch_assoc($result);
      $uid = $row['uid'];
      $idbot = $row['idbot'];
      return array('uid'=>$uid,'idbot'=>$idbot);
}
function addhethong($uid,$username,$password,$idbot){
      global $conn;
      //$password = md5($password);
    //  die ("INSERT INTO `taikhoanhethongvip`(`uid`, `username`, `password`, `money`, `idbot`,`level`) VALUES ('$uid','$username','$password','0','$idbot','1')");
      mysqli_query($conn, "INSERT INTO `taikhoanhethongvip`(`uid`, `username`, `password`, `money`, `idbot`,`level`) VALUES ('$uid','$username','$password','0','$idbot','1')");
}
function deletecode($code){
      global $conn;
      mysqli_query($conn, "DELETE FROM `codesignin` WHERE `code`='$code'");
} ?>