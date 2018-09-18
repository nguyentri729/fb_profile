<?php session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('max_execution_time', 0);
require_once '../xacnhan2.php'; //lấy thông tin từ config
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME); // kết nối data
mysqli_set_charset($conn,'utf8');
//$orin = trim($_SERVER['HTTP_ORIGIN']);
$username = $_SESSION['username'];
$level = $_SESSION['level'];
$uid = $_SESSION['uid'];

if( $username != '' && $_POST['old'] && $_POST['old'] != ''&& $_POST['new'] && $_POST['new'] != ''){
$old = str_replace(array('<',"'",'>','?','/',"\\",'--',')','(','eval','php'),array('','','','','','','','','','',''),$_POST['old']);
//$old = md5($old);
$new = str_replace(array('<',"'",'>','?','/',"\\",'--',')','(','eval','php'),array('','','','','','','','','','',''),$_POST['new']);
//$new = md5($new);
    if(checkpass($username,$old) == true){
        updatepass($username,$new);
        addhistoryuser($uid,"CHANGE PASS","đổi mật khẩu mới");
        die("Đổi mật khẩu thành công");
    }else{
        die("Mật khẩu sai!");
    }
}

function updatepass($username,$new){
      global $username;
      global $conn;
      mysqli_query($conn, "UPDATE `taikhoanhethongvip` SET `password`='$new' WHERE `username`='$username'");
}
function addhistoryuser($uid,$type,$status){
      global $conn;
      $nows = strtotime(date('Y-m-d H:i:s'));
      mysqli_query($conn, "INSERT INTO `historyuser`(`uid`, `status`, `time`,`type`) VALUES ('$uid','$status','$nows','$type')");    
}
function checkpass($username,$pass){
      global $conn;
      $result = mysqli_query($conn, "SELECT * FROM `taikhoanhethongvip` WHERE `username`='$username' AND `password`='$pass' LIMIT 1");
      $row = mysqli_num_rows($result);
      if($row == 1){
          return true;
      }elseif($row == 0){
          return false;
      }
} ?>