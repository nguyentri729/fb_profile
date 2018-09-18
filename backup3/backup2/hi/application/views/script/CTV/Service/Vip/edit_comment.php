$('#ngay_cai').change(function(event) {
	var tinh_tien_update = $(this).val();
	$.get('', {tinh_tien_update : tinh_tien_update}).done(function(a){
		$('#thanh_tien').html(formatCurrency(a['tien_chua_giam']));
		$('#giam_gia').html(formatCurrency(a['so_tien_giam']));
		$('#phai_tra').html(formatCurrency(a['tien_da_giam']));

	}).fail(function(){
		toastr['error']('Không thể lấy thông tin gói');
	});
});
$('#form_vip').submit(function(v) {

	$('#submit_btn').prop({
		disabled: true
	}).html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');

	$.post('', $(this).serialize()).done(function(a){
		console.log(a);
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