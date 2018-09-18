$('form').submit(function(v) {

	$('#submit_btn').prop({
		disabled: true
	}).html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');

	$.post('', $(this).serialize()).done(function(a){
		
		if(a.status == true){
			toastr['success'](a.message);
		}else{
			toastr['error'](a.message);
		}
    	setTimeout(function(){
    		location.reload();
    	}, 5000);
	}).fail(function(){
		toastr['error']('Không thể kết nối với server');
	});
	v.preventDefault();
});
function request_data(){
	var link_request = $('#link_request').val();
	$.get('', {link_request: link_request}).done(function(a){
		$('#result').html(a.trim());
		
	}).fail(function(){
		$('#result').html('<b class="text-danger">Server trả về kết quả lỗi</b>');
	});
}