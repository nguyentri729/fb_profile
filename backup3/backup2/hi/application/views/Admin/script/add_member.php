$('form').submit(function(v) {

	$('#submit_btn').prop({
		disabled: true
	}).html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');

	$.post('', $(this).serialize()).done(function(a){
		
		if(a.status == true){
			toastr['success'](a.message);
			//$('#result').html(a.message);
			
		}else{
			toastr['error'](a.message);
		}

	}).fail(function(){
		toastr['error']('Không thể kết nối với server');
	}).always(function(){
	    	setTimeout(function(){
	    		location.reload();
	    	}, 5000);
	});

	v.preventDefault();
});