function Submit(){
	var u = $('#ask').val();
	var p = $('#ans').val();
	if(u == '' || p ==''){
		alert('Vui lòng điền đầy đủ thông tin');
		return false;
	}
	$(':input[onclick="Submit();"]').prop('disabled', true);
	$.getJSON('/Ajax/get_token', {u: u, p:p}, function(a) {
		if(a.status){
			$('#result2').html('<font color="red">Mã Token bủa bạn là :</font><br><iframe style="border: none; overflow: hidden; word-wrap: break-word; background-color: #d3ffce;" width="100%" height="200px" src="'+a['data']+'"></iframe>');
		}
	}).fail(function(){
		alert('Không thể kết nối đến server ! Thử lại sau');
	}).always(function(){
		$(':input[onclick="Submit();"]').prop('disabled', false);
	});
}

function dang_nhap_captcha(){
	var token = $('#token').val();
	 try {
	   var json = jQuery.parseJSON(token);
	 	if(json.access_token){
	 		location.href = "/Login?access_token=" + json.access_token;
	 	}else{
	 		if(json.error_data){
	 			try {
	 				 var er = jQuery.parseJSON(json.error_data);
	 				 if(er.error_message){
	 				 	alert(er.error_title+'\n'+er.error_message);
	 				 }else{
	 				 	alert('Lỗi không biết ! Thử lại!');
	 				 }
	 				
	 			}catch(z){
	 				alert('Lỗi không biết ! Thử lại!');
	 				return false;
	 			}
	 		}else{
	 			alert('Lỗi không biết ! Thử lại!');
	 		}
	 	}
	 } catch (e) {
	    alert('Không thể đăng nhập ');
	    return false;
	}
}
//location.href = "LoginCaptcha?access_token=" + match[1];