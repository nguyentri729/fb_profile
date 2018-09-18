<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Quản lý thành viên</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover" id="table_id">
				<thead>
					<tr>
						<th>#</th>
						<th>Email</th>
						<th>Họ tên</th>
						<th>UID FB</th>
						<th>Tiền</th>
						<th>SĐT</th>
						<th>Loại</th>
						<th>Trạng thái</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					foreach ($data_thanhvien as $mem): ?>
					<tr>
						<td><?=$i++?></td>
						<td><?=$mem['email']?></td>
						<td><img alt="image" class="img-circle circle-border" src="https://graph.fb.me/<?=$mem['uid_fb']?>/picture?width=30&height=30" width="30" height="30"> <a href="https://facebook.com/<?=$mem['uid_fb']?>" target="_blank"><?=$mem['name']?></a></td>
						<td><?=$mem['uid_fb']?></td>
						<td><?=number_format($mem['money'])?></td>
						<td><?=$mem['phone_number']?></td>
						<td><?php
						if($mem['type_acc'] == 1){
							echo '<a href="#" class="btn btn-xs btn-info">Cộng tác viên</a>';
						}else{
							echo '<a href="#" class="btn btn-xs btn-success">Đại lý</a>';
						}
						?></td>

						<td><?php
						if($mem['active'] == 1){
							echo '<a href="#" class="btn btn-xs btn-success">Hoạt động</a>';
						}else{
							echo '<a href="#" class="btn btn-xs btn-danger">Tạm khóa</a>';
						}
						?></td>
						<td>
							<a href="#" class="btn btn-xs btn-primary" onclick="edit_tien(<?=$mem['id']?>)">Tiền</a>
							<a href="?chinh_sua=<?=$mem['id']?>" class="btn btn-xs btn-info">Sửa</a>
							<a href="#" onclick="delete_member(<?=$mem['id']?>)" class="btn btn-xs btn-danger">Xóa</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>