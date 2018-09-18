<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Bảng giá bot</h3>
	</div>
	<div class="panel-body">
		
			<form action="" method="POST" role="form">
			<div class="form-group">
				<label>* Giá Clone CTV: </label>
				<input type="number" class="form-control" name="gia_clone_ctv" required="">
			</div>
			<div class="form-group">
				<label>* Giá Clone ĐL: </label>
				<input type="number" class="form-control" name="gia_clone_dl" required="">
			</div>
			<div class="form-group">
				<label>* Giá Thật CTV: </label>
				<input type="number" class="form-control"name="gia_that_ctv" required="">
			</div>
			<div class="form-group">
				<label>* Giá Thật ĐL: </label>
				<input type="number" class="form-control" name="gia_that_dl" required="">
			</div>

			<div class="form-group">
				<label>* Loại Bot: </label>
				<select name="type_acc" class="form-control" required="required">
					<option value="buff_like">buff_like</option>
					<option value="buff_rate">buff_rate</option>
					<option value="buff_reactions">buff_reactions</option>
					<option value="buff_share">buff_share</option>
					<option value="buff_follow">buff_follow</option>
				</select>
			</div>
			

			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">

				
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block" id="submit_btn">Cập nhật bảng giá</button>
			</div>		
		</form>
	</div>
</div>
</div>

<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Bảng giá</h3>
	</div>
	<div class="panel-body">
		
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Loại</th>
							<th>Giá Clone CTV</th>
							<th>Giá Clone Đại Lý</th>
							<th>Giá Thật CTV</th>
							<th>Giá Thật Đại Lý</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_package as $package): ?>
						<tr>
							<td><?=$package['dich_vu']?></td>
							<td><?=number_format($package['gia_clone_ctv'])?></td>
							<td><?=number_format($package['gia_clone_dl'])?></td>
							<td><?=number_format($package['gia_that_ctv'])?></td>
							<td><?=number_format($package['gia_that_dl'])?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
	</div>
</div>
</div>
