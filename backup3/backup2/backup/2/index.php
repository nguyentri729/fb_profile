<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//$username = "admin";
$username = @$_SESSION['username'];
$uid = @$_SESSION['uid'];
$money = @$_SESSION['money'];
$idbot = @$_SESSION['idbot'];
$level = @$_SESSION['level'];
if($username != ""){
    require_once 'xacnhan2.php';
    $conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME);
    mysqli_set_charset($conn,'utf8');
}
function getdata($username){
      global $conn;
      $result = mysqli_query($conn, "SELECT * FROM `botreaction` WHERE `addby`='$username'");
      $kq = array();
      while ($row = $result->fetch_assoc()){
          $token = $row['token'];
          $id = $row['uid'];
          $idbot = $row['idbot'];
          $maxreaction = $row['maxreaction'];
          $type = $row['type'];
          $totalauto = $row['totalauto'];
          $todayauto = $row['autotoday'];
          $autocmttoday = $row['autocmttoday'];
          $live = $row['live'];
          $name = $row['name'];
          $totalcmt = $row['totalcmt'];
          $expire = @$row['expire'];
          $status = $row['status'];
          $onreaction = $row['reaction'];
          $oncomment = $row['comment'];
          $kq[] = array('autocmttoday'=>$autocmttoday,'oncomment'=>$oncomment,'onreaction'=>$onreaction,'status'=>$status,'expire'=>$expire,'token'=>$token,'id'=>$id,'type'=>$type,'maxreaction'=>$maxreaction,'idbot'=>$idbot,'totalauto'=>$totalauto,'todayauto'=>$todayauto,'live'=>$live,'name'=>$name,'totalcmt'=>$totalcmt);
      }
    return $kq; 
}
$nameweb = "botlethuy.com";
$slogan = 'botlethuy.com - Hệ thống Tương Tác Facebook';
$slogan2 = 'ADMIN';
$linkslogan2 = '100025250752524';
$linkslogan3 = '100025250752524';
$slogan3 = "admin";
$imageslogan2 = '100025250752524';
$napthe_stk = "x";
$napthe_chinhanh = 'x';
$napthe_nganhang = 'x';
$napthe_chutk = 'admin';
$name_bot = '';


?>
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="favicon.jpg" type="image/x-icon">
<!-- Site Properities -->
<title><?php echo $slogan; ?></title>
<link rel="stylesheet" type="text/css" href="dist/smt.min.css">
<script src="dist/jq.js"></script>
<script src="dist/smt.m.js"></script>
<link rel="stylesheet" type="text/css" href="dist/am.css"> 
<script>
$(document).ready(function(){
	$('.ui.accordion')
      .accordion()
    ;
	$('.rating')
	  .rating('setting', 'clearable', true)
	;

	$('.ui.dropdown')
	  .dropdown()
	;          
    $('.ui.sticky')
      .sticky({
        context: '#footers'
      })
    ;
	$('.special.cards .image').dimmer({
	  on: 'hover'
	});    
    setTimeout(function(){$( "#loadingbody" ).removeClass( "loading" )}, 100);

});

function Thongbao(response){
     $('#textthongbao')
          .html(response)
      ;
      $('#thongbao')
          .modal('show')
      ;
}
function autosugtoken(id){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/getinfoedituserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "id": id,
        "typeget": "token"
      }
    }
    
    $.ajax(settings).done(function (response) {
        $('#editusertoken').val(response);
    });    
}
function autosugidbot(id){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/getinfoedituserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "id": id,
        "typeget": "idbot"
      }
    }
    $.ajax(settings).done(function (response) {
        $('#edituseridbot').val(response);
    });  
}
function autosugsleepr(id){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/getinfoedituserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "id": id,
        "typeget": "sleep"
      }
    }
    $.ajax(settings).done(function (response) {
        $('#editusersleep').val(response);
    });  
}
function autosugidmaxeveryday(id){
     var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/getinfoedituserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "id": id,
        "typeget": "maxeveryday"
      }
    }
    
    $.ajax(settings).done(function (response) {
        $('#editusermaxeveryday').val(response);
    });
}
function autosugidcontentcmt(id){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/getinfoedituserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "id": id,
        "typeget": "contentcmt"
      }
    }
    
    $.ajax(settings).done(function (response) {
        $('#editusercontentcomment').val(response);
    });
}
function autosugidurlimage(id){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/getinfoedituserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "id": id,
        "typeget": "urlimagecmt"
      }
    }
    
    $.ajax(settings).done(function (response) {
        $('#edituserlinkimage').val(response);
    });
}
function ModalEditBotUser(id){
    autosugtoken(id);
    autosugidbot(id);
    autosugidmaxeveryday(id);
    autosugidcontentcmt(id);
    autosugidurlimage(id);
    autosugsleepr(id);
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/getinfoedituserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "id": id,
        "typeget": "onlyid"
      }
    }
    $.ajax(settings).done(function (response) {
        $('#edituseronlyid').val(response);
    });    
    $('#modaledituser')
    .modal('show')
    ;
    $('#saveedituserbot').attr('onClick', 'EditBotUser('+id+')');
}
function logout(){
    changeinfomodalconfirm('Đăng xuất','Bạn thực sự muốn đăng xuất?','Không','Đăng xuất','ajax/logout.php','');
}

