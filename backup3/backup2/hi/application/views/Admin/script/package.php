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
function delete_package(id){
	if(confirm('Bạn có chắc chắn muốn xóa ?')){
		$.get('', {delete_id: id}).done(function(a){
			
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
	}
}
$('#table_id').DataTable({});