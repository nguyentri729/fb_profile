<style type="text/css">
    
    .click_paging:hover{
        cursor: pointer;
    }
</style>
<div class="panel panel-primary">
    <div class="panel-heading">
        <center><strong>HACK LIKE - AUTO LIKE</strong>
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
        <center><font color="blue">- Bước 1:</font> Bấm <a class="btn btn-danger btn-xs" style="background-color: red;">TĂNG LIKE BÀI VIẾT NÀY</a> ở dưới mục <b>"Các trạng thái gần đây"</b> hoặc <b>"Nhập một ID"</b> bất ỳ cần tăng like vào ô " Nhập ID " bên dưới.
            <br>
            <font color="blue">- Bước 2 :</font> Chọn <b>"số lượng Like cần tăng"</b> bằng cách di chuyển thanh kéo.
            <br>
            <font color="blue">- Bước 3 :</font> Bấm <b>"BẮT ĐẦU TĂNG LIKE"</b> để thực hiện auto tăng like.
        </center>
        <hr>
        <form id="auto-like">
            <b>- Nhập ID cần Tăng Like : </b>
            <input name="id" id="form_input" type="text" class="form-control" placeholder="Nhập ID Status, Ảnh , Video Cần Tăng Like" required="">
            <br>
            <b>- Chọn số Like cần tăng :</b>
            <input class="" value="150" max="150" step="2" min="0" type="range" name="limit" id="limit" onchange="$('#limit_show').html(document.getElementById('limit').value)">
            <div class="text-center" id="limit_show">150</div>
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
                    $check_time =  $this->m_auto->check_kha_dung('auto_like');
                    if($check_time['status'] == FALSE){
                       ?>
                       <h3 class="text-warning">Vui lòng đợi <b id="ct"></b> nữa để tiếp tục tăng like. </h3>
                       <?php
                    }else{
                        ?>
                    <button type="submit" class="btn btn-danger" style="background-color: red;" id="submit">
                        <span class="glyphicon glyphicon-transfer"></span> <b>BẮT ĐẦU TĂNG LIKE</b>
                    </button>
                        <?php
                    }

                ?>                

            </center>
            <center>
                <span id="result" style="display:none;">
                     <h4><i class="fa fa-spinner fa-pulse fa-4x"></i><br><br> <font color="red">Đang tăng like, vui lòng chờ...</font></h4>
         </span>
                <span id="result2">
         </span>
            </center>
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
                    <label for="type">CHỌN LOẠI BÀI VIẾT CẦN TĂNG LIKE: </label>
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