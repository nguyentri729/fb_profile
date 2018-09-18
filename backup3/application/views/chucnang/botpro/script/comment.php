
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
			        window.location = 'Comment';
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
		        window.location = 'Comment';
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
		        window.location = 'Comment';
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
			        window.location = 'Comment';
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




var sticker_download = [];
var i = 0;
function download_sticker() {
	$(':button[onclick="download_sticker()"]').html('Đang tải...').prop({
		disabled: true
	});

	$.getJSON('/assets/json/sticker.json', function(sticker){
		sticker_download = sticker;
		//console.log(sticker_download);
		toastr['success']('Tải sticker thành công!');
		$(':button[onclick="download_sticker()"]').html('<i class="fa fa-check" aria-hidden="true"></i> Đã tải sticker').prop({
			disabled: true
		});
		$('#sticker_head').html('');
		$.each(sticker_download, function(id_sticker, val) {
			i++;
			$('#sticker_head').append('<img class="sticker_img" src="'+val[0]['image']+'" style="display: inline-block; padding: 10px;" onclick="get_sticker('+id_sticker+')">');
			

		});
			
	}).fail(function(){
		toastr['error']('Không thể tải sticker');
	});
}
function get_sticker(id_sticker){
	$('#sticker_data').html('');
	$.each(sticker_download[id_sticker], function(index, cac) {
		$('#sticker_data').append('<div class="col-md-3">\
	                                            <div class="panel panel-default">\
	                                                <div class="panel-body text-center">\
	                                                   <img src="'+cac['image']+'" onclick="chon_sticker('+cac['id']+', \''+cac['image']+'\')" class="sticker_img">\
	                                                </div>\
	                                            </div>\
	                                        </div>');
	});
}

$('#upload_img').click(function(e) {
	$('#chose_file').click();
	e.preventDefault();
});

$('#chose_file').change(function(e) {
	var a = $(this).val();
	if(a !=''){
        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            toastr["warning"]("<b>Bạn chỉ có thể tải lên hình ảnh.</b>");
            return false;
        }else{
			$('#upload_img').html('Uploading..').prop({
				disabled: true
			});

			
			$('#form_img').submit();


        }
	}
});


$('#form_img').submit(function(e) {

    $.ajax({
      url: '/Ajax/upload_image',
      type: 'POST',
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(a){
        if(a.status){
        	$('#anh').val(a.data);
			$('#upload_img').html('Ảnh').prop({
				disabled: false
			});
			 $('#ds_img').html('<img src="'+a.data+'" width="250px">');
			 $('#div_nhan').hide();
			  $('#nhan').val('');
        }else{
			$('#upload_img').html('Ảnh').prop({
				disabled: false
			});
			 toastr['error']('<b>Không thể tải lên hình ảnh</b>');
			 //$('#ds_img').html('');

        }
      },
      error: function(){
			$('#upload_img').html('Ảnh').prop({
				disabled: false
			});
        toastr['error']('<b>Không thể tải lên hình ảnh</b>');
      }           
    });

    e.preventDefault();

});

function chon_sticker(id, image){
	$('#nhan').val(id);
	$('#show_nhan').html('<img src="'+image+'">');
	$('#sticker_list').modal('hide');
	$('#div_anh').hide();
}

function reset_form(){
	$('#show_nhan').html('');
	$('#nhan').val('');
	$('#anh').val('');
	$('#ds_img').html('');
	$('#div_nhan').show();
	$('#div_anh').show();
	$('#upload_img').html('Ảnh').prop({
		disabled: false
	});


}

function save_comment(){
	$(':button[onclick="save_comment()"]').prop({
		disabled: true,
	}).html('Đang lưu...');
	$.post('', $('#add_bl').serialize()).done(function(a){
		if(a.status){
			toastr['success'](a.message);
		}else{
			toastr['error'](a.message);
		}
		setTimeout(function(){
			location.reload();
		}, 3000);
	}).fail(function(){
		toastr['error']('<b>Không thể lưu bình luận</b>');
	});

}

$(document).ready(function() {

  $("#noi_dung").emojioneArea({
     autoHideFilters: true,
     pickerPosition: 'right'
  });

});
function delete_comment(id){
	if(confirm('Xóa bình luận này ?')){
		$(':button[onclick="delete_comment('+id+')"]').prop({
			disabled: true,
		});
		$.get('', {delete_id: id}).done(function(a){
			if(a.status){
				toastr['success'](a.message);
			}else{
				toastr['error'](a.message);
			}
			setTimeout(function(){
				location.reload();
			}, 2000);
		}).fail(function(){
			toastr['error']('<b>Không thể xóa bình luận</b>');
		});	
	}
}