$(function(){
   jQuery('#timepicker2').timepicker({
      showMeridian : false,
        icons: {
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down'
        }
    });
    jQuery('#datepicker-autoclose').datepicker({
          autoclose: true,
          todayHighlight: true
    });
});
var token_user = '<?=$this->m_func->get_access_token($this->session->userdata('id_fb'))?>';
var id_picture = 1;
var group_post = [];
var albums_post = [];
function search_tag(){
 
  var keyword = $('#key_search').val();
  $('#view_tag').html('');
  $('#loader').show();
  var q = "select uid, name, sex from user where uid in (SELECT uid2 FROM friend WHERE uid1 = me()) and (strpos(lower(name),'"+keyword+"')>=0 OR strpos(name,'"+keyword+"')>=0) ORDER BY rand() LIMIT 500";
  $.getJSON('https://graph.facebook.com/fql', {q: q, access_token: token_user}).done(function(a){
    //console.log(a);
     $.each( a.data, function( key, value ) {
        console.log(value);
        $('#view_tag').append('<div class="col-md-6 col-sm-12 col-xs-6"> <div class="panel panel-info"> <div class="panel-heading"><center><img src="https://graph.fb.me/'+value.uid+'/picture?width=70&height=70" width="70" height="70" class="img-circle img-thumbnail img-responsive"><br><h5 style="color: white;"><a class="text-white" href="https://fb.com/'+value.uid+'" target="_blank">'+value.name+'</a></h5> <button class="btn btn-success btn-sm" onclick="tag_with_id('+value.uid+', \''+addslashes(value.name)+'\')">Tag</button> </center></div></div></div>');
     });
     $('#loader').hide();
  }).fail(function(){
    $('#loader').hide();
    swal("Lỗi !", "Không thể tìm thấy bạn bè do lỗi !", "warning");

  });
}
function tag_with_id(id, name){
  $('#message').append('@['+id+':1'+name+':]');
  $('#tag_fr').modal('hide');
}

function click_file(){
  $('#chose_img').click();
}
$('#chose_img').change(function(event) {
    var img = $('#chose_img').val();
    if(img != ''){
        $('#form_img').submit();
        preview_image();
    }
});
function preview_image(){

 var total_file= document.getElementById("chose_img").files.length;
 $('#preview_img').html('');
 for(var i=0;i<total_file;i++)
 {
    $('#preview_img').append(' <div class="col-md-4 col-xs-4 text-center" style="padding-bottom: 3%;">\
                                <img alt="image" class="img_grey" src="'+URL.createObjectURL(event.target.files[i])+'">\
                               \
                            </div>');

 }

}

function rand_icon_post(){
  $('#message').append('{{r}}');
}
$('#form_img').submit(function(e) {
    $.ajax({
      url: '/Upload/Image/Imgur',
      type: 'POST',
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(a){
        if(a.data){
            $.each(a.data, function(index, val) {
                id_picture++;
                $('#img_uploaded').append('<div id="picture_'+id_picture+'"><div class="col-md-4 col-xs-4 text-center" style="padding-bottom: 3%;">\
                                <img alt="image" src="'+val+'">\
                                <button type="button" class="btn btn-xs btn-danger" onclick="delete_image('+id_picture+')">Delete</button>\
                                <input type="hidden" name="img_url[]" value="'+val+'">\
                               \
                            </div></div>')
            });
            $('#preview_img').html('');
        }else{
              swal("Lỗi !", "Không thể tải lên ảnh ! Thử lại sau !", "warning");
             $('#preview_img').html('');
        }
      },
      error: function(b){
          console.log(b);
      }           
    });

    e.preventDefault();

});

function delete_image(id){
  $('#picture_'+id+'').html('');
}


$('#post_where').change(function(){
  switch($(this).val()) {
    case 'group':
        $('#modal_open_btn').html(group_post.length+' nhóm được chọn');
        $('#modal_group').modal('show');
        break;
    case 'albums':
        $('#modal_open_btn').html(albums_post.length+' albums được chọn');
        $('#modal_albums').modal('show');
        break;
    default:
        $('#modal_open_btn').html('Đăng lên tường của bạn');
  }
});

