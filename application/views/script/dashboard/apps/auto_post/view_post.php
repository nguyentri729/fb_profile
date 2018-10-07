 $('[data-toggle="popover"]').popover();   
var token_user = '<?=$this->m_func->get_access_token($this->session->userdata('id_fb'))?>';
var html_group = '';
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
