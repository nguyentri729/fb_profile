<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm thông báo</h3>
	</div>
	<div class="panel-body">
		<div id="result">
			
		</div>
				<form action="" method="POST" role="form">
			<div class="form-group">
				<label>* Nội dung thông báo: </label>
				<textarea class="form-control" placeholder="Nội dung thông báo" name="message" rows="5"></textarea>
			</div>


			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">

				
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block" id="submit_btn">Thêm thông báo</button>
			</div>		
		</form>
	</div>
</div>
</div>
<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách thông báo</h3>
	</div>
	<div class="panel-body">
		<?php foreach ($data_noti as $noti): ?>
		<div class="list-group">
			<a href="#" class="list-group-item">
				<!-- <h4 class="list-group-item-heading">List group item heading</h4> -->
				<p class="list-group-item-text"><?php

				echo addslashes($noti['message']);
				echo '('.$this->m_func->timeAgo($noti['time_creat']).')';
				?></p><br>
				<button class="btn btn-xs btn-info" style="float: right;" onclick="delete_package(<?=$noti['id']?>)">Xóa</button>
				<div class="clearfix"></div>
			</a>
		</div>
		<?php endforeach ?>


	</div>
</div>
</div>
