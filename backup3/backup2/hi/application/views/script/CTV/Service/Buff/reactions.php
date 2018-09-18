$('#change').change(function(){
	$.getJSON('', {tinh_tien: $('#so_luong').val(), loai: $('#loai_mua').val()}, function(json, textStatus) {
			$('#thanh_tien').html(formatCurrency(json.tien_chua_giam));
			$('#giam_gia').html(formatCurrency(json.so_tien_giam));
			$('#phai_tra').html(formatCurrency(json.tien_da_giam));
	}).fail(function(){
			alert('Lỗi ! Không thể tính tiền');
	});
});
$('#form_buff').submit(function(v) {

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
    		window.location = window.location;
    	}, 5000);
	}).fail(function(){
		toastr['error']('Không thể kết nối với server');
	});
	v.preventDefault();
});
function view_status(id){

	$(':button[onclick="view_status('+id+')"]').prop({
		disabled: true
	});
	$.getJSON('', {get_captcha: 'a'}).done(function(a){
		
		$('#kqua').html('<h3><i class="fa fa-spinner fa-3x fa-spin"></i></h3>');
		$('#kqua').hide();
		$('#image').html(a.image+'<input type="hidden" value="'+id+'" id="id_view">');
		$('#view_form').show();
		$('#view_status').modal('show');
		
	}).fail(function(){
		alert('Không thể kết nối tới server');

	}).always(function(){
		$(':button[onclick="view_status('+id+')"]').prop({
			disabled: false
		});
	});

}
$('#view_form').submit(function(e) {
	var captcha = $('#captcha_input').val();
	var id_view = $('#id_view').val();

	$('#view_form').hide();
	$('#kqua').show();

	$.getJSON('', {id_view: id_view, captcha: captcha}).done(function(a){

		if(a.status){
			var type_alert = 'success';
		}else{
			var type_alert = 'danger';
		}
		$('#kqua').html('<div class="alert alert-'+type_alert+'">\
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
			'+a.message+'\
		</div>')

	}).fail(function(){
		alert('Không thể kết nối tới server');
	});
	e.preventDefault();
});

$('#table_id').DataTable({});
$('#id_post').change(function(e) {
	if($(this).val() ==''){
		toastr['error']('Vui lòng điền ID Post');
		return false;
	}
	$.get('/CTV/Ajax/get_id', {get_id: $(this).val()}).done(function(a){
		if(a.status){
			toastr['success']('Đã khởi tạo id post dạng đúng ! ');
			$('#id_post').val(a['data']);
		}else{
			toastr['error']('ID không hợp lệ hoặc do lỗi');
		}
	}).fail(function(){
		toastr['error']('Ko thể kiểm tra ID');
	});
});