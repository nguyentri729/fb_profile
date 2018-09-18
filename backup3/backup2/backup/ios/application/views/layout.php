<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from www.enableds.com/products/kolor3/homepages.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Jul 2018 07:26:11 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title>CÔNG CỤ FACEBOOK</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url('app')?>/fonts/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    if(isset($config['data_time_picker'])){
        echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
    }
    ?>

    <link rel="stylesheet" type="text/css" href="<?=base_url('app')?>/styles/framework.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
    <?php
    if($view =='page/index'){
        ?>
        <div id="preloader" class="preloader-light">
            <h1 class="center-text color-black ultrabold uppercase bottom-0 fa-2x">HETHONGBOTVN.COM</h1>
            <div id="preload-spinner"></div>
            <p>Công cụ hỗ trợ bán hàng Facebook</p>
            <em>Vui lòng đợi tải trang...</em>
        </div>
    <div id="page-transitions" class="page-build">
        <div class="page-bg gradient-body-1"></div>
        <div class="header shadow-large header-light header-logo-app">
           
            <a data-menu="menu-1" data-menu-type="menu-sidebar-left-push" href="#" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
            
            <a data-menu="menu-bell" data-menu-type="menu-box-top" href="#" class="header-icon header-icon-2"><i class="fas fa-bell"></i></a>
            <a data-menu="menu-settings" data-menu-type="menu-box-full" href="#" class="header-icon header-icon-3"><i class="fas fa-cog fa-spin font-12"></i></a>
        </div>
        <?php
    }else{
        ?>
<div id="preloader" class="preloader-light">
            <h1 class="center-text color-black ultrabold uppercase bottom-0 fa-2x">HETHONGBOTVN.COM</h1>
            <div id="preload-spinner"></div>
            <p>Công cụ hỗ trợ bán hàng Facebook</p>
            <em>Vui lòng đợi tải trang...</em>
        </div> 
<div class="header shadow-large header-light header-logo-app" style="transition: all 350ms ease;">

<a href="<?=$back['href_back']?>" class="header-title"><?=$back['title']?></a>
<a href="#" class="back-button header-icon header-icon-1"><i class="fas fa-angle-left"></i></a>

<a data-menu="menu-1" data-menu-type="menu-sidebar-left-push" href="#" class="header-icon header-icon-2"><i class="fas fa-bars"></i></a>
<a data-menu="menu-settings" data-menu-type="menu-box-full" href="#" class="header-icon header-icon-3"><i class="fas fa-cog fa-spin font-12"></i></a>
</div>
</div>
        <?php
    }
    ?>



        <div id="menu-1" class="menu menu-sidebar-left menu-settings">
            <div class="menu-bg gradient-body-1"></div>
            <div class="menu-scroll">
                <div class="menu-header">
                   <img src="https://graph.fb.me/<?=$data['info_member']['id_fb']?>/picture?width=300&height=300" class="menu-logo">
                    <h1 style="font-size: 17px;"><?=$data['info_member']['name']?></h1>
                    <p><i class="fa fa-clock-o" aria-hidden="true"> <?=date('d/m/Y', $data['info_member']['time_use'])?> </i> </p>
                </div>
                <div class="menu-list icon-background-active">
                    <em class="menu-divider top-10">Các tính năng</em>
                    <a class="menu-item" href="index-2.html"><i class="fa gradient-red-light fa-star"></i>Menu 1</a>
   


                    <a data-submenu="submenu-2" class="menu-item" href="#"><i class="fa gradient-mint-dark fa-shopping-bag"></i>SubMenu<span></span></a>
                    <div id="submenu-2" class="submenu">
                        <a href="news.html">News</a>
                        <a href="shop.html">Shop</a>
                        <a href="blog.html">Blog</a>
                    </div>


                </div>
                <em class="menu-copyright">Copyright <span class="copyright-year"></span>, Enabled. All Rights Reserved</em>
            </div>
        </div>
        <div class="page-content header-clear-large">
            <input type="hidden" id="token" value="<?=$data['info_member']['access_token']?>">

            <?php

                $this->load->view($view, $data, FALSE);
            ?>
           
        </div>
       
        <div class="menu menu-box-full shadow-large" id="menu-settings">
            <div class="page-bg gradient-body-1">
                <div class="cover-content-center">
                    <div class="content">
                        <h1 class="uppercase ultrabold center-text fa-4x bottom-25 color-white text-shadow-large">THEMES</h1>
                        <p class="center-text bottom-50 opacity-50 font-14 color-white text-shadow-large">
                            Chọn giao diện bạn thích
                           
                        </p>
                        <ul class="demo-colors">
                            <li><a href="#" class="democ-1 color-white bottom-10 no-border"><i class="shadow-icon-large gradient-body-1"></i>Default</a>
                            </li>
                            <li><a href="#" class="democ-5 color-white bottom-10 no-border"><i class="shadow-icon-large gradient-body-5"></i>Violet</a>
                            </li>
                            <li><a href="#" class="democ-7 color-white bottom-10 no-border"><i class="shadow-icon-large gradient-body-7"></i>Magenta</a>
                            </li>
                            <li><a href="#" class="democ-6 color-white bottom-10 no-border"><i class="shadow-icon-large gradient-body-6"></i>Red</a>
                            </li>
                            <li><a href="#" class="democ-3 color-white bottom-10 no-border"><i class="shadow-icon-large gradient-body-3"></i>Green</a>
                            </li>
                            <li><a href="#" class="democ-4 color-white bottom-10 no-border"><i class="shadow-icon-large gradient-body-4"></i>Blue</a>
                            </li>
                            <li><a href="#" class="democ-2 color-white bottom-10 no-border"><i class="shadow-icon-large gradient-body-2"></i>Orange</a>
                            </li>
                            <li><a href="#" class="democ-8 color-white bottom-10 no-border"><i class="shadow-icon-large gradient-body-8"></i>Dark</a>
                            </li>
                            <li><a href="#" class="democ-9 color-white bottom-10 no-border"><i class="shadow-icon-large gradient-body-9"></i>Yellow</a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                        <a href="#" class="close-menu top-40 button button-round button-s button-white uppercase ultrabold button-center shadow-icon-small">Chọn</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-bell" data-menu-height="425" class="menu menu-box-top bg-white">
            <a href="#" class="bell-item">
                <img class="preload-image shadow-icon-large" src="images/empty.png" data-src="images/pictures_people/4s.png">
                <strong>Kolor is Awesome</strong><span class="bg-green2-dark">FRESH</span>
                <em>
