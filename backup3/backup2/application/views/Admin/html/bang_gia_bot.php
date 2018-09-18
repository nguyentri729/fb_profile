<div class="col-md-8">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Bảng giá bot</h3>
	</div>
	<div class="panel-body">
		
			<form action="" method="POST" role="form">
			<div class="form-group">
				<label>* Giá CTV: </label>
				<input type="number" class="form-control" placeholder="Giá CTV" name="gia_ctv" required="">
			</div>

			<div class="form-group">
				<label>* Giá Đại lý: </label>
				<input type="number" class="form-control" placeholder="Giá Đại lý" name="gia_dl" required="">
			</div>

			<div class="form-group">
				<label>* Loại Bot: </label>
				<select name="type_acc" class="form-control" required="required">
					<option value="bot_reactions">Reactions</option>
					<option value="bot_comment">Comment</option>
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

<div class="col-md-4">
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
							<th>Giá CTV</th>
							<th>Giá Đại Lý</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_package as $package): ?>
						<tr>
							<td><?=$package['dich_vu']?></td>
							<td><?=number_format($package['gia_ctv'])?></td>
							<td><?=number_format($package['gia_dl'])?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
	</div>
</div>
</div>
