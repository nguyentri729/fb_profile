<?php session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$username = $_SESSION['username'];
$uid = $_SESSION['uid'];
$money = $_SESSION['money'];
$level = $_SESSION['level'];
ini_set('max_execution_time', 0);
require_once '../xacnhan2.php';
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME);
mysqli_set_charset($conn,'utf8');
//$orin = trim($_SERVER['HTTP_ORIGIN']);
if(!isset($_SESSION['username'])){
    die("LOGIN");
}

if(true){
    //$id = str_replace(array('<',"'",'>','?','/',"\\",'--','eval','php'),array('','','','','','','','',''),strtoupper($_POST['id']));
    //if(preg_match('#[^0-9]#',$id)){
    //    die();
    //}
    $datatoken = getdatatoken(200,$uid,$username);
    //var_dump($datatoken);
    $cdt = count($datatoken);
    for($r = 0 ; $r < $cdt ;$r++){
        $time = $datatoken[$r]['time'];
        $uuid = $datatoken[$r]['id'];
        $status = $datatoken[$r]['status'];
        $type = $datatoken[$r]['type'];
        if($type != "comment"){
            echo '
            <div class="event">
            <div class="label">
              <img src="https://graph.facebook.com/'.$uuid.'/picture?type=large&amp;redirect=true&amp;width=200&amp;height=200">
            </div>
            <div class="content">
              <div class="date">
                '.date("d/m/Y H:i:s",$time).'
              </div>
              <div class="summary">
                    '.$status.'
              </div>
            </div>
            </div>        
            ';
        }
    }
}


function getdatatoken($limit = 5,$id,$username){
      global $conn;
      //$nows = strtotime(date('Y-m-d H:i:s'));
      if($username == "admin"){
        $result = mysqli_query($conn, "SELECT * FROM `historyuser` WHERE 1 ORDER BY `time` DESC LIMIT $limit");
      }else{
        $result = mysqli_query($conn, "SELECT * FROM `historyuser` WHERE  `uid`='$id' ORDER BY `time` DESC LIMIT $limit");
      }
      $kq = array();
      while ($row = $result->fetch_assoc()){
          $status = $row['status'];
          $id = $row['uid'];
          $time = $row['time'];
          $type = $row['type'];
          $kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
      }
    return $kq; 
}

function updatetimeupdate($uid,$nows){
      global $conn;
      mysqli_query($conn, "UPDATE `botreaction` SET `timeupdate`='$nows' WHERE `uid`='$uid'");    
} ?>