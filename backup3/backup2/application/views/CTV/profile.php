<?php
$my_cookie = $this->input->cookie('c_session');
?>
<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thông tin cá nhân</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<center>
					<img alt="image" class="img-circle circle-border" src="https://graph.fb.me/<?=$info_member['uid_fb']?>/picture?width=128"></center>
				</div>
				<div class="col-md-9">
					
					<ul class="list-group">
						<li class="list-group-item"><b>Họ tên: </b> <b class="text-primary"><?=$info_member['name']?></b></li>
						<li class="list-group-item"><b>Email: </b> <b class="text-primary"><?=$info_member['email']?></b></li>
						<li class="list-group-item"><b>Số điện thoại: </b> <b class="text-primary"><?=$info_member['phone_number']?></b></li>
						<li class="list-group-item"><b>Tài khoản: </b> <b class="text-primary"><?=number_format($info_member['money'])?> <sup>vnđ</sup></b></li>
						<li class="list-group-item"><b>Loại tài khoản: </b> <b class="text-primary">
							<?php

							switch ($info_member['type_acc']) {
								case '1':
									echo 'Cộng tác viên';
									break;
								case '2':
									echo 'Đại lý';
									break;
								default:
									echo 'Không xác định';
									break;
							}
							?>

						</b></li>
						<?php
						$this->load->helper('date');
						?>
						<li class="list-group-item"><b>Tham gia vào: </b> <b class="text-primary"><?=mdate('%H:%i - %d/%m/%Y', $info_member['time_creat'])?></b></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Phiên đăng nhập</h3>
		</div>
		<div class="panel-body" style=" overflow-y: scroll; max-height: 300px;">
			<ul class="list-group">
				<?php
				$this->db->order_by('id', 'desc');
				$this->db->where('c_email', $info_member['email']);
				$session = $this->db->get('ctv_sessions');
				?>
				<?php foreach ($session->result_array() as $ss): ?>
				<li class="list-group-item">
					<h5 class="text-info"><?=$ss['user_agent']?>					<?php
						if($ss['c_session'] == $my_cookie){
							echo '(Thiết bị này)';
						}
					?></h5><span>trên <?=$ss['platform']?></span><br><small>IP: <?=$ss['ip_creat']?> vào <?=mdate('%H:%i - %d/%m/%Y', $ss['time_creat'])?></small>

				</li>
				<?php endforeach ?>
				<br>
				<?php
				if($session->num_rows() > 1){
					echo '<center><a href="?logout_all_session=click">Đăng xuất tất cả các phiên</a></center>';
				}
				?>
				
			</ul>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Đổi mật khẩu</h3>
		</div>
		<div class="panel-body">
			<form id="change_pass">
				<div class="form-group">
					<label>* Mật khẩu cũ: </label>
					<input type="password" name="old_pass" class="form-control" placeholder="Nhập mật khẩu cũ" required="" min="6">
				</div>

				<div class="form-group">
					<label>* Mật khẩu mới: </label>
					<input type="password" name="new_pass" class="form-control" placeholder="Nhập mật khẩu mới" required="" min="6">
				</div>
				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">
				<div class="form-group">
					<label>* Điền lại mật khẩu mới: </label>
					<input type="password" name="renew_pass" class="form-control" placeholder="Điền lại mật khẩu mới" required="" min="6">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit" id="submit_btn">Đổi mật khẩu</button>
				</div>
			</form>
		</div>
	</div>
</div>
