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
if($level != "4"){
    die("Not Admin");
}
    
if( $username != '' && $_POST['username'] && $_POST['money'] ){
$usernamex = str_replace(array('<',"'",'>','?','/',"\\",'--',')','(','eval','php'),array('','','','','','','','','','',''),$_POST['username']);
$money = str_replace(array('<',"'",'>','?','/',"\\",'--',')','(','eval','php'),array('','','','','','','','','','',''),$_POST['money']);
    editmoney($usernamex,$money);
    addhistoryuser($uid,"EDIT MONEY","$username đã $money đ cho $usernamex");
    echo "Xong!";
}

function editmoney($username,$money){
      global $conn;
      mysqli_query($conn, "UPDATE `taikhoanhethongvip` SET `money`=(SELECT `money`)$money WHERE `username`='$username'");
}
function addhistoryuser($uid,$type,$status){
      global $conn;
      $nows = strtotime(date('Y-m-d H:i:s'));
      mysqli_query($conn, "INSERT INTO `historyuser`(`uid`, `status`, `time`,`type`) VALUES ('$uid','$status','$nows','$type')");    
} ?>