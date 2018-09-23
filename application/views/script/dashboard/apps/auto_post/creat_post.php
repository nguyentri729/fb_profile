$('.datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
         });
var token_user = '<?=$this->m_func->get_access_token($this->session->userdata('id_fb'))?>';
var id_picture = 1;
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

function group_search(){
    var token = $('#token').val();
    $('#view_group').html('');
    $('#loadergr').show();
    $.post('https://graph.facebook.com/?method=post&access_token='+token+'&batch=[{"method":"GET","relative_url":"me"},+{"method":"GET","relative_url":"me/groups?fields=icon,administrator,name%26limit=5000"}]&include_headers=false').done(function(a){
     
     var b = jQuery.parseJSON(a[1]['body']);
     console.log(b);
   
       $.each( b.data, function( key, value ) {
          console.log(value);
          $('#view_group').append(' <li class="list-group-item"><img src="'+value.icon+'"> <a href="https://facebook.com/'+value.id+'" target="_blank">'+value.name+'</a>   <button class="btn btn-info btn-xs" onclick="nhom_ins('+value.id+')">Chọn</button></li>');
       });
       $('#loadergr').hide();
    }).fail(function(){
      $('#loadergr').hide();
      toastr["warning"]("<b>Lá»—i khi láº¥y thĂ´ng tin ngÆ°á»i dĂ¹ng</b>");
    });
}
$('#post_where').change(function(){

  switch($(this).val()) {
    case 'group':
        $('#modal_group').modal('show');
        break;
    case 'albums':
        $('#modal_albums').modal('show');
        break;
    default:
        //
}
});
var group_post = [];
var albums_post = [];
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
  console.log(group_post);
}
function delete_group(id){
   
    $('#gr_'+id+'').removeClass('active').attr('onclick', 'add_group('+id+')');
    group_post.splice($.inArray(id, group_post), 1 );
   console.log(group_post);
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
 
}
function delete_albums(id){
   
    $('#ab_'+id+'').removeClass('img-active').attr('onclick', 'add_albums('+id+')');
    albums_post.splice($.inArray(id, albums_post), 1 );
    console.log(albums_post);
}
$('#auto_post_form').submit(function(e) {
  $('#btn_add_post').html('Đang xử lý...').attr({
    disabled: true
  });
  console.log($(this).serializeArray());
  e.preventDefault();
});