function doimatkhau(){
    $('#modaldoimatkhau')
    .modal('show');
}
function modalgettoken(){
    $('#modalgettoken')
    .modal('show');    
}
function showmodalcongtrutien(){
    $('#modalcongtrutien')
    .modal('show');
}
function doiidbot(){
    $('#modaldoiidbot')
    .modal('show');
}
function showmodalhisoryuser(){
    
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/viewhistoryuser.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "xid": ""
      }
    }
    
    $.ajax(settings).done(function (response) {
        if(response == ""){
            $('#contenthistoryuser')
            .html("Hiện tại chưa có hoạt động nào được lưu")
            ;            
        }else{
            $('#contenthistoryuser')
            .html(response)
            ;            
        }

        $('#historyusermodal')
        .modal('show')
        ;
    });    
    //$('#historyusermodal')
    //.modal('show');
}
function showphanquyen(){
    $('#modalphanquyen')
    .modal('show');
}
function luuthongtin(){
 var matkhaucu = $('#matkhaucu').val();
 var matkhaumoi = $('#matkhaumoi').val();
 var nhaplaimatkhaumoi = $('#nhaplaimatkhaumoi').val();
 if(matkhaumoi !== nhaplaimatkhaumoi || matkhaumoi == matkhaucu){
     $('#textthongbao')
          .html("Mật khẩu mới phải giống nhau và khác mật khẩu cũ!")
      ;
      $('#thongbao')
          .modal('show')
      ;         
 }else{
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/changepass.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "old": matkhaucu,
        "new": matkhaumoi
      }
    }
    $.ajax(settings).done(function (response) {
         $('#textthongbao')
              .html(response)
          ;
          $('#thongbao')
              .modal('show')
          ;
    });
 }
}
function gettokenuser(){
    var u = $('#gtkusername').val();
    var p = $('#gtkpassword').val();    
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/gettokenuser.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "u": u,
        "p": p
      }
    }
    
    $.ajax(settings).done(function (response) {
      if(response == "fail"){
          $('#resultgettoken').val("Get token thất bại. . .");
      }else{
          $('#resultgettoken').val(response);
      }
    });    
}
function congtrutien(){
 var username = $('#cttusername').val();
 var money = $('#cttmoney').val();
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/congtrutien.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "username": username,
        "money": money
      }
    }
    $.ajax(settings).done(function (response) {
         $('#textthongbao')
              .html(response)
          ;
          $('#thongbao')
              .modal('show')
          ;
    });
}
function phanquyen(){
 var username = $('#pqusername').val();
 var type = $('#pqtype').val();
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/phanquyen.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "username": username,
        "type": type
      }
    }
    $.ajax(settings).done(function (response) {
         $('#textthongbao')
              .html(response)
          ;
          $('#thongbao')
              .modal('show')
          ;
    });
}
function luuthongtinidbot(){
 var idbot = $('#idbotedit').val();
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/changeidbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "idbot": idbot
      }
    }
    $.ajax(settings).done(function (response) {
         $('#textthongbao')
              .html(response)
          ;
          $('#thongbao')
              .modal('show')
          ;
    });
}
function EditBotUser(id){
    var token = $('#editusertoken').val();
    //var time = $('#thangvipreaction').val();
    var speedreaction = $('#edituserspeedreaction').val();
    var idbot = $('#edituseridbot').val();
    var reaction = $('#editusercamxuc').val();
    var onreaction = $('#editonreaction').is(':checked');
    var oncomment = $('#editoncomment').is(':checked');
    var speedcomment = $('#edituserspeedcomment').val();
    var stickercombo = $('#edituserstickercombo').val();
    var linkimage = $('#edituserlinkimage').val();
    var contentcomment = $('#editusercontentcomment').val();
    var onlyid = $('#edituseronlyID').val();
    var maxeveryday = $('#editusermaxeveryday').val();
    var sleepr = $('#editusersleep').val();
    var time1H = $('#editusertime1H').val();
    var time1i = $('#editusertime1i').val();
    var time2H = $('#editusertime2H').val();
    var time2i = $('#editusertime2i').val();
    var sleepafter = $('#editusersleepafter').val();
    if(token == ""){
        Thongbao("Vui lòng nhập token full quyền");
        return;
    }
    // if(time == ""){
    //     Thongbao("Vui lòng chọn thời gian tích hợp");
    //     return;
    // }
    if(onreaction){
        if(reaction == ""){
            Thongbao("Vui lòng chọn cảm xúc muốn tương tác");
            return;
        }
        if(speedreaction == ""){
            Thongbao("Vui lòng chọn tốc độ muốn thể hiện cảm xúc");
            return;
        }
    }
    if(oncomment){
        if(speedcomment == ""){
            Thongbao("Vui lòng chọn tốc độ muốn bình luận");
            return;
        }
        // if(contentcomment == ""){
        //     Thongbao("Vui lòng nhập nội dung bình luận");
        //     return;
        // }
    }
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/edituserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "id": id,
        "token": token,
        "onreaction": onreaction,
        "oncomment": oncomment,
        "speedreaction": speedreaction,
        "speedcomment": speedcomment,
        "reaction": reaction,
        "packsticker": stickercombo,
        "urlimage": linkimage,
        "contentcomment": contentcomment,
        "onlyid": onlyid,
        "idbot": idbot,
        "maxeveryday": maxeveryday,
        "time1h": time1H,
        "time2h": time2H,
        "time1i": time1i,
        "time2i": time2i,
        "sleepafter":sleepafter,
        "sleep": sleepr
      }
    }
    
    $.ajax(settings).done(function (response) {
        Thongbao(response);
    });    
}
function AddUserAutoReactionAndCmt(){
    $('#modaladduser')
    .modal('show')
    ;
}
function changerunonly(){
    var friend = $('#botonlyfriend').is(':checked');
    var onlyid = $('#botonlyID').is(':checked');
    if(friend){
        $('#botonlyID')[0].checked = false;
        $('#adduseronlyid').val("");
    }
    if(onlyid){
        $('#botonlyfriend')[0].checked = false;
    }    
}
function changeeditrunonly(){
    var friend = $('#editbotonlyfriend').is(':checked');
    var onlyid = $('#editbotonlyID').is(':checked');
    if(friend){
        $('#editbotonlyID')[0].checked = false;
        $('#editbotonlyID').val("");
    }
    if(onlyid){
        $('#editbotonlyfriend')[0].checked = false;
    }    
}
function AddBotUser(){
    var token = $('#addusertoken').val();
    var time = $('#thangvipreaction').val();
    var idbot = $('#adduseridbot').val();
    var speedreaction = $('#adduserspeedreaction').val();
    var reaction = $('#addusercamxuc').val();
    var onreaction = $('#onreaction').is(':checked');
    var oncomment = $('#oncomment').is(':checked');
    var speedcomment = $('#adduserspeedcomment').val();
    var stickercombo = $('#adduserstickercombo').val();
    var linkimage = $('#adduserlinkimage').val();
    var contentcomment = $('#addusercontentcomment').val();
    var onlyid = $('#adduseronlyid').val();
    var maxeveryday = $('#addusermaxeveryday').val();
    var sleepr = $('#addusersleep').val();
    var time1H = $('#addusertime1H').val();
    var time1i = $('#addusertime1i').val();
    var time2H = $('#addusertime2H').val();
    var time2i = $('#addusertime2i').val();
    var sleepafter = $('#addusersleepafter').val();
    if(token == ""){
        Thongbao("Vui lòng nhập token full quyền");
        return;
    }
    if(time == ""){
        Thongbao("Vui lòng chọn thời gian tích hợp");
        return;
    }
    if(onreaction){
        if(reaction == ""){
            Thongbao("Vui lòng chọn cảm xúc muốn tương tác");
            return;
        }
        if(speedreaction == ""){
            Thongbao("Vui lòng chọn tốc độ muốn thể hiện cảm xúc");
            return;
        }
    }
    if(oncomment){
        if(speedcomment == ""){
            Thongbao("Vui lòng chọn tốc độ muốn bình luận");
            return;
        }
        // if(contentcomment == ""){
        //     Thongbao("Vui lòng nhập nội dung bình luận");
        //     return;
        // }
    }
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/adduserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "token": token,
        "time": time,
        "onreaction": onreaction,
        "oncomment": oncomment,
        "speedreaction": speedreaction,
        "speedcomment": speedcomment,
        "reaction": reaction,
        "packsticker": stickercombo,
        "urlimage": linkimage,
        "contentcomment": contentcomment,
        "onlyid": onlyid,
        "idbot": idbot,
        "maxeveryday": maxeveryday,
        "time1h": time1H,
        "time2h": time2H,
        "time1i": time1i,
        "time2i": time2i,
        "sleepafter": sleepafter,
        "sleep": sleepr
      }
    }
    
    $.ajax(settings).done(function (response) {
        Thongbao(response);
    });
    
}
function deleteuserbot(id){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/deleteuserbot.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
      },
      "data": {
        "id": id
      }
    }
    
    $.ajax(settings).done(function (response) {
        location.reload();
    });
}
function HistoryModal(id,name,autotoday,autocmttoday){
    $('#headerhistory')
    .html("Hoạt động hôm nay của <a href=\"https://fb.com/"+id+"\">"+name+"</a> <a class=\"ui teal circular label\"><i class=\"like icon\"></i>"+autotoday+"</a> <a class=\"ui teal circular label\"><i class=\"comment icon\"></i>"+autocmttoday+"</a>")
    ;
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/viewhistory.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "id": id
      }
    }
    
    $.ajax(settings).done(function (response) {
        if(response == ""){
            $('#contenthistory')
            .html("Hiện tại chưa có hoạt động nào được lưu vào hôm nay")
            ;            
        }else{
            $('#contenthistory')
            .html(response)
            ;            
        }

        $('#historymodal')
        .modal('show')
        ;
    });
    
}
function changeonreaction(){
    if(!$('#onreaction').is(':checked')){
        $('#classadduserspeedreaction').hide();
        $('#adduserclasscamxuc').hide();
    }else{
        $('#classadduserspeedreaction').show();
        $('#adduserclasscamxuc').show();
    }
}
function changeeditonreaction(){
    if(!$('#editonreaction').is(':checked')){
        $('#classedituserspeedreaction').hide();
        $('#edituserclasscamxuc').hide();
    }else{
        $('#classedituserspeedreaction').show();
        $('#edituserclasscamxuc').show();
    }
}
function changeeditoncomment(){
    if(!$('#editoncomment').is(':checked')){
        $('#classedituserspeedcomment').hide();
        $('#classeditusernoidungcmt').hide();
        $('#edituserclassstickercmt').hide();
        $('#classedituserimage').hide();
    }else{
        $('#classedituserspeedcomment').show();
        $('#classeditusernoidungcmt').show();
        $('#edituserclassstickercmt').show();
        $('#classedituserimage').show();
    }
}
function changeoncomment(){
    if(!$('#oncomment').is(':checked')){
        $('#classadduserspeedcomment').hide();
        $('#classaddusernoidungcmt').hide();
        $('#adduserclassstickercmt').hide();
        $('#classadduserimage').hide();
    }else{
        $('#classadduserspeedcomment').show();
        $('#classaddusernoidungcmt').show();
        $('#adduserclassstickercmt').show();
        $('#classadduserimage').show();
    }
}
<?php if($username == ""){ ?>
    function ajaxSignIn(){
        var username = $('#sign-username').val();
        var password = $('#sign-password').val();
        var passwordagain = $('#sign-againpassword').val();
        //var code = $('#sign-codechatbot').val();
        var idfb = $('#sign-idfb').val();
        if(password != passwordagain){
            Thongbao("Mật khẩu không khớp");
            return;
        }
        if(password == "" || username == "" || idfb == ""){
            Thongbao("Tài khoản, mật khẩu, idfb không được để trống");
            return;
        }
        var settings = {
          "async": true,
          "crossDomain": true,
          "url": "ajax/signin2.php",
          "method": "POST",
          "headers": {
            "content-type": "application/x-www-form-urlencoded",
            "cache-control": "no-cache"
          },
          "data": {
            "u": username,
            "p": password,
            //"code": code
            "idfb": idfb
          }
        }
        
        $.ajax(settings).done(function (response) {
          Thongbao(response);
        });
    }
    function Signin(){
        $('#dathackysignin').modal('show');
    }
    function Login(){
        $('#dathackylogin')
        .modal('show')
        ;
    }
    function ajaxLogin(){
        var username = $('#login-username').val();
        var password = $('#login-password').val();
        if(password == "" || username == ""){
            Thongbao("Tài khoản, mật khẩu không được để trống");
            return;
        }
        var settings = {
          "async": true,
          "crossDomain": true,
          "url": "ajax/login.php",
          "method": "POST",
          "headers": {
            "content-type": "application/x-www-form-urlencoded",
            "cache-control": "no-cache"
          },
          "data": {
            "u": username,
            "p": password
          }
        }
        
        $.ajax(settings).done(function (response) {
            if(response == "true"){
                window.location.href = 'index.php';
                return;
            }
          Thongbao(response);
        });
    }
<?php } ?>
    function changeinfomodalconfirm(title,content,no,yes,linkyes,onclickfunc){
       $('#yesmodalconfirm').html(yes);
       $('#yesmodalconfirm').attr('href',linkyes);
       $('#yesmodalconfirm').attr('onclick',onclickfunc);
       $('#nomodalconfirm').html(no);
       $('#titlemodalconfirm').html(title);
       $('#contentmodalconfirm').html(content);
       $('#modalconfirm').modal('show');
    }

    function selectpanel(filte){
        $('.ui.segment.dathacky').show();
        $('.ui.segment.dathacky').not(filte).hide();
    }

