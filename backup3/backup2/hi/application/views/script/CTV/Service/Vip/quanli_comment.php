$(document).ready( function () {

    $('#table_id').DataTable({
    	"language": {
		            "search": "Tìm Kiếm",
		            "paginate": {
		                "first": "Về Đầu",
		                "last": "Về Cuối",
		                "next": "Tiến",
		                "previous": "Lùi"
		            },
		            "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
		            "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
		            "lengthMenu": "Hiển thị _MENU_ mục",
		            "loadingRecords": "Đang tải...",
		            "emptyTable": "Không có gì để hiển thị",
		        }
    });

});



function delete_kh(id){
	if(confirm('Bạn có muốn xóa khách hàng này ?')){
		$.getJSON('', {delete_kh: id}, function(a) {
			if(a.status == true){
				toastr['success'](a.message);
			}else{
				toastr['error'](a.message);
			}
	    	setTimeout(function(){
	    		location.reload();
	    	}, 3000);
		}).fail(function(){
			toastr['error']('Không thể kết nối với server');
		});
	}
}