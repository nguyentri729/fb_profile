function unlock(type){
	switch(type) {
    case 'auto_post':
    	<?php
    		$gia = $this->m_func->get_gia('auto_post');
    		if($gia != false){
  		?>
			var gia = <?=$gia?>; 
			swal({
			  title: "Xác nhận mở khóa ? ",
			  text: "Bạn có mở khóa chức năng này với giá "+gia*30+" xu",
			  icon: "info",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {

			  if (willDelete) {
			    post_active(type);
			  }
			});


  		<?php  			
    		}
    	?>
      	

        break;
   
    default:
       
	}
}
function post_active(dv){
	if(dv != ''){
		$.post('/Dashboards/Apps/ViewApps/ajax', {active_dich_vu: dv, <?=$this->security->get_csrf_token_name()?>: '<?=$this->security->get_csrf_hash()?>'}, function(a) {
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
			 swal("Có lỗi !", 'Không thể kết nối tới server ! Kiểm tra lại kết nối mạng !', "warning").then(() => {
                         location.reload();
                    });
		});
	}
}