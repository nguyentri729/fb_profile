<?php session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$username = $_SESSION['username'];
$uid = $_SESSION['uid'];
$money = $_SESSION['money'];
$idbot = $_SESSION['idbot'];
$level = $_SESSION['level'];
//ini_set('max_execution_time', 0);
require_once '../xacnhan2.php'; //lấy thông tin từ config
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME); // kết nối data
mysqli_set_charset($conn,'utf8');
//$orin = trim($_SERVER['HTTP_ORIGIN']);
if(!isset($_SESSION['username'])){
    die("LOGIN");    
}

if($_POST['id'] && $_POST['token'] && $_POST['onreaction'] && $_POST['oncomment'] ){
    $token = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['token']);
    $id = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['id']);
    $idbott = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['idbot']);
    $maxeveryday = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['maxeveryday']);
    $sleep = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['sleep']);
    $time1h = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['time1h']);
    $time1i = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['time1i']);
    $time2h = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['time2h']);
    $time2i = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['time2i']);
    $sleepafter = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['sleepafter']);
    if($time1h == ""){
        $time1h = "7";
    }
    if($time1i == ""){
        $time1h = "00";
    }
    if($time2h == ""){
        $time1h = "23";
    }
    if($time2i == ""){
        $time1h = "00";
    }
    
    if($sleep == ""){
        $sleep = "120";
    }
    $time1 =  "$time1h:$time1i:00";
    $time2 =  "$time2h:$time2i:00";
    //$time = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['time']);
    //$giagoi = 99999999999999999999;
    //$hethan = 0;
    //$oneday = 86400;
    //$nows = strtotime(date('Y-m-d H:i:s'));
        // if($level == 1){
        //     switch($time){
        //         case '0.1':
        //             $giagoi = 4000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*1;
        //             break;
        //         case '0.2':
        //             $giagoi = 8000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*2;
        //             break;
        //         case '0.3':
        //             $giagoi = 12000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*3;
        //             break;
        //         case '0.4':
        //             $giagoi = 16000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*4;
        //             break;
        //         case '0.5':
        //             $giagoi = 20000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*5;
        //             break;
        //         case '0.6':
        //             $giagoi = 24000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*6;
        //             break;
        //         case '0.7':
        //             $giagoi = 28000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*7;
        //             break;
        //         case '1':
        //             $giagoi = 100000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*30;
        //             break;
        //         case '2':
        //             $giagoi = 200000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*60;
        //             break;
        //         case '3':
        //             $giagoi = 300000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*90;
        //             break;
        //         case '4':
        //             $giagoi = 400000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*120;
        //             break;
        //         case '5':
        //             $giagoi = 500000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*150;
        //             break;
        //         case '6':
        //             $giagoi = 600000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*180;
        //             break;
        //         case '7':
        //             $giagoi = 700000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*210;
        //             break;
        //         case '8':
        //             $giagoi = 800000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*240;
        //             break;
        //         case '9':
        //             $giagoi = 900000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*270;
        //             break;
        //         case '10':
        //             $giagoi = 1000000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*300;
        //             break;
        //         case '11':
        //             $giagoi = 1100000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*330;
        //             break;
        //         case '12':
        //             $giagoi = 1200000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*360;
        //             break;                    
        //         default:
        //             die("Lỗi. Không tìm thấy câu lệnh phù hợp!");
        //     }
        // }elseif($level == 2 || $level == 3){
        //     switch($time){
        //         case '0.1':
        //             $giagoi = 2000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*1;
        //             break;
        //         case '0.2':
        //             $giagoi = 4000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*2;
        //             break;
        //         case '0.3':
        //             $giagoi = 6000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*3;
        //             break;
        //         case '0.4':
        //             $giagoi = 8000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*4;
        //             break;
        //         case '0.5':
        //             $giagoi = 10000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*5;
        //             break;
        //         case '0.6':
        //             $giagoi = 12000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*6;
        //             break;
        //         case '0.7':
        //             $giagoi = 14000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*7;
        //             break;
        //         case '1':
        //             $giagoi = 30000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*30;
        //             break;
        //         case '2':
        //             $giagoi = 60000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*60;
        //             break;
        //         case '3':
        //             $giagoi = 90000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*90;
        //             break;
        //         case '4':
        //             $giagoi = 120000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*120;
        //             break;
        //         case '5':
        //             $giagoi = 150000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*150;
        //             break;
        //         case '6':
        //             $giagoi = 180000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*180;
        //             break;
        //         case '7':
        //             $giagoi = 210000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*210;
        //             break;
        //         case '8':
        //             $giagoi = 230000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*240;
        //             break;
        //         case '9':
        //             $giagoi = 250000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*270;
        //             break;
        //         case '10':
        //             $giagoi = 280000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*300;
        //             break;
        //         case '11':
        //             $giagoi = 310000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*330;
        //             break;
        //         case '12':
        //             $giagoi = 330000;
        //             $hethan = strtotime(date('Y-m-d H:i:s')) +$oneday*360;
        //             break;                    
        //         default:
        //             die("Lỗi. Không tìm thấy câu lệnh phù hợp!");
        //     }
        // }
    // if($giagoi > $money){
    //     die("Bạn không đủ tiền để thanh toán! Giá gói: $giagoi vnđ");
    // }
    $checktoken = checklivetoken($token);
    $onreaction = 0;
    $oncomment = 0;
    if($checktoken == "tokenkhonghople"){
        die("Token không hợp lệ");
    }else{
        $datatoken = json_decode($checktoken,true);
        $id2 = $datatoken["id"];
        if($id2 != $id){
            die("Token nhập vào không phải người dùng ID: $id");
        }
    }
    if($_POST['onreaction']  == "true"){
        $onreaction = 1;
        $speedreaction = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['speedreaction']);
        $reaction = str_replace(array(',','<',"'",'>','?','/',"\\",'--','eval(','<php'),array('|','','','','','','','','',''),$_POST['reaction']);
    }
    if($_POST['oncomment'] == "true"){
        $oncomment = 1;
        $speedcomment = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['speedcomment']);
        $packsticker = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['packsticker']);
        $urlimage = str_replace(array('<',"'",'>','?',"\\",'--','eval(','<php'),array('','','','','','','',''),$_POST['urlimage']);
        if($urlimage == ""){
            $urlimage = "Tm8=";
        }else{
            $urlimage = base64_encode($urlimage);
        }
        $contentcomment = base64_encode(str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['contentcomment']));
    }
    $onlyid = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),$_POST['onlyid']);
    if($onlyid == ""){
        $onlyid = "0";
    }
    //$_SESSION['money'] = $money - $giagoi;
    //trutien($username,$giagoi);
    //edituserhethong($id,$idbot,$reaction,$token,$speedreaction,$username,$onreaction,$oncomment,$speedcomment,$contentcomment,$packsticker,$urlimage,$onlyid);
    if($idbott == ""){
        $idbott = $idbot;
    }
    edituserhethong($reaction,$token,$speedreaction,$onreaction,$oncomment,$speedcomment,$contentcomment,$packsticker,$urlimage,$onlyid,$id,$username,$idbott,$maxeveryday,$sleep,$time1,$time2,$sleepafter);
    addhistoryuser($uid,"EDIT BOT","$username đã chỉnh sửa bot. ID: $id");
    //sendnoti($idbot,"Bạn đã thêm tài khoản $id vào hệ thống tương tác thành công. Ngày hết hạn ".date('Y-m-d H:i:s',$hethan));
    echo "Bạn đã chỉnh sửa $id tương tác thành công";
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
function checklivetoken($token){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://graph.facebook.com/v2.12/me?fields=id%2Cname&access_token=".$token,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    if(strpos($response,'"id":') != false){
        return $response;
    }else{
        return "tokenkhonghople";
    }
}
    
