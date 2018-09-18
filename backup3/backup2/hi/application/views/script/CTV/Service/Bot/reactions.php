$('#form_reactions').change(function(e) {

	if($('#profile').val() == 1){
		$('#people').show();
	}else{
		$('#people').hide();
	}
	if($('#tuy_chon').val() == 1){
		$('#profile, #group, #page').val(0);
		$('#people').hide();
		$('#chinh').show();

	}else{
		$('#chinh').hide();
	}
	

});

$('#time_cai').change(function(){
	$.getJSON('', {thanh_tien: $(this).val()}, function(json, textStatus) {
			$('#thanh_tien').html(formatCurrency(json.tien_chua_giam));
			$('#giam_gia').html(formatCurrency(json.so_tien_giam));
			$('#phai_tra').html(formatCurrency(json.tien_da_giam));
	}).fail(function(){
			alert('Lỗi ! Không thể tính tiền');
	});
});

$('#form_reactions').submit(function(v) {

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