You can setup awesome notifications in a menu as well, add useful news and info here.
</em>
            </a>
            <a href="#" class="bell-item">
                <img class="preload-image shadow-icon-large" src="images/empty.png" data-src="images/pictures_people/3s.png">
                <strong>Blazing Fast Loading</strong><span class="bg-red-dark">SYSTEM</span>
                <em>
You can setup awesome notifications in a menu as well, add useful news and info here.
</em>
            </a>
            <a href="#" class="bell-item">
                <img class="preload-image shadow-icon-large" src="images/empty.png" data-src="images/pictures_people/1s.png">
                <strong>Easy to use and Edit</strong><span class="bg-orange-dark">simple</span>
                <em>
You can setup awesome notifications in a menu as well, add useful news and info here.
</em>
            </a>
            <a href="#" class="bell-item bottom-10">
                <img class="preload-image shadow-icon-large" src="images/empty.png" data-src="images/pictures_people/2s.png">
                <strong>Elite Author Quality</strong><span class="bg-blue-dark">quality</span>
                <em>
You can setup awesome notifications in a menu as well, add useful news and info here.
</em>
            </a>
            <div class="menu-bar">
                <div></div>
            </div>
        </div>
        <div id="menu-phone" data-menu-height="285" class="menu menu-box-bottom bg-white">
            <h1 class="center-text top-20 bottom-0 uppercase ultrabold">GIVE US A CALL</h1>
            <p class="color-black center-text font-12 opacity-50 top-0">Tap the number you want to call, we'll connect you.</p>
            <div class="phone-boxes top-20">
                <a href="tel:(234) 567 890" class="phone-box">
                    <i class="shadow-icon-large fa fa-user bg-blue-dark"></i>
                    <em>John Doe</em>
                    <strong>(234) 567 890</strong>
                </a>
                <a href="tel:(234) 567 890" class="phone-box">
                    <i class="shadow-icon-large fa fa-briefcase bg-green-dark"></i>
                    <em>Office</em>
                    <strong>(234) 567 890</strong>
                </a>
                <a href="tel:(234) 567 890" class="phone-box">
                    <i class="shadow-icon-large fa fa-life-ring font-24 bg-orange-dark"></i>
                    <em>Support</em>
                    <strong>(234) 567 890</strong>
                </a>
                <div class="clear"></div>
            </div>
            <div class="decoration opacity-50 bottom-10"></div>
            <p class="center-text font-10 small-line-height top-10">Monday - Friday | 09:00 AM to 10:00 PM</p>
        </div>
        <div id="menu-share" data-menu-height="375" class="menu menu-box-bottom bg-white">
            <h1 class="center-text top-20 bottom-0 uppercase ultrabold">Sharing the Love</h1>
            <p class="color-black center-text font-12 opacity-50 top-0">Share your page with the world, just tap an icon.</p>
            <div class="share-icons">
                <a href="#" class="shareToFacebook"><i class="fab fa-facebook-f shadow-icon-large facebook-bg"></i><em>Facebook</em></a>
                <a href="#" class="shareToGooglePlus"><i class="fab fa-google-plus-g shadow-icon-large google-bg"></i><em>Google +</em></a>
                <a href="#" class="shareToTwitter"><i class="fab fa-twitter shadow-icon-large twitter-bg"></i><em>Twitter</em></a>
                <a href="#" class="shareToPinterest"><i class="fab fa-pinterest-p shadow-icon-large pinterest-bg"></i><em>Pinterest</em></a>
                <a href="#" class="shareToWhatsApp"><i class="fab fa-whatsapp shadow-icon-large whatsapp-bg"></i><em>WhatsApp</em></a>
                <a href="#" class="shareToMail"><i class="far fa-envelope shadow-icon-large mail-bg"></i><em>Email</em></a>
            </div>
            <p class="center-text font-10 small-line-height top-10">Copyright <span class="copyright-year"></span> Enabled. All Rights Reserved.</p>
        </div>
        <a href="#" class="back-to-top-badge back-to-top-small shadow-large bg-blue-dark"><i class="fa fa-angle-up"></i>Back to Top</a>
    </div>
   


  
    <script type="text/javascript" src="<?=base_url('app')?>/scripts/jquery.js"></script>
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.a_click').click(function(e) {
           var href = $(this).attr('href');
          // $('body').addClass('is-loading');
           setTimeout(function(){
            window.location = href;
           }, 2000);
           
           e.prenventDefault();
        });
    </script>
    <script type="text/javascript" src="<?=base_url('app')?>/scripts/plugins.js"></script>
    <script type="text/javascript" src="<?=base_url('app')?>/scripts/custom.js"></script>
    <script type="text/javascript" src="<?=base_url('app')?>/scripts/js_cookie.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php
    if(isset($config['data_time_picker'])){
        echo '<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
    }
    ?>
    <script type="text/javascript">
        <?php
            if($script !=''){
                $this->load->view($script, $data_script, FALSE);
            }
        ?>
    </script>
</body>