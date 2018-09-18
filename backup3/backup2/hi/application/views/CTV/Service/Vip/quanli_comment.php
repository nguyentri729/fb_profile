<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách khách hàng</h3>
	</div>
	<div class="panel-body">
		
		<div class="table-responsive">
			<table class="table table-hover" id="table_id">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên VIP</th>
						<th>Còn lại</th>
						<th>Comments/posts</th>
						<th>Gói cài</th>
						<th>Ghi chú</th>

						<th>Trạng thái</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					 $this->load->helper('date');
					foreach ($data_kh as $kh): ?>
						<tr>
							<td><?=$i++?></td>

							<td><img alt="<?=$kh['name_vip']?>" class="img-circle circle-border" src="https://graph.fb.me/<?=$kh['uid_vip']?>/picture?width=20&height=20"> <a href="https://wwww.facebook.com/<?=$kh['uid_vip']?>" data-toggle="tooltip" data-placement="top" title="<?=$kh['ghi_chu']?>"><?=$kh['name_vip']?></a><br>
							<small class="text-info"><?=$kh['uid_vip']?></small></td>
							
                        
                       	 
                       	 	<td>
                       	 	<a href="#" data-toggle="popover" title="Thông tin" data-content="Cài đặt vào : <?=mdate('%H:%i - %d/%m/%Y', $kh['time_creat'])?>  - Ngày hết hạn : <?=mdate('%H:%i - %d/%m/%Y', $kh['time_use'])?>"><?=$this->m_func->time_remaining($kh['time_use'])?></a>
                       	 	</td>
							<td>
								<small>Comments : <?=$kh['so_luong_dung']?>/<?=$kh['so_luong_co']?></small><br>
								<small>Posts : <?=$kh['so_post_dung']?>/<?=$kh['so_post_co']?></small>
							</td>
							<td><button class="btn btn-xs btn-info"><?=$this->m_comment->get_name_package($kh['package_id'])?></button></td>
                        <td>
                            
                            <textarea class="form-control" disabled=""><?=$kh['ghi_chu']?></textarea>

                        </td>

						 <td><?php

	                        switch ($kh['active']) {
	                            case 1:
	                               echo '<button class="btn btn-xs btn-success">Hoạt động</button>';
	                                break;
	                            case 2:
	                               echo '<button class="btn btn-xs btn-info">Chờ gia hạn</button>';
	                                break;
	                            default:
	                                echo '<button class="btn btn-xs btn-danger">Đang tắt</button>';
	                                break;
	                        }
	                        ?></td>
							<td>
								 <a class="btn btn-xs btn-warning" href="?comment=<?=$kh['id']?>"><i class="fa fa-comment" aria-hidden="true"></i> Comment</a>
								 <a class="btn btn-xs btn-info" href="?chinh_sua=<?=$kh['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
								  <button class="btn btn-xs btn-danger" onclick="delete_kh(<?=$kh['id']?>)"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
							</td>
							
						</tr>
					<?php endforeach ?>

				</tbody>
			</table>
		</div>


	</div>
</div>