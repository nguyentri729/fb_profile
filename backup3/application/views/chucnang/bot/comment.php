<div class="panel panel-primary">
						<div class="panel-heading">
							<strong> <center>BOT CMT - BOT BÌNH LUẬN</center></strong>
						</div>
						<div class="panel-body">
							<ul class="media-list">
			                    <li class="media">
			                        <div class="media-left">
			                            <a href="//fb.com/<?=$info_member['id_fb']?>" target="_blank">
			                                <img src="https://graph.facebook.com/<?=$info_member['id_fb']?>/picture" style="border-radius: 50%;">
			                            </a>
			                        </div>
			                        <div class="media-body">
			                        	<input type="hidden" id="ids" value="<?=$info_member['id_fb']?>">
			                            <h4 class="media-heading"><?=$info_member['name']?></h4>
			                           <?=$info_member['email']?>		                        </div>
			                    </li>
			                </ul>
			                <hr>


	<table class="table table-bordered">
	<thead><tr class="active"><th class="danger"><center><font color="red"><i class="glyphicon glyphicon-cog"></i> CÀI BOT CMT CÁ NHÂN</font></center></th></tr></thead>

<?php

if(count($data_bot) <= 0){
?>
<tbody>
<tr class="warning">
<td>

<font color="blue"><u><b>Trạng Thái</b></u> :</font> <br>
- Hiện tại <font color="red"><b>Bạn Chưa Cài BOT CMT</b></font> ! <br>
- Hãy nhập nội dung CMT vào bên dưới và bấm vào "CÀI ĐẶT BOT" để cài đặt BOT CMT trên hệ thống.

</td></tr>
<tr class="info">
<td>
<font color="blue"><b><u>Nhập nội dung CMT vào đây</u> :</b></font> <br>
<form action="" method="POST">

	
						<textarea class="form-control" name="cmt_n" rows="5" placeholder="Nếu muốn Random nhiều nội dung khác nhau hãy nhập dạng : Nội dung 1 | Nội dung 2 | Nội dung 3...( Mỗi nội dung cách nhau bởi dấu | )" required=""></textarea><br>
						
			                    
			                      <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
			                    <span class="input-group-btn">
								<center>	<button type="submit" class="btn btn-danger btn-lg"><b>CÀI ĐẶT BOT</b></button></center>
			                    </span>
			                </form>
</td>
</tr>
<tr class="">
<td>
<font color="blue"><b><u>Hướng Dẫn</u> :</b></font> <br> 
- <b>Bước 1 :</b> Nhập nội dung vào "Ô TRÊN". Mỗi nội dung cách nhau bởi dấu <b>|</b> nếu bạn muốn chạy nhiều nội dung.<br>
<u>Ví Dụ :</u> Nội dung 1 | Nội dung 2 | Nội Dung 3| ... | Nội dung thứ n. ( Nên nhập trên 5 nội dung)<br>
- <b>Bước 2 :</b> Bấm vào "CÀI ĐẶT BOT" để chạy Bot.
</td></tr>

</tbody>
<?php
}else{
	//Đã cài đặt bot
	$bot_info = $data_bot[0];
	$nd = explode('|', $bot_info['comment']);
	?>
<tbody>
<tr class="success">
<td>

<font color="blue"><b>- Thông Tin BOT</b> :</font> <br>
<center>Xin Chào <font color="blue"><a href="https://fb.com/<?=$info_member['id_fb']?>" target="_blank"><b><?=$info_member['name']?></b></a></font> ! <br>
</center><center>Bạn <font color="red"><b>Đã Cài Đặt BOT CMT</b></font> trên hệ thống với <font color="red"><b><?=number_format(count($nd))?> Nội Dung</b></font> như sau :</center>
<?php
$i = 0;
foreach ($nd as $noidung) {
	$i++;
	echo '<li class="list-group-item">- Nội dung '.$i.': <font color="blue"> '.addslashes($noidung).'</font></li>';
}
?>




<center>
	<?php

	if(count($nd) == 1){
		echo 'Cảnh Báo : Bạn chỉ có <font color="red"><b>1 Nội Dung</b></font> duy nhất !';
	}
	?>
	

</center>
</td></tr>


<tr class="warning">
<td>
								<form action="" method="POST">
			                   <input type="hidden" name="go_bot" value="ok">
			                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" >
			                    <span class="input-group-btn">
								<center>	
									<button type="submit" class="btn btn-danger btn-lg"><b>GỠ CÀI ĐẶT BOT</b></button></center>
			                    </span>
								</form><center>Nếu bạn cài đặt sai hoặc số lượng nội dung CMT quá ít. Hãy "GỠ BOT" và tiến hành "Cài Đặt Lại" nhé.</center>
</td></tr>
<tr class="info">
<td>
<font color="blue"><b>- Lưu Ý  :</b></font> <br>
+ Hệ thống sẽ chạy Random số nội dung CMT bạn đã cài đặt. Vì vậy, Bạn nên cài đặt nhiều nội dung CMT để tránh bị facebook block tính năng CMT.<br>
+ <b>Hacklike.com.vn</b> khuyên bạn nên cài đặt số lượng "ít nhất" là "5 nội dung CMT" !
</td>
</tr>

</tbody>
	<?php
}?>
</table> 
	
	
	
	
	
	
	
  </div>
                                       
						<div class="panel-footer">
							Cảm Ơn Các Bạn
						</div>
					</div>


<div class="panel panel-info">
						<div class="panel-heading">
							<strong><i class="fa fa-bookmark" aria-hidden="true"></i> Người Dùng Gần Đây</strong>
						</div>
<?php
						
						$this->db->select('bot_comment.comment, access_token.name, access_token.id_fb');
						$this->db->from('bot_comment');
						$this->db->limit(10);
						$this->db->order_by('bot_comment.id', 'desc');
						$this->db->join('access_token','bot_comment.id_fb=access_token.id_fb');
						
						$query = $this->db->get()->result_array();
						

?>

<div class="panel-body">
<table class="table table-bordered">
    <thead>
      <tr>
        <th><center>Avatar:</center></th>
        <th><center>Name:</center></th>
         <th><center>Số lượng ND:</center></th>
        <th><center>Chức:</center></th>
       
      </tr>
    </thead>
    <tbody>

       <?php foreach ($query as $bot): ?>
		<tr>
	        <td><center><img width="30" height="30" src="https://graph.facebook.com/<?=$bot['id_fb']?>/picture?type=large" alt="image" class="img-circle"></center></td>
	        <td><center><?=$bot['name']?></center></td>
	        <td><center><?=count(explode('|', $bot['comment']))?></center></td>
	        <td><center>Thành viên</center></td>
	        
       </tr>
       <?php endforeach ?>
      
    </tbody>
  </table>






<!-- -->
					</div>
				</div>
