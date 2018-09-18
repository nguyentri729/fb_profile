<style type="text/css">
    
    .click_paging:hover{
        cursor: pointer;
    }
</style>
<div class="panel panel-primary">
    <div class="panel-heading">
        <center><strong>Tăng Theo dõi</strong>
        </center>
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
                    <h4 class="media-heading"><?=$info_member['name']?></h4> <?=$info_member['email']?></div>
            </li>
        </ul>
        <hr>
        <h5 class="text"><center><b>AUTO SUB, AUTO KẾT BẠN FACEBOOK</b></center></h5>
        <hr>
        <form id="auto-like">
            <b>- ID người cần tăng : </b>
            <input name="id" id="form_input" type="text" class="form-control" placeholder="ID người cần tăng" required="" value="<?=$info_member['id_fb']?>">
            <br>
            <b>- Chọn số theo dõi cần tăng :</b>
            <input class="" value="50" max="50" step="2" min="0" type="range" name="limit" id="limit" onchange="$('#limit_show').html(document.getElementById('limit').value)">
            <div class="text-center" id="limit_show">50</div>
            <br>
            <b>- Nhập Mã Bảo Mật :</b>
            <center><?=$captcha['image']?>
                <br><br>
                <input type="text" name="captcha" class="form-control" style="max-width: 180px" placeholder="Nhập mã captcha">
                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
            </center>
            <br>
            <center>

                <?php
                    $check_time =  $this->m_auto->check_kha_dung('auto_sub');
                    if($check_time['status'] == FALSE){
                       ?>
                       <h3 class="text-warning">Vui lòng đợi <b id="ct"></b> nữa để tiếp tục tăng. </h3>
                       <?php
                    }else{
                        ?>
                    <button type="submit" class="btn btn-danger" style="background-color: red;" id="submit">
                        <span class="glyphicon glyphicon-transfer"></span> <b>BẮT ĐẦU TĂNG THEO DÕI</b>
                    </button>
                        <?php
                    }

                ?>                

            </center>
            <center>
                <span id="result" style="display:none;">
            <h4><i class="fa fa-spinner fa-pulse"></i><br> <font color="red">Đang tăng theo dõi, vui lòng chờ...</font></h4>
         </span>
                <span id="result2">
         </span>
            </center>
        </form>
            <br><br><br>
            <b>- Lưu ý :</b> Nếu bạn chấp nhận "lời mời kết bạn" thì lời mời sẽ là <b>BẠN BÈ (Friend)</b>, Còn nếu bạn "không chấp nhận lời mời kết bạn thì sẽ là <b>THEO DÕI (SUB)</b> nhé.        
    </div>
    <div class="panel-footer">
            Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ.
        </div>
</div>