</script>
<meta name="description" content="Hệ thống VIP FB" />
<meta name="keywords" content="tokensll,buytoken,muatoken,mua token,codebydathacky" />
</head>
<!-- BODY --> 
<body style="background-color: #e9ebee;">

<!-- HEADER -->
<div class="ui sticky">
    <div class="ui inverted segment" style="height: 54px;width: 100%;border-radius: 0px;background: linear-gradient(to right, rgb(53, 92, 125), rgb(108, 91, 123), rgb(192, 108, 132));">
    <button class="ui disabled inverted olive basic button" style="margin-top: -5px;"><?php echo $nameweb;?></button> <i><?php if($username == ""){ ?>Hệ thống tương tác Facebook<?php } ?></i>

<?php if($username != ""){ ?>
        <div class="ui right floated icon top right pointing dropdown button" style="z-index:1;margin-bottom: -10px;margin-top: -18px;height: 55px;background-color: rgba(34, 36, 38, 0);" tabindex="0">
        <i class="dropdown icon animated fadeInDown" style="color: rgba(255,255,255,.9);margin-top: 5px;padding-top: 10px;padding-right: 5px;"></i>
        
        <img src="https://graph.facebook.com/<?php echo $uid; ?>/picture?type=large&amp;redirect=true&amp;width=100&amp;height=100" class="ui mini image animated fadeInDown" style="border-radius: 8px;display: inline;">
                <div class="menu left transition hidden" tabindex="-1">
                <div class="header" style="text-transform: none;color: #e03997;font-size: 18px;margin-bottom: 0px;">
                <i class="user circle icon"></i>
                        <?php echo $username; ?><br><p>
            <b style="font-size: 14px;color: rgba(0,0,0,.87);">Số dư: </b><i style="font-size: 13px;color: #2185d0;"><?php echo number_format($money); ?> đ</i></p></div>
            <a class="item" onclick="showmodalhisoryuser()"><i class="history icon"></i>Lịch sử hệ thống</a>
            <?php if($level == 4){ ?>
                <a class="item" onclick="showmodalcongtrutien();"><i class="money icon"></i>Cộng/trừ tiền</a>
                <a class="item" onclick="showphanquyen();"><i class="spy icon"></i>Cấp quyền</a>
                
            <?php } ?>
            <div class="item" onclick="doimatkhau();"><i class="privacy icon"></i>Đổi mật khẩu</div>
            <div class="item" onclick="doiidbot();"><i class="barcode icon"></i>Đổi ID BOT</div>
            <a class="item" onclick="modalgettoken();"><i class="qrcode icon"></i>Get Token</a>
            <!--div onclick="popupnapthe();" class="item"><i class="add to cart icon"></i>Thanh toán</div-->
            
            <div class="ui divider"></div>
            <div class="item" onclick="logout();"><i class="sign out icon"></i>Đăng xuất</div>
                      </div>
        </div>
<?php } ?>


    </div>
</div>





<!-- BODY --> 

