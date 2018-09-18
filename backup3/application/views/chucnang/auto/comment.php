<style type="text/css">
    
    .click_paging:hover{
        cursor: pointer;
    }
</style>

<div class="panel panel-primary">
   <div class="panel-heading">
      <center><strong>HỆ THỐNG TĂNG BÌNH LUẬN, COMMENT <br> (MIỄN PHÍ)</strong></center>
   </div>
   <div class="panel-body">
   <div class="row">
    <div class="col-sm-4 ">
    <div class="alert alert-success">
      <ul class="media-list">
         <li class="media">
            <div class="media-left">
               <a href="//fb.com/<?=$info_member['id_fb']?>" target="_blank">
               <img src="https://graph.facebook.com/<?=$info_member['id_fb']?>/picture" class="media-object img-circle" style="width:50px;">
               </a>
            </div>
            <div class="media-body">
               <a href="//fb.com/<?=$info_member['id_fb']?>" target="_blank"> <h4 class="media-heading"><?=$info_member['name']?></h4></a>
               <?=$info_member['email']?>           </div>
         </li>
      </ul>
       </div>

       </div>
<div class="col-sm-8 ">
<div class="alert alert-warning">
<ul class="media-list">
         <li class="media">


           <center> <h4><b> 

                    <?php
                    $check_time =  $this->m_auto->check_kha_dung('auto_comment');
                    if($check_time['status'] == FALSE){
                       ?>
                     
                        <font color="red">Vui lòng đợi <b id="ct"></b> nữa để tiếp tục tăng bình luận. </font>
                       <?php
                    }else{
                        ?>
                   <font color="Green2">Đã Sẵn Sàng Tăng Bình Luận !</font>
                        <?php
                    }

                ?>  


          </b></h4>
            <font color="blue">Hãy nhắn tin :<font color="red"> 0971.010.421</font> hoặc facebook: <a class="btn btn-danger btn-xs" href="http://fb.com/jickme" target="_blank">Trí Nguyễn </a> nếu gặp lỗi ! </font>            </center>
         </li>
      </ul>







      </div>

</div>

</div>      

       <form id="auto-cmt">
       <div class="table">
        <table class="table table-bordered">
      <thead>
         <tr class="danger">
            <th width="30%"><center>THÔNG TIN</center></th>
            <th width="70%"><center>HÀNH ĐỘNG </center></th>
         </tr>
         </thead>
         <tbody>
         <tr>
         </tr><tr>
            <td class="active">Người Tăng :</td>
            <td> <center><font color="green"><?=$info_member['name']?></font> <br> <font color="red"><?=$info_member['id_fb']?></font></center></td>
         </tr>
         <tr>
            <td class="active">Nhập ID or LINK:</td>
            <td class="warning"> <input name="id" id="form_input" type="text" class="form-control" placeholder="Nhập ID bằng cách chọn bên dưới, hoặc lấy ID bằng thanh công cụ Lấy ID bài viết trên menu"></td>
         </tr>
         <tr>
            <td class="active">Nhập nội dung:</td>
            <td class="info"> <textarea name="noidung" id="noidung" cols="10" rows="5" class="form-control" placeholder="Nhập nội dung bạn muốn tăng bình luận vào đây nhé. (Nhập mỗi nội dung một hàng nếu muốn tăng nhiều bình luận khác nhau)" required="" onkeyup="tinh_noi_dung()"></textarea>
            <center> Đã nhập : <font color="red" size="4px"><b class="text-center" id="sonoidung"> 0 </b></font> Bình Luận</center></td>

            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
         </tr>
         <tr>
            <td class="active">Chọn số lượng:</td>
            <td><input class="form-control" value="10" max="10" step="1" min="0" type="range" name="limit" id="limit" onchange="$('#limit_show').html(' Đã chọn :<b> <font color=red size=4px>' + document.getElementById('limit').value  + ' </font></b>Bình Luận')">
         <div class="text-center" id="limit_show">Đã chọn : <font color="red" size="4px"><b>10</b></font> Bình Luận</div></td>
         </tr>
         <tr>
            <td class="active">Nhập mã bảo vệ:</td>
            <td class="success"> <center><?=$captcha['image']?><br>
            <input type="text" name="captcha" class="form-control" style="max-width: 220px" placeholder="Nhập mã bảo vệ hiện ở hình ảnh trên vào đây"></center>
      <center></center></td>
         </tr>
         <tr>
            <td class="active">Hành động:</td>
            <td> <center>
            <button type="submit" class="btn btn-danger" id="submit">
               <span class="glyphicon glyphicon-transfer"></span>  <b>BẮT ĐẦU TĂNG CMT</b> 
               </button><br><br>
            </center>
         <center>
            <span id="result" style="display:none;">
               <h4><i class="fa fa-spinner fa-pulse"></i><br> <font color="red">Đang Tăng Bình Luận, Vui Lòng Chờ...</font></h4>
            </span>
            <span id="result2">
            </span>
         </center></td>
         </tr>
         </tbody>
         </table>
         
         </div>
      </form>







   </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <strong><i class="fa fa-bookmark" aria-hidden="true"></i> CÁC BÀI VIẾT GẦN ĐÂY</strong>
    </div>
    <div class="panel-body">
        <div class="alert alert-warning">
            <center>
                <form action="" method="get">
                    <label for="type">CHỌN LOẠI BÀI VIẾT CẦN TĂNG COMMENT: </label>
                    <div class="input-group" style="max-width:250px;">
                        <select name="type" class="form-control" required="" id="my_select">
                            <option value="feed">Bài Viết Gần Đây</option>
                            
                        </select>
                        
                    </div>
                </form>
            </center>
        </div>

        <hr>
        <div id="show-waiting"></div>

        <div id="status">

        </div>
                   <ul class="pager">
              
            </ul>

        
    </div>
</div>