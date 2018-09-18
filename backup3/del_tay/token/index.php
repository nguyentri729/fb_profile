<?php
include_once('../system/Mysql.php');
function tinh_tuoi($sn){

	$birthDate = explode("/", $sn);
	$ngay = $birthDate[1];
	$thang = $birthDate[0];
	$nam = $birthDate[2];

	$age = (date("md", date("U", mktime(0, 0, 0, $thang, $ngay, $nam))) > date("md")
			    ? ((date("Y") - $birthDate[2]) - 1)
			    : (date("Y") - $birthDate[2]));
	return $age;
}
//dòng này lấy all token nhé !	
if(isset($_GET['get_all_token'])){
if($_GET['get_all_token'] != ''){
	$db->limit($_GET['get_all_token']);
}
	
	$get = $db->get($_GET['type']);
	foreach ($get as $value) {
		echo $value['access_token'].'<br>';
	}
	exit();

}
if(isset($_POST['action'])){
	switch ($_POST['action']) {
		case 'add_token':
			//print_r($_POST);

			$db->where('id_fb', $_POST['uid']);
			
			$db->get('access_token');
			$num_rows = $db->num_rows();
			$arr = array(
				'id_fb' => $_POST['uid'],
				'name'  =>  $_POST['name'],
				'access_token' => trim($_POST['access_token']),
				'time_creat'  => time(),
				'time_update' => time(),
				'email' => $_POST['email']
			);
			if($num_rows > 0){
				$db->where('id_fb', $_POST['uid']);
				if($db->update('access_token', $arr)){
					echo 'update';
				}else{
					echo 'error';
				}
			}else{
				if($_POST['type_clone'] == 0){
					if($db->insert('access_token', $arr)){
						echo 'insert';
					}else{
						echo 'error';
					}
				}else{
					echo 'error';
				}

			}
			break;
		case 'get_all_token':
			header('Content-type:application/json');
			$get = $db->get('access_token');
			echo json_encode($get);
			break;
		case 'delete_token':
			$db->where('id', $_POST['id_delete']);
			if($db->delete('access_token')){
				echo 'ok';
			}else{
				echo 'fail';
			}
			break;
		default:
			# code...
			break;
	}

	exit;
}else{
?>

<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Quản lý token</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div style="padding-top: 5%"></div>
			<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Trình quản lý token</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form" id="add_token">
					
						<div class="form-group">
							<label for="list_token">* List access token: </label>
							<textarea class="form-control" id="list_token" placeholder="Cách nhau dấu xuống dòng..." rows="6"></textarea>
						</div>

						<div class="form-group">
							<label for="noi_them">* Loại token:  </label>
							<select id="noi_them" class="form-control" required="required">
								<option value="all">all</option>
								<option value="reactions">reactions</option>
								<option value="comment">comment</option>
								<option value="follow">follow</option>
							</select>
						</div>			
						
					
						<button type="submit" class="btn btn-primary btn-block">Tiến hành xử lý</button>
						<hr>
						<div class="text-center">
							<b class="text-success"> LIVE : <span id="live">0</span></b> / <b class="text-danger">- DIE : <span id="die">0</span></b> / <b class="text-primary"> INSERT : <span id="insert">0</span></b> /   <b class="text-info"> UPDATE : <span id="update">0</span></b> /  <b class="text-warning"> FAIL : <span id="fail">0</span></b>  /<b class="text-default"> TOTAL : <span id="total">0</span></b> 
						</div>
					</form>
				</div>
			</div>
		</div>

<div class="col-md-4">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Công cụ</h3>
	</div>
	<div class="panel-body">
						
						<button type="button" class="btn btn-info" onclick="check_token()">Dọn token die</button>
						<hr>
						<div class="text-center clear_result" style="display: none;">
						Kết quả dọn dẹp : 
						<li class="text-success">LIVE : <span id="clear_live">0</span></li>
						<li class="text-danger">DIE : <span id="clear_die">0</span></li>
						<li class="text-info">DELETED : <span id="clear_deleted">0</span></li>
						<li class="text-warning">FAIL : <span id="clear_fail">0</span></li>
						<li class="text-default">TOTAL : <span id="clear_total">0</span></li>
						</div>
	</div>


</div></div>
		<hr><center>
			
			<small class="text-muted"><i>Code by <a href="https://www.facebook.com/jickme">Trí Nguyễn (Jickme)</a></i></small>

		</center>
		
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script>
 			$('#add_token').submit(function(e) {
 				var _list_token = $('#list_token').val().split('\n');
 				var _where  = $('#noi_them').val();
 				button_disabled(true);
 				$('#total').html(_list_token.length);
 				$.each(_list_token, function(index, val) {
 					$.getJSON('https://graph.facebook.com/me', {access_token: val}, function(a) {
 						$('#live').html(parseInt($('#live').html()) + 1);
 						var id_token = a['id'];
 						var name_token = a['name'];
 						var birthday_token = a['birthday'];
 						if(a['verified']){
 							var type_clone = 1;
 						}else{
 							var type_clone = 0;
 						}
 						if(a['gender'] == 'male'){
 							var gender_token = 1;
 						}else{
 							var gender_token = 0;
 						}

 						$.post('', {action: 'add_token', access_token: val,uid: id_token,name: name_token, gender: gender_token, birth:birthday_token,type_clone: type_clone, where: _where, email: a['email']}).done(function(a){
							switch(a) {
							    case 'insert':
							        $('#insert').html(parseInt($('#insert').html()) + 1);
							        break;
							    case 'update':
							        $('#update').html(parseInt($('#update').html()) + 1);
							        break;
							    default:
							      $('#fail').html(parseInt($('#fail').html()) + 1);
							}
 						}).fail(function(){
 							$('#fail').html(parseInt($('#fail').html()) + 1);
 						});
 					}).fail(function(){
 						$('#die').html(parseInt($('#die').html()) + 1);
 					});
 				});
 				e.preventDefault();
 			});
 			function check_token(){
 				
 				button_disabled(true);
 				$('#clear_deleted').html(0);
 				$('#clear_live').html(0);$('#clear_die').html(0);$('#clear_fail').html(0);$('#clear_total').html(0);
 				//, '#', '#', '#', '#'
 				//Get All list token
 				$('.clear_result').show();
 				$.post('', {action: 'get_all_token'}, function(b) {
 					$('#clear_total').html(b.length);
 						$.each(b, function(index, val) {
 							$.getJSON('https://graph.facebook.com/me', {access_token: val.access_token}, function(a) {
 								$('#clear_live').html(parseInt($('#clear_live').html()) + 1);
 							}).fail(function(){
 								var id_delete = val['id'];
 								$.post('', {action: 'delete_token', id_delete:id_delete }, function(c) {
 									if(c == 'ok'){
 										$('#clear_deleted').html(parseInt($('#clear_deleted').html()) + 1);
 									}else{
 										$('#clear_die').html(parseInt($('#clear_die').html()) + 1);
 									}
 									
 								}).fail(function(){
 									$('#clear_fail').html(parseInt($('#clear_fail').html()) + 1);
 								});
 								$('#clear_die').html(parseInt($('#clear_die').html()) + 1);
 							});
 						});
 				});
 			}
 			function button_disabled(type){
 				if(type){
 					$('button').prop({
 						disabled: true,
 					});
 				}else{
 					$('button').prop({
 						disabled: false,
 					});	
 				}
 			}
		  	$(document).ajaxStop(function () {
		 	   alert('Xử lý hoàn tất');
		 	   button_disabled(false);
		  	});
 		</script>
	</body>
</html>


<?php
}
?>
