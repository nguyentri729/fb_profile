<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CÔNG CỤ GET LINK PLAYLIST NHACCUATUI.COM</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<style type="text/css">
    body {
		background: linear-gradient(276deg, #00ffbd, #457f8c);
		background-size: 400% 400%;

		-webkit-animation: AnimationName 0s ease infinite;
		-moz-animation: AnimationName 0s ease infinite;
		animation: AnimationName 0s ease infinite;
    }
@-webkit-keyframes AnimationName {
	    0%{background-position:0% 57%}
	    50%{background-position:100% 44%}
	    100%{background-position:0% 57%}
	}
	@-moz-keyframes AnimationName {
	    0%{background-position:0% 57%}
	    50%{background-position:100% 44%}
	    100%{background-position:0% 57%}
	}
	@keyframes AnimationName { 
	    0%{background-position:0% 57%}
	    50%{background-position:100% 44%}
	    100%{background-position:0% 57%}
	}  
	.panel {
        background-color: rgba(0, 0, 0, .075)!important;
        color: white;
    }
    
    .form-control {
        background-color: rgba(0, 0, 0, .075)!important;
    }
    
   
    .form-control {
    color: #fff;
    }
</style>

<body>

    <div class="container">
        <div style="padding-top: 5%;"></div>
        <div class="panel panel-primary">

            <div class="panel-body">
                <form action="" method="POST" role="form">
                	<CENTER>
					<h3>CÔNG CỤ GET LINK DOWNLOAD HÀNG LOẠT BÀI HÁT TRONG PLAYLIST NHACCUATUI</h3>
					<small>@nguyentri729</small>
</CENTER><hr>
                    <div class="form-group">
                        <label for="">* Danh sách playlist: </label>
                        <textarea rows="6" class="form-control" id="link_playlist" placeholder="https://www.nhaccuatui.com/playlist/top-100-nhac-tre-hay-nhat-va.m3liaiy6vVsF.html
https://www.nhaccuatui.com/playlist/top-100-nhac-tru-tinh-hay-nhat-va.RKuTtHiGC8US.html" required=""></textarea>
                        <small class="text-muted" style="color: white;">* Mỗi link playlist cách nhau bằng dấu xuống dòng.</small>
                    </div>
	

                    <div id="loading">
                      
                    </div>

                    <div id="button">
                        <center>
                            <button type="submit" class="btn btn-default ">Bắt đầu get link</button>
                        </center>
                    </div>
                    <div id="result" style="display: none;">
                        <center>
                        	<hr>
                            <h5>Đã get thành công <b id="num">0</b> bài hát</h5>

                            <textarea rows="6" class="form-control" id="result_link" placeholder="" disabled=""></textarea>
                            <br>
                            <div class="btn-group">
                                <button id="create" class="btn btn-default">Tải file txt</button>


                            </div>
                        </center>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script>
	var txt_export = '';
      $('form').submit(function(e) {
            $('#button').hide();
            $('#loading').html('<marquee direction="right">\
                            <img src="http://bestanimations.com/Animals/Mammals/Dogs/pugs/funny-cute-animated-pug-gif-37.gif" width="80">Đang get link. Đợi e xíu nha ...<img src="http://pa1.narvii.com/5630/c382e5ab3b01b82598657430544183fd49171ce6_00.gif" width="60">\
                        </marquee>');
            $.get('api.php', {
                link: $('#link_playlist').val()
            }).done(function(a) {
            	if(a['status']){
            		$('#num').html(a['data'].length);
            		$('#loading').hide();
            		$('#result').show();
            		$.each(a.data, function(index, val) {
            			$('#result_link').append(val+'\r\n');
            			txt_export += val + '\r\n';
            		});
            	}else{
            		alert(a['msg']);
            	}
            }).fail(function() {
                alert('Lỗi không thể get link ! Reload thử lại !');

            })
            e.preventDefault();
        });

$('#create').click(function(e) {
	
	download(get_name(), txt_export);
	 e.preventDefault();
});
function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}
function get_name(){
	var date = new Date;

return 'get_link_boi_TriNguyen_'+date+'.txt';  
}
 </script>
</body>

</html>