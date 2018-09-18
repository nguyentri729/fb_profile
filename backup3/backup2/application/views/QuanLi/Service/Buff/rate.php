

<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Danh sách ID</h3>
		</div>
		<div class="panel-body">
			<?php
			
				$this->db->order_by('id', 'DESC');
				$get = $this->db->get('buff_rate');
				$i = 1;
			?>
			<div class="table-responsive">
				<table class="table table-hover" id="table_id">
					<thead>
						<tr>
							<th>#</th>
							<th>ID Page</th>
							<th>Số lượng</th>
							<th>Loại mua</th>
							<th>Trạng thái</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>

					<?php foreach ($get->result_array() as $buff): ?>
								<tr>
									<td><?=$i++?></td>
									<td><img alt="<?=$buff['name']?>" class="img-circle circle-border" src="https://graph.fb.me/<?=$buff['uid']?>/picture?width=40"> <a href="https://facebook.com/<?=$buff['uid']?>" target="_blank" data-toggle="tooltip" title="<?=$buff['ghi_chu']?>"><?=$buff['name']?></a></td>
									<td><?=number_format($buff['so_luong'])?></td>
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