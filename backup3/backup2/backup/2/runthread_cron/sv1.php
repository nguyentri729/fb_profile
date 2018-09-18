<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('max_execution_time', 0);
require_once '../xacnhan2.php';
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME);
mysqli_set_charset($conn,'utf8');

$datatoken = getdatatoken(70,1);
//var_dump($datatoken);
$cdt = count($datatoken);
for($r = 0 ; $r < $cdt ;$r++){
    $token = $datatoken[$r]['token'];
    $id = $datatoken[$r]['id'];
    $typer = $datatoken[$r]['type'];
    $idbot = $datatoken[$r]['idbot'];
    $maxlike = $datatoken[$r]['maxreaction'];
    $onreaction = $datatoken[$r]['reaction'];
    $oncomment = $datatoken[$r]['comment'];
    $contentcmt = $datatoken[$r]['contentcmt'];
    $maxcmt = $datatoken[$r]['maxcmt'];
    $packsticker = $datatoken[$r]['packsticker'];
    $sleepafter = $datatoken[$r]['sleepafter'];
    if($packsticker == "" || $packsticker == "NULL"){
        $packsticker = "No";
    }
    $urlimagecmt = $datatoken[$r]['urlimagecmt'];
    $useradd = $datatoken[$r]['useradd'];
    $onlyid = $datatoken[$r]['onlyid'];
    if($onlyid == ""){
        $onlyid = "0";
    }

        $data = GetNewFeedFriend($token,$onlyid);
        if($data == "tokendie"){
            $text = "TOKEN DIE \nID: $id";
            updatelive($id,0,"Token die");
          //  sendnoti($idbot,$text);
        }else{
            if($data == "tokennotable"){
                $text = "TOKEN KHÔNG ĐỦ QUYỀN HẠN \nID: $id";
               // sendnoti($idbot,$text);        
            }
        }
        $data = json_decode($data,true);
        $cd = count($data["data"]);
        for($i = 0;$i<$cd;$i++){
            if($i > $maxlike && $i > $maxcmt){
                break;
            }
            $type = randreactions($typer);
            $canlike =  $data["data"][$i]["likes"]["user_likes"];
            $idstt =  $data["data"][$i]["post_id"];
            $created_time =  $data["data"][$i]["created_time"];
            $nowsss = strtotime(date('Y-m-d H:i:s'));
            if($onreaction == 1 && $i < $maxlike){
                if(!$canlike){
                                                    //echo $idstt;
                    // $runreac = reaction($token,$idstt,$id,$type);
                    // if($runreac != "true"){
                    //     if($runreac == "tokendie"){
                    //         $text = "TOKEN DIE \nID: $id";
                    //         updatelive($id,0,"Token die");                        
                    //         sendnoti($idbot,$text);
                    //     }
                    //     if($runreac == "tokennotable"){
                    //         $text = "TOKEN KHÔNG ĐỦ QUYỀN HẠN \nID: $id";
                    //         sendnoti($idbot,$text);
                    //     }
                    // }else{
                    //     addhistorybot($id, $type,$idstt,$useradd);
                    //     updatetotalauto($id,1);
                    // }
                    $checkdtb = checkdtb($idstt);
                    if($checkdtb == "0"){
                        addnewfeedbotreaction($token,$idstt,$id,$type,$created_time,$sleepafter,$useradd);
                    }
                }
            }
            if($oncomment == "1" && $i < $maxcmt){
                if(!IsCmt($idstt,$token)){
                    if(comment($token,$idstt,xulytext(base64_decode($contentcmt)),base64_decode($urlimagecmt),$packsticker)){
                        addhistorybot($id,'comment',$idstt,$useradd);
                        updatetotalautocmt($id,1);
                        sleep(1);
                    }
                }
            }
        }
}
die();





