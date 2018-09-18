<?php session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$username = $_SESSION['username'];
$uid = $_SESSION['uid'];
$money = $_SESSION['money'];
ini_set('max_execution_time', 0);
require_once '../xacnhan2.php';
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME);
mysqli_set_charset($conn,'utf8');
//$orin = trim($_SERVER['HTTP_ORIGIN']);
if(!isset($_SESSION['username'])){
    die("LOGIN");    
}

if($_POST['id']){
    $id = str_replace(array('<',"'",'>','?','/',"\\",'--','eval','php'),array('','','','','','','','',''),strtoupper($_POST['id']));
    //if(preg_match('#[^0-9]#',$id)){
    //    die();
    //}
    $datatoken = getdatatoken(50,$username,$id);
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
              <img src="icon/'.$type.'.png">
            </div>
            <div class="content">
              <div class="date">
                '.date("d/m/Y H:i:s",$time).'
              </div>
              <div class="summary">
                    thể hiện cảm xúc bài viết <a href="https://fb.com/'.$status.'">'.$status.'</a>
              </div>
            </div>
            </div>        
            ';
        }else{
            echo '
            <div class="event">
            <div class="label">
              <i class="comment icon"></i>
            </div>
            <div class="content">
              <div class="date">
                '.date("d/m/Y H:i:s",$time).'
              </div>
              <div class="summary">
                    bình luận bài viết <a href="https://fb.com/'.$status.'">'.$status.'</a>
              </div>
            </div>
            </div>        
            ';
        }
    }
}


function getdatatoken($limit = 5,$useradd,$id){
      global $conn;
      //$nows = strtotime(date('Y-m-d H:i:s'));
      $result = mysqli_query($conn, "SELECT * FROM `historybot` WHERE `uid`='$id' AND `useradd`='$useradd' ORDER BY `time` DESC LIMIT $limit");
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