function checkuser($id){
      global $conn;
      $id = str_replace(array('<',"'",'>','?','/',"\\",'--'),array('','','','','','',''),$id);
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE `uid`='$id' LIMIT 1");
      $row = mysqli_num_rows($result);
      return $row;
}
function getseverlive($sv,$limit,$maxsv){
      global $conn;
      $result = mysqli_query($conn, "SELECT `sv` FROM `botreaction` WHERE `sv`='$sv' LIMIT $limit");
      $row = mysqli_num_rows($result);
      if($row < $limit && $sv <= $maxsv){
      return $sv;
      }elseif($row == $limit){
      return getseverlive($sv+1,$limit,$maxsv);
      }elseif($sv > $maxsv){
       return "FULL";
      }else{
       return "FULL";
      }
}
function addhistoryuser($uid,$type,$status){
      global $conn;
      $nows = strtotime(date('Y-m-d H:i:s'));
      mysqli_query($conn, "INSERT INTO `historyuser`(`uid`, `status`, `time`,`type`) VALUES ('$uid','$status','$nows','$type')");    
}
function trutien($username,$tiencantru){
      global $conn;
      mysqli_query($conn, "UPDATE `taikhoanhethongvip` SET `money`= (SELECT `money`)-$tiencantru WHERE `username`='$username'");
}
function edituserhethong($type,$token,$speedreaction,$onreaction,$oncomment,$speedcomment,$contentcmt,$packsticker,$urlimage,$onlyid,$id,$addby,$idbot,$maxeveryday,$sleep,$time1,$time2,$sleepafter){
      global $conn;
      //mysqli_query($conn, "UPDATE `botreaction` SET `type`='$type',`token`='$token',`maxreaction`='$speedreaction',`live`='1',`reaction`='$onreaction',`comment`='$oncomment',`maxcomment`='$speedcomment',`contentcmt`='$contentcmt',`packsticker`='$packsticker',`urlimagecmt`='$urlimage',`onlyid`='$onlyid' WHERE `uid`='$id' AND `addby`='$username'");
      //UPDATE `botreaction` SET `type`='LIKE|LOVE|HAHA|WOW|SAD|ANGRY',`token`='EAAAAUaZA8jlABAPONnD6wZC3TciIXizm5V4wgwkwkBqVO1aZAkqibErdwH3uvcUZB6MC2nTSw0cP4JnK3VtimXDlBXdGzFXZCdCZA9iBxyZAnJcptJtPjqpEKAp8TWuP4LtvAB7GdBLZBTsZBiRjXSxhEa2DDBiCSUbwZD',`maxreaction`='1',`live`='1',`reaction`='1',`comment`='1',`maxcomment`='1',`contentcmt`='e8awfMawIMawfMOpYyDDqWN8w6ljfMawIMawIMOpYyDDqWN8w6ljIMOpYyDGsCDGsH0=',`packsticker`='Duncan1',`urlimagecmt`='Tm8=',`onlyid`='0' WHERE `uid`='600495399' AND `addby`='admin'
      mysqli_query($conn, "UPDATE `botreaction` SET `maxeveryday`='$maxeveryday',`idbot`='$idbot',`time1`='$time1',`time2`='$time2',`sleep`='$sleep',`type`='$type',`token`='$token',`sleepafter`='$sleepafter',`maxreaction`='$speedreaction',`live`='1',`reaction`='$onreaction',`comment`='$oncomment',`maxcomment`='$speedcomment',`contentcmt`='$contentcmt',`packsticker`='$packsticker',`urlimagecmt`='$urlimage',`onlyid`='$onlyid' WHERE `uid`='$id' AND `addby`='$addby'");
} ?>