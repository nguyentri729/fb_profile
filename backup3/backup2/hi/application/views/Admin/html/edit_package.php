<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm Package</h3>
	</div>
	<div class="panel-body">
				<form action="" method="POST" role="form">
			<div class="form-group">
				<label>* Tên Package: </label>
				<input type="text" class="form-control" placeholder="VIP" name="name_package_update" required="" value="<?=$data_package['name_package']?>">
			</div>

			<div class="form-group">
				<label>* Miêu tả </label>
				<textarea class="form-control" placeholder="Miêu tả" name="mieu_ta" required=""><?=$data_package['mieu_ta']?></textarea>
			</div>
			<div class="form-group">
				<label>* Số lượng: </label>
				<input type="number" class="form-control" placeholder="Số lượng like(comment)" name="so_luong" required="" value="<?=$data_package['so_luong']?>">
			</div>

			<div class="form-group">
				<label>* Bài viết tối đa: </label>
				<input type="number" class="form-control" placeholder="Bài viết tối đa" name="max_post" required="" value="15" value="<?=$data_package['max_post']?>">
			</div>

			<div class="form-group" style="display: none;">
				<label>* Giá Clone /ngày: </label>
				<input type="number" class="form-control" placeholder="Giá cho Acc Clone" name="gia_clone" required="" value="<?=$data_package['gia_clone']?>">
			</div>

			<div class="form-group">
				<label>* Giá người thật/ ngày: </label>
				<input type="number" class="form-control" placeholder="Giá người thật" name="gia_nguoithat" min="0" required="" value="<?=$data_package['gia_nguoithat']?>">
			</div>

			<div class="form-group">
				<label>* Đối tượng dùng: </label>
				<?php

				$options = array(
				        1         => 'Cộng tác viên',
				        2          => 'Đại lý',
				);


				echo form_dropdown('doi_tuong_dung', $options, $data_package['doi_tuong_dung'], 'class="form-control" required="required"');

				?>
				
			</div>

			<div class="form-group">
				<label>* Mục thêm: </label>
				<?php

				$options = array(
				        'reactions'         => 'Reactions',
				        'comment'          => 'Comment'
				);


				echo form_dropdown('type_package', $options, $data_package['type_package'], 'class="form-control" required="required"');

				?>

			</div>

			<div class="form-group">
				<label for="active">* Trạng thái: </label>
				<?php

				$options = array(
				        1         => 'Hoạt động',
				        0          => 'Tạm ngưng',
				);


				echo form_dropdown('active', $options, $data_package['active'], 'class="form-control" required="required"');

				?>
			</div>

			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">

				
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block" id="submit_btn">Cập nhật package</button>
			</div>		
		</form>
	</div>
</div>
</div>