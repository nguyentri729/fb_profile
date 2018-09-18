<?php session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$username = $_SESSION['username'];
$uid = $_SESSION['uid'];
$money = $_SESSION['money'];
$level = $_SESSION['level'];
$idbot = $_SESSION['idbot'];
ini_set('max_execution_time', 0);
require_once '../xacnhan2.php';
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME);
mysqli_set_charset($conn,'utf8');
//$orin = trim($_SERVER['HTTP_ORIGIN']);
if(!isset($_SESSION['username'])){
    die("LOGIN");    
}

if($_POST['id'] ){
    $id = str_replace(array('<',"'",'>','?','/',"\\",'--','eval','php'),array('','','','','','','','',''),strtoupper($_POST['id']));
    if(preg_match('#[^0-9]#',$id)){
        die();
    }
    deleteuserbot($id,$username);
    addhistoryuser($uid,"DELETE BOT","$username đã xoá $id khỏi hệ thống tương tác!");
    sendnoti($idbot,"Bạn đã xoá $id khỏi hệ thống tương tác!");
}



function deleteuserbot($uid,$username){
      global $conn;
      mysqli_query($conn, "DELETE FROM `botreaction` WHERE `uid`='$uid' AND `addby`='$username'");    
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
function addhistoryuser($uid,$type,$status){
      global $conn;
      $nows = strtotime(date('Y-m-d H:i:s'));
      mysqli_query($conn, "INSERT INTO `historyuser`(`uid`, `status`, `time`,`type`) VALUES ('$uid','$status','$nows','$type')");    
} ?>