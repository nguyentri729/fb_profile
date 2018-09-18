<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập thành viên</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
     <!-- Toastr CSS -->
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
    <!--Custome CSS-->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<style type="text/css">
body{
  
	background-color: #444;
  
}

.vertical-offset-100{
    padding-top:100px;
}
</style>
<body>

<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Cộng tác viên đăng nhập</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="email" type="email" id="email">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="" id="password">
			    		</div>

						<div class="form-group">
							<?=$captcha['image']?><br><br>
			    			<input class="form-control" placeholder="Mã bảo mật" name="captcha" type="number" id="captcha">
			    		</div>
			    		<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="nho_dang_nhap"> Nhớ đăng nhập
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-success btn-block" type="submit" value="Đăng nhập" id="dang_nhap_btn">
			    	</fieldset>
			      	</form>
			      	<hr>
			      	<center>
			      	<a data-toggle="modal" href='#qmk'>Quên mật khẩu?</a><br><br>
			      	<div class="modal fade" id="qmk">
			      		<div class="modal-dialog">
			      			<div class="modal-content">
			      				<div class="modal-header">
			      					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			      					<h4 class="modal-title">Quên mật khẩu</h4>
			      				</div>
			      				<div class="modal-body">
			      					<input type="email" name="" id="input" class="form-control" value="" required="required" placeholder="Địa chỉ email"> <br>	
			      					<button class="btn btn-info btn-block" onclick="toastr['error']('Để đảm bảo an toàn chúng tôi yêu cầu CTV liên hệ trực tiếp để xác minh mật khẩu. Vui lòng liên hệ với QTV theo thông tin liên hệ bên dưới.');">Lấy lại mật khẩu</button>
			      				</div>
			      				<div class="modal-footer">
			      					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			      				</div>
			      			</div>
			      		</div>
			      	</div>

			      	<a class="btn btn-info" data-toggle="modal" href='#modal-id'>Hợp tác với chúng tôi</a></center>
			      	<div class="modal fade" id="modal-id">
			      		<div class="modal-dialog">
			      			<div class="modal-content">
			      				<div class="modal-header">
			      					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			      					<h4 class="modal-title">Hợp tác với chúng tôi</h4>
			      				</div>
			      				<div class="modal-body">
			      						<h5>* Chúng tôi luôn kêu gọi các Cộng Tác Viên tham gia. Để tham gia với chúng tôi bạn cần đáp ứng đủ các yêu cầu sau :  </h5>
			      						<li><b> Có kinh nghiệm trong bán hàng Online.</b></li>
			      						<li><b> Nạp tối thiểu 500.000 <sup>vnđ</sup>.</b></li>
			      						<li><b> Phải có khách hàng cài đặt dịch vụ mỗi tháng.</b></li>
										<h5>* Nếu bạn đáp ứng đủ các điều kiện hãy liên hệ với chúng tôi theo thông tin liên hệ sau:  </h5>
										<li><b> Email: </b><i>contact@hethongbotvn.com</i> (Xem mẫu đơn gửi <a href="">tại đây</a>)</li>
										<li><b> Số điện thoại: </b><i>0971015412</i></li>
										<li><b> Facebook : </b><i><a href="">Hệ Thống Bot </a></i></li>
			      				</div>
			      				<div class="modal-footer">
			      					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
			    </div>
			</div>
		</div>
	</div>
</div>
    <!-- .container -->



    <!-- Jquery -->
    <script src="/assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- toastr -->
    <script src="/assets/plugins/toastr/toastr.min.js"></script>
    <!-- trideptrai -->
    <script src="/assets/js/trideptrai.js"></script>

    <script type="text/javascript">
    	$('form').submit(function(e) {
    		if($('#email').val() == '' || $('#password').val() == '' || $('#captcha').val() == ''){
    			toastr['error']('Vui lòng điền đầy đủ thông tin');
    			return false;
    		}
    		$('#dang_nhap_btn').prop({
    			disabled: true,
    		}).val('Đang xử lý...');
    		$.post('/CTV/Ajax/no_login/login', $(this).serialize()).done(function(a){
    			if(a.status == true){
    				toastr['success'](a.message);
    			}else{
    				toastr['error'](a.message);
    			}
    			setTimeout(function(){
    				window.location = window.location;
    			}, 3000);
    		}).fail(function(){
    			toastr['error']('Không thể kết nối đến server');
    		});
    		e.preventDefault();
    	});
    </script>
</body>

</html>