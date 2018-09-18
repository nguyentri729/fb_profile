<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="/assets/admin/css/bootstrap-clearmin.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/admin/css/material-design.css">
        <link rel="stylesheet" type="text/css" href="/assets/admin/css/small-n-flat.css">
        <link rel="stylesheet" type="text/css" href="/assets/admin/css/font-awesome.min.css">
        <!-- Toastr CSS -->
        <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
        <?php

        if(isset($assets['css'])){
            foreach ($assets['css'] as $css) {
                echo '<link rel="stylesheet" href="'.$css.'">';
            }
        }

        ?>
        <title><?=$title?></title>
    </head>
    <body class="cm-no-transition cm-2-navbar">
        <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
               
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                            <li class="active"><a href="/Admin/Dashboard" class="sf-dashboard">Quản lí</a></li>
                           
                           <li class="cm-submenu">
                                <a class="sf-profile-group">Thành viên<span class="caret"></span></a>
                                <ul>
                                    <li><a href="/Admin/Member">Thêm thành viên</a></li>
                                    <li><a href="/Admin/Member/ThanhVien">Quản lý thành viên</a></li>
                                  
                                </ul>
                            </li> 
                            <li class="cm-submenu">
                                <a class="sf-institution">Bảng giá<span class="caret"></span></a>
                                <ul>
                                    <li><a href="/Admin/BangGia">Package VIP</a></li>
                                    
                                </ul>
                            </li>
                            <li><a href="/Admin/ThongBao" class="sf-envelope-letter">Thông báo</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header id="cm-header">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                    <h1>Quản trị viên</h1> 
                    
                </div>
               
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <a style="cursor:default;"><strong><?=$data['info_member']['name']?></strong></a>
                        </li>
                        <li class="divider"></li>
                        
                        <li>
                            <a href="/Admin/Logout"><i class="fa fa-fw fa-sign-out"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div id="global" style="padding-top: 5%; ">
            <div class="container-fluid">
               <?php
                  $this->load->view($view, $data);
               ?>
            </div>
            <footer class="cm-footer"><span class="pull-left">Code by Jickme</span><span class="pull-right">&copy; HeThongBotVN.Com</span></footer>
        </div>
        <script src="/assets/admin/js/lib/jquery-2.1.3.min.js"></script>
        <script src="/assets/admin/js/jquery.mousewheel.min.js"></script>
        <script src="/assets/admin/js/jquery.cookie.min.js"></script>
        <script src="/assets/admin/js/fastclick.min.js"></script>
        <script src="/assets/admin/js/bootstrap.min.js"></script>
        <script src="/assets/admin/js/clearmin.min.js"></script>
        <?php

        if(isset($assets['script'])){
            foreach ($assets['script'] as $script_url) {
                echo '<script src="'.$script_url.'"></script>';
            }
        }

        ?>
    <!-- toastr -->
    <script src="/assets/plugins/toastr/toastr.min.js"></script>
        <script src="/assets/js/trideptrai.js"></script>
        <script type="text/javascript">
            <?php
                $this->load->view($script);
            ?>
        </script>
     </body>
</html>