<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Dịch vụ tăng cảm xúc bài viết</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" role="form" id="form_buff">
			

					<div class="form-group">
						
						<label>* ID bài viết: </label>
						<input type="text" name="url_or_uid" class="form-control" placeholder="ID post bài viết" id="id_post">
					</div>

					<div id="change">
						<div class="form-group">
							
							<label>* Số lượng cần mua: </label>
							<input type="number" name="so_luong" class="form-control" placeholder="Mua nhiều sẽ được giảm giá <3" id="so_luong" value="0" min="100">

						</div>

						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

					  	<div class="form-group">
					  		<label>* Cảm xúc tương tác : </label><br>
					  		<div class="checkbox">
					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="1" checked="">
					  				<img src="/assets/images/icon_reactions/1.gif" width="40">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="2">
					  				<img src="/assets/images/icon_reactions/2.gif" width="40">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="3">
					  				<img src="/assets/images/icon_reactions/3.gif" width="40">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="4">
					  				<img src="/assets/images/icon_reactions/4.gif" width="40">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="5">
					  				<img src="/assets/images/icon_reactions/5.gif" width="40">
					  			</label>

					  			<label style="padding: 0 4% 0 4%;">
					  				<input type="checkbox" name="cam_xuc[]" value="6">
					  				<img src="/assets/images/icon_reactions/6.gif" width="40">
					  			</label>
					  		</div>
					  	</div>

						<div class="form-group">
							
							<label>* Loại mua: </label>
							<select name="loai_mua" id="loai_mua" class="form-control" required="required">
								<option value="1">Người thật (Bảo hành)</option>
								<option value="0">Nick ảo (Không bảo hành)</option>
							</select>
						</div>
						<div class="form-group">
							
							<label>* Ghi chú: </label>
							<textarea class="form-control" rows="2" placeholder="Điền một chút ghi chú" name="ghi_chu"></textarea>

						</div>	
					</div>
					<center>
					<div class="form-group">

						<button type="submit" class="btn btn-primary" id="submit_btn">Tiến hành tăng like</button>
						
					</div>
					</center>
			</form>
		</div>
	</div>

</div>
<div class="col-md-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Tính tiền</h3>
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
			
			<div class="alert alert-warning">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Yêu cầu bảo hành bằng cách liên hệ với admin hoặc điền thông tin vào form <a href="" target="_blank">tại đây</a>.</strong>
			</div>

		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Danh sách ID</h3>
		</div>
		<div class="panel-body">
			<?php
				$this->db->where('user_creat', $this->session->userdata('ctv_id'));
				$this->db->order_by('id', 'ASC');
				$get = $this->db->get('buff_reactions');
				$i =1;
			?>
			<div class="table-responsive">
				<table class="table table-hover" id="table_id">
					<thead>
						<tr>
							<th>#</th>
							<th>ID Post</th>
							<th>Số lượng</th>
							<th>Cảm xúc</th>
							<th>Loại mua</th>
							<th>Ghi chú</th>
							<th>Trạng thái</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>

					<?php foreach ($get->result_array() as $buff): ?>
								<tr>
									<td><?=$i++?></td>
									<td><?=$buff['uid']?></td>
									<td><?=number_format($buff['so_luong'])?></td>
									<td><?=$this->m_func->split_reactions_to_img($buff['cam_xuc_su_dung'])?>
									<td>
										<?php

										switch ($buff['type_clone']) {
											case '1':
												echo '<button class="btn btn-xs btn-primary">Người thật</button>';
												break;
											
											default:
												echo '<button class="btn btn-xs btn-danger">Nick ảo(Clone)</button>';
												break;
										}
										?>
									</td>
			                        <td>
			                            
			                            <textarea class="form-control" disabled=""><?=$buff['ghi_chu']?></textarea>

			                        </td>
									<td>
										<?php

										switch ($buff['active']) {
											case '1':
												echo '<button class="btn btn-xs btn-success">Đang chạy</button>';
												break;
											case '2':
												echo '<button class="btn btn-xs btn-warning">Hoàn tất</button>';
												break;
											default:
												echo '<button class="btn btn-xs btn-danger">Tạm dừng</button>';
												break;
										}
										?>
									</td>

									<td>
										<button class="btn btn-xs btn-primary" onclick="view_status(<?=$buff['id']?>)">Xem quá trình</button><br>
										
									</td>
								</tr>				
					<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="view_status">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Xem quá trình chạy</h4>
			</div>
			<div class="modal-body">
				<center>
					<div id="kqua" style="display: none;">
						
							
					</div>
					<form id="view_form">
						<div class="form-group">
							<label>* Mã bảo mật: </label><br>
							<div id="image"></div><br>
							<input type="number" name="" class="form-control" placeholder="Nhập mã bảo mật bên trên" id="captcha_input">
						</div>
						<button class="btn btn-succes" type="submit">Xem quá trình</button>
					</form>
				</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				
			</div>
		</div>
	</div>
</div>