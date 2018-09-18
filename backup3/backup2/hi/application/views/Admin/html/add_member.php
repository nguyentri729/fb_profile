<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm thành viên</h3>
	</div>
	<div class="panel-body">
		<div id="result">
			
		</div>
				<form action="" method="POST" role="form">
			<div class="form-group">
				<label>* Email: </label>
				<input type="email" class="form-control" placeholder="Email" name="email">
			</div>

			<div class="form-group">
				<label>* Mật khẩu: </label>
				<input type="password" class="form-control" placeholder="Email" name="password" minlength="8" maxlength="30" value="matkhau123">
			</div>
			<div class="form-group">
				<label>* Họ tên: </label>
				<input type="text" class="form-control" placeholder="Họ và tên" name="name" required="">
			</div>

			<div class="form-group">
				<label>* Số điện thoại: </label>
				<input type="text" class="form-control" placeholder="Số điện thoại" name="phone_number" required="">
			</div>

			<div class="form-group">
				<label>* Facebook ID: </label>
				<input type="text" class="form-control" placeholder="Facebook ID" name="uid_fb" required="">
			</div>

			<div class="form-group">
				<label>* Tiền: </label>
				<input type="number" class="form-control" placeholder="Tiền" name="money" min="0" required="">
			</div>

			<div class="form-group">
				<label>* Loại thành viên: </label>
				<select name="type_acc" class="form-control" required="required">
					<option value="1">Cộng tác viên</option>
					<option value="2">Đại lý</option>
				</select>
			</div>

			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">

				
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block" id="submit_btn">Thêm thành viên</button>
			</div>		
		</form>
	</div>
</div>
</div>
