var tag_uid = [];
var id_image = 1;
$(function() {
    get_albums();
});


function delete_image(id_image){
	swal({
	  title: "Bạn có chắc chắn muốn xóa ?",
	  text: "",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	    swal("Đã xóa !", {
	      icon: "success",
	    });
	    $('#image_view_'+id_image+'').html('');
	  }
	});
}
function search_tag(){
  var token = $('#token').val();

  var keyword = $('#key_search').val();
  $('#view_tag').html('');
  $('#loader').show();
  var q = "select uid, name, sex from user where uid in (SELECT uid2 FROM friend WHERE uid1 = me()) and (strpos(lower(name),'"+keyword+"')>=0 OR strpos(name,'"+keyword+"')>=0) ORDER BY rand() LIMIT 500";
  console.log(q);
  $.getJSON('https://graph.facebook.com/fql', {q: q, access_token: token}).done(function(a){
     console.log(a);
     $.each( a.data, function( key, value ) {
        console.log(value);
        $('#view_tag').append('<div class="col-md-6 col-sm-6 col-xs-6"> <div class="panel panel-info"> <div class="panel-heading"><center><img src="https://graph.fb.me/'+value.uid+'/picture?width=70&height=70" width="70" height="70" class="img-circle img-thumbnail img-responsive"><br><h5 style="color: white;"><a class="text-white" href="https://fb.com/'+value.uid+'" target="_blank">'+value.name+'</a></h5> <button id="tag_'+value.uid+'" class="btn btn-success btn-xs" onclick="tag_with_id('+value.uid+', \''+addslashes(value.name)+'\')">Tag</button> </center></div></div></div>');
     });
     $('#loader').hide();
  }).fail(function(){
    $('#loader').hide();
    swal("Không thể tìm kiếm danh sách bạn bè ! Vui lòng đăng xuất rồi đăng nhập lại để cập nhật mã access token");
  });
}
function tag_with_id(uid, name){

	if(jQuery.inArray(uid+'|'+name, tag_uid) < 0){
		//console.log('ko co trong mang');
		 tag_uid.push(uid+'|'+name);


		 $('#tag_'+uid+'').html('Bỏ tag').attr('class', 'btn btn-xs btn-warning');
	}else{
		tag_uid.splice($.inArray(uid+'|'+name, tag_uid),1);
		$('#tag_'+uid+'').html('Tag').attr('class', 'btn btn-xs btn-success');
		// console.log('co trong mang');
		
	}
	
	view_tag();
}
function addslashes(string) {
    return string.replace(/\\/g, '\\\\').
        replace(/\u0008/g, '\\b').
        replace(/\t/g, '\\t').
        replace(/\n/g, '\\n').
        replace(/\f/g, '\\f').
        replace(/\r/g, '\\r').
        replace(/'/g, '\\\'').
        replace(/"/g, '\\"');
}
function view_tag(){
	$("#tag_view").html('');
	$.each(tag_uid, function(index, tag_fb) {

		var split = tag_fb.split('|');
		$("#tag_view").append('<a href="#" onclick="tag_with_id('+split[0]+', \''+addslashes(split[1])+'\')" class="color-black" onclick=""><img src="https://graph.fb.me/'+split[0]+'/picture?width=30&height=30">'+addslashes(split[1])+'</a>');
	});
}
function get_albums(){
	 var token = $('#token').val();
	$.getJSON('https://graph.facebook.com/me/albums', {access_token: token}, function(a) {
	    if(a['data']){
	        $.each(a['data'], function(index, ablum) {
	            if(ablum['can_upload']){
	                switch(ablum['type']) {
	                    case 'profile':
	                        var name_ablum = 'Ảnh đại diện';
	                        break;
	                    case 'wall':
	                        var name_ablum = 'Ảnh trên tường';
	                        break;
	                    case 'mobile':
	                        var name_ablum = 'Ảnh tải lên từ di động';
	                        break;
	                    case 'cover':
	                        var name_ablum = 'Ảnh bìa';
	                        break;
	                    default:
	                        var name_ablum = ablum['name']
	                }

	                $('#my_select').append($('<option>', { 
	                    value: ablum['id'],
	                    text : name_ablum 
	                }));
	            }
	        });
	    }
	});

}


$('#form_img').submit(function(e) {

        e.preventDefault();
        var formData = new FormData(this);

        $('.loading').show();
        $.ajax({
            url: '../Upload/Image/Imgur',
            type: 'POST',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function (data) {
               console.log(data);

              	if(data.status){
              		$.each(data.data,function(index, el) {
              			id_image++;
              			$('#view_image').append('<div id="image_view_'+id_image+'"><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">\
							<center>\
								<input type="hidden" name="image_link[]" value="'+el+'">\
								<a class="show-gallery" href="#">\
									<img src="'+el+'" data-src="'+el+'" class="preload-image responsive-image" alt="img" width="130px" height="130px">\
								</a>\
								<button class="btn btn-xs btn-warning" onclick="delete_image('+id_image+')"><i class="fa fa-trash" aria-hidden="true"></i></button>\
							</center>\
						</div></div>');

              		});
              		$('.loading').hide();
              	}else{
              		$('.loading').hide();
              		swal("Không thể tải lên hình ảnh ! Có thể do lỗi hãy quay lại sau 1h !");
              	}
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });
        return false;

   /* $.ajax({
      url: '../Upload/Image/Imgur',
      type: 'POST',
      data:  new FormData($(this).parents('form')[0]),
      contentType: false,
      cache: false,
      processData:false,
      success: function(a){
        if(a.status){

        	console.log(a.data);
        }else{
			  swal("Không thể tải lên hình ảnh");

        }
      },
      error: function(){
			
          swal("Không thể tải lên hình ảnh");
      }           
    });

    e.preventDefault();*/

});


$(function(){
 $('input.timepicker').timepicker({
 	    timeFormat: 'H:mm'
 });
 $( "#datepicker" ).datepicker();
});


 $('#chose_file').change(function(e) {
	var a = $(this).val();

	if(a !=''){
		//console.log(a);
		//console.log(this.files.length);
		$('.loading').html('');

		for (var i = 0; i < this.files.length; i++) {
			$('.loading').append('<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">\
								<center>\
									<div width="100px" style="margin-top: 20%; ">\
											<i class="fa fa-circle-o-notch fa-spin fa-2x" aria-hidden="true" style="padding: 10%;"></i>\
									</div>\
								</center>\
							</div>');
		}

        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
             swal("Chỉ có thể tải lên hình ảnh !");
            return false;
        }else{
			

		
			$('#form_img').submit();


        }
	}
});


function bat_click(){
	$('#chose_file').click();
}
$('#add_post').submit(function(e) {
	var data_form = $(this).serializeArray();
	data_form.push(tag_uid);
	console.log(data_form);
	//console.log($(this).serializeArray());
	e.preventDefault();
});