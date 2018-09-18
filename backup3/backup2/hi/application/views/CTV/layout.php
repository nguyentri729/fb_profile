<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <!--Custome CSS-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">


    <?php

    if(isset($assets['css'])){
        foreach ($assets['css'] as $css) {
            echo '<link rel="stylesheet" href="'.$css.'">';
        }
    }

    ?>
    <!-- Jquery -->
    <script src="/assets/js/jquery.min.js"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/CTV/Dashboard">HeThongBotVN</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/CTV/Dashboard">Tổng quan</a>
                    </li>
                    <li><a href="/CTV/Profile">Cá nhân</a>
                    </li>
                    <li><a href="/CTV/Service">Danh sách dịch vụ</a>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/CTV/Dashboard/NapTien">Tài khoản : <b><?=number_format($data['info_member']['money'])?></b> <sup>vnđ</sup></a>
                    </li>
                   
                    <li><a href="/CTV/Logout">Đăng xuất</a>
                    </li>

                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->

    <div class="container">
    	<?php

    		$this->load->view($view, $data, FALSE);
    	?>
    </div> <!-- container -->
<!-- Footer -->
<footer style="padding: 15px;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">@ 2018
    <a href="https://hethongbotvn.com"> HeThongBotVN.Com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

</body>

    <!-- Bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- toastr -->
    <script src="/assets/plugins/toastr/toastr.min.js"></script>


    <?php

    if(isset($assets['script'])){
        foreach ($assets['script'] as $script_url) {
            echo '<script src="'.$script_url.'"></script>';
        }
    }

    ?>

    

  
    <!-- trideptrai -->
    <script src="/assets/js/trideptrai.js"></script>
	<script type="text/javascript">
	    	<?php
                if(isset($script)){
                    $this->load->view($script);
                }
	    		
	    	?>
	</script>
</html>