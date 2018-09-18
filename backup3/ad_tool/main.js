var stop = false;
$('#stop').click(function(e) {
	stop = true;
$('#start_sedding').html('<i class="fa fa-play" aria-hidden="true"></i> Tiến hành quét').prop({
				 		disabled: false
				 	});
	$(this).hide();
	e.preventDefault();
});
$('#start_sedding').click(function(e) {
	var api_link = $('#api_link').val().trim();
	var token_list = $('#token_list').val().trim();
	var khoang_cach = $('#khoang_cach').val();
	if (token_list != '' && api_link != '') {
		stop = false;
		$('#stop').show();
		$('#start_sedding').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Đang xử lý').prop({
				 		disabled: true
				 	});
		
		var token_arr = token_list.split('\n');
		
		$('#total').html(token_arr.length);
		$.each(token_arr, function(index, val) {
			
				setTimeout(function(){
					if(stop){
					return false;
				}
				var phan_tram = Math.round(((index+1) / token_arr.length) * 100);
				
				$('.progress-bar').attr({
			 		'aria-valuenow': phan_tram,
			 	}).css('width', phan_tram+'%').html(phan_tram+ '%');
				//check tay
				$.getJSON('https://graph.facebook.com/me', {access_token: val}, function(z) {
					  $.getJSON(api_link, {access_token: val}, function(a) {
							$('#success').html(parseInt($('#success').html())+ 1);
						}).fail(function(){
							$('#error').html(parseInt($('#error').html())+ 1);
						});
					/*if(z['locale'] == 'vi_VN'){
					$.getJSON(api_link, {access_token: val}, function(a) {
							$('#success').html(parseInt($('#success').html())+ 1);
						}).fail(function(){
							$('#error').html(parseInt($('#error').html())+ 1);
						});
					}else{
						$('#error').html(parseInt($('#error').html())+ 1);
					}*/

				}).fail(function(){
					$('#error').html(parseInt($('#error').html())+ 1);
				});
/*				$.getJSON(api_link, {access_token: val}, function(a) {
					$('#success').html(parseInt($('#success').html())+ 1);
				}).fail(function(){
					$('#error').html(parseInt($('#error').html())+ 1);
				});*/

				if(index+2 >token_arr.length){
				 	$('#start_sedding').html('<i class="fa fa-play" aria-hidden="true"></i> Tiến hành quét').prop({
				 		disabled: false
				 	});
				 	$(this).hide();
				 	alert('Đã xong !');
				 }

			}, index*khoang_cach);


		});


	}else{
		alert('Điền đầy đủ thông tin');
	}
	e.preventDefault();
});