<?php if($username == ""){ ?>
<div class="ui segment" style="z-index: 1;margin-top: 10px;width: 100%;background: white;border-radius: 20px;">
<center>
    <div class="ui labeled button">
      <div class="ui green button" onclick="Login();">
        <i class="sign in alternate icon"></i> Đăng
      </div>
      <a class="ui basic green left pointing label">
        nhập
      </a>
    </div> OR
    
    <div class="ui labeled button" onclick="Signin();">
      <div class="ui basic blue button">
        <i class="fork icon"></i> Đăng
      </div>
      <a class="ui basic left pointing blue label">
        ký
      </a>
    </div>
</center>
</div>

<div id="loadingbody" class="ui loading segment" style="margin-top: 10px;width: 100%;min-height: 80%;background: white;border-radius: 20px;">


<!-- BẢNG GIÁ -->
<h3 class="ui blue horizontal divider header">
  <i class="money bill alternate icon"></i>Bảng giá Auto Tương Tác</h3>
<table class="ui celled table">
  <thead>
    <tr><th>Gói</th>
    <th>Tính năng</th>
    <th>Member</th>
    <th>CTV</th>
  </tr></thead>
  <tbody>
    <tr>
      <td>
        <div class="ui ribbon label">1 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/1mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/1ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">2 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/2mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/2ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">3 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/3mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/3ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">4 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/4mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/4ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">5 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/5mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/5ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">6 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/6mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/6ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">7 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/7mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/7ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">8 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/8mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/8ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">9 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/9mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/9ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">10 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/10mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/10ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">11 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/11mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/11ctv.txt"); ?> đ</td>
    </tr>
    <tr>
      <td>
        <div class="ui ribbon label">12 tháng</div>
      </td>
      <td><i class="pink like icon"></i> <i class="blue comment icon"></i></td>
      <td><?php echo file_get_contents("ajax/gia/12mem.txt"); ?> đ</td>
      <td><?php echo file_get_contents("ajax/gia/12ctv.txt"); ?> đ</td>
    </tr>    
  </tbody>
</table>
<!-- DANH SÁCH BAN QUẢN TRỊ-->

<h3 class="ui horizontal divider header" style="color: #d21616;">
  <i class="spy icon"></i>Danh sách ban quản trị</h3>
<div class="ui container" style="text-align: center;    background-color: white;">
<div class="ui centered special cards">
  <div class="card" style="    width: 260px;    height: 350px;">
    <div class="blurring dimmable image">
      <div class="ui dimmer transition hidden">
        <div class="content">
          <div class="center">
            <a href="https://facebook.com/<?php echo $linkslogan2;?>"><div class="ui primary button">Trang cá nhân</div></a>
          </div>
        </div>
      </div>

      <img src="https://graph.facebook.com/<?php echo $linkslogan2;?>/picture?type=large&amp;redirect=true&amp;width=400&amp;height=400" style="height: 220px;">
    </div>
    <div class="content">
      <a class="header"><?php echo $slogan2;?></a>
      <div class="meta">
        <span class="date">Quản lý và cung cấp dịch vụ.</span>
      </div>
    </div>
    <div class="extra content">
<div class="ui heart rating" data-rating="8"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i><i class="icon"></i></div>
    </div>
  </div>
  <!--div class="card" style="    width: 260px;    height: 350px;">
    <div class="blurring dimmable image">
      <div class="ui inverted dimmer transition hidden">
        <div class="content">
          <div class="center">
            <a href="https://facebook.com/<?php echo $linkslogan3;?>"><div class="ui primary button">Trang cá nhân</div></a>
          </div>
        </div>
      </div>
      <img src="https://graph.facebook.com/<?php echo $linkslogan3;?>/picture?type=large&amp;redirect=true&amp;width=400&amp;height=400" style="height: 220px;">
    </div>
    <div class="content">
      <a class="header"><?php echo $slogan3;?></a>
      <div class="meta">
        <span class="date">Quản lý và cung cấp dịch vụ.</span>
      </div>
    </div>
    <div class="extra content">
<div class="ui heart rating" data-rating="8"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i><i class="icon"></i></div>
    </div>
  </div-->
   
</div></div>

</div>
<?php }else{ ?>
<!-- LOAD -->
<div id="loadingbody" class="ui loading segment" style="margin-top: 10px;width: 100%;min-height: 80%;background: white;border-radius: 20px;">
<button class="ui yellow button" onclick="AddUserAutoReactionAndCmt();">+ Thêm tài khoản</button><br><br>
    <!-- CARD -->
<div class="ui special cards">
<?php 
$datag = getdata($username);
for($d = 0 ;$d<count($datag);$d++){
    //echo $datag[$d]['id'];
?>    
  <div class="card">
    <div class="blurring dimmable image">
      <div class="ui dimmer">
        <div class="content">
          <div class="center">
            <div class="ui inverted button" onclick="ModalEditBotUser(<?php echo $datag[$d]['id']; ?>);">Chỉnh sửa</div><div class="ui inverted button" onclick="changeinfomodalconfirm('Xoá người dùng','Bạn thực sự muốn xoá <?php echo $datag[$d]['name']; ?>?','Không','Xoá','#','deleteuserbot(<?php echo $datag[$d]['id']; ?>)');">Xoá</div>
          </div>
        </div>
      </div>
      <img src="https://graph.facebook.com/<?php echo $datag[$d]['id']; ?>/picture?type=large&amp;redirect=true&amp;width=400&amp;height=400">
    </div>
    <div class="content">
      <a class="header" href="https://facebook.com/<?php echo $datag[$d]['id']."\">".$datag[$d]['name']; ?></a>
      <div class="meta">
        <span class="date">Hết hạn <?php echo date("d/m/Y",@$datag[$d][expire]);?></span>
      </div>
    </div>
    <div class="extra content">
      <a onclick="HistoryModal(<?php echo $datag[$d]['id'].",'".$datag[$d]['name']."','".$datag[$d]['todayauto']."','".$datag[$d]['autocmttoday']."'"; ?>);">
        <i class="like <?php if($datag[$d]['onreaction'] == 1){ echo "blue";}else{ echo "red";} ?> icon"></i>
        <?php echo $datag[$d]['totalauto']; ?>
      </a>
      <a onclick="HistoryModal(<?php echo $datag[$d]['id'].",'".$datag[$d]['name']."','".$datag[$d]['todayauto']."','".$datag[$d]['autocmttoday']."'"; ?>);">
        <i class="comment <?php if($datag[$d]['oncomment'] == 1){ echo "blue";}else{ echo "red";} ?> icon"></i>
        <?php echo $datag[$d]['totalcmt'];?>
      </a>        
      <a>
          <?php if($datag[$d]['live'] == 1){?>
        <i class="power off blue icon"></i>
        Running
        <?php }else{ ?>
        <i class="power off red icon"></i>
        <?php echo $datag[$d]['status'];} ?>
      </a>
    </div>
    
  </div>
  <?php } ?> 
</div>

</div>

<!-- ADD BOT -->
<div id="modaladduser" class="ui modal">
    <i class="close icon"></i>
    <div class="header">
      <i class="edit icon"></i>Thêm tài khoản
    </div>
    <div class="content">
      <form id="formaddreaction" class="ui form segment">
        <h4 class="ui dividing header">Vui lòng nhập đầy đủ các mục</h4>
          <div class="field">
            <div class="ui left icon input">
              <i class="qrcode icon"></i><input type="text" id="addusertoken" placeholder="Token full quyền" min="1">
            </div>
            <p></p>
            <div class="ui input">
              <input type="text" id="addusermaxeveryday" placeholder="Số bài tương tác tối đa/ ngày">
            </div>
          </div>
            <p></p>Thời gian hoạt động<p></p>
            <div class="ui input" style="width: 60px;">
              <input type="number" id="addusertime1H" placeholder="H" min="1" max="24" value="7">
            </div>:
            <div class="ui input" style="width: 60px;">
              <input type="number" id="addusertime1i" placeholder="i" min="00" max="59" value="00">
            </div> - >
            <div class="ui input" style="width: 60px;">
              <input type="number" id="addusertime2H" placeholder="H" min="1" max="24" value="23">
            </div>:
            <div class="ui input" style="width: 60px;">
              <input type="number" id="addusertime2i" placeholder="i"  min="00" max="59" value="00">
            </div>            
        <p></p>    
        <div class="ui selection dropdown" id="thangdropvipreaction">
          <input type="hidden" id="thangvipreaction">
          <i class="dropdown icon"></i>
          <div class="default text">Thời gian . . .</div>
          <div class="menu">
         <!--   <div class="item" data-value="0.1">1 ngày</div>
            <div class="item" data-value="0.2">2 ngày</div>
            <div class="item" data-value="0.3">3 ngày</div>
            <div class="item" data-value="0.4">4 ngày</div>
            <div class="item" data-value="0.5">5 ngày</div>
            <div class="item" data-value="0.6">6 ngày</div>
            <div class="item" data-value="0.7">7 ngày</div> -->
            <div class="item" data-value="1">1 tháng</div>
            <div class="item" data-value="2">2 tháng</div>
            <div class="item" data-value="3">3 tháng</div>
            <div class="item" data-value="4">4 tháng</div>
            <div class="item" data-value="5">5 tháng</div>
            <div class="item" data-value="6">6 tháng</div>
            <div class="item" data-value="7">7 tháng</div>
            <div class="item" data-value="8">8 tháng</div>
            <div class="item" data-value="9">9 tháng</div>
            <div class="item" data-value="10">10 tháng</div>
            <div class="item" data-value="11">11 tháng</div>
            <div class="item" data-value="12">12 tháng</div>
          </div>
        </div>
        <div class="ui input">
          <input type="text" id="adduseridbot" placeholder="IDBOT (nếu có)">
        </div>
        <div class="ui input">
          <input type="number" id="addusersleep" min="60" placeholder="Thời gian nghỉ (s)">
        </div>        
        <p></p>
        <div class="ui checkbox">
          <input type="checkbox" id="botonlyfriend" checked="checked" onclick="changerunonly();">
          <label>Chỉ tương tác bạn bè</label>
        </div>
        <div class="ui checkbox">
          <input type="checkbox" id="botonlyID" onclick="changerunonly();">
          <label>Tương tác cụ thể 1 ID</label>
        </div>        
        <div class="ui input">
          <input type="text" id="adduseronlyid" placeholder="Nhập ID">
        </div>
        <p></p>
        <div class="ui toggle checkbox">
        <input type="checkbox" id="onreaction" checked="checked" onclick="changeonreaction();">
        <label>Bot cảm xúc</label>
        </div><p></p>
            Tương tác sau khi bài đã đăng được: 
            <div class="ui input" style="width: 90px;">
              <input type="number" id="addusersleepafter"  min="00" value="1800">
            </div> giây<p></p>
            <div class="ui selection dropdown" id="classadduserspeedreaction">
              <input type="hidden" id="adduserspeedreaction">
              <i class="dropdown icon"></i>
              <div class="default text">Cảm xúc tối đa/lượt</div>
              <div class="menu">
                <div class="item" data-value="1">1 cảm xúc</div>
                <div class="item" data-value="2">2 cảm xúc</div>
                <div class="item" data-value="3">3 cảm xúc</div>
                <div class="item" data-value="4">4 cảm xúc</div>
                <div class="item" data-value="5">5 cảm xúc</div>
                <div class="item" data-value="6">6 cảm xúc</div>
                <div class="item" data-value="7">7 cảm xúc</div>
                <div class="item" data-value="8">8 cảm xúc</div>
                <div class="item" data-value="9">9 cảm xúc</div>
                <div class="item" data-value="10">10 cảm xúc</div>
              </div>
            </div>
        <p></p>
        <div id="adduserclasscamxuc" class="ui fluid multiple search selection dropdown">
          <input type="hidden" id="addusercamxuc">
          <i class="dropdown icon"></i>
          <div class="default text">Những cảm xúc tương tác</div>
          <div class="menu">
          <div class="item" data-value="LIKE" style="color: #558dff;"><img class="ui avatar image" src="icon/LIKE.png" style="margin: 0;"> LIKE</div>
          <div class="item" data-value="LOVE" style="color: #f54e63;"><img class="ui avatar image" src="icon/LOVE.png" style="margin: 0;"> LOVE</div>
          <div class="item" data-value="HAHA" style="color: #ffda6a;"><img class="ui avatar image" src="icon/HAHA.png" style="margin: 0;"> HAHA</div>
          <div class="item" data-value="WOW" style="color: #ffda6a;"><img class="ui avatar image" src="icon/WOW.png" style="margin: 0;"> WOW</div>
          <div class="item" data-value="SAD" style="color: #ffda6a;"><img class="ui avatar image" src="icon/SAD.png" style="margin: 0;"> SAD</div>
          <div class="item" data-value="ANGRY" style="color: #f66566;"><img class="ui avatar image" src="icon/ANGRY.png" style="margin: 0;"> ANGRY</div>
        </div>
        </div>
        <p></p>
        <div class="ui toggle checkbox">
        <input type="checkbox" id="oncomment" checked="checked" onclick="changeoncomment()">
        <label>Bot bình luận</label>
        </div>
        <p></p>
            <div class="ui selection dropdown" id="classadduserspeedcomment">
              <input type="hidden" id="adduserspeedcomment">
              <i class="dropdown icon"></i>
              <div class="default text">Bình luận tối đa/ lượt</div>
              <div class="menu">
                <div class="item" data-value="1">1 bình luận</div>
                <div class="item" data-value="2">2 bình luận</div>
                <div class="item" data-value="3">3 bình luận</div>
                <div class="item" data-value="4">4 bình luận</div>
                <div class="item" data-value="5">5 bình luận</div>
                <div class="item" data-value="6">6 bình luận</div>
                <div class="item" data-value="7">7 bình luận</div>
                <div class="item" data-value="8">8 bình luận</div>
                <div class="item" data-value="9">9 bình luận</div>
                <div class="item" data-value="10">10 bình luận</div>
              </div>
            </div>
        <p></p>
        <div class="ui fluid selection dropdown" id="adduserclassstickercmt">
          <input type="hidden" id="adduserstickercombo">
          <i class="dropdown icon"></i>
          <div class="default text">Chọn gói sticker</div>
          <div class="menu">
            <div class="item" data-value="NULL">
              <img class="ui mini avatar image" src="icon/cancel_grey_192x192.png">
              Không nhãn dán
            </div>
            <div class="item" data-value="Usagyuuun">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/28775940_186389685312020_2839270594392883200_n.png?_nc_cat=0&_nc_eui2=v1%3AAeHKKg50MZPjmtsWo_CJ9Iooi0TZyM6mvZwpgMrIZX84ZRESttIvyU0CdUMBd1x8XovBED47dhqY01BFIM6JQalTlDC2U9G3Sp5CSNt0h8zU4Q&oh=efa3aa591e8b63987052f0f25166f012&oe=5B2AD40F">
              Usagyuuun
            </div>
            <div class="item" data-value="Tonton">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/20016550_249193505599586_8511535641958285312_n.png?_nc_cat=0&_nc_eui2=v1%3AAeFIIn3FJCOM7D3XYpKDNAolK4VKDB1WPnqGcTjJjdTemO8XfvnjHEK_n0ZFuUv79QPHuSgl-IicFf54zTprnakgKxE6wW9OtTOVEG_TbNri6A&oh=adb0c4471168b8badb37b4012b9cc5f5&oe=5B36EF20">
              Bạn bè của Tonton
            </div>
            <div class="item" data-value="Batdong">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/10173513_361326520697320_313277671_n.png?_nc_cat=0&_nc_eui2=v1%3AAeFDoTF6p8Mj9ya2fOEtua7UGRvdgykXkAU7uYugR6LyHzmxIsxERsjsBfEFwGhZVJ62XVQPlvdB9pjfpZJ3spBkEBWR5KkEh9DelzS4sXQOvw&oh=44e25a80c29e9a64e18d58151f8df930&oe=5B316487">
              Bất động
            </div>
            <div class="item" data-value="Chuoi">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/21276104_478765945814691_8653235924542423040_n.png?_nc_cat=0&_nc_eui2=v1%3AAeH6EtL19LdE-m9gIjf2Lx1w91k11sSqPv8N5vU5pUcnyQgIJ458LwrlCAn1k0P4_DOAkGP5m7nJucpEdyRDtJrjGVwy60PDw3o6iDQhyXhpPQ&oh=df8d66e3ffab2d3cdc7028d63bd3b4a0&oe=5B27D260">
              Chuối
            </div>
            <div class="item" data-value="Mugsy">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/851550_394508134026626_2030653327_n.png?_nc_cat=0&_nc_eui2=v1%3AAeG3N1DTex36pX8rlcVH4NcWIgoimnuxtxMCMJS5tiyg07PaWaZfIk4enq8cXbHuHWc9JQwWFM7KCPcSDbJ7iuniA7aCAYEcDZwTYMvamYR2Ag&oh=79ef6c63373556473ead286f9f316b00&oe=5B2D4690">
              Mugsy đang yêu
            </div>
            <div class="item" data-value="Betakkuma20">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/22880451_925878967562819_4883549644308611072_n.png?_nc_eui2=v1%3AAeHOsZRUn3PucpPIlA71J5Yj1b0Vx6NLfx9FnxccTFsSTM09gqpZsbVW_qWmJ89OMh5cCZQJ2oscsuDxMkuDonq0K-aFNnT7FV-Wfu0qyEDRtA&oh=aa8dd18fa89b7db8e9d41595613834f3&oe=5B442C21">
              Betakkuma 2.0
            </div>
            <div class="item" data-value="Trongtai">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/10173504_298594296987436_1309836935_n.png?_nc_cat=0&_nc_eui2=v1%3AAeGCdahJ0tm8bqhEU_HCgJJtz9goaWYysfxuTsZgtDb7DdSOJlvWh0-b0J-_TdUEdbxd-hsXxrXoDApqEkgz1sx6LUWO5u6LTjIWwZxPqsSeUQ&oh=b39ba83bca59864633656715de477fa5&oe=5B2E94AA">
              Trọng tài
            </div>
            <div class="item" data-value="EmtraiYam">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/13178144_1598328823813272_547641551_n.png?_nc_cat=0&_nc_eui2=v1%3AAeHD5BtPHaT_1q9MqHTsnVPeJo6eJBthfAIur2Td6Up0lRyGkLVr6Mro-qqoRmbdVzJhi7D6dinUl61B9XsYgqYVrwv6ePfzOYCzg7PB-aCGLA&oh=78cadf575c112a5f1b6b34f3131c816b&oe=5B34939C">
              Em trai Yam
            </div>
            <div class="item" data-value="Duncan1">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/19571395_795436030627751_8864706679539761152_n.png?_nc_cat=0&_nc_eui2=v1%3AAeHcaAv41G3se_J9KVOPBKVJYpwYtf1CmkmoabLL-JBLANCF_787iXCW2ymeegotFP9P6U8Y0YVq5UUGneHtK-aNBzZ323M0GFtKHPwQEfVjFw&oh=02ee41e7287128f0467de449f0dcf276&oe=5B3A305A">
              Duncan hàng ngày quyển 1
            </div>
            <div class="item" data-value="Xinchaochonau">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/11057106_818525524903028_503368738_n.png?_nc_cat=0&_nc_eui2=v1%3AAeEDcivz-0ktwhy3QpHKQlh8SLKTiOSy-Mz1urS9JKmRyITujSd0Lq36kRKENvMGGP5RkDEsDIP_28_VbO3E2qWQxJdrJQYIRmPqKiAYwt8wXg&oh=a11f06843225ee80d26858ac9655ef47&oe=5B33C6E5">
              Xin chào chó nâu
            </div>
            <div class="item" data-value="Noohin">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/21387035_1357792364319652_1619545366032547840_n.png?_nc_cat=0&_nc_eui2=v1%3AAeGwCG8dH3LhtRkm1-pjNxfKBRD3XYT0ERra48nWIdxzmk6WK7atmOrOGOfF_JNf2m1Xg_nrMfpkm6aQftylW_CKVQtHgkewrHmmSkfEfbDJCQ&oh=66397203e769478c5c5070c6220f2750&oe=5B3D7DDA">
              Noo-Hin
            </div>
            <div class="item" data-value="QooBeeAgapi">
              <img class="ui mini avatar image" src="https://scontent.fdad3-1.fna.fbcdn.net/v/t39.1997-6/p34x34/29625756_1908637042780879_1752765252870602752_n.png?_nc_cat=0&oh=e4e267836e121ee24178458c768a6fe2&oe=5B33C341">
              QooBee Agapi
            </div>
            <div class="item" data-value="Piyomarukhoihai">
              <img class="ui mini avatar image" src="https://scontent.fdad3-1.fna.fbcdn.net/v/t39.1997-6/p34x34/16686749_345390149190533_1636486465099661312_n.png?_nc_cat=0&oh=f6eebecde71dbbc72a3bb91e3688da66&oe=5B6B4285">
              Piyomaru khôi hài
            </div>
            <div class="item" data-value="Rosavuive">
              <img class="ui mini avatar image" src="https://scontent.fdad3-1.fna.fbcdn.net/v/t39.1997-6/p34x34/18761889_298910120557065_1034874238281973760_n.png?_nc_cat=0&oh=6accf122a8d2005a6c5b3a648c555022&oe=5B3C006A">
              Rosa vui vẻ
            </div>            
          </div>
        </div>
        <p></p>
          <div class="field" id="classadduserimage">
            <div class="ui left icon input">
              <i class="image icon"></i><input type="text" id="adduserlinkimage" placeholder="Link ảnh bình luận (Để trống nếu không muốn sử dụng)">
            </div>
          </div>        
        <p></p>
        <div class="field" id="classaddusernoidungcmt">
          <label>Nội dung bình luận</label>
          <textarea id="addusercontentcomment" style="height: 80px;margin-top: 0px;margin-bottom: 0px;"> {Xin chào|Hello|Hi} ((tag)) {hãy|nhớ|đừng quên|cùng} tương tác với mình {nha|nhé}</textarea>
        </div>
        <p></p>

      </form>
    </div>
    <div id="adduserclasssoduhientai" class="actions">
      <b>Số dư:</b> <div id="addusersoduhientai" style="display:inline;"><?php if (isset($money)){ echo number_format($money); }else{ echo '0';} ?></div> đ<div onclick="AddBotUser();" class="ui green submit button">Thanh toán</div></div>
    </div>
</div>
<!-- HISTORY MODAL-->
<div class="ui modal" id="historymodal">
<i class="close icon"></i>
  <div class="header" id="headerhistory">Lịch sử hoạt động</div>
  <div class="content" >
        <div class="ui feed" id="contenthistory">
            Trống
        </div>
  </div>
</div>
<!-- HISTORY USER MODAL-->
<div class="ui modal" id="historyusermodal">
<i class="close icon"></i>
  <div class="header" id="headerhistoryuser">Lịch sử hoạt động</div>
  <div class="content" >
        <div class="ui feed" id="contenthistoryuser">
            Trống
        </div>
  </div>
</div>
<!-- EDIT BOT -->
<div id="modaledituser" class="ui modal">
    <i class="close icon"></i>
    <div class="header">
      <i class="edit icon"></i>Chỉnh sửa tài khoản
    </div>
    <div class="content">
      <form id="formeditreaction" class="ui form segment">
        <h4 class="ui dividing header">Vui lòng nhập đầy đủ các mục</h4>
          <div class="field">
            <div class="ui left icon input">
              <i class="qrcode icon"></i><input type="text" id="editusertoken" placeholder="Token full quyền" min="1">
            </div>
            <p></p>
            <div class="ui input">
              <input type="text" id="editusermaxeveryday" placeholder="Số bài tương tác tối đa/ ngày">
            </div>
          </div>
            <p></p>Thời gian hoạt động<p></p>
            <div class="ui input" style="width: 60px;">
              <input type="number" id="editusertime1H" placeholder="H" min="1" max="24" value="7">
            </div>:
            <div class="ui input" style="width: 60px;">
              <input type="number" id="editusertime1i" placeholder="i" min="00" max="59" value="00">
            </div> - >
            <div class="ui input" style="width: 60px;">
              <input type="number" id="editusertime2H" placeholder="H" min="1" max="24" value="23">
            </div>:
            <div class="ui input" style="width: 60px;">
              <input type="number" id="editusertime2i" placeholder="i"  min="00" max="59" value="00">
            </div>            
        <p></p>          
        <div class="ui input">
          <input type="text" id="edituseridbot" placeholder="IDBOT (nếu có)">
        </div>
        <div class="ui input">
          <input type="number" id="editusersleep" min="60" placeholder="Thời gian nghỉ (s)">
        </div>        
        <p></p>
        <div class="ui checkbox">
          <input type="checkbox" id="editbotonlyfriend" checked="checked" onclick="changeeditrunonly();">
          <label>Chỉ tương tác bạn bè</label>
        </div>
        <div class="ui checkbox">
          <input type="checkbox" id="editbotonlyID" onclick="changeeditrunonly();">
          <label>Tương tác cụ thể 1 ID</label>
        </div>        
        <div class="ui input">
          <input type="text" id="edituseronlyid" placeholder="Nhập ID">
        </div>
        <p></p>
        <div class="ui toggle checkbox">
        <input type="checkbox" id="editonreaction" checked="checked" onclick="changeeditonreaction();">
        <label>Bot cảm xúc</label>
        </div><p></p>
            Tương tác sau khi bài đã đăng được: 
            <div class="ui input" style="width: 90px;">
              <input type="number" id="editusersleepafter"  min="00" value="1800">
            </div> giây<p></p>        
            <div class="ui selection dropdown" id="classedituserspeedreaction">
              <input type="hidden" id="edituserspeedreaction">
              <i class="dropdown icon"></i>
              <div class="default text">Cảm xúc tối đa/ lượt</div>
              <div class="menu">
                <div class="item" data-value="1">1 cảm xúc</div>
                <div class="item" data-value="2">2 cảm xúc</div>
                <div class="item" data-value="3">3 cảm xúc</div>
                <div class="item" data-value="4">4 cảm xúc</div>
                <div class="item" data-value="5">5 cảm xúc</div>
                <div class="item" data-value="6">6 cảm xúc</div>
                <div class="item" data-value="7">7 cảm xúc</div>
                <div class="item" data-value="8">8 cảm xúc</div>
                <div class="item" data-value="9">9 cảm xúc</div>
                <div class="item" data-value="10">10 cảm xúc</div>
              </div>
            </div>
        <p></p>
        <div id="edituserclasscamxuc" class="ui fluid multiple search selection dropdown">
          <input type="hidden" id="editusercamxuc">
          <i class="dropdown icon"></i>
          <div class="default text">Những cảm xúc tương tác</div>
          <div class="menu">
          <div class="item" data-value="LIKE" style="color: #558dff;"><img class="ui avatar image" src="icon/LIKE.png" style="margin: 0;"> LIKE</div>
          <div class="item" data-value="LOVE" style="color: #f54e63;"><img class="ui avatar image" src="icon/LOVE.png" style="margin: 0;"> LOVE</div>
          <div class="item" data-value="HAHA" style="color: #ffda6a;"><img class="ui avatar image" src="icon/HAHA.png" style="margin: 0;"> HAHA</div>
          <div class="item" data-value="WOW" style="color: #ffda6a;"><img class="ui avatar image" src="icon/WOW.png" style="margin: 0;"> WOW</div>
          <div class="item" data-value="SAD" style="color: #ffda6a;"><img class="ui avatar image" src="icon/SAD.png" style="margin: 0;"> SAD</div>
          <div class="item" data-value="ANGRY" style="color: #f66566;"><img class="ui avatar image" src="icon/ANGRY.png" style="margin: 0;"> ANGRY</div>
        </div>
        </div>
        <p></p>
        <div class="ui toggle checkbox">
        <input type="checkbox" id="editoncomment" checked="checked" onclick="changeeditoncomment()">
        <label>Bot bình luận</label>
        </div>
        <p></p>
            <div class="ui selection dropdown" id="classedituserspeedcomment">
              <input type="hidden" id="edituserspeedcomment">
              <i class="dropdown icon"></i>
              <div class="default text">Bình luận tối đa/ lượt</div>
              <div class="menu">
                <div class="item" data-value="1">1 bình luận</div>
                <div class="item" data-value="2">2 bình luận</div>
                <div class="item" data-value="3">3 bình luận</div>
                <div class="item" data-value="4">4 bình luận</div>
                <div class="item" data-value="5">5 bình luận</div>
                <div class="item" data-value="6">6 bình luận</div>
                <div class="item" data-value="7">7 bình luận</div>
                <div class="item" data-value="8">8 bình luận</div>
                <div class="item" data-value="9">9 bình luận</div>
                <div class="item" data-value="10">10 bình luận</div>
              </div>
            </div>
        <p></p>
        <div class="ui fluid selection dropdown" id="edituserclassstickercmt">
          <input type="hidden" id="edituserstickercombo">
          <i class="dropdown icon"></i>
          <div class="default text">Chọn gói sticker</div>
          <div class="menu">
            <div class="item" data-value="NULL">
              <img class="ui mini avatar image" src="icon/cancel_grey_192x192.png">
              Không nhãn dán
            </div>
            <div class="item" data-value="Usagyuuun">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/28775940_186389685312020_2839270594392883200_n.png?_nc_cat=0&_nc_eui2=v1%3AAeHKKg50MZPjmtsWo_CJ9Iooi0TZyM6mvZwpgMrIZX84ZRESttIvyU0CdUMBd1x8XovBED47dhqY01BFIM6JQalTlDC2U9G3Sp5CSNt0h8zU4Q&oh=efa3aa591e8b63987052f0f25166f012&oe=5B2AD40F">
              Usagyuuun
            </div>
            <div class="item" data-value="Tonton">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/20016550_249193505599586_8511535641958285312_n.png?_nc_cat=0&_nc_eui2=v1%3AAeFIIn3FJCOM7D3XYpKDNAolK4VKDB1WPnqGcTjJjdTemO8XfvnjHEK_n0ZFuUv79QPHuSgl-IicFf54zTprnakgKxE6wW9OtTOVEG_TbNri6A&oh=adb0c4471168b8badb37b4012b9cc5f5&oe=5B36EF20">
              Bạn bè của Tonton
            </div>
            <div class="item" data-value="Batdong">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/10173513_361326520697320_313277671_n.png?_nc_cat=0&_nc_eui2=v1%3AAeFDoTF6p8Mj9ya2fOEtua7UGRvdgykXkAU7uYugR6LyHzmxIsxERsjsBfEFwGhZVJ62XVQPlvdB9pjfpZJ3spBkEBWR5KkEh9DelzS4sXQOvw&oh=44e25a80c29e9a64e18d58151f8df930&oe=5B316487">
              Bất động
            </div>
            <div class="item" data-value="Chuoi">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/21276104_478765945814691_8653235924542423040_n.png?_nc_cat=0&_nc_eui2=v1%3AAeH6EtL19LdE-m9gIjf2Lx1w91k11sSqPv8N5vU5pUcnyQgIJ458LwrlCAn1k0P4_DOAkGP5m7nJucpEdyRDtJrjGVwy60PDw3o6iDQhyXhpPQ&oh=df8d66e3ffab2d3cdc7028d63bd3b4a0&oe=5B27D260">
              Chuối
            </div>
            <div class="item" data-value="Mugsy">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/851550_394508134026626_2030653327_n.png?_nc_cat=0&_nc_eui2=v1%3AAeG3N1DTex36pX8rlcVH4NcWIgoimnuxtxMCMJS5tiyg07PaWaZfIk4enq8cXbHuHWc9JQwWFM7KCPcSDbJ7iuniA7aCAYEcDZwTYMvamYR2Ag&oh=79ef6c63373556473ead286f9f316b00&oe=5B2D4690">
              Mugsy đang yêu
            </div>
            <div class="item" data-value="Betakkuma20">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/22880451_925878967562819_4883549644308611072_n.png?_nc_eui2=v1%3AAeHOsZRUn3PucpPIlA71J5Yj1b0Vx6NLfx9FnxccTFsSTM09gqpZsbVW_qWmJ89OMh5cCZQJ2oscsuDxMkuDonq0K-aFNnT7FV-Wfu0qyEDRtA&oh=aa8dd18fa89b7db8e9d41595613834f3&oe=5B442C21">
              Betakkuma 2.0
            </div>
            <div class="item" data-value="Trongtai">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/10173504_298594296987436_1309836935_n.png?_nc_cat=0&_nc_eui2=v1%3AAeGCdahJ0tm8bqhEU_HCgJJtz9goaWYysfxuTsZgtDb7DdSOJlvWh0-b0J-_TdUEdbxd-hsXxrXoDApqEkgz1sx6LUWO5u6LTjIWwZxPqsSeUQ&oh=b39ba83bca59864633656715de477fa5&oe=5B2E94AA">
              Trọng tài
            </div>
            <div class="item" data-value="EmtraiYam">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/13178144_1598328823813272_547641551_n.png?_nc_cat=0&_nc_eui2=v1%3AAeHD5BtPHaT_1q9MqHTsnVPeJo6eJBthfAIur2Td6Up0lRyGkLVr6Mro-qqoRmbdVzJhi7D6dinUl61B9XsYgqYVrwv6ePfzOYCzg7PB-aCGLA&oh=78cadf575c112a5f1b6b34f3131c816b&oe=5B34939C">
              Em trai Yam
            </div>
            <div class="item" data-value="Duncan1">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/19571395_795436030627751_8864706679539761152_n.png?_nc_cat=0&_nc_eui2=v1%3AAeHcaAv41G3se_J9KVOPBKVJYpwYtf1CmkmoabLL-JBLANCF_787iXCW2ymeegotFP9P6U8Y0YVq5UUGneHtK-aNBzZ323M0GFtKHPwQEfVjFw&oh=02ee41e7287128f0467de449f0dcf276&oe=5B3A305A">
              Duncan hàng ngày quyển 1
            </div>
            <div class="item" data-value="Xinchaochonau">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/11057106_818525524903028_503368738_n.png?_nc_cat=0&_nc_eui2=v1%3AAeEDcivz-0ktwhy3QpHKQlh8SLKTiOSy-Mz1urS9JKmRyITujSd0Lq36kRKENvMGGP5RkDEsDIP_28_VbO3E2qWQxJdrJQYIRmPqKiAYwt8wXg&oh=a11f06843225ee80d26858ac9655ef47&oe=5B33C6E5">
              Xin chào chó nâu
            </div>
            <div class="item" data-value="Noohin">
              <img class="ui mini avatar image" src="https://scontent.fdad3-2.fna.fbcdn.net/v/t39.1997-6/p34x34/21387035_1357792364319652_1619545366032547840_n.png?_nc_cat=0&_nc_eui2=v1%3AAeGwCG8dH3LhtRkm1-pjNxfKBRD3XYT0ERra48nWIdxzmk6WK7atmOrOGOfF_JNf2m1Xg_nrMfpkm6aQftylW_CKVQtHgkewrHmmSkfEfbDJCQ&oh=66397203e769478c5c5070c6220f2750&oe=5B3D7DDA">
              Noo-Hin
            </div>
            <div class="item" data-value="QooBeeAgapi">
              <img class="ui mini avatar image" src="https://scontent.fdad3-1.fna.fbcdn.net/v/t39.1997-6/p34x34/29625756_1908637042780879_1752765252870602752_n.png?_nc_cat=0&oh=e4e267836e121ee24178458c768a6fe2&oe=5B33C341">
              QooBee Agapi
            </div>
            <div class="item" data-value="Piyomarukhoihai">
              <img class="ui mini avatar image" src="https://scontent.fdad3-1.fna.fbcdn.net/v/t39.1997-6/p34x34/16686749_345390149190533_1636486465099661312_n.png?_nc_cat=0&oh=f6eebecde71dbbc72a3bb91e3688da66&oe=5B6B4285">
              Piyomaru khôi hài
            </div>
            <div class="item" data-value="Rosavuive">
              <img class="ui mini avatar image" src="https://scontent.fdad3-1.fna.fbcdn.net/v/t39.1997-6/p34x34/18761889_298910120557065_1034874238281973760_n.png?_nc_cat=0&oh=6accf122a8d2005a6c5b3a648c555022&oe=5B3C006A">
              Rosa vui vẻ
            </div>            
          </div>
        </div>
        <p></p>
          <div class="field" id="classedituserimage">
            <div class="ui left icon input">
              <i class="image icon"></i><input type="text" id="edituserlinkimage" placeholder="Link ảnh bình luận (Để trống nếu không muốn sử dụng)">
            </div>
          </div>        
        <p></p>
        <div class="field" id="classeditusernoidungcmt">
          <label>Nội dung bình luận</label>
          <textarea id="editusercontentcomment" style="height: 80px;margin-top: 0px;margin-bottom: 0px;"> {Xin chào|Hello|Hi} ((tag)) {hãy|nhớ|đừng quên|cùng} tương tác với mình {nha|nhé}</textarea>
        </div>
        <p></p>

      </form>
    </div>
    <div id="edituserclasssoduhientai" class="actions">
       <div onclick="" class="ui green submit button" id="saveedituserbot">Lưu</div></div>
    </div>
</div>
<?php } ?>
<?php if($username == ""){ ?>
<!-- ĐĂNG KÝ-->
<div id="dathackysignin" class="ui fullscreen modal transition hidden" style="margin-top: -212.93px;">
    <i class="close icon"></i>
    <div class="header">
      Đăng ký tài khoản
    </div>
    <div class="content">
      <div class="ui form">
        <h4 class="ui dividing header">Vui lòng điền đầy đủ thông tin</h4>
        <div class="field">

        <label><i class="fa fa-user" aria-hidden="true"></i> Tài khoản <i>[a-z,0-9]</i></label>
        <div class="ui left icon input">
          <input id="sign-username" name="sign-username" type="username" placeholder="Username">
          <i class="user icon"></i>
        </div>
      </div>
        <!--div class="field">

        <label><i class="fa fa-user" aria-hidden="true"></i> Mã chatbot <i></i><a href="https://m.me/<?php echo $name_bot; ?>">(Click để nhận mã)</a></label>
        <div class="ui left icon input">
          <input id="sign-codechatbot" name="sign-codechatbot" type="codechatbot" placeholder="Code">
          <i class="user icon"></i>
        </div>
      </div-->   
        <div class="field">

        <label><i class="fa fa-user" aria-hidden="true"></i>Nhập ID Facebook <i></i></label>
        <div class="ui left icon input">
          <input id="sign-idfb" name="sign-idfb" type="codechatbot" placeholder="ID">
          <i class="qrcode icon"></i>
        </div>
      </div>       
      <div class="field">
        <label><i class="fa fa-lock" aria-hidden="true"></i> Mật khẩu <i></i></label>
        <div class="ui left icon input">
          <input id="sign-password" name="sign-password" type="password" placeholder="Password">
          <i class="lock icon"></i>
        </div>

        </div>
      <div class="field">
        <label><i class="fa fa-lock" aria-hidden="true"></i> Nhập lại mật khẩu</label>
        <div class="ui left icon input">
          <input id="sign-againpassword" name="sign-againpassword" type="password" placeholder="Password">
          <i class="lock icon"></i>
        </div>

        </div>
        <div class="actions">
          <div class="ui green button" onclick="ajaxSignIn();">Đăng ký</div>
        </div>
      </div>
    </div>

  </div>
<!-- ĐĂNG NHẬP-->
<div id="dathackylogin" class="ui fullscreen modal transition hidden" style="margin-top: -212.93px;">
    <i class="close icon"></i>
    <div class="header">
      Đăng nhập
    </div>
    <div class="content">
      <div class="ui form">
        <div class="field">

        <label><i class="fa fa-user" aria-hidden="true"></i> Tài khoản <i>[a-z,0-9]</i></label>
        <div class="ui left icon input">
          <input id="login-username" name="sign-username" type="username" placeholder="Username">
          <i class="user icon"></i>
        </div>
      </div>
      <div class="field">
        <label><i class="fa fa-lock" aria-hidden="true"></i> Mật khẩu <i></i></label>
        <div class="ui left icon input">
          <input id="login-password" name="sign-password" type="password" placeholder="Password">
          <i class="lock icon"></i>
        </div>

        </div>

        <div class="actions">
          <div class="ui green button" onclick="ajaxLogin();">Đăng nhập</div>
        </div>
      </div>
    </div>

  </div>
<?php } ?>
<?php if($username != ""){  ?>
<!-- ĐỔI MẬT KHẨU -->
<div id="modaldoimatkhau" class="ui modal">
<i class="close icon"></i>
<div class="ui segment">
<center><h3 class="ui horizontal divider header" style="color: rgb(65, 131, 196);">
  <i class="address card outline icon"></i>
  Đổi mật khẩu
</h3></center>
<div class="ui container">
<h5>Vui lòng nhập đầy đủ thông tin</h5>
<div class="ui segment">
        <div class="ui teal right labeled left icon input">
          <i class="low vision icon"></i>
          <input id="matkhaucu" type="password" placeholder="Mật khẩu cũ">
          <a class="ui teal tag label">
            Old
          </a>
        </div><br><p></p>
        <div class="ui teal right labeled left icon input">
          <i class="low vision icon"></i>
          <input id="matkhaumoi" type="password" placeholder="Mật khẩu mới">
          <a class="ui teal tag label">
            New
          </a>
        </div><br><p></p>
        <div class="ui teal right labeled left icon input">
          <i class="low vision icon"></i>
          <input id="nhaplaimatkhaumoi" type="password" placeholder="Nhập lại mật khẩu mới">
          <a class="ui teal tag label">
            Again
          </a>
        </div>
<p></p>
    <button onclick="luuthongtin();" class="ui blue basic button"><i class="write icon"></i>LƯU</button>
</div> 
</div>
</div>
</div>
<!-- END ĐỔI MẬT KHẨU -->
<!-- ĐỔI ID BOT -->
<div id="modaldoiidbot" class="ui modal">
<i class="close icon"></i>
<div class="ui segment">
<center><h3 class="ui horizontal divider header" style="color: rgb(65, 131, 196);">
  <i class="address card outline icon"></i>
  Đổi ID BOT
</h3></center>
<div class="ui container">
<div class="ui segment">
        <div class="ui teal right labeled left icon input">
          <i class="qrcode icon"></i>
          <input id="idbotedit" type="text" placeholder="Nhập ID Bot mới">
          <a class="ui teal tag label">
            New
          </a>
        </div><br><p></p>
<p></p>
    <button onclick="luuthongtinidbot();" class="ui blue basic button"><i class="write icon"></i>LƯU</button>
</div> 
</div>
</div>
</div>
<!-- GET TOKEN -->
<div id="modalgettoken" class="ui modal">
<i class="close icon"></i>
<div id="classgettokenuser" class="ui form segment">
<center><h3 class="ui horizontal divider header" style="color: rgb(65, 131, 196);">
  <i class="qrcode icon"></i>
  Get token
</h3></center>
<div class="ui container">
<h5>Vui lòng nhập đầy đủ thông tin</h5>
<div class="ui segment">
        <div class="ui teal right labeled left icon input">
          <i class="user icon"></i>
          <input id="gtkusername" type="text" placeholder="Username">
          <a class="ui teal tag label">
            Username
          </a>
        </div><br><p></p>
        <div class="ui teal right labeled left icon input">
          <i class="certificate icon"></i>
          <input id="gtkpassword" type="password" placeholder="Password">
          <a class="ui teal tag label">
            Password
          </a>
        </div>
        
        <p></p>
        <div class="field">
          <label>Token:</label>
          <textarea id="resultgettoken" style="height: 80px;margin-top: 0px;margin-bottom: 0px;" placeholder="Kết quả. . ."></textarea>
        </div>
<p></p>
    <button onclick="gettokenuser();" class="ui blue button">GET</button>
</div>
</div>
</div>
</div>
<?php } ?>
<?php if($level == "4"){ ?>
<!-- CỘNG TRỪ TIỀN -->
<div id="modalcongtrutien" class="ui modal">
<i class="close icon"></i>
<div class="ui segment">
<center><h3 class="ui horizontal divider header" style="color: rgb(65, 131, 196);">
  <i class="address card outline icon"></i>
  Cộng/trừ tiền
</h3></center>
<div class="ui container">
<h5>Vui lòng nhập đầy đủ thông tin</h5>
<div class="ui segment">
        <div class="ui teal right labeled left icon input">
          <i class="user icon"></i>
          <input id="cttusername" type="text" placeholder="Username">
          <a class="ui teal tag label">
            Username
          </a>
        </div><br><p></p>
        <div class="ui teal right labeled left icon input">
          <i class="money icon"></i>
          <input id="cttmoney" type="text" placeholder="Số tiền (VD: +100)">
          <a class="ui teal tag label">
            Money
          </a>
        </div>
<p></p>
    <button onclick="congtrutien();" class="ui blue basic button"><i class="write icon"></i>Thực hiện</button>
</div>
</div>
</div>
</div>
<!-- PHÂN QUYỀN -->
<div id="modalphanquyen" class="ui modal">
<i class="close icon"></i>
<div class="ui segment">
<center><h3 class="ui horizontal divider header" style="color: rgb(65, 131, 196);">
  <i class="spy icon"></i>
  Phân quyền
</h3></center>
<div class="ui container">
<h5>Vui lòng nhập đầy đủ thông tin</h5>
<div class="ui segment">
        <div class="ui teal right labeled left icon input">
          <i class="user icon"></i>
          <input id="pqusername" type="text" placeholder="Username">
          <a class="ui teal tag label">
            Username
          </a>
        </div><br><p></p>
        <div class="ui selection dropdown">
          <input type="hidden" id="pqtype">
          <i class="dropdown icon"></i>
          <div class="default text">Chọn cấp bậc...</div>
          <div class="menu">
            <div class="item" data-value="2">Cộng tác viên</div>
            <div class="item" data-value="1">Thành viên</div>
          </div>
        </div>
<p></p>
    <button onclick="phanquyen();" class="ui blue basic button"><i class="write icon"></i>Thực hiện</button>
</div>
</div>
</div>
</div>
<?php } ?>
<!-- Modal confirm -->
<div id="modalconfirm" class="ui mini modal">
    <div id="titlemodalconfirm" class="header">
      Tiêu đề
    </div>
    <div id="contentmodalconfirm" class="content">
      <p>Nội dung</p>
    </div>
    <div class="actions">
      <div id="nomodalconfirm" class="ui negative button">
        Không
      </div>
      <a id="yesmodalconfirm" href="#" onclick="" class="ui positive right button">
        Xác nhận
      </a>
    </div>
