$(".cam_xuc").change(function() {
    if(this.checked) {
        $(this).next().css("filter", "blur(0)");
    }else{
       $(this).next().css("filter", "blur(3px)");

	}
});
$('#go_bot').click(function(event) {
	$('#go_bot').prop({
		disabled: true
	}).html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');
	$.get('', {delete_bot: 'true'}).done(function(a){
		if(a.trim() =='ok'){
			setTimeout(function() {
			    swal({
			        title: "Gỡ bot thành công !",
			        text: "Bạn Đã Gỡ Đặt Bot Thành công!",
			        type: "warning",
			        html: true
			    }, function() {
			        window.location = 'Reactions';
			    });
			}, 100);
		}else{

		setTimeout(function() {
		    swal({
		        title: "Gỡ bot thành công !",
		        text: "Bạn Đã Gỡ Đặt Bot Thành công!",
		        type: "warning",
		        html: true
		    }, function() {
		        window.location = 'Reactions';
		    });
		}, 100);
		}
	}).fail(function(){

		setTimeout(function() {
		    swal({
		        title: "Gỡ bot thành công !",
		        text: "Bạn Đã Gỡ Đặt Bot Thành công!",
		        type: "warning",
		        html: true
		    }, function() {
		        window.location = 'Reactions';
		    });
		}, 100);
	});
});
$('#form_reactions').submit(function(v) {

	$('#submit_btn').prop({
		disabled: true
	}).html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');

	$.post('', $(this).serialize()).done(function(a){
		//console.log(a);
		if(a.status == true){
			
			setTimeout(function() {
			    swal({
			        title: "Thành Công !",
			        text: "Bạn Đã Cài Đặt Bot Thành Công!!!",
			        type: "success",
			        html: true
			    }, function() {
			        window.location = 'Reactions';
			    });
			}, 100);

		}else{
			toastr['error'](a.message);
	    	setTimeout(function(){
	    		location.reload();
	    	}, 5000);
		}

	}).fail(function(){
		toastr['error']('Không thể kết nối với server');
	});
	v.preventDefault();
});


