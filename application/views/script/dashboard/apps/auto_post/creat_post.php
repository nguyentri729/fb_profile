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


function search_tag(){
  var token = '<?=$this->m_func->get_access_token($this->session->userdata('id_fb'))?>';
  var keyword = $('#key_search').val();
  $('#view_tag').html('');
  $('#loader').show();
  var q = "select uid, name, sex from user where uid in (SELECT uid2 FROM friend WHERE uid1 = me()) and (strpos(lower(name),'"+keyword+"')>=0 OR strpos(name,'"+keyword+"')>=0) ORDER BY rand() LIMIT 500";
  $.getJSON('https://graph.facebook.com/fql', {q: q, access_token: token}).done(function(a){
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
                $('#img_uploaded').append('<div class="col-md-4 col-xs-4 text-center" style="padding-bottom: 3%;">\
                                <img alt="image" src="'+val+'">\
                                <button type="button" class="btn btn-xs btn-danger">Delete</button>\
                                <input type="hidden" name="img_url[]" value="'+val+'">\
                               \
                            </div>')
            });
            $('#preview_img').hide();
        }else{
              swal("Lỗi !", "Không thể tải lên ảnh ! Thử lại sau !", "warning");
            $('#preview_img').hide();
        }
      },
      error: function(b){
          console.log(b);
      }           
    });

    e.preventDefault();

});

