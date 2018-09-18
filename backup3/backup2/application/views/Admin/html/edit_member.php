<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Chỉnh sửa thành viên</h3>
	</div>
	<div class="panel-body">
		<div id="result">
			
		</div>
				<form action="" method="POST" role="form">
			<div class="form-group">
				<label>* Email: </label>
				<input type="email" class="form-control" placeholder="Email" name="email" value="<?=$data_thanhvien['email']?>">
			</div>

			
			<div class="form-group">
				<label>* Họ tên: </label>
				<input type="text" class="form-control" placeholder="Họ và tên" name="name" required="" value="<?=$data_thanhvien['name']?>">
			</div>

			<div class="form-group">
				<label>* Số điện thoại: </label>
				<input type="text" class="form-control" placeholder="Số điện thoại" name="phone_number" required="" value="<?=$data_thanhvien['phone_number']?>">
			</div>

			<div class="form-group">
				<label>* Facebook ID: </label>
				<input type="text" class="form-control" placeholder="Facebook ID" name="uid_fb" required="" value="<?=$data_thanhvien['uid_fb']?>">
			</div>

			<div class="form-group">
				<label>* Tiền: </label>
				<input type="number" class="form-control" placeholder="Tiền" name="money" min="0" required="" value="<?=$data_thanhvien['money']?>">
			</div>



			<div class="form-group">
				<label>* Loại thành viên: </label>

				<?php

				$options = array(
				        1         => 'Cộng tác viên',
				        2          => 'Đại lý'
				);


				echo form_dropdown('type_acc', $options, $data_thanhvien['type_acc'], 'class="form-control" required="required"');

				?>		
			</div>

			<div class="form-group">
				<label>* Trạng thái: </label>

				<?php

				$options = array(
				        1         => 'Hoạt động',
				        0          => 'Tạm khóa'
				);


				echo form_dropdown('active', $options, $data_thanhvien['active'], 'class="form-control" required="required"');

				?>		
			</div>
			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">

				
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block" id="submit_btn">Cập nhật thành viên</button>
			</div>		
		</form>
	</div>
</div>
</div>
