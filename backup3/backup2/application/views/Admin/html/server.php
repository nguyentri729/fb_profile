<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm server</h3>
	</div>
	<div class="panel-body">
		<form action="" method="POST" role="form">
			<div class="form-group">
				<label for="link_server">* Link Server: </label>
				<input type="text" class="form-control" id="link_server" placeholder="Không có dấu /" name="url_server">
			</div>
			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">
			<div class="form-group">
				<label for="table_server">* Loại server: </label>
				<select name="table" id="table_server" class="form-control" required="required">
					<option value="server_vip">Server Vip</option>
					<option value="server_bot">Server Bot</option>
					<option value="server_buff">Server Buff</option>
				</select>
			</div>

			
		
			<button type="submit" class="btn btn-primary" id="submit_btn">Tiến hành thêm server</button>
		</form>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách server</h3>
	</div>
	<div class="panel-body">

		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#home">Server VIP</a></li>
		  <li><a data-toggle="tab" href="#menu1">Server Bot</a></li>
		  <li><a data-toggle="tab" href="#menu2">Server Buff</a></li>
		</ul>

		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">

		  	<div class="table-responsive">
		  		<table class="table table-hover">
		  			<thead>
		  				<tr>
		  					<th>#</th>
		  					<th>URL</th>
		  					<th>Vip Reactions</th>
		  					<th>Vip Comment</th>
		  					<th>Vip Share</th>
		  					<th>Trạng thái</th>
		  					<th>Hành động</th>
		  				</tr>
		  			</thead>
		  			<tbody>
		  				<?php $i = 1;
		  				foreach ($this->db->get('server_vip')->result_array() as $server): ?>
		  				<tr>
		  					<td><?=$i++?></td>
		  					<td><a href="<?=$server['url_server']?>" target="_blank"><?=$server['url_server']?></a></td>
		  					<td><?=number_format($server['vip_reactions'])?></td>
		  					<td><?=number_format($server['vip_comment'])?></td>
		  					<td><?=number_format($server['vip_share'])?></td>
		  					<td>
		  						<?php

		  						if($server['active'] == 1){
		  							echo '<b class="text-success">Hoạt động</b>';
		  						}else{
		  							echo '<b class="text-danger">Bảo trì</b>';
		  						}
		  						?>
		  					</td>
		  					<td>
		  						
		  						<a class="btn btn-xs btn-info" href="?edit=<?=$server['id']?>&type=server_vip">Sửa</a>
		  						<button class="btn btn-xs btn-danger" onclick="delete_server(<?=$server['id']?>, 'server_vip')">Xóa</button>
		  					</td>
		  				</tr>
		  				<?php endforeach ?>

		  			</tbody>
		  		</table>
		  	</div>

		  </div>
		  <div id="menu1" class="tab-pane fade">
		  		<table class="table table-hover">
		  			<thead>
		  				<tr>
		  					<th>#</th>
		  					<th>URL</th>
		  					<th>Bot Reactions</th>
		  					<th>Bot Comment</th>
		  					<th>Bot Post</th>
		  					<td>Trạng thái</th>
		  					<th>Hành động</th>
		  				</tr>
		  			</thead>
		  			<tbody>
		  				<?php $i = 1;
		  				foreach ($this->db->get('server_bot')->result_array() as $server): ?>
		  				<tr>
		  					<td><?=$i++?></td>
		  					<td><a href="<?=$server['url_server']?>" target="_blank"><?=$server['url_server']?></a></td>
		  					<td><?=number_format($server['bot_reactions'])?></td>
		  					<td><?=number_format($server['bot_comment'])?></td>
		  					<td><?=number_format($server['bot_post'])?></td>
		  					<td>
		  						<?php

		  						if($server['active'] == 1){
		  							echo '<b class="text-success">Hoạt động</b>';
		  						}else{
		  							echo '<b class="text-danger">Bảo trì</b>';
		  						}
		  						?>
		  					</td>
		  					<td>
		  						
		  						<a class="btn btn-xs btn-info" href="?edit=<?=$server['id']?>&type=server_bot">Sửa</a>
		  						<button class="btn btn-xs btn-danger" onclick="delete_server(<?=$server['id']?>, 'server_bot')">Xóa</button>
		  					</td>
		  				</tr>
		  				<?php endforeach ?>

		  			</tbody>
		  		</table>

		  </div>
		  <div id="menu2" class="tab-pane fade">
		  		<table class="table table-hover">
		  			<thead>
		  				<tr>
		  					<th>#</th>
		  					<th>URL</th>
		  					<th>Buff Like</th>
		  					<th>Buff Comment</th>
		  					<th>Buff Reactions</th>
		  					<th>Buff Share</th>
		  					<th>Buff Rate</th>
		  					<th>Buff Follow</th>
		  					<th>Trạng thái</th>
		  					<th>Hành động</th>
		  				</tr>
		  			</thead>
		  			<tbody>
		  				<?php $i = 1;
		  				foreach ($this->db->get('server_buff')->result_array() as $server): ?>
		  				<tr>
		  					<td><?=$i++?></td>
		  					<td><a href="<?=$server['url_server']?>" target="_blank"><?=$server['url_server']?></a></td>
		  					<td><?=number_format($server['buff_like'])?></td>
		  					<td><?=number_format($server['buff_comment'])?></td>
		  					<td><?=number_format($server['buff_reactions'])?></td>
		  					<td><?=number_format($server['buff_share'])?></td>
		  					<td><?=number_format($server['buff_rate'])?></td>
		  					<td><?=number_format($server['buff_follow'])?></td>
		  					<td>
		  						<?php

		  						if($server['active'] == 1){
		  							echo '<b class="text-success">Hoạt động</b>';
		  						}else{
		  							echo '<b class="text-danger">Bảo trì</b>';
		  						}
		  						?>
		  					</td>
		  					<td>
		  						
		  						<a class="btn btn-xs btn-info" href="?edit=<?=$server['id']?>&type=server_buff">Sửa</a>
		  						<button class="btn btn-xs btn-danger" onclick="delete_server(<?=$server['id']?>, 'server_buff')">Xóa</button>
		  					</td>
		  				</tr>
		  				<?php endforeach ?>

		  			</tbody>
		  		</table>

		  </div>
		</div>


	</div>
</div>