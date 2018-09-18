


$('#home').change(function(event) {
	//Get name package
	var id = $('#package_vip').val();
	if(id == ''){
		toastr['error']('Vui lòng chọn gói cần mua');
		return false;
	}
	var time_cai = $('#time_cai').val();
	
	if(time_cai == ''){
		toastr['error']('Vui lòng chọn thời gian cài !');
		return false;
	}
	var loai_tuong_tac = $('#loai_tuong_tac').val();
	$.get('', {goi: id, time_cai: time_cai, loai_tuong_tac: loai_tuong_tac}).done(function(a){
		$('#thanh_tien').html(formatCurrency(a['tinh_tien']['tien_chua_giam']));
		$('#giam_gia').html(formatCurrency(a['tinh_tien']['so_tien_giam']));
		$('#phai_tra').html(formatCurrency(a['tinh_tien']['tien_da_giam']));
		$('#name_package').html(a['name']);
		$('#max_like').html(a['max']);
		$('#so_luong_dung').val(a['max']);
		$('#so_post_dung').val(a['post']);
		$('#so_luong_lan').val(Math.ceil(a['max'] / 20));
		$('#limit_post').html(a['post']);
		$('#mieu_ta').html(a['note']);
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