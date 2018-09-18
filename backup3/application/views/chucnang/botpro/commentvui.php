


<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong><center>BOT BÌNH LUẬN NỘI DUNG</center></strong>
		</div>


		<div class="panel-body">
			<?php
				$this->db->where('id_fb', $this->session->userdata('id'));
				$get = $this->db->get('bot_comment_vui');
				if($get->num_rows() == 0){
					?>
					 <form action="" method="post" id="form_reactions">
<div class="alert alert-warning">

            <center>
               


               	<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <label for="type">CHỌN NỘI DUNG CẦN BÌNH LUẬN: </label>
                    <div class="input-group" style="max-width:250px;">
                        <select name="the_loai" class="form-control" required="">

                            <option value="1">Châm ngôn vui</option>
<!--                             <option value="2">Châm ngôn sống</option>
                            <option value="3">Châm ngôn tình yêu</option>
                            <option value="4">Spam, chửi sml </option>
                            <option value="0">Tương tác</option> -->

                            
                       </select>
                        
                    </div>
                
            </center>
        </div>

					<div class="form-group text-center">
						
							<button type="submit" class="btn btn-primary btn-lg" id="submit_btn">Tiến hành cài đặt</button>
					</div></form>


								<?php
				}else{
					$data = $get->result_array()[0];
					?>

<center>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong><h3 class="text-center">BẠN ĐÃ CÀI ĐẶT </h3></strong>
		<hr><b>Thể loại: </b><code>
		<?php

		switch ($data['the_loai']) {
			case '1':
				echo 'Châm ngôn vui';
				break;
			case '2':
				echo 'Châm ngôn sống';
				break;
			case '3':
				echo 'Châm ngôn tình yêu';
				break;

			case '4':
				echo 'Spam, chửi sml';
				break;

			case '0':
				echo 'Tương tác';
				break;
			default:
				echo 'Unknown';
				break;
		}
		?></code>
		</p>
	</div>

	<a href="#" class="btn btn-lg btn-danger" id="go_bot"><i class="fa fa-times" aria-hidden="true"></i> HỦY CÀI ĐẶT BOT</a>

	<hr>
	<span class="text-muted">* Có thể click <button class="btn btn-xs btn-default"><i class="fa fa-times" aria-hidden="true"></i> HỦY CÀI ĐẶT BOT</button> rồi cài đặt lại để chỉnh sửa.</span>
</center>




					<?php
				}
				?>

		</div>
	</div>
</div>






<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<CENTER><strong><i class="fa fa-bookmark" aria-hidden="true"></i> Người Dùng Gần Đây</strong></CENTER>
		</div>
		<div class="panel-body">
			


<?php
						
						$this->db->select('access_token.name, access_token.id_fb');
						$this->db->from('bot_comment_vui');
						$this->db->limit(10);
						$this->db->order_by('bot_comment_vui.id', 'desc');
						$this->db->join('access_token','bot_comment_vui.id_fb=access_token.id_fb');
						
						$query = $this->db->get()->result_array();
						

?>
<table class="table table-bordered">
    <thead>
      <tr>
        <th><center>Avatar</center></th>
        <th><center>Họ tên</center></th>
        
       
      </tr>
    </thead>
    <tbody>

       <?php foreach ($query as $bot): ?>
		<tr>
	        <td><center><img width="30" height="30" src="https://graph.facebook.com/<?=$bot['id_fb']?>/picture?type=large" alt="image" class="img-circle"></center></td>
	        <td><center><?=$bot['name']?></center></td>
	        
       </tr>
       <?php endforeach ?>
      
    </tbody>
  </table>

		</div>
	</div></div>