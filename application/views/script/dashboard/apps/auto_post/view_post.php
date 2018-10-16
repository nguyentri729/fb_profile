 $('[data-toggle="popover"]').popover();   
var token_user = '<?=$this->m_func->get_access_token($this->session->userdata('id_fb'))?>';
var html_group = '';
var html_albums = '';
function group(id_gr){
	var list_uid = jQuery.parseJSON(id_gr);
	creat_html_group(list_uid);
	$(document).ajaxStop(function() {
		$(':button[onclick="group(\''+id_gr+'\')"]').attr({
			'data-content': html_group,
		}).click();
		$(':button[onclick="group(\''+id_gr+'\')"]').click().attr({
			'onclick': ''
		});

	});

}

function creat_html_group(list_uid){
	$.each(list_uid, function(index, val) {
		$.getJSON('https://graph.facebook.com/'+val+'', {access_token: token_user}, function(a) {
			html_group += '<li class="list-group-item"><img src="'+a['icon']+'"> <a href="#"><b>'+a['name']+'</b></a></li>';
		});
	});
}


function albums(id_gr){
	var list_uid = jQuery.parseJSON(id_gr);
	creat_html_albums(list_uid);
	$(document).ajaxStop(function() {
		$(':button[onclick="albums(\''+id_gr+'\')"]').attr({
			'data-content': html_albums,
		}).click();
		$(':button[onclick="albums(\''+id_gr+'\')"]').click().attr({
			'onclick': ''
		});

	});

}

function creat_html_albums(list_uid){
	$.each(list_uid, function(index, val) {
		$.getJSON('https://graph.facebook.com/'+val+'', {access_token: token_user}, function(a) {
			html_albums += '<li class="list-group-item"><a href="#"><b><i class="fa fa-picture-o"></i> '+a['name']+'</b></a></li>';
			console.log(a);
		});
	});
}

function delete_post(id){
			swal({
			  title: "Xác nhận xóa bài đăng",
			  text: "Bạn có chắc muốn xóa bài đăng này ?",
			  icon: "info",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {

			  if (willDelete) {

				$.post('/Dashboards/Apps/AutoPost/ViewPost/ajax', {delete_post: id, <?=$this->security->get_csrf_token_name()?>: '<?=$this->security->get_csrf_hash()?>'}, function(a) {
						if(a['status']){
		                    swal("Thành công !", a.msg, "success").then(() => {
		                         location.reload();
		                    });

		                }else{
		                    swal("Có lỗi !", a.msg, "warning").then(() => {
		                         location.reload();
		                    });

		                }
				}).fail(function(){
					 swal("Có lỗi !", 'Không thể kết nối tới server ! Kiểm tra lại kết nối mạng !', "warning").then(() => {
		                         location.reload();
		                    });
				});

			  }
			});

}