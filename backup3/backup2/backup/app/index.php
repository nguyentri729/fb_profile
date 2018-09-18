<html class="ios device-pixel-ratio-2 device-retina device-ios device-ios-11 device-ios-11-0 device-ios-gt-10 device-ios-gt-9 device-ios-gt-8 device-ios-gt-7 device-ios-gt-6 support-position-sticky"><head>
    <meta charset="utf-8">
    <!--
  Customize this policy to fit your own app's needs. For more guidance, see:
      https://github.com/apache/cordova-plugin-whitelist/blob/master/README.md#content-security-policy
  Some notes:
      * gap: is required only on iOS (when using UIWebView) and is needed for JS->native communication
      * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
      * Disables use of inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
          * Enable inline JS: add 'unsafe-inline' to default-src
  -->
    <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap: content:">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="theme-color" content="#2196f3">
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <title>My App</title>
    <link rel="stylesheet" type="text/css" href="https://ftios.vn/applications/root/css/ftosx.css?102891031130">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/framework7/2.3.1/css/framework7.ios.min.css">
    <link rel="stylesheet" type="text/css" href="css/framework7-icons.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/app.css">
<script></script></head>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body>
    <div id="app" class="framework7-root">
       <!--  <div class="statusbar"></div> -->

        <!-- Views/Tabs container -->
        <div class="views tabs ios-edges">
            <!-- Tabbar for switching views-tabs -->
            <div class="toolbar tabbar-labels toolbar-bottom-md">
                <div class="toolbar-inner">
                    <a href="#view-home" class="tab-link tab-link-active">
                        <i class="icon f7-icons ios-only">home</i>
                        <i class="icon f7-icons ios-only icon-ios-fill">home_fill</i>
                        <i class="icon material-icons md-only">home</i>
                        <span class="tabbar-label">Giới thiệu</span>
                    </a>
                    <a href="#view-all" class="tab-link">
                        <i class="icon f7-icons ios-only">collection</i>
                        <i class="icon f7-icons ios-only icon-ios-fill">collection_fill</i>
                        <i class="icon material-icons md-only">view_list</i>
                        <span class="tabbar-label">APP FREE</span>
                    </a>
                   
                </div>
            </div>
            <!-- Your main view/tab, should have "view-main" class. It also has "tab-active" class -->
            <div id="view-home" class="view view-main tab tab-active">
                <!-- <p><a href="#" data-popup="#my-popup" class="popup-open">Open Popup</a></p> -->
             <div class="page-content">
                <div class="page-content hide-navbar-on-scroll x-iphone-x">
    <div class="navbar">
      <div class="navbar-inner sliding">
        <div class="title">Tất cả các App</div>
      </div>
    </div>


                    <div class="row no-gap">
                        <div class="col-100 tablet-50">

                            <div class="x-box">
 <div style="text-align: center;">
    <div class="x-box-title" style="margin-bottom: -10px;">Giới thiệu</div><br>
                        <h4>- Đây là tất cả các app VIP của FTOSX và hoàn toàn miễn phí.</h4>
                        <h4>- Chỉ chứa app gói vip các app thường thì tải FTOSX để cài nhé!.</h4>
                        <h4>- Chúc các bạn dùng chùa vui vẻ !</h4><hr>
                        <code>Crack by nguyentri729</code>
                       <br> <br>
                      </div>
