<?php
session_start();
$_SESSION = array();
session_destroy();
//echo '<script>alert("Đã đăng xuất!")</script>';
    echo '<!DOCTYPE HTML>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1;url=../index.php">
        <script type="text/javascript">
            window.location.href = "../index.php"
        </script> 
        <title>Chuyển hướng . . .</title>
    </head>
    <body>
        Nếu trang không tự chuyển hướng ra trang chủ, vui lòng click <a href="../index.php">vào đây.</a>
    </body>
</html>';
?>