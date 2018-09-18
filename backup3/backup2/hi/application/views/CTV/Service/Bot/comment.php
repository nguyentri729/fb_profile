<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Cài đặt bot cảm xúc</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" class="form" role="form" id="form_reactions">

		
					<ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#home">Cài đặt cơ bản</a></li>
					  <li><a data-toggle="tab" href="#time_tt">Tinh chỉnh</a></li>
					  <li><a data-toggle="tab" href="#menu1">Đối tượng tương tác</a></li>
					  <li><a data-toggle="tab" href="#menu2">Lọc tương tác</a></li>
					</ul>
					<br>
					<div class="tab-content">
					  <div id="home" class="tab-pane fade in active">
					  	<div class="form-group">
					  		<label>* Access token: </label><br>
					  		<input type="text" name="access_token" placeholder="Mã access token" class="form-control">
					  	</div>
					  	<div class="form-group">
					  		<label>* Thời gian sử dụng (ngày): </label><br>
					  		<input type="number" name="time_cai" placeholder="Thời gian cài" class="form-control" value="10" id="time_cai">
					  	</div>
					  	<div class="form-group">
					  		<b>* Tương tác bằng : </b><br>
					  		<select name="type_reactions" id="inputTuong_tac_bang" class="form-control" required="required">
					  			<option value="1">Access Token (Khuyên dùng)</option>
					  			<option value="0">Cookie (Bảo trì)</option>
					  		</select><br>
					  		<small class="text-muted">* Một số tính năng phụ không khả dụng với Cookie.</small>
					  	</div>
					  		<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
					  	

					  	<div class="form-group">
					  		<b>* Ghi chú : </b><br>
					  		<textarea class="form-control" placeholder="Một chút ghi chú..." name="ghi_chu"></textarea>
					  	</div>

					  </div>

