$('#auto-like').submit(function(e){
    $('#submit').attr('disabled','');
    $('#result').show();
    $.post('',$(this).serialize()).done(function(data){
        $('#submit').removeAttr('disabled');
        alert(data.message);
        window.location = '/Dashboard';
        $('#result').hide();
    }).fail(function(data){
        alert('Có lỗi xảy ra!');
        window.location = window.location;
    });
    return false  
});

var _token = '<?=$this->session->userdata('access_token')?>';
var list_ablum = [];
get_feed('https://graph.facebook.com/me/feed?access_token='+_token+'');
//get ablum
$.getJSON('https://graph.facebook.com/me/albums', {access_token: _token}, function(a) {
    if(a['data']){
        $.each(a['data'], function(index, ablum) {
            if(ablum['privacy'] == 'everyone'){
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

$('#my_select').change(function(event) {
   var val = $(this).val();
   if(val == 'feed'){
       get_feed('https://graph.facebook.com/me/feed?access_token='+_token+'');
   }else{
       get_photo('https://graph.facebook.com/'+val+'/photos?access_token='+_token+'');
   }
});

function get_feed(url){
    $('#status').html('<center><h3>Đang tải dữ liệu...</h3></center>');
    $.getJSON(url, function(a) {
        if(isset(a['data'])){
            $('#status').html('');
            $.each(a['data'], function(id, post) {
               
                if(isset(post['privacy'])){
                    if(post['privacy']['value'] =='EVERYONE'){

                    
                        if(isset(post['likes'])){
                            var like_cout = post['likes']['count'];
                        }else{
                            var like_cout = 0;
                        }
                      
                        if(isset(post['picture'])) {
                            var picture ='<img src="'+post['picture']+'" style="max-width: 100%; margin-left:8px; margin-right:8px; margin-top:3px;">';
                        }else{
                            var picture = '';
                        }

                        if(isset(post['message'])) {
                            var noidung = post['message'];
                        }else{
                            var noidung = '';
                        }

                        $('#status').append('<div class="panel panel-danger">\
                            <div class="media">\
                                <div class="media">\
                                    <div class="media-left">\
                                        <img src="https://graph.facebook.com/'+post['from']['id']+'/picture?type=large" class="media-object img-circle" style="width:50px; margin-top:5px; margin-left:10px">\
                                    </div>\
                                    <div class="media-body" style="margin-top:10px">\
                                        <a href="//fb.com/'+post['id']+'" class="media-heading" target="_blank" style="margin-top:10px; "><b>'+post['from']['name']+'</b></a>\
                                        <br>\
                                        <small class="text-muted">'+post['created_time']+'</small>\
                                    </div>\
                                </div>\
                                <p style="margin-top:8px; margin-left:8px; margin-right:8px;" class="media-message">'+noidung+'</p>\
                                <p style="margin-top:8px; margin-left:8px;" class="media-message"><font color="green"> <i class="glyphicon glyphicon-thumbs-up"></i> '+like_cout+' Like</font>\
                                </p>\
                                <p style="margin-top:8px; margin-left:8px; margin-right:8px;" class="text-muted"></p>\
                                '+picture+'\
                        \
                                <div class="pull-right">\
                                    <button onclick="submit_id(\''+post['id']+'\')" type="button" class="btn btn-danger btn-xs getid" style="margin-top:10px; margin-right:1px; margin-bottom:1px; background-color: red;"><b>TĂNG LIKE BÀI VIẾT NÀY</b>\
                                    </button>\
                                </div>\
                            </div>\
                        </div>');
                }
                }

            });
        }
        if(isset(a['paging'])){
             $('.pager').html('');
            if(isset(a['paging']['previous'])){
                $('.pager').html('<li><a class="click_paging" onclick="get_feed(\''+a['paging']['previous']+'\')">Bài trước</a></li>');
            }
            if(isset(a['paging']['next'])){
                $('.pager').append('<li><a class="click_paging" onclick="get_feed(\''+a['paging']['next']+'\')">Bài tiếp</a></li>');
            }

        }
    });

}

function get_photo(url){
    $('#status').html('<center><h3>Đang tải dữ liệu...</h3></center>');
    $.getJSON(url, function(a) {
        if(isset(a['data'])){
            $('#status').html('');
            $.each(a['data'], function(id, post) {
                        if(isset(post['likes'])){
                            var like_cout = post['likes']['count'];
                        }else{
                            var like_cout = 0;
                        }
                      
                        if(isset(post['picture'])) {
                            var picture ='<img src="'+post['picture']+'" style="max-width: 100%; margin-left:8px; margin-right:8px; margin-top:3px;">';
                        }else{
                            var picture = '';
                        }

                        if(isset(post['message'])) {
                            var noidung = post['message'];
                        }else{
                            var noidung = '';
                        }


                        $('#status').append('<div class="panel panel-danger">\
                            <div class="media">\
                                <div class="media">\
                                    <div class="media-left">\
                                        <img src="https://graph.facebook.com/'+post['from']['id']+'/picture?type=large" class="media-object img-circle" style="width:50px; margin-top:5px; margin-left:10px">\
                                    </div>\
                                    <div class="media-body" style="margin-top:10px">\
                                        <a href="//fb.com/'+post['id']+'" class="media-heading" target="_blank" style="margin-top:10px; "><b>'+post['from']['name']+'</b></a>\
                                        <br>\
                                        <small class="text-muted">'+post['created_time']+'</small>\
                                    </div>\
                                </div>\
                                <p style="margin-top:8px; margin-left:8px; margin-right:8px;" class="media-message">'+noidung+'</p>\
                                <p style="margin-top:8px; margin-left:8px;" class="media-message"><font color="green"> <i class="glyphicon glyphicon-thumbs-up"></i> '+like_cout+' Like</font>\
                                </p>\
                                <p style="margin-top:8px; margin-left:8px; margin-right:8px;" class="text-muted"></p>\
                                '+picture+'\
                        \
                                <div class="pull-right">\
                                    <button onclick="submit_id(\''+post['id']+'\')" type="button" class="btn btn-danger btn-xs getid" style="margin-top:10px; margin-right:1px; margin-bottom:1px; background-color: red;"><b>TĂNG LIKE BÀI VIẾT NÀY</b>\
                                    </button>\
                                </div>\
                            </div>\
                        </div>');
                

            });
        }
        if(isset(a['paging'])){
             $('.pager').html('');
            if(isset(a['paging']['previous'])){
                $('.pager').html('<li><a class="click_paging" onclick="get_feed(\''+a['paging']['previous']+'\')">Bài trước</a></li>');
            }
            if(isset(a['paging']['next'])){
                $('.pager').append('<li><a class="click_paging" onclick="get_feed(\''+a['paging']['next']+'\')">Bài tiếp</a></li>');
            }

        }
    });

}
$('.click_paging').click(function(e) {
    e.preventDefault();
});
function submit_id(id){
    $('#form_input').val(id);
     $('html, body').animate({
         scrollTop: $("body").offset().top
    }, 1000);
}
function isset () {
    // discuss at: http://phpjs.org/functions/isset
    // +   original by: Kevin van     Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: FremyCompany
    // +   improved by: Onno Marsman
    // +   improved by: Rafał Kukawski
    // *     example 1: isset( undefined, true);
    // *     returns 1: false
    // *     example 2: isset( 'Kevin van Zonneveld' );
    // *     returns 2: true
    var a = arguments,
        l = a.length,
        i = 0,
        undef;

    if (l === 0) {
        throw new Error('Empty isset');
    }

    while (i !== l) {
        if (a[i] === undef || a[i] === null) {
            return false;
        }
        i++;
    }
    return true;
}
<?php
    $check_time =  $this->m_auto->check_kha_dung('auto_like');
    if($check_time['status'] == FALSE){
        echo 'display_c('.$check_time['data'].');';
    }

?>
 
            function display_c (start) {
                window.start = parseFloat(start);
                var end = 0 // change this to stop the counter at a higher value
                var refresh = 1000; // Refresh rate in milli seconds
                if( window.start >= end ) {
                    mytime = setTimeout( 'display_ct()', refresh)
                } else {
                   location.reload();
                }
            }

            function display_ct () {
                // Calculate the number of days left
                var days = Math.floor(window.start / 86400);
                // After deducting the days calculate the number of hours left
                var hours = Math.floor((window.start - (days * 86400 ))/3600)
                // After days and hours , how many minutes are left
                var minutes = Math.floor((window.start - (days * 86400 ) - (hours *3600 ))/60)
                // Finally how many seconds left after removing days, hours and minutes.
                var secs = Math.floor((window.start - (days * 86400 ) - (hours *3600 ) - (minutes*60)))
                if(minutes == 0){
                    var x = ""+secs+" giây";
                }else{
                    var x = ""+minutes+" phút, " +secs+" giây";
                }
                

                document.getElementById('ct').innerHTML = x;
                window.start = window.start - 1;

                tt = display_c(window.start);
            }