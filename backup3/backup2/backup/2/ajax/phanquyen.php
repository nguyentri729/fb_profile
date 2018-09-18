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
    
if( $username != '' && $_POST['username'] && $_POST['type'] ){
$usernamex = str_replace(array('<',"'",'>','?','/',"\\",'--',')','(','eval','php'),array('','','','','','','','','','',''),strtolower($_POST['username']));
$type = str_replace(array('<',"'",'>','?','/',"\\",'--',')','(','eval','php'),array('','','','','','','','','','',''),$_POST['type']);
    if($usernamex == "admin"){
        die("Không thể chỉnh level của ADMIN!");
    }
    if($type != 1 && $type != 2){
        die("??");
    }
    editquyen($usernamex,$type);
    addhistoryuser($uid,"EDIT LEVEL","$username đã chỉnh level $type cho $usernamex");
    echo "Xong!";
}

function editquyen($username,$type){
      global $conn;
      mysqli_query($conn, "UPDATE `taikhoanhethongvip` SET `level`='$type' WHERE `username`='$username'");
}
function addhistoryuser($uid,$type,$status){
      global $conn;
      $nows = strtotime(date('Y-m-d H:i:s'));
      mysqli_query($conn, "INSERT INTO `historyuser`(`uid`, `status`, `time`,`type`) VALUES ('$uid','$status','$nows','$type')");    
} ?>