<div id="time_tt" class="tab-pane fade">
	<!-- <h4 class="text-center">Thời gian tương tác</h4><hr> -->
	<div class="row">
		<div class="col-md-6">
					  	<div class="form-group">
					  		<label>* Tương tác từ (h): </label><br>
					  		<input type="number" name="time_start" placeholder="Bắt đầu tương tác" class="form-control" value="6" min="1" max="23">
					  	</div>
		</div>
		<div class="col-md-6">
					  	<div class="form-group">
					  		<label>* Tương tác đến (h): </label><br>
					  		<input type="number" name="time_end" placeholder="Kết thúc tương tác" class="form-control" value="23" min="1" max="23">
					  	</div>
		</div>
	</div>

	<!-- <h4 class="text-center">Bài viết tương tác</h4><hr> -->
	<div class="row">
		<div class="col-md-4">
					  	<div class="form-group">

					  		<b>* Số bài tương tác /lần: </b><br>
					  		<input type="number" name="post_mot_lan" placeholder="Bài tương tác /phút" class="form-control" value="2" max="50" min="1">

					  	</div>
		</div>
		<div class="col-md-4">
					  	<div class="form-group">
					  		<label>* Khoảng cách mỗi lần (phút): </label><br>
					  		<input type="number" name="khoang_cach_lan" placeholder="Kết thúc tương tác" class="form-control" value="3" min="1">
					  	</div>
		</div>

		<div class="col-md-4">
					  	<div class="form-group">
					  		<label>* Giới hạn bài /ngày: </label><br>
					  		<input type="number" name="max_post_ngay" placeholder="Kết thúc tương tác" class="form-control" value="50" max="999999" min="10">
					  	</div>
		</div>


	</div>		 



					  </div>


					  <div id="menu1" class="tab-pane fade">
					    <div class="row">

					    	<div class="col-md-3">
							  	<div class="form-group">
							  		<label>* Nhóm (Group): </label><br>
							  		<select name="group_tt" id="group" class="form-control" required="required">
							  			<option value="1">Có</option>
							  			<option value="0">Không</option>
							  		</select>
							  	</div>
						    </div>

					    	<div class="col-md-3">
							  	<div class="form-group">
							  		<label>* Trang(Page): </label><br>
							  		<select name="page_tt" id="page" class="form-control" required="required">
							  			<option value="1">Có</option>
							  			<option value="0">Không</option>
							  		</select>
							  	</div>
						    </div>

					    	<div class="col-md-3">
							  	<div class="form-group">
							  		<label>* Trang cá nhân : </label><br>
							  		<select name="profile_tt" id="profile" class="form-control" required="required">
							  			<option value="1">Có</option>
							  			<option value="0">Không</option>
							  		</select>
							  	</div>
						    </div>

					    	<div class="col-md-3">
							  	<div class="form-group">
							  		<label>* Tùy chọn: </label><br>
							  		<select name="list_tt" id="tuy_chon" class="form-control" required="required">
							  			<option value="1">Có</option>
							  			<option value="0" selected="">Không</option>
							  		</select>
							  	</div>
						    </div>

					  	</div>	


					  		<hr>
					  	<div id="people">
							<div class="row">
								<div class="col-md-6">
											  	<div class="form-group">
											  		<label>* Từ (tuổi): </label><br>
											  		<input type="number" name="age_start" placeholder="Bắt đầu tương tác" class="form-control" value="18">
											  	</div>
								</div>
								<div class="col-md-6">
											  	<div class="form-group">
											  		<label>* Đến(tuổi): </label><br>
											  		<input type="number" name="age_end" placeholder="Kết thúc tương tác" class="form-control" value="55">
											  	</div>
								</div>
							</div>

							<div class="form-group">
								<label>* Giới tính : </label><br>
								<select name="gender" id="input" class="form-control" required="required">
									<option value="2">Tất cả</option>
									<option value="0">Nam</option>
									<option value="1">Nữ</option>
								</select>
							</div>
					  	</div>
					  	<div id="chinh" style="display: none;">
							  	<div class="form-group">
							  		<label>* Tùy chọn: </label><br>
							  		<textarea class="form-control" placeholder="List UID tương tác, cách nhau dấu xuống dòng" rows="5" name="ds_list"></textarea>
							  	</div>	
					  	</div>


					  </div>
					  <div id="menu2" class="tab-pane fade">
						<div class="form-group">
							<label>* Cụm từ không tương tác : </label><br>
							<textarea name="cum_tu_ko_tt" id="input" class="form-control" rows="3" placeholder="cách nhau bằng dấu | "></textarea>
							<small class="text-muted">* Khi trong caption có những cụm từ này thì sẽ không tương tác.<a data-toggle="modal" href='#tips_loc'>(Tips)</a></small>
						</div>
					  		
						<div class="form-group">
							<label>* ID không tương tác: </label><br>
							<textarea name="nguoi_ko_tt" id="input" class="form-control" rows="3" placeholder="cách nhau bằng dấu xuống dòng "></textarea>
							<small class="text-muted">* Không tương tác với những ID.</small>
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

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Tính tiền</h3>
		</div>
		<div class="panel-body">
			<ul class="list-group">

				<?php

				$tt = $this->m_comment->thanh_tien(10, $this->session->userdata('ctv_id'));
				?>
				<li class="list-group-item">
					<span class="badge" id="thanh_tien"><?=number_format($tt['tien_chua_giam'])?></span>
					Thành tiền
				</li>
				<li class="list-group-item">
					<span class="badge" id="giam_gia"><?=number_format($tt['so_tien_giam'])?></span>
					Giảm giá
				</li>
				<hr>
				<li class="list-group-item text-center">
					<b>Số tiền phải trả</b><br>
					<h3 id="phai_tra"><?=number_format($tt['tien_da_giam'])?></h3>
				</li>
			</ul>
			<hr>
			<a href="/CTV/Services/Bot/Comment/QuanLyKhachHang" class="btn btn-info btn-block">Quản lý khách hàng</a>

			<hr>
			<div class="alert alert-warning">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Cài đặt dịch vụ sau đó thêm bình luận ở phần quản lý.</strong> 
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tips_loc">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Tips - có thể bạn đã biết</h4>
										</div>
										<div class="modal-body">
											<b>* Cụm từ lọc post bán hàng: </b><hr>
											<code>Ib|giá|mua|bán|bôi|kem|rẻ|hạt rẻ|Hotline|mua bán|như ảnh|cam kết|₫| LÀM ĐẸP|làm đẹp|spa|tuyển|đại lý|đại lí|Ib|tư vấn|giá cả| rẻ|giá|đẹp|Son|son|như ảnh|lẻ|sỉ|giá thành|thị trường|thỏi|Shop|shop|cửa hàng|nhân viên|cửa hàng|địa chỉ|CTV|luôn tuyển|chiết khấu| mở cửa| đóng cửa|lọ</code><hr>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
											
										</div>
									</div>
								</div>
							</div>