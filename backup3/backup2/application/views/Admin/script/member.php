function delete_member(id){
	if(confirm('Bạn có chắc chắn muốn xóa ?')){
		$.get('', {delete_id: id}).done(function(a){
			
			if(a.status == true){
				toastr['success'](a.message);
			}else{
				toastr['error'](a.message);
			}
	    	setTimeout(function(){
	    		location.reload();
	    	}, 5000);
		}).fail(function(){
			toastr['error']('Không thể kết nối với server');
		});
	}
}

function edit_tien(id){
	var plus_money = prompt("Nhập số tiền cần nạp?", 0);
	if($.isNumeric(plus_money)){
		if(confirm('Xác nhận ?')){
			$.get('', {plus_id: id, plus_money: plus_money}).done(function(a){
				
				if(a.status == true){
					toastr['success'](a.message);
				}else{
					toastr['error'](a.message);
				}
		    	setTimeout(function(){
		    		location.reload();
		    	}, 5000);
			}).fail(function(){
				toastr['error']('Không thể kết nối với server');
			});
		}
	}

}
$('#table_id').DataTable({});
