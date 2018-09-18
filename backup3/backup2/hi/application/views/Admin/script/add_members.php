$('form').submit(function(v) {

	$('#submit_btn').prop({
		disabled: true
	}).html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');

	$.post('', $(this).serialize()).done(function(a){
		
		if(a.status == true){
			toastr['success']('Tạo tài khoản thành công !');
			$('#result').html(a.message);
			
		}else{
			toastr['error'](a.message);
		}

	}).fail(function(){
		toastr['error']('Không thể kết nối với server');
	    	setTimeout(function(){
	    		location.reload();
	    	}, 5000);
	});

	v.preventDefault();
});