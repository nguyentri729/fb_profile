<div class="col-md-8">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Chỉnh sửa server</h3>
	</div>
	<div class="panel-body">
				<form action="" method="POST" role="form">
			<div class="form-group">
				<label for="link_server">* Link Server: </label>
				<input type="text" class="form-control" id="link_server" placeholder="Không có dấu /" name="url_server_update" value="<?=$data_server['url_server']?>">
			</div>
			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">
			<div class="form-group">
				<label for="active">* Trạng thái: </label>
<?php

$options = array(
        1         => 'Hoạt động',
        0          => 'Bảo trì',
);


echo form_dropdown('active', $options, $data_server['active'], 'class="form-control" required="required"');

?>
</div>
			
	<div class="form-group">
	<button type="submit" class="btn btn-primary btn-block" id="submit_btn">Cập nhật</button>
</div>		
		</form>
	</div>
</div>
</div>
<div class="col-md-4">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Cập nhật trạng thái</h3>
	</div>
	<div class="panel-body">
			<div class="form-group">
				<label for="link_request">* Link Request: </label>
				<input type="text" class="form-control" id="link_request" value="<?=$data_server['url_server']?>/api/get_status.php?type=<?=$this->input->get('type')?>">
			</div>
			<textarea class="form-control" rows="3" disabled="" id="result"></textarea><br>
			<button class="btn btn-primary btn-block" onclick="request_data()">Request data</button>
	</div>
</div>
</div>