function GetNewFeedFriend($token,$onlyid="0"){
    $target = "source_id%20IN%20(SELECT%20uid2%20FROM%20friend%20WHERE%20uid1%20%3D%20me())";
    if($onlyid != "0"){
        $target = "source_id%20%3D".$onlyid;
    }
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://graph.facebook.com/fql?q=SELECT%20post_id%2C%20actor_id%2C%20created_time%2C%20likes%20FROM%20stream%20%0A%20%20%20WHERE%20".$target."&access_token=".$token,
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
    if(strpos($response,'"data":')){
        return $response;
    }else{
        if(strpos($response,'"code": 190,') || strpos($response,'"code":190,')){
            return "tokendie";
        }
        if(strpos($response,'"code": 12,') || strpos($response,'"code":12,')){
            return "tokennotable";
        }
    }    
}

function reaction($token,$idstt,$uid,$type="LIKE"){
    $idstt = explode("_",$idstt);
    $uidtarget = $idstt[0];
    $idstt = $idstt[1];
    $reac = "3";
    switch ($type) {
        case "LIKE":
            $reac = "1";
            break;
        case "LOVE":
            $reac = "2";
            break;
        case "HAHA":
            $reac = "4";
            break;
        case "WOW":
            $reac = "3";
            break;
        case "SAD":
            $reac = "7";
            break;
        case "ANGRY":
            $reac = "8";
            break;
        default:
            $reac = "3";
    }
    $idsttbase64 = urlencode( base64_encode("feedback:".$idstt));
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://graph.facebook.com/graphql",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "doc_id=1465022236921477&method=post&locale=vi_VN&pretty=false&format=json&variables=%7B%220%22%3A%7B%22tracking%22%3A%5B%22%7B%5C%22top_level_post_id%5C%22%3A%5C%22".$idstt."%5C%22%2C%5C%22tl_objid%5C%22%3A%5C%22".$idstt."%5C%22%2C%5C%22throwback_story_fbid%5C%22%3A%5C%22".$idstt."%5C%22%2C%5C%22profile_id%5C%22%3A%5C%22".$uidtarget."%5C%22%2C%5C%22profile_relationship_type%5C%22%3A2%2C%5C%22actrs%5C%22%3A%5C%22".$uidtarget."%5C%22%7D%22%2C%22%7B%5C%22image_loading_state%5C%22%3A0%2C%5C%22radio_type%5C%22%3A%5C%22wifi-none%5C%22%7D%22%5D%2C%22feedback_source%22%3A%22video_channel_feed%22%2C%22feedback_reaction%22%3A".$reac."%2C%22client_mutation_id%22%3A%22a6c63b5d-d926-".rand(111,999)."f-92a6-e35xf8f".rand(1111,9999)."4%22%2C%22nectar_module%22%3A%22unknown%22%2C%22actor_id%22%3A%22".$uid."%22%2C%22feedback_id%22%3A%22".$idsttbase64."%22%2C%22action_timestamp%22%3A".$uid."%7D%7D&fb_api_req_friendly_name=ViewerReactionsMutation&fb_api_caller_class=graphservice",
      CURLOPT_HTTPHEADER => array(
        "accept-encoding: gzip, deflate",
        "authorization: OAuth ".$token,
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded",
        "host: graph.facebook.com",
        "user-agent: [FBAN/FB4A;FBAV/153.0.0.54.88;FBBV/84570987;FBDM/{density=2.0,width=720,height=1280};FBLC/vi_VN;FBRV/85070460;FBCR/Android;FBMF/x86;FBBD/generic;FBPN/com.facebook.katana;FBDV/Samsung Galaxy S".rand(3,7)." - ".rand(4,6).".0.".rand(1,7)." - API 16 - 720x1280;FBSV/4.1.1;FBOP/1;FBCA/x86:unknown;]",
        "x-fb-connection-type: WIFI",
        "x-fb-friendly-name: ViewerReactionsMutation",
        "x-fb-http-engine: Liger",
        "x-fb-net-hni: 310260",
        "x-fb-sim-hni: 310270"
      ),
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    if(strpos($response,'{"data":{"feedback_react":{"feedback":{"id":"') !== false){
        return "true";
    }else{
        if(strpos($response,'"code": 190,') || strpos($response,'"code":190,')){
            return "tokendie";
        }
        if(strpos($response,'"code": 3,') || strpos($response,'"code":3,')){
            return "tokennotable";
        }
    }
}
function IsCmt($idstt,$token){
    $idstt = explode("_",$idstt);
//    $uidtarget = $idstt[0];
    $idstt = $idstt[1];    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://graph.facebook.com/fql?q=SELECT%20id%2Ctext%2Cfromid%20FROM%20comment%20WHERE%20object_id%3D".$idstt."%20AND%20fromid%3Dme()&access_token=".$token,
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
    if(strpos($response,'"id":')){
        return true;
    }else{
        return false;
    }
}
function comment($toke,$id,$text,$urlimagecmt,$packsticker){
    $idstt = explode("_",$id);
    $idtag = $idstt[0];
    //$idstt = $idstt[1];
    $contentstickrequest = "";
    $contentimagerequest = "";
    if($packsticker != "No" && $urlimagecmt == "No"){
        switch ($packsticker){
            case "Tonton":
                $stick = array('193082987877305','193082767877327','193082841210653','193083071210630','193083057877298','193083121210625','193083104543960','193083087877295','193754761143461','193082944543976','193083031210634','193083001210637','193082917877312','193754774476793','193082784543992','193082931210644','193082874543983','193082974543973','193082891210648','193083044543966','193082827877321','193082804543990','193082861210651','193082987877305','193083967877207');
                break;
            case "Chuoi":
                $stick = array('420710724953547','420710068286946','420715784953041','420710414953578','420715238286429','420714631619823','420715634953056','420714754953144','427321267625826','420709004953719','420714868286466','420715121619774','420716101619676','420716284952991','420716634952956','427320150959271','427320327625920','427320510959235','427321144292505','427321750959111');
                break;
            case "Usagyuuun":
                $stick = array('184002505550738','184002745550714','184002922217363','184003345550654','184023658881956','184003438883978','184568445494144','184570625493926','184571022160553','184023735548615','184568315494157','184571368827185','184568682160787','184569952160660','184003212217334','184570488827273','184570088827313','184570198827302','184570725493916','184022932215362','184570885493900','184571475493841','184571208827201','184002655550723');
                break;
            case "Mugsy":
                $stick = array('396449133832526','396449307165842','396449313832508','396449147165858','396449210499185','396449327165840','396449380499168','396449127165860','396449120499194','396449263832513','396449390499167','396449427165830','396449203832519','396449220499184','396449370499169','396449193832520');
                break;
            case "Betakkuma20":
                $stick = array('919273981556651','919274211556628','919274511556598','919274654889917','919274771556572','919274868223229','919275011556548','919275968223119','919276181556431','919289898221726','919290824888300','919291361554913','919291468221569','919291654888217','919291751554874','919291891554860','919292021554847','919292121554837','919292228221493','919292281554821','919292408221475','919292488221467','919293468221369','919293584888024');
                break;
            case "Batdong":
                $stick = array('364384037058235','364384197058219','364384103724895','364384047058234','364384143724891','364383993724906','364383983724907','364384123724893','364383973724908','364384113724894','364384090391563','364384153724890','364384057058233','364384017058237','364384003724905','364384187058220','364384177058221','364384077058231','364384167058222','364384133724892');
                break;
            case "Trongtai":
                $stick = array('298592790320920','298592806987585','298592816987584','298592830320916','298592840320915','298592850320914','298592863654246','298592876987578','298592886987577','298592896987576','298592910320908','298592923654240','298592933654239','298592943654238','298592953654237','298592963654236');
                break;
            case "EmtraiYam":
                $stick = array('1598323250480496','1598323170480504','1598323397147148','1748797872099699','1748797422099744','1598324113813743','1598323843813770','1598324190480402','1598324360480385','1748794082100078','1598326803813474','1598327543813400','1598327050480116','1598327220480099','1748796828766470','1748793925433427','1748794622100024','1598332903812864','1598327337146754','1748808718765281','1598327843813370','1748797698766383','1748798165433003','1748798442099642');
                break; 
            case "Duncan1":
                $stick = array('785424308295590','785424328295588','785424341628920','785424364962251','785424388295582','785424401628914','785424414962246','785424431628911');
                break;
            case "Xinchaochonau":
                $stick = array('789355237820057','789355251153389','789355424486705','789355111153403','789355197820061','789355277820053','789355324486715','789355397820041','789355311153383','789355384486709','789355224486725','789355157820065','789355144486733','789355411153373','789355131153401','789355354486712','789355211153393','789355341153380','789355371153377','789355441153370');
                break; 
            case "Noohin":
                $stick = array('1193275907437966','1193275110771379','1355454444553444','1193278047437752','1193279524104271','1193278434104380','1193277874104436','1193277374104486','1211883345577222','1193279267437630','1193280720770818','1195824403849783','1193280354104188','1193279787437578','1193275340771356','1193280114104212');
                break;
            case "QooBeeAgapi":
                $stick = array('1747081105603141','1747081465603105','1747082232269695','1747082948936290','1747083702269548','1747083968936188','1747084572269461','1747084802269438','1747085322269386','1747092188935366','1747082038936381','1747085735602678','1747085962269322','1747086582269260','1747087128935872','1747087835602468','1747088982269020','1747089445602307','1747090242268894','1747091025602149');
                break;
            case "Piyomarukhoihai":
                $stick = array('344394649290083','344394765956738','344395845956630','344395365956678','344395512623330','344395972623284','344403782622503','344396232623258','344396342623247','344402749289273','344403035955911','344396095956605','344403592622522','344403172622564','344403322622549','344404019289146','345440432518838','344404369289111','344411775955037','344406672622214','344409682621913','344411035955111','344394505956764','344411262621755');
                break;
            case "Rosavuive":
                $stick = array('295918937522850','295919034189507','295919157522828','295919207522823','295919314189479','295919437522800','295919567522787','295919650856112','295920017522742','295920180856059','295920257522718','295920407522703','295920524189358','295920620856015','295920800855997','295920877522656');
                break;                
            default:
                $stick = array('193082987877305','193082767877327','193082841210653','193083071210630','193083057877298','193083121210625','193083104543960','193083087877295','193754761143461','193082944543976','193083031210634','193083001210637','193082917877312','193754774476793','193082784543992','193082931210644','193082874543983','193082974543973','193082891210648','193083044543966','193082827877321','193082804543990','193082861210651','193082987877305','193083967877207');
        }
        $cst = count($stick);
        $s = rand(0,($cst-1));
        $contentstickrequest = "&attachment_id=".$stick[$s];
    }
    if($urlimagecmt != "No"){
        $contentimagerequest = "&attachment_url=".$urlimagecmt;
    }
    $text = str_replace("((tag))","@[$idtag:0]",$text);
    if($text != ""){
        $text = "&message=".urlencode($text);
    }
    //$a = file_get_contents("https://graph.facebook.com/$id/comments?method=post".$text.$contentstickrequest.$contentimagerequest."&access_token=".$toke);
    $a = apicmt($id,$text.$contentstickrequest.$contentimagerequest."&access_token=".$toke);
    if(strpos($a,'"id"')){
        return true;
    }else{
        return false;
    }
}
function apicmt($id,$field){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://graph.facebook.com/$id/comments",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $field,
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded"
      ),
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
function xulytext($text1){
    $text = explode("{",$text1);
    $ketqua ='';
    $ketqua .= $text[0]; 
    $a = array();
    $b = array();
    $ct = count($text);
    for($i=1;$i<$ct;$i++){
    $a1 = explode('}',$text[$i]);
    $b[] = $a1[1];
    $a[] = $a1[0];
    }
    $ca = count($a);
    $cb = count($b);
    
    for($i=0;$i<$cb;$i++){
        $a1 = explode('|',$a[$i]);
        $ran = rand(0,(count($a1)-1));
        $ketqua .= $a1[$ran].$b[$i];
    }
    return $ketqua;
}
function randreactions($data){
    $data = explode('|',$data);
    $cd = count($data);
    $r = rand(0,$cd-1);
    return $data[$r];
}
function getdatatoken($limit = 5,$sv){
      global $conn;
      $nows = strtotime(date('Y-m-d H:i:s'));
      $nowHi = date("H:i:s");
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE $nows-`timeupdate`>`sleep` AND `expire`>$nows AND `live` = 1 AND `autocmttoday`<`maxeveryday` AND `autotoday`<`maxeveryday` AND '$nowHi'>`time1` AND '$nowHi'<`time2` AND`sv`= $sv LIMIT $limit");
      $kq = array();
      while ($row = $result->fetch_assoc()){
          $token = $row['token'];
          $id = $row['uid'];
          $idbot = $row['idbot'];
          $maxreaction = $row['maxreaction'];
          $type = $row['type'];
          $reaction = $row['reaction'];
          $comment = $row['comment'];
          $contentcmt = $row['contentcmt'];
          $maxcmt = $row['maxcomment'];
          $urlimagecmt = $row['urlimagecmt'];
          $packsticker = $row['packsticker'];
          $useradd = $row['addby'];
          $onlyid = $row['onlyid'];
          $sleepafter = $row['sleepafter'];
          $kq[] = array('sleepafter'=>$sleepafter,'onlyid'=>$onlyid,'useradd'=>$useradd,'urlimagecmt'=>$urlimagecmt,'packsticker'=>$packsticker,'maxcmt'=>$maxcmt,'contentcmt'=>$contentcmt,'token'=>$token,'id'=>$id,'type'=>$type,'maxreaction'=>$maxreaction,'idbot'=>$idbot,'reaction'=>$reaction,'comment'=>$comment);
          updatetimeupdate($id,$nows);
      }
    return $kq; 
}

