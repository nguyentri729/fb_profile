<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once '../xacnhan2.php'; //lấy thông tin từ config
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME); // kết nối data
mysqli_set_charset($conn,'utf8');
if($_GET['idfb'] && $_GET['idbot'] && $_GET['avatar']){
    $uid = str_replace(array('<',"'",'>','?','/',"\\",'--','eval','php'),array('','','','','','','','',''),$_GET['idfb']);
    $idbot = $_GET['idbot'];
    $check = checkdatabase($uid,$idbot);
    if($check == 'YES'){
        die('{
         "messages": [
           {"text": "Bạn đã đăng ký trước đó."}
         ]
        }');
    }
    // $avatar1 = $_GET['avatar'];
    // $avatar = explode('_',$avatar1);
    // $avatar = $avatar[1];
    // $idapp = getidfb($avatar);
    // $idgoc = getinfofromid($uid);
    // if(empty($idgoc)){
    //     die('{
    //      "messages": [
    //       {"text": "Vui lòng sử dụng idfb chính chủ!"}
    //      ]
    //     }');
    // }
    //  $idfunc = $idgoc['avatar'];
    //  $idfunc = explode('_',$idfunc);
    //  $idfunc = $idfunc[1];
    //  if($idfunc !== $avatar){
    //     die('{
    //      "messages": [
    //       {"text": "Vui lòng sử dụng idfb chính chủ!"}
    //      ]
    //     }');
    //  }
     $code = randomcode();
     addcodesignin($code,$idbot,$uid);
                die('{
                 "messages": [
                   {"text": "CODE đăng ký: '.$code.'. Vui lòng truy cập website để tiếp tục đăng ký!"}
                 ]
                }');
}

/*      ===     ===     function    ====    ===*/
function randomcode(){
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 9; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
function getidfb($idstt){
    $data = @file_get_contents("https://graph.facebook.com/v2.10/$idstt?fields=id%2Cfrom&access_token=2572501972761888%7C6OMcGGUcdwaRklZ-WbGkQAONJSs");
    $data = json_decode($data,true);
    return array('id'=>$data['from']['id'],'name'=>$data['from']['name']);
}
function getinfofromid($idstt){
    $data = @file_get_contents("https://graph.facebook.com/v2.10/$idstt?fields=picture{url},id,name&access_token=2572501972761888%7C6OMcGGUcdwaRklZ-WbGkQAONJSs");
    $data = json_decode($data,true);
    return array('id'=>$data['id'],'name'=>$data['name'],'avatar'=>$data['picture']['data']['url']);
}
function addcodesignin($code,$idbot,$uid){
      global $conn;
      mysqli_query($conn, "INSERT INTO `codesignin`(`code`, `uid`, `idbot`) VALUES ('$code','$uid','$idbot')");
}
function checkdatabase($uid,$idbot){
      global $conn;
      $name = str_replace(array('<',"'",'>','?','/',"\\",'--',')','('),array('','','','','','','','',''),$name);
      $result = mysqli_query($conn, "SELECT `uid` FROM `taikhoanhethongvip` WHERE `uid`='$uid' OR `idbot`='$idbot' LIMIT 1");
      $row = mysqli_num_rows($result);
      if($row == 1){
          return 'YES';
      }elseif($row == 0){
          return 'NO';
      }
} ?>