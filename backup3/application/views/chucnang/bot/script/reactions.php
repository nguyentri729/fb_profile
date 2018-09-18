<?php
if($this->input->get('type') == 'success'){
?>
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
<?php
}elseif($this->input->get('type') == 'error'){
?>
setTimeout(function() {
    swal({
        title: "Thất bại!",
        text: "Bạn Đã Cài Đặt Bot Thất bại!!! Thử lại sau",
        type: "warning",
        html: true
    }, function() {
        window.location = 'Reactions';
    });
}, 100);
<?php
}elseif ($this->input->get('type') == 'success_a') {
?>
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
<?php
}elseif($this->input->get('type') == 'error_a'){
	?>
setTimeout(function() {
    swal({
        title: "Thất bại!",
        text: "Bạn Đã Gỡ Cài Đặt Bot Thất bại!!! Thử lại sau",
        type: "warning",
        html: true
    }, function() {
        window.location = 'Reactions';
    });
}, 100);
	<?php
}
?>