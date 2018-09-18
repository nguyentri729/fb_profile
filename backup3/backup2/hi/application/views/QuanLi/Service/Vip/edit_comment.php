
<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Chỉnh sửa khách hàng</h3>
		</div>
		<div class="panel-body">


			<form action="" method="POST" class="form" role="form" id="form_vip">

					<ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#home">Cài đặt cơ bản</a></li>
					  <li><a data-toggle="tab" href="#time_tt">Tinh chỉnh</a></li>
					  <li><a data-toggle="tab" href="#menu1">Đối tượng tương tác</a></li>
					  
					</ul>
					<br>
					<div class="tab-content">
					  <div id="home" class="tab-pane fade in active">
					  	<div class="form-group">
					  		<label>* Tên VIP: </label><br>
					  		<input type="text" name="name_vip" placeholder="Tên VIP hiển thị" class="form-control" required="" value="<?=$data_khachhang['name_vip']?>">
					  	</div>

					  	<div class="form-group">
					  		<label>* Link Facebook (hoặc ID): </label><br>
					  		<input type="text" name="url_or_uid" placeholder="Link trang cá nhân hoặc UID người cài" class="form-control" required="" value="<?=$data_khachhang['uid_vip']?>">
					  	</div>
					  	<div class="row">
					  		<div class="col-md-6">
							  	<div class="form-group">
							  		<label>* Thời gian mua thêm:  </label><br>
							  		<input type="number" name="time_cai" placeholder="Thời gian cài" class="form-control" value="0" id="ngay_cai">
							  	</div>
					  		</div>


					  		<div class="col-md-6">
							  	<div class="form-group">
							  		<label>* Loại tương tác: </label><br>
<?php

$options = array(
        1         => 'Người dùng thật',
        0          => 'Người dùng ảo (clone)',
);


echo form_dropdown('loai_acc_tuong_tac', $options, $data_khachhang['loai_acc_tuong_tac'], 'class="form-control" required="required" id="loai_tuong_tac" disabled=""');

?>


							  		<small class="text-muted">* Bạn không thể chỉnh sửa loại acc tương tác. Vui lòng mua gói mới để đổi loại tương tác. </small>
							  	</div>
					  		</div>
					  	</div>

					  	<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
					  	<input type="hidden" name="package_id" value="<?=$data_khachhang['package_id'];?>" />
					  	

					  	<div class="form-group">
					  		<b>* ID người tạo: </b><br>
					  		<input type="number" name="user_creat" value="<?=$data_khachhang['user_creat']?>" class="form-control">
					  	</div>

					  	<div class="form-group">
					  		<b>* Ghi chú : </b><br>
					  		<textarea class="form-control" placeholder="Một chút ghi chú..." name="ghi_chu" required=""><?=$data_khachhang['ghi_chu']?></textarea>
					  	</div>

                                <div class="form-group">
                                    <label>* Trạng thái: </label>
                                    <br>
<?php

$options = array(
        1         => 'Hoạt động',
        0          => 'Tắt tạm thời',
);


echo form_dropdown('active', $options, $data_khachhang['active'], 'class="form-control" required="required"');

?>
                                </div>
                                
					  </div>






