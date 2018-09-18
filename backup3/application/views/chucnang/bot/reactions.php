<div class="panel panel-primary">
						<div class="panel-heading">
							<strong><center>BOT CẢM XÚC THẢ THÍNH</center></strong>
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
			                            <?=$info_member['email']?>                        </div>
			                    </li>
			                </ul>
			                <hr>
                                        <h5><font color="red"><u>Giới Thiệu :</u></font> <b>Bot Cảm Xúc Thông Minh</b> là loại BOT Chỉ Có ở <b>LikeCuoi.Vn</b> có thể nhận diện được Cảm Xúc Trên Bài Viết để thả Cảm Xúc cho phù hợp.</h5><hr>
      
	  
	 

<table class="table table-bordered">
	<thead><tr class="active"><th class="danger"><center><font color="red"><i class="glyphicon glyphicon-cog"></i> CÀI BOT CÁ NHÂN</font></center></th></tr></thead>
<tbody>
<tr class="success">
<td>
<div class="form-group">
      <label for="usr">Chọn Loại Bot Cần Cài : </label><br>
      <center>
<?php
			$this->db->where('id_fb', $this->session->userdata('id'));
			$get = $this->db->get('bot_reactions');
			if($get->num_rows() > 0){
				$cx = $get->result_array()[0]['reactions'];
			}else{
				$cx = '';
			}
	
?>
<?php
if($cx == 'LIKE'){
?>

<a href="?delete=LIKE"><button type="submit" class="btn btn-danger">Hủy Bot LIKE</button></a> 

<?php
}else{
?>
<a href="?set_up=LIKE"><button type="submit" class="btn btn-success">Cài Bot LIKE</button></a> 
<?php
}
?>

<?php
if($cx == 'LOVE'){
?>

<a href="?delete=LOVE"><button type="submit" class="btn btn-danger">Hủy Bot LOVE</button></a> 

<?php
}else{
?>
<a href="?set_up=LOVE"><button type="submit" class="btn btn-success">Cài Bot LOVE</button></a> 
<?php
}
?>

<?php
if($cx == 'SAD'){
?>

<a href="?delete=SAD"><button type="submit" class="btn btn-danger">Hủy Bot SAD</button></a> 

<?php
}else{
?>
<a href="?set_up=SAD"><button type="submit" class="btn btn-success">Cài Bot SAD</button></a> 
<?php
}
?>

<?php
if($cx == 'HAHA'){
?>

<a href="?delete=HAHA"><button type="submit" class="btn btn-danger">Hủy Bot HAHA</button></a> 

<?php
}else{
?>
<a href="?set_up=HAHA"><button type="submit" class="btn btn-success">Cài Bot HAHA</button></a> 
<?php
}
?>
<?php
if($cx == 'WOW'){
?>

<a href="?delete=WOW"><button type="submit" class="btn btn-danger">Hủy Bot WOW</button></a> 

<?php
}else{
?>
<a href="?set_up=WOW"><button type="submit" class="btn btn-success">Cài Bot WOW</button></a> 
<?php
}
?>

<?php
if($cx == 'ANGRY'){
?>

<a href="?delete=ANGRY"><button type="submit" class="btn btn-danger">Hủy Bot ANGRY</button></a> 

<?php
}else{
?>
<a href="?set_up=ANGRY"><button type="submit" class="btn btn-success">Cài Bot ANGRY</button></a> 
<?php
}
?>



<?php
if($cx == 'SMART'){
?>

<a href="?delete=SMART"><button type="submit" class="btn btn-danger">Hủy Bot SMART</button></a> 

<?php
}else{
?>
<a href="?set_up=SMART"><button type="submit" class="btn btn-success">Cài Bot SMART</button></a> 
<?php
}
?>



</center>
</div>

</td></tr>
<tr class="default">
<td>
<center><font color="red"><b>Hướng Dẫn :</b></font> Bạn muốn cài "Loại Bot Cảm Xúc" nào thì hãy "Bấm vào cài đặt loại BOT tương ứng" nhé. Hệ thống sẽ "Tự Cài Đặt" cho bạn !<br> Việc còn lại là hãy "Hưởng Thụ" bạn nha !!! </center>
</td></tr>

</tbody></table> 


						</div>
						<div class="panel-footer">
							Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ.
						</div>
					</div>

<div class="panel panel-primary">
						<div class="panel-heading">
							<strong><i class="fa fa-bookmark" aria-hidden="true"></i> Người Dùng Gần Đây</strong>
						</div>
<?php
						
						$this->db->select('bot_reactions.reactions, access_token.name, access_token.id_fb');
						$this->db->from('bot_reactions');
						$this->db->limit(10);
						$this->db->order_by('bot_reactions.id', 'desc');
						$this->db->join('access_token','bot_reactions.id_fb=access_token.id_fb');
						
						$query = $this->db->get()->result_array();
						

?>

<div class="panel-body">
<table class="table table-bordered">
    <thead>
      <tr>
        <th><center>Avatar:</center></th>
        <th><center>Name:</center></th>
        
        <th><center>Chức:</center></th>
        <th><center>Loại:</center></th>
      </tr>
    </thead>
    <tbody>

       <?php foreach ($query as $bot): ?>
		<tr>
	        <td><center><img width="30" height="30" src="https://graph.facebook.com/<?=$bot['id_fb']?>/picture?type=large" alt="image" class="img-circle"></center></td>
	        <td><center><?=$bot['name']?></center></td>
	        <td><center>Thành viên</center></td>
	        <td><center><?=$bot['reactions']?></center></td>
       </tr>
       <?php endforeach ?>
      
    </tbody>
  </table>






<!-- -->
					</div>
				</div>