function updatetimeupdate($uid,$nows){
      global $conn;
      mysqli_query($conn, "UPDATE `botreaction` SET `timeupdate`='$nows' WHERE `uid`='$uid'");    
}
function addhistorybot($uid,$type,$status,$useradd){
      global $conn;
      $nows = strtotime(date('Y-m-d H:i:s'));
      mysqli_query($conn, "INSERT INTO `historybot`(`uid`, `status`, `time`,`useradd`,`type`) VALUES ('$uid','$status','$nows','$useradd','$type')");    
}
function updatetotalauto($uid,$count){
      global $conn;
      mysqli_query($conn, "UPDATE `botreaction` SET `autotoday`= (SELECT `autotoday`) + $count ,`totalauto`= (SELECT `totalauto`) + $count WHERE `uid`='$uid'");    
}
function updatetotalautocmt($uid,$count){
      global $conn;
      mysqli_query($conn, "UPDATE `botreaction` SET `autocmttoday`= (SELECT `autocmttoday`) + $count ,`totalcmt`= (SELECT `totalcmt`) + $count WHERE `uid`='$uid'");    
}
function updatelive($uid,$status,$mess){
      global $conn;
      mysqli_query($conn, "UPDATE `botreaction` SET `live`='$status',`status`='$mess' WHERE `uid`='$uid'");    
}
function addnewfeedbotreaction($token,$idstt,$uid,$type,$created_time,$sleepafter,$useradd){
      global $conn;
      mysqli_query($conn, "INSERT INTO `newfeedbotreaction`(`idstt`, `token`, `type`, `created_time`, `sleep`,`uid`,`useradd`) VALUES ('$idstt','$token','$type','$created_time','$sleepafter','$uid','$useradd')");    
}
function checkdtb($idstt){
      global $conn;
      $result = mysqli_query($conn, "SELECT * FROM `newfeedbotreaction` WHERE `idstt`='$idstt'");
      $row = mysqli_num_rows($result);
      return $row;    
}
// function sendnoti($id,$text){
//     $text = urlencode($text);
//     global $botid;
//     global $blockid;
//     global $TOKENCHATFUEL;
//     $api_url = "https://api.chatfuel.com/bots/$botid/users/$id/send?chatfuel_token=$TOKENCHATFUEL&chatfuel_block_id=$blockid¬i=$text";
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $api_url); 
//     curl_setopt($ch, CURLOPT_HEADER, false);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
//     curl_setopt($ch, CURLOPT_POST, true); 
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//     $response = curl_exec($ch); 
//     curl_close($ch); 
//     return $response;
// } ?>