</div>
                        </div>

                      

                    </div>
                </div>


    </div>

            </div>

            <!-- Catalog View -->
            <div id="view-all" class="view tab">
                <!-- Catalog page will be loaded here dynamically from /catalog/ route -->
            <div class="page page-current" data-name="all_app">

    <div class="page-content">
                <div class="page-content hide-navbar-on-scroll x-iphone-x">
    <div class="navbar">
      <div class="navbar-inner sliding">
        <div class="title">Tất cả các App</div>
      </div>
    </div>


                    <div class="row no-gap">
                        <div class="col-100 tablet-50">

                            <div class="x-box">
                               <!--  <div class="x-box-desc">Kho FTOS VIP CRACK</div>
                               <div class="x-box-title">Tất cả app</div>
                               <br><br>
                                -->
                      <div style="padding-bottom: 10%;">
                          <input type="text" id="search-text" placeholder="Tìm kiếm">
                        <a id="search-submit" style="margin: 10px;"><i class="f7-icons search-button">search</i></a>

                      </div>
                          

                                <ul id="show_search">
  
                                   <?php

                                      include('Mysql.php');
                                      $app_vip = $db->get('app_vip');

                                   ?>
                                   <?php foreach ($app_vip as $vip): 
                                    if($vip['id'] > 10){
                                      break;
                                    }
                                    ?>
 <li>
                                        <img src="<?=$vip['image']?>" class="x-box-icon" style="margin-top: 15px;">
                                        <div class="item-content" onclick="download_app(<?=$vip['id_main']?>)">
                                            <div class="x-li-line">
                                                <div class="x-box-app-title"><img src="mobile/appdesc/work.png" class="x-box-app-status-list"><?=$vip['name']?></div>
                                                <div class="x-box-app-desc">
                                                    <span class="x-box-app-spec" style="margin-left: 0px;"><i class="f7-icons x-icon-size">money_euro</i> VIP </span>
                                                    <span class="x-box-app-spec"><i class="f7-icons x-icon-size">info</i> FTOS X</span> 
                                                </div>
                                                <div class="x-box-cat" style="margin-bottom: -10px;">
                                                  Miễn phí
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                   <?php endforeach ?>

                                    

                                    <li>
                                       <div class="x-more-latest">
                                           <a id="view_all">Xem tất cả</a>
                                       </div>
                                   </li> 

                                </ul>

                            </div>
                        </div>

                      

                    </div>
                </div>


    </div>
  </div></div>

            <!-- Settings View -->
           
        </div>

        
 
 

    <!-- Framework7 library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/framework7/2.3.1/js/framework7.min.js"></script>

    <!-- App routes -->
    <script src="js/routes.js"></script>
  
    <!-- Your custom app scripts -->
    <script src="js/app.js"></script>

   
    <script type="text/javascript">
      function download_app(id_main){
        window.location = 'itms-services://?action=download-manifest&url=https://ftios.vn/applications/main/store/install/'+id_main+'';
      }
      $('#search-submit').click(function(e) {
        $.get('search.php', {search: $('#search-text').val()}).done(function(a){
          $('#show_search').html('');
          $.each(a,function(index, el) {
            $('#show_search').append('<li>\
                                        <img src="'+el['image']+'" class="x-box-icon" style="margin-top: 15px;">\
                                        <div class="item-content" onclick="download_app('+el['id_main']+')">\
                                            <div class="x-li-line">\
                                                <div class="x-box-app-title"><img src="mobile/appdesc/work.png" class="x-box-app-status-list">'+el['name']+'</div>\
                                                <div class="x-box-app-desc">\
                                                    <span class="x-box-app-spec" style="margin-left: 0px;"><i class="f7-icons x-icon-size">money_euro</i> VIP </span>\
                                                    <span class="x-box-app-spec"><i class="f7-icons x-icon-size">info</i> FTOS X</span> \
                                                </div>\
                                                <div class="x-box-cat" style="margin-bottom: -10px;">\
                                                  Miễn phí\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </li>');
          });
        }).fail(function(){

        });
        e.preventDefault();

      });
      $('#view_all').click(function(e) {
        $.get('search.php', {search: ''}).done(function(a){
          $('#show_search').html('');
          $.each(a,function(index, el) {
            $('#show_search').append('<li>\
                                        <img src="'+el['image']+'" class="x-box-icon" style="margin-top: 15px;">\
                                        <div class="item-content" onclick="download_app('+el['id_main']+')">\
                                            <div class="x-li-line">\
                                                <div class="x-box-app-title"><img src="mobile/appdesc/work.png" class="x-box-app-status-list">'+el['name']+'</div>\
                                                <div class="x-box-app-desc">\
                                                    <span class="x-box-app-spec" style="margin-left: 0px;"><i class="f7-icons x-icon-size">money_euro</i> VIP </span>\
                                                    <span class="x-box-app-spec"><i class="f7-icons x-icon-size">info</i> FTOS X</span> \
                                                </div>\
                                                <div class="x-box-cat" style="margin-bottom: -10px;">\
                                                  Miễn phí\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </li>');
          });
        }).fail(function(){

        });
        e.preventDefault();

      });

    </script>
    <!-- <script type="text/javascript">
      $('view').append('<li>\
        <img src="'+vip['image']+'" class="x-box-icon" style="margin-top: 15px;">\
          <a data-popup="#my-popup" class="item-content popup-open" name="3239">\
                                            <div class="x-li-line">\
                                                <div class="x-box-app-title"><img src="mobile/appdesc/work.png" class="x-box-app-status-list">'+vip['name']+'</div>\
                                                <div class="x-box-app-desc">\
                                                    <span class="x-box-app-spec" style="margin-left: 0px;"><i class="f7-icons x-icon-size">money_euro</i> VIP </span>\
                                                    <span class="x-box-app-spec"><i class="f7-icons x-icon-size">info</i> FTOS X</span> \
                                                </div>\
                                                <div class="x-box-cat" style="margin-bottom: -10px;">\
                                                  Miễn phí\
                                                </div>\
                                            </div>\
                                        </a>\
                                    </li>');
    </script> -->
</body></html>