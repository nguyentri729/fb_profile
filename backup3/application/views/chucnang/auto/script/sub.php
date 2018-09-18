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

<?php
    $check_time =  $this->m_auto->check_kha_dung('auto_sub');
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