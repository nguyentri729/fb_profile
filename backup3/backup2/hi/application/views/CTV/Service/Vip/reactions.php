<?php
/*	id
	name_package
	mieu_ta
	so_luong
	max_post
	type_package
	gia_clone
	gia_nguoithat
	doi_tuong_dung 
	active

	*/
?>

<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Cài đặt dịch vụ VIP Reactions</h3>
		</div>
		<div class="panel-body">


			<form action="" method="POST" class="form" role="form" id="form_vip">

					<ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#home">Cài đặt cơ bản</a></li>
					  <li><a data-toggle="tab" href="#time_tt">Tinh chỉnh</a></li>
					  <li style="display: none;"><a data-toggle="tab" href="#menu1">Đối tượng tương tác</a></li>
					  
					</ul>
					<br>
					<div class="tab-content">
					  <div id="home" class="tab-pane fade in active">
					  	<div class="form-group">
					  		<label>* Tên VIP: </label><br>
					  		<input type="text" name="name_vip" placeholder="Tên VIP hiển thị" class="form-control" required="">
					  	</div>

					  	<div class="form-group">
					  		<label>* Link Facebook (hoặc ID): </label><br>
					  		<input type="text" name="url_or_uid" placeholder="Link trang cá nhân hoặc UID người cài" class="form-control" required="">
					  	</div>
					  	<div class="row">
					  		<div class="col-md-12">
							  	<div class="form-group">
							  		<label>* Thời gian cài (ngày): </label><br>
							  		<input type="number" name="time_cai" placeholder="Thời gian cài" class="form-control" value="10" id="time_cai">
							  	</div>
					  		</div>
					  		<div class="col-md-6" style="display: none;">
							  	<div class="form-group">
							  		<label>* Loại tương tác: </label><br>
							  		<select name="loai_acc_tuong_tac" id="loai_tuong_tac" class="form-control" required="required">
							  			<option value="1" selected="">Người dùng thật</option>
							  			<option value="0">Người dùng ảo (clone)</option>
							  		</select>
							  		
							  	</div>
					  		</div>
					  	</div>


					  	<div class="form-group">
					  		<label>* Gói mua: </label><br>
					  		<select name="package_id" id="package_vip" class="form-control" required="required">
					  			
					  			<<?php foreach ($package as $goi_like): ?>
					  				<option value="<?=$goi_like['id']?>"><?=$goi_like['name_package']?> (<?=number_format($goi_like['so_luong'])?> 👍)</option>
					  			<?php endforeach ?>
					  			
					  			
					  		</select><br>
					  		
					  	</div>

					  	<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

					  	<div class="form-group">
					  		<label>* Cảm xúc tương tác : </label><br>
					  		<div class="checkbox">
					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="1" checked="">
					  				Thích
					  			</label>
	<div style="display: none;">
					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="2">
					  				Yêu thích
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="3">
					  				Phẫn nộ
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="4">
					  				Ngạc nhiên
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="5">
					  				Buồn
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="6">
					  				Haha
					  			</label>
					  		</div>
					  		</div>
					  	</div>

					  	<div class="form-group">
					  		<b>* Ghi chú : </b><br>
					  		<textarea class="form-control" placeholder="Một chút ghi chú..." name="ghi_chu" required=""></textarea>
					  	</div>

					  </div>
<?php
	if(isset($package[0])){
		$arr_html = array(

			'name_package' => $package[0]['name_package'],
			'max_like' => $package[0]['so_luong'],
			'max_post' => $package[0]['max_post'],
			'gia' => $package[0]['gia_nguoithat'],
			'mieu_ta' => $package[0]['mieu_ta']
		);
	}else{
		$arr_html = array(
			'name_package' => 0,
			'max_like' => 0,
			'max_post' => 0,
			'gia' => 0,
			'mieu_ta' => ''
		);
	}
