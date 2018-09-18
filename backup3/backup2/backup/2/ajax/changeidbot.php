<?php session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('max_execution_time', 0);
require_once '../xacnhan2.php'; //lấy thông tin từ config
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME); // kết nối data
mysqli_set_charset($conn,'utf8');
//$orin = trim($_SERVER['HTTP_ORIGIN']);
$username = $_SESSION['username'];

if( $username != '' && $_POST['idbot'] ){
$idbot = str_replace(array('<',"'",'>','?','/',"\\",'--',')','(','eval','php'),array('','','','','','','','','','',''),$_POST['idbot']);
    updateidbot($username,$idbot);
    echo "Đổi ID Bot thành công!";
}

function updateidbot($username,$idbot){
      global $username;
      global $conn;
      mysqli_query($conn, "UPDATE `taikhoanhethongvip` SET `idbot`='$idbot' WHERE `username`='$username'");
} ?>