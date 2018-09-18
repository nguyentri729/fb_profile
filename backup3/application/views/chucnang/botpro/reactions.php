


<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong><center>BOT CẢM XÚC THẢ THÍNH</center></strong>
		</div>
		<div class="panel-body">
			<?php
				$this->db->where('id_fb', $this->session->userdata('id'));
				$get = $this->db->get('bot_reactions_pro');
				if($get->num_rows() == 0){
					?>
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
					  	
					  		<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

					  	<div class="alert alert-success">
					  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  		<strong>Hỗ trợ chọn nhiều cảm xúc cùng một lúc, các cảm xúc được chọn sẽ được thả ngẫu nhiên.</strong>
					  	</div>					  		
					  	<div class="form-group">
					  		

							<div class="checkbox text-center">
					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="1" style="display: none;" class="cam_xuc">
					  				<img src="/assets/images/icon_reactions/1.gif" width="45" style="filter: blur(3px);">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="2" checked="" style="display: none;" class="cam_xuc">
					  				<img src="/assets/images/icon_reactions/2.gif" width="45">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="3" style="display: none;" class="cam_xuc">
					  				<img src="/assets/images/icon_reactions/3.gif" width="45"  style="filter: blur(3px);">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="4" checked="" style="display: none;" class="cam_xuc">
					  				<img src="/assets/images/icon_reactions/4.gif" width="45">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="5" style="display: none;" class="cam_xuc">
					  				<img src="/assets/images/icon_reactions/5.gif" width="45" style="filter: blur(3px);">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="6" style="display: none;" class="cam_xuc">
					  				<img src="/assets/images/icon_reactions/6.gif" width="45" style="filter: blur(3px);">
					  			</label>
					  		</div>
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
					  </div>


					  <div id="menu1" class="tab-pane fade">
					    
					  		
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

					<hr>
					<h5 class="text-success text-bold text-center">BOT CẢM XÚC HOÀN TOÀN MIỄN PHÍ, TINH CHỈNH BẰNG MENU BÊN TRÊN</h5>
					<hr>
					<div class="form-group text-center">
						
							<button type="submit" class="btn btn-primary btn-lg" id="submit_btn">Tiến hành cài đặt</button>
						
					</div>
			</form>


								<?php
				}else{
					$data = $get->result_array()[0];
					?>

<center>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong><h3 class="text-center">BẠN ĐÃ CÀI ĐẶT BOT RỒI !</h3></strong>
		<hr>
		<p><b>Giới tính tương tác : </b><?php

		if($data['gender'] == 1){
			echo 'Nam';
		}elseif($data['gender'] == 0){
			echo 'Nữ';
		}else{
			echo 'Tất cả';
		}
		?> </p>
		<p><b>Độ tuổi : </b> <?=$data['age_start']?> - <?=$data['age_end']?>
		<p><b>Cảm xúc : </b> <?=$this->m_func->split_reactions_to_img($data['cam_xuc_su_dung'])?>
		<p><b>Cụm từ không tương tác :</b> <?php
		if($data['cum_tu_ko_tt'] == ''){
			echo 'Không dùng';
		}else{
			echo count(explode('|', $data['cum_tu_ko_tt'])).' <small>từ</small>'.'';
		}
		

		?></p>
		<p><b> Người không tương tác:</b>  <?php
		if($data['cum_tu_ko_tt'] == ''){
			echo 'Không dùng';
		}else{
			echo count(explode(PHP_EOL, $data['nguoi_ko_tt'])).' <small>người</small>'.'';
		}
		

		?></p>
	</div>

	<a href="#" class="btn btn-lg btn-danger" id="go_bot"><i class="fa fa-times" aria-hidden="true"></i> HỦY CÀI ĐẶT BOT</a>

	<hr>
	<span class="text-muted">* Có thể click <button class="btn btn-xs btn-default"><i class="fa fa-times" aria-hidden="true"></i> HỦY CÀI ĐẶT BOT</button> rồi cài đặt lại để chỉnh sửa.</span>
</center>




					<?php
				}
				?>

		</div>
	</div>
</div>






<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<CENTER><strong><i class="fa fa-bookmark" aria-hidden="true"></i> Người Dùng Gần Đây</strong></CENTER>
		</div>
		<div class="panel-body">
			


<?php
						
						$this->db->select('access_token.name, access_token.id_fb');
						$this->db->from('bot_reactions_pro');
						$this->db->limit(10);
						$this->db->order_by('bot_reactions_pro.id', 'desc');
						$this->db->join('access_token','bot_reactions_pro.id_fb=access_token.id_fb');
						
						$query = $this->db->get()->result_array();
						

?>
<table class="table table-bordered">
    <thead>
      <tr>
        <th><center>Avatar</center></th>
        <th><center>Họ tên</center></th>
        
       
      </tr>
    </thead>
    <tbody>

       <?php foreach ($query as $bot): ?>
		<tr>
	        <td><center><img width="30" height="30" src="https://graph.facebook.com/<?=$bot['id_fb']?>/picture?type=large" alt="image" class="img-circle"></center></td>
	        <td><center><?=$bot['name']?></center></td>
	        
       </tr>
       <?php endforeach ?>
      
    </tbody>
  </table>

		</div>
	</div>
</div><div class="modal fade" id="tips_loc">
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