</div>
<!-- End modal confirm-->
<script>
$('.ui.label')
  .popup()
;    
</script>
<!-- THÔNG BÁO -->
<div id="thongbao" class="ui basic modal">
  <div class="ui icon header">
      <i class="alarm outline icon"></i>
  </div>
  <div id="textthongbao" class="ui icon header">
    <i class="alarm outline icon"></i>
    Hello bro :))
  </div>
</div>
<!-- END THÔNG BÁO -->
<!-- footer-->
<p></p><br>
<div id="footers" class="ui black inverted vertical footer" style="margin-top: -19px;z-index: -1;background: -webkit-linear-gradient(left, #232526 30%, #414345 100%);">
<div class="ui black aligned container"><br>
    <label class="ui black center aligned container" style="color: aliceblue;"><?php echo $slogan; ?></label>
    <div class="ui inverted section divider"></div>
    <img src="https://graph.facebook.com/<?php echo $imageslogan2;?>/picture?type=large&amp;redirect=true&amp;width=100&amp;height=100" class="ui centered mini image" style="border-radius: 8px;">
    <div class="ui horizontal inverted small divided link list">
      <a class="ui black center aligned container item" href="http://fb.com/<?php echo $linkslogan2; ?>"><?php echo $slogan2; ?></a>
    </div>
    <div class="ui horizontal inverted small divided link list">
      <a class="ui black right aligned container item" href="http://fb.com/kaku.lazy"></a>
    </div>
  </div>
</div>
<!-- end footer-->
</body>
<!-- END BODY --> 
</html>