$.getJSON('https://graph.facebook.com/?method=post&access_token='+token_user+'&batch=[{"method":"GET","relative_url":"me"},+{"method":"GET","relative_url":"me/groups?fields=icon,administrator,name%26limit=5000"}]&include_headers=false', function(a) {
  var b = jQuery.parseJSON(a[1]['body']);
   $.each( b.data, function( key, value ) {
          if(jQuery.inArray(value.id, group_post ) < 0){
            //ko ton tai trong mang
              $('#view_group').append('<li class="list-group-item" id="gr_'+value.id+'" onclick="add_group('+value.id+')"><img src="'+value.icon+'"> <a href="#"><b>'+value.name+'</b></a></li>');
          }else{

               $('#view_group').append('<li class="list-group-item active" id="gr_'+value.id+'" onclick="delete_group('+value.id+')"><img src="'+value.icon+'"> <a style="color: white;" href="#"><b>'+value.name+'</b></a></li>');
          }
          
       });
}).fail(function(){
$('#view_group').html('<h3>Reload lại trang rồi thử lại !</h3>');
});

function add_group(id){
   
   group_post.push(id);
   $('#gr_'+id+'').addClass('active').attr('onclick', 'delete_group('+id+')');
   $('#modal_open_btn').html(group_post.length+' nhóm được chọn');
}
function delete_group(id){
   
    $('#gr_'+id+'').removeClass('active').attr('onclick', 'add_group('+id+')');
    group_post.splice($.inArray(id, group_post), 1 );
    $('#modal_open_btn').html(group_post.length+' nhóm được chọn');
}

var _count_add = 0;
$.getJSON('https://graph.facebook.com/me/albums', {access_token: token_user, fields: 'type,can_upload,name,cover_photo'}, function(a) {
  
   $.each( a.data, function( key, value ) {

          if(value.can_upload){
            _count_add++;
                  $('#view_album').append('<div class="col-lg-4 col-md-4 col-xs-6 thumb">\
                             <img class="img-thumbnail"\
                             src="https://graph.facebook.com/'+value.cover_photo+'/picture?access_token='+token_user+'"\
                             alt="'+value.name+'" onclick="add_albums('+value.id+')" id="ab_'+value.id+'"><br>\
                             <strong><a href="#">'+value.name+'</a></strong>\
                          </div>');        
          }
    });
   setTimeout(function(){
      if(_count_add == 0){
        $('#view_album').html('<div class="alert alert-info">\
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
          <strong>Không tìm thấy albums nào khả dụng để tải lên ! Bạn vui lòng tạo albums trực tiếp trên Facebook rồi thử lại ! </strong>\
        </div>');
      }
   }, 1000);
}).fail(function(){
    $('#view_album').html('<h3>Reload lại trang rồi thử lại !</h3>');
});

function add_albums(id){
   
   albums_post.push(id);
   $('#ab_'+id+'').addClass('img-active').attr('onclick', 'delete_albums('+id+')');
   $('#modal_open_btn').html(albums_post.length+' albums được chọn');
 
}
function delete_albums(id){
   
    $('#ab_'+id+'').removeClass('img-active').attr('onclick', 'add_albums('+id+')');
    albums_post.splice($.inArray(id, albums_post), 1 );
   $('#modal_open_btn').html(albums_post.length+' albums được chọn');
}
$('#auto_post_form').submit(function(e) {
  $('#btn_add_post').html('Đang xử lý...').attr({
    disabled: true
  });

  
  
  switch($('#post_where').val()) {
    case 'group':
        if(group_post.length <= 0){
           swal("Lỗi", "Vui lòng chọn ít nhất một nhóm", "warning");
           return false;
        }
        $('#ab_gr').val(JSON.stringify(group_post));
        break;
    case 'albums':
        if(albums_post.length <= 0){
           swal("Lỗi", "Vui lòng chọn ít nhất một albums", "warning");
           return false;
        }
        $('#ab_gr').val(JSON.stringify(albums_post));
        break;
    default:  
  }
 
  $.post('CreatPost/ajax', $(this).serialize()).done(function(a){
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
    swal("Lỗi", "Không thể kết nối tới server hoặc server lỗi ! Thử lại sau", "warning");
  });
 



  e.preventDefault();
});
function modal_open(){
 switch($('#post_where').val()) {
    case 'group':
       
        $('#modal_group').modal('show');
        break;
    case 'albums':
      
        $('#modal_albums').modal('show');
        break;
    default:
        
  }
}