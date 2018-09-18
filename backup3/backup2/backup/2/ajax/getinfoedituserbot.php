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

if($_POST['id'] && $_POST['typeget'] ){
    $typeget = $_POST['typeget'];
    $id = str_replace(array('<',"'",'>','?','/',"\\",'--','eval','php'),array('','','','','','','','',''),strtoupper($_POST['id']));
    if($typeget == "token"){
        echo $datatoken = getdatatoken($id,$username);
        die();
    }
    if($typeget == "idbot"){
        echo $datatoken = getdataidbot($id,$username);
        die();
    }
    if($typeget == "maxeveryday"){
        echo $datatoken = getdatamaxeveryday($id,$username);
        die();
    }
    if($typeget == "contentcmt"){
        echo $datatoken = getdatacontentcmt($id,$username);
        die();
    }
    if($typeget == "urlimagecmt"){
        echo $datatoken = getdataurlimagecmt($id,$username);
        die();
    } 
    if($typeget == "onlyid"){
        echo $datatoken = getdatauonlyid($id,$username);
        die();
    }     
    if($typeget == "sleep"){
        echo $datatoken = getdatasleep($id,$username);
        die();
    }
}

function getdatauonlyid($id,$username){
      global $conn;
      //$nows = strtotime(date('Y-m-d H:i:s'));
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE  `uid`='$id' AND `addby`='$username' LIMIT 1");
      $kq = array();
      while ($row = $result->fetch_assoc()){
          $token = $row["onlyid"];
          if($token == "0"){
              return "";
          }else{
              return $token;
          }
          //$status = $row['status'];
          //$id = $row['uid'];
          //$time = $row['time'];
          //$type = $row['type'];
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
      }
    //return $kq; 
}
function getdatacontentcmt($id,$username){
      global $conn;
      //$nows = strtotime(date('Y-m-d H:i:s'));
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE  `uid`='$id' AND `addby`='$username' LIMIT 1");
      $kq = array();
      while ($row = $result->fetch_assoc()){
          return $token = base64_decode($row["contentcmt"]);
          //$status = $row['status'];
          //$id = $row['uid'];
          //$time = $row['time'];
          //$type = $row['type'];
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
      }
    //return $kq; 
}
function getdataurlimagecmt($id,$username){
      global $conn;
      //$nows = strtotime(date('Y-m-d H:i:s'));
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE  `uid`='$id' AND `addby`='$username' LIMIT 1");
      $kq = array();
      while ($row = $result->fetch_assoc()){
          $token = base64_decode($row["urlimagecmt"]);
          if($token == "No"){
              return "";
          }else{
              return $token;
          }
          //$status = $row['status'];
          //$id = $row['uid'];
          //$time = $row['time'];
          //$type = $row['type'];
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
      }
    //return $kq; 
}
function getdataidbot($id,$username){
      global $conn;
      //$nows = strtotime(date('Y-m-d H:i:s'));
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE  `uid`='$id' AND `addby`='$username' LIMIT 1");
      $kq = array();
      while ($row = $result->fetch_assoc()){
          return $token = $row['idbot'];
          //$status = $row['status'];
          //$id = $row['uid'];
          //$time = $row['time'];
          //$type = $row['type'];
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
      }
    //return $kq; 
}
function getdatasleep($id,$username){
      global $conn;
      //$nows = strtotime(date('Y-m-d H:i:s'));
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE  `uid`='$id' AND `addby`='$username' LIMIT 1");
      $kq = array();
      while ($row = $result->fetch_assoc()){
          return $token = $row['sleep'];
          //$status = $row['status'];
          //$id = $row['uid'];
          //$time = $row['time'];
          //$type = $row['type'];
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
      }
    //return $kq; 
}
function getdatamaxeveryday($id,$username){
      global $conn;
      //$nows = strtotime(date('Y-m-d H:i:s'));
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE  `uid`='$id' AND `addby`='$username' LIMIT 1");
      $kq = array();
      while ($row = $result->fetch_assoc()){
          return $token = $row['maxeveryday'];
          //$status = $row['status'];
          //$id = $row['uid'];
          //$time = $row['time'];
          //$type = $row['type'];
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
      }
    //return $kq; 
}
function getdatatoken($id,$username){
      global $conn;
      //$nows = strtotime(date('Y-m-d H:i:s'));
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE  `uid`='$id' AND `addby`='$username' LIMIT 1");
      $kq = array();
      while ($row = $result->fetch_assoc()){
          return $token = $row['token'];
          //$status = $row['status'];
          //$id = $row['uid'];
          //$time = $row['time'];
          //$type = $row['type'];
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
          //$kq[] = array('id'=>$id,'status'=>$status,'time'=>$time,'type'=>$type);
      }
    //return $kq; 
} ?>