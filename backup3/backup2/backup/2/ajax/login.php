<?php session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('max_execution_time', 0);
require_once '../xacnhan2.php'; //lấy thông tin từ config
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME); // kết nối data
mysqli_set_charset($conn,'utf8');
//$orin = trim($_SERVER['HTTP_ORIGIN']);
//$BASEUs = str_replace("https","http",$BASEU);
//die(hihi1);
/*  =================== RUN ==================== RUN =================== */
//if($_POST['u'] && $_POST['p'] && $orin == $BASEU || $orin == $BASEUs){
    if($_POST['u'] && $_POST['p']){
//die(hihi);
$u = str_replace(array('<',"'",'>','?','/',"\\",'--'),array('','','','','','',''),strtolower($_POST['u']));



$p = str_replace(array('<',"'",'>','?','/',"\\",'--'),array('','','','','','',''),$_POST['p']);
$check = checkuser($u,$p);
if($check == 0){
    die("Tài khoản hoặc mật khẩu không đúng.<br>Vui lòng nhập lại!");
}elseif($check == 1){
    $info = getinfouser($u,$p);
    $_SESSION['username'] = $u;
    $_SESSION['uid'] = $info['uid'];
    $_SESSION['money'] = $info['money'];
    $_SESSION['idbot'] = $info['idbot'];
    $_SESSION['level'] = $info['level'];
    die("true");
}

}else{
    die("false");
}


/*  =================== FUNCTION ==================== FUNCTION =================== */
function checkuser($u,$p){
      global $conn;
      $u = str_replace(array('<',"'",'>','?','/',"\\",'--','eval'),array('','','','','','','',''),$u);
      $p = str_replace(array('<',"'",'>','?','/',"\\",'--','eval'),array('','','','','','','',''),$p);
      $result = mysqli_query($conn, "SELECT `uid`, `username`, `password`, `money` FROM `taikhoanhethongvip` WHERE `username`='$u' AND `password`='$p' LIMIT 1");
      //$row = mysqli_fetch_assoc($result);
      $row = mysqli_num_rows($result);
      return $row;
}

function getinfouser($u,$p){
      global $conn;
      $u = str_replace(array('<',"'",'>','?','/',"\\",'--','eval'),array('','','','','','','',''),$u);
      $p = str_replace(array('<',"'",'>','?','/',"\\",'--','eval'),array('','','','','','','',''),$p);
      //$p = md5($p);
      $result = mysqli_query($conn, "SELECT * FROM `taikhoanhethongvip` WHERE `username`='$u' AND `password`='$p'");
      $row = mysqli_fetch_assoc($result);
      $money = $row['money'];
      $uid = $row['uid'];
      $idbot = $row['idbot'];
      $level = $row['level'];
      return array('uid'=>$uid,'money'=>$money,'idbot'=>$idbot,'level'=>$level);
} ?>