<div id="time_tt" class="tab-pane fade">

	<div class="row">
		<div class="col-md-12">
					  	<div class="form-group">
					  		<label>* Số comment dùng : </label><br>
					  		<input type="number" name="so_luong_dung" id="so_luong_dung" placeholder="Số comment dùng" class="form-control" value="<?=$data_khachhang['so_luong_dung']?>"  required="">
					  	</div>
		</div>

		<div class="col-md-12">
					  	<div class="form-group">
					  		<label>* Số post sử dụng: </label><br>
					  		<input type="number" name="so_post_dung" id="so_post_dung" placeholder="Số post sử dụng" class="form-control" value="<?=$data_khachhang['so_post_dung']?>" required="">
					  	</div>
		</div>

		<div class="col-md-12">
					  	<div class="form-group">
					  		<label>* Số comment/lần :  </label><br>
					  		<input type="number" name="so_luong_lan" id="so_luong_lan" placeholder="Số comment mỗi lần" class="form-control" value="<?=$data_khachhang['so_luong_lan']?>" required="">

					  	</div>
		</div>

		<div class="col-md-12">
					  	<div class="form-group">

					  		<label>* Khoảng cách/lần (phút): </label><br>
					  		<input type="number" name="khoang_cach_moi_lan" placeholder="Mỗi lần cách nhau/ phút" class="form-control" value="<?=$data_khachhang['khoang_cach_moi_lan']?>" required="">

					  	</div>
		</div>

	</div>
					  </div>
					  <div id="menu1" class="tab-pane fade">
							<div class="row">
								<div class="col-md-6">
											  	<div class="form-group">
											  		<label>* Từ (tuổi): </label><br>
											  		<input type="number" name="tuoi_tu" placeholder="Tuổi từ" class="form-control" value="<?=$data_khachhang['tuoi_tu']?>" required="">
											  	</div>
								</div>
								<div class="col-md-6">
											  	<div class="form-group">
											  		<label>* Đến(tuổi): </label><br>
											  		<input type="number" name="tuoi_den" placeholder="Tuổi đến" class="form-control" value="<?=$data_khachhang['tuoi_den']?>" required="">
											  	</div>
								</div>
							</div>

							<div class="form-group">
								<label>* Giới tính : </label><br>
								<?php

								$options = array(
								        1         => 'Nữ',
								        0          => 'Nam',
								        2		=> 'Tất cả'
								);

								//required="required"
								echo form_dropdown('gioi_tinh', $options, $data_khachhang['gioi_tinh'], 'class="form-control" required="required"');

								?>

							</div>
					  
					  	


					  </div>
					 
					</div>

					<div class="form-group text-center">
						
							<button type="submit" class="btn btn-primary" id="submit_btn">Tiến hành cập nhật</button>
						
					</div>
			</form>




		</div>
	</div>	
</div>



<div class="col-md-4">

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thông tin package</h3>
		</div>
		<div class="panel-body">
			<?php
			if($data_package != FALSE){
			?>

				<ul class="list-group">
					<li class="list-group-item"><b>Tên Package: </b><a href="#" class="btn btn-xs btn-info" style="float: right;;" id="name_package"><?=$data_package['name_package']?></a></li>
					<li class="list-group-item"><b>Comment tối đa:  </b><a href="#" class="btn btn-xs btn-primary" style="float: right;;" id="max_like"><?=number_format($data_package['so_luong'])?></a></li>
					<li class="list-group-item"><b>Giới hạn bài viết: </b><a href="#" class="btn btn-xs btn-warning" style="float: right;;"  id="limit_post"><?=number_format($data_package['max_post'])?></a></li>
				</ul>
				<center><small id="mieu_ta"><?=$data_package['mieu_ta']?></small></center>
			<?php
			}else{
				echo '<center><h4 class="text-danger">Gói bạn mua đã bị xóa vì vậy bạn không thể gia hạn thêm. <h4></center>';
			}
			?>

			
		</div>
	</div>	

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thành tiền</h3>
		</div>
		<div class="panel-body">
				
			<ul class="list-group">


				<li class="list-group-item">
					<span class="badge" id="thanh_tien">0</span>
					Thành tiền
				</li>
				<li class="list-group-item">
					<span class="badge" id="giam_gia">0</span>
					Giảm giá
				</li>
				<hr>
				<li class="list-group-item text-center">
					<b>Số tiền phải trả</b><br>
					<h3 id="phai_tra">0</h3>
				</li>
			</ul>
			<a href="/QuanLi/Services/Vip/Comment/" class="btn btn-primary btn-block">Quản lý khách hàng</a>
		</div>
	</div>	


</div>