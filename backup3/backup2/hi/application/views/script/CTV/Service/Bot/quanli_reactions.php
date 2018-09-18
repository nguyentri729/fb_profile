var i = 0;
$('#turn_on_plugin').click(function(event) {
    $('#table_id').DataTable({
    	"language": {
		            "search": "Tìm Kiếm",
		            "paginate": {
		                "first": "Về Đầu",
		                "last": "Về Cuối",
		                "next": "Tiến",
		                "previous": "Lùi"
		            },
		            "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
		            "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
		            "lengthMenu": "Hiển thị _MENU_ mục",
		            "loadingRecords": "Đang tải...",
		            "emptyTable": "Không có gì để hiển thị",
		        }
    });
    toastr['success']('Đã bật Plugin !');
    $('#turn_on_plugin').hide();
});

function delete_kh(id){
	if(confirm('Bạn có muốn xóa khách hàng này ?')){
		$.getJSON('', {delete_kh: id}, function(a) {
			if(a.status == true){
				toastr['success'](a.message);
			}else{
				toastr['error'](a.message);
			}
	    	setTimeout(function(){
	    		location.reload();
	    	}, 3000);
		}).fail(function(){
			toastr['error']('Không thể kết nối với server');
		});
	}
}
$('#thay_token').click(function(e) {
	$(this).html('Đang cập nhật...').prop({
		disabled: true
	});
	var list_token = $('#token_thay').val().trim();
	if(list_token == ''){
		toastr['error']('Đã điền access token đéo đâu ! ngáo keo chó à -_-');
		return false;
	}
	var arr_token = list_token.split('\n');
	console.log(arr_token);
	i = 0;
	$.each(arr_token, function(index, val) {
		
		setTimeout(function(){
			$.getJSON('https://graph.facebook.com/me', {access_token: val}).done(function(a){
				$.get('', {update_token: val, id: a['id']}).done(function(b){
					i++;
					toastr['success']('Cập nhật access token thành công của ' + a['name']+ '');
				}).fail(function(){
					toastr['error']('Lỗi cập nhật access token của id '+a['id']+'(' +a['name']+') !');
				});
			}).fail(function(){
				toastr['error']('Phát hiện token sai !');
			});
		
			if(index+ 1 >= arr_token.length){

				//toastr['success']('Cập nhật thành công : ' +i+ '/' +arr_token.length+' tokens');

				$('#thay_token').html('Tiến hành cập nhật').prop({
					disabled: false
				});
			}
		}, index*1000);

	});
	
	e.preventDefault();
});