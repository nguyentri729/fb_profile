
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/bootstrap-clearmin.min.css">
     <!-- Toastr CSS -->
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/font-awesome.min.css">
    <title>Đăng nhập Admin</title>
    <style></style>
</head>

<body class="cm-login">

    <div class="text-center" style="padding:90px 0 30px 0;background:#fff;border-bottom:1px solid #ddd">
        <h3>Đăng nhập hệ thống</h3><br>
        <small>Quản trị viên đăng nhập</small>
       <!--  <img src="assets/img/logo-big.svg" width="300" height="45"> -->
    </div>

    <div class="col-sm-6 col-md-4 col-lg-3" style="margin:40px auto; float:none;">
        <form method="post" action="">
            <div class="col-xs-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-fw fa-user"></i>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Email" id="email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-fw fa-lock"></i>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                    </div>
                </div>
           

 

            <div class="form-group">
                    <center><?=$captcha['image']?><br><br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-fw fa-lock"></i>
                        </div>
                        <input type="number" name="captcha" class="form-control" placeholder="Mã bảo mật" id="captcha">
                    </div>
              
              </div>
               </div>
              <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
              
            <div class="col-xs-12">
                <button type="submit" class="btn btn-block btn-primary" id="dang_nhap_btn">Đăng nhập</button>
            </div></center>
        </form>
    </div>
</body>


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
        $.post('', $(this).serialize()).done(function(a){
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
</html>