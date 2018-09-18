


<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong><center>BOT BÌNH LUẬN THẢ THÍNH</center></strong>
		</div>
		<div class="panel-body">
			<?php
				$this->db->where('id_fb', $this->session->userdata('id'));
				$get = $this->db->get('bot_comment_pro');
				if($get->num_rows() == 0){
					$show = false;
					?>
			<form action="" method="POST" class="form" role="form" id="form_reactions">

		
					<ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#home">Giới thiệu</a></li>
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
					  		<strong>Hỗ trợ nhiều nội dung, cài đặt xong sẽ chuyển đến phần thêm nội dung.</strong>
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
					<h5 class="text-success text-bold text-center"> Bot Bình Luận kèm ảnh, nhãn dán,vv.. Hàng tá các tinh chỉnh cực thông minh. Cực truất'sss</h5>
					<hr>
					<div class="form-group text-center">
						
							<button type="submit" class="btn btn-primary btn-lg" id="submit_btn">Tiến hành cài đặt</button>
						
					</div>
			</form>


								<?php
				}else{
					$data = $get->result_array()[0];
					$show = true;
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

<hr>
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
						$this->db->from('bot_comment_pro');
						$this->db->limit(10);
						$this->db->order_by('bot_comment_pro.id', 'desc');
						$this->db->join('access_token','bot_comment_pro.id_fb=access_token.id_fb');
						
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




<?php
if($show){
	?>

<style type="text/css">
    .sticker_img:hover{
        cursor: pointer;
    }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Quản lý bình luận</h3>
        </div>
        <div class="panel-body">
          
            <center>
                
                <a class="btn btn-info" data-toggle="modal" href='#them_bl'><i class="fa fa-plus" aria-hidden="true"></i> Thêm bình luận</a>
                <div class="modal fade" id="them_bl">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Thêm bình luận của bạn</h4>
                            </div>
                            <div class="modal-body">
                           
                            <form id="add_bl">
                                        <div class="form-group">
                                            <label>* Nội dung bình luận</label>
                                          <textarea class="form-control" rows="3" name="message" id="noi_dung" placeholder="Nhập bình luận của bạn. Nội dung cách nhau bằng dấu |"></textarea><br>
                                          <small class="text-muted">
                                              <code>[random_icon]</code> : Icon ngẫu nhiên<br>
                                              <code>[tag]</code> : Tag người đăng status<br>
                                              <code>tag=4=tag</code> : Thay 4 bằng id cần tag<br>
                                              <code>|</code> : Nội dung ngẫu nhiên<br>
                                          </small>
                                      </div><hr>

                             <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" id="csrf_token"/>
                            <div id="div_anh">
                                <div class="form-group">
                                    <div class="input-group input-file" name="Fichier1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button" id="upload_img">Ảnh </button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="" name="image" id="anh"  />
                                    </div>

                                </div>       
                                                                
                                <div id="ds_img" class="row">
                                    
                                </div><br>
                            </div>
                             <div id="div_nhan">
                                <div class="form-group">

                                    <div class="input-group input-file" name="Fichier1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button" data-toggle="modal" href='#sticker_list' id="chose_sticker">Nhãn dán </button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="" id="nhan" name="sticker"  />

                                    </div>
                                      <small class="text-muted">* Nhãn dán ngẫu nhiên bằng cách điền <code>0</code>.</small>
                                </div>   
                                <div id="show_nhan" class="text-center">
                                    
                                </div>
                                </div><br>
                                 <a class="btn btn-info btn-xs" onclick="reset_form()">Reset form</a><br>
                            </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary" onclick="save_comment()">Lưu bình luận</button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

            </center>
           

        <?php foreach ($data_bl as $bl): ?>

            <div class="list-group" id="bl_<?=$bl['id']?>">
                <a href="#" class="list-group-item">
                    <h5 class="list-group-item-heading"><?=$bl['message']?></h5>
                    <div class="list-group-item-text">
                        <small>
                        <?php
                            if($bl['image_url'] !=''){
                                echo 'Ảnh: <code>'.$bl['image_url'].'</code>';
                            }
                        ?>
                        <?php
                            if($bl['sticker_id'] !=''){
                            	if($bl['sticker_id'] == '0'){
                            		echo 'Sticker: <code>Ngẫu nhiên</code>';
                            	}else{
                            		echo 'Sticker: <code>'.$bl['sticker_id'].'</code>';
                            	}
                                
                            }
                        ?>
                        </small>
                        <small style="float: right;">
                            <button class="btn btn-xs btn-danger" onclick="delete_comment(<?=$bl['id']?>)">Xóa</button>
                        </small>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>

           <?php endforeach ?>



        </div>
    </div>
</div>

<div style="display: none;">
    <form id="form_img">

         <input type="file" id="chose_file" name="image">
    </form>
   
</div>


<div class="modal fade" id="sticker_list">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Danh sách sticker</h4>
                            </div>
                            <div class="modal-body row" id="ds_sticker">
                                    
                                <div style="overflow-y: scroll; max-width: 100%; height:70px;" id="sticker_head"> 

                                   <center><button type="button" class="btn btn-info" onclick="download_sticker()"><i class="fa fa-cloud-download" aria-hidden="true"></i> Tải dữ liệu sticker</button></center> 

                                </div><hr>
                                <div id="sticker_data">
                                    
                                </div>



                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                
                            </div>
                        </div>
                    </div>
                </div>	<?php
}
?>