?>
<div id="time_tt" class="tab-pane fade">

	<div class="row">
		<div class="col-md-12">
					  	<div class="form-group">
					  		<label>* Số like dùng : </label><br>
					  		<input type="number" name="so_luong_dung" id="so_luong_dung" placeholder="Số like dùng" class="form-control" value="<?=$arr_html['max_like']?>"  required="">
					  	</div>
		</div>

		<div class="col-md-12" style="display: none;">
					  	<div class="form-group">
					  		<label>* Số post sử dụng: </label><br>
					  		<input type="number" name="so_post_dung" id="so_post_dung" placeholder="Số post sử dụng" class="form-control" value="<?=$arr_html['max_post']?>" required="">
					  	</div>
		</div>

		<div class="col-md-12">
					  	<div class="form-group">
					  		<label>* Số like/lần :  </label><br>
					  		<input type="number" name="so_luong_lan" id="so_luong_lan" placeholder="Số like mỗi lần" class="form-control" value="<?=round($arr_html['max_like']/20)?>" required="">

					  	</div>
		</div>

		<div class="col-md-12" style="display: none;">
					  	<div class="form-group">

					  		<label>* Khoảng cách/lần (phút): </label><br>
					  		<input type="number" name="khoang_cach_moi_lan" placeholder="Mỗi lần cách nhau/ phút" class="form-control" value="5" required="">

					  	</div>
		</div>

	</div>
					  </div>
					  <div id="menu1" class="tab-pane fade" style="display: none;">
							<div class="row">
								<div class="col-md-6">
											  	<div class="form-group">
											  		<label>* Từ (tuổi): </label><br>
											  		<input type="number" name="tuoi_tu" placeholder="Tuổi từ" class="form-control" value="18" required="">
											  	</div>
								</div>
								<div class="col-md-6">
											  	<div class="form-group">
											  		<label>* Đến(tuổi): </label><br>
											  		<input type="number" name="tuoi_den" placeholder="Tuổi đến" class="form-control" value="55" required="">
											  	</div>
								</div>
							</div>

							<div class="form-group">
								<label>* Giới tính : </label><br>
								<select name="gioi_tinh" id="input" class="form-control" required="required">
									<option value="2">Tất cả</option>
									<option value="0">Nam</option>
									<option value="1">Nữ</option>
								</select>
							</div>
					  
					  	


					  </div>
					 
					</div>

					<div class="form-group text-center">
						
							<button type="submit" class="btn btn-primary" id="submit_btn">Tiến hành cài đặt</button>
						
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
			<ul class="list-group">
				<li class="list-group-item"><b>Tên Package: </b><a href="#" class="btn btn-xs btn-info" style="float: right;;" id="name_package"><?=$arr_html['name_package']?></a></li>
				<li class="list-group-item"><b>Like tối đa:  </b><a href="#" class="btn btn-xs btn-primary" style="float: right;;" id="max_like"><?=$arr_html['max_like']?></a></li>
				<li class="list-group-item"><b>Giới hạn bài viết: </b><a href="#" class="btn btn-xs btn-warning" style="float: right;;"  id="limit_post"><?=$arr_html['max_post']?></a></li>
			</ul>
			<center><small id="mieu_ta"><?=$arr_html['mieu_ta']?></small></center>
		</div>
	</div>	

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thành tiền</h3>
		</div>
		<div class="panel-body">
				
			<ul class="list-group">


				<li class="list-group-item">
					<span class="badge" id="thanh_tien"><?=number_format($arr_html['gia'] * 10)?></span>
					Thành tiền
				</li>
				<li class="list-group-item">
					<span class="badge" id="giam_gia">0</span>
					Giảm giá
				</li>
				<hr>
				<li class="list-group-item text-center">
					<b>Số tiền phải trả</b><br>
					<h3 id="phai_tra"><?=number_format($arr_html['gia'] * 10)?></h3>
				</li>
			</ul>
			<a href="/CTV/Services/Vip/Reactions/QuanLyKhachHang" class="btn btn-primary btn-block">Quản lý khách hàng</a>
		</div>
	</div>	


</div>