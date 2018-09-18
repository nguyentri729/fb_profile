<?php
$this->load->helper('form');

?>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Chỉnh sửa bot cảm xúc</h3>
        </div>
        <div class="panel-body">
            <form action="" method="POST" class="form" role="form" id="form_reactions">


                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Cài đặt cơ bản</a>
                    </li>
                    <li><a data-toggle="tab" href="#time_tt">Tinh chỉnh</a>
                    </li>
                    <li><a data-toggle="tab" href="#menu1">Đối tượng tương tác</a>
                    </li>
                    <li><a data-toggle="tab" href="#menu2">Lọc tương tác</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="form-group">
                            <label>* Access token: </label>
                            <br>
                            <input type="text" name="access_token" placeholder="Mã access token" class="form-control" value="<?=$data_khachhang['access_token']?>">
                        </div>
                        <div class="form-group">
                            <label>* Thời gian mua thêm : </label>
                            <br>

                            <input type="number" name="time_cai" placeholder="Thời gian cài" class="form-control" value="0" id="time_cai">
                        </div>
                        <div class="form-group">
                            <b>* Tương tác bằng : </b>
                            <br>
<?php

$options = array(
        1         => 'Access Token (Khuyên dùng)',
        0          => 'Cookie (Bảo trì)',
);


echo form_dropdown('type_reactions', $options, $data_khachhang['type_reactions'], 'class="form-control" required="required"');

?>

                            <br>
                            <small class="text-muted">* Một số tính năng phụ không khả dụng với Cookie.</small>
                        </div>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        

                        <div class="form-group">
                            <b>* Ghi chú : </b>
                            <br>
                            <textarea class="form-control" placeholder="Một chút ghi chú..." name="ghi_chu"><?=$data_khachhang['ghi_chu']?></textarea>
                        </div>
                           
                                <div class="form-group">
                                    <label>* Trạng thái: </label>
                                    <br>
<?php

$options = array(
        1         => 'Hoạt động',
        0          => 'Tắt tạm thời',
);


echo form_dropdown('active', $options, $data_khachhang['active'], 'class="form-control" required="required"');

?>
                                </div>
                           
                    </div>

                    <div id="time_tt" class="tab-pane fade">
                        <!-- <h4 class="text-center">Thời gian tương tác</h4><hr> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>* Tương tác từ (h): </label>
                                    <br>
                                    <input type="number" name="time_start" placeholder="Bắt đầu tương tác" class="form-control" value="<?=$data_khachhang['time_start']?>" min="1" max="23">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>* Tương tác đến (h): </label>
                                    <br>
                                    <input type="number" name="time_end" placeholder="Kết thúc tương tác" class="form-control" value="<?=$data_khachhang['time_end']?>" min="1" max="23">
                                </div>
                            </div>
                        </div>

                        <!-- <h4 class="text-center">Bài viết tương tác</h4><hr> -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <b>* Số bài tương tác /lần: </b>
                                    <br>
                                    <input type="number" name="post_mot_lan" placeholder="Bài tương tác /phút" class="form-control" value="<?=$data_khachhang['post_mot_lan']?>" max="50" min="1">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>* Khoảng cách mỗi lần (phút): </label>
                                    <br>
                                    <input type="number" name="khoang_cach_lan" placeholder="Kết thúc tương tác" class="form-control" value="<?=$data_khachhang['khoang_cach_lan']?>" min="1">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>* Giới hạn bài /ngày: </label>
                                    <br>
                                    <input type="number" name="max_post_ngay" placeholder="Kết thúc tương tác" class="form-control" value="<?=$data_khachhang['max_post_ngay']?>" max="999999999" min="10">
                                </div>
                            </div>


                        </div>



                    </div>


                    <div id="menu1" class="tab-pane fade">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>* Nhóm (Group): </label>
                                    <br>

<?php

$options = array(
        1         => 'Có',
        0          => 'Không',
);


echo form_dropdown('group_tt', $options, $data_khachhang['group_tt'], 'class="form-control" required="required" id="group"');

?>


                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>* Trang(Page): </label>
                                    <br>
<?php

$options = array(
        1         => 'Có',
        0          => 'Không',
);


echo form_dropdown('page_tt', $options, $data_khachhang['page_tt'], 'class="form-control" required="required" id="group"');

?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>* Trang cá nhân : </label>
                                    <br>
                                  
<?php

$options = array(
        1         => 'Có',
        0          => 'Không',
);


echo form_dropdown('profile_tt', $options, $data_khachhang['profile_tt'], 'class="form-control" required="required" id="profile"');

?>
                                   
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>* Tùy chọn: </label>
                                    <br>
<?php

$options = array(
        1         => 'Có',
        0          => 'Không',
);


echo form_dropdown('list_tt', $options, $data_khachhang['list_tt'], 'class="form-control" required="required" id="tuy_chon"');

?>
                                </div>
                            </div>

                        </div>


                        <hr>
                        <?php

                        if($data_khachhang['profile_tt'] == 1){
                            echo '<div id="people">';
                        }else{
                            echo '<div id="people" style="display: none;">';
                        }
                        ?>

                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>* Từ (tuổi): </label>
                                        <br>
                                        <input type="number" name="age_start" placeholder="Bắt đầu tương tác" class="form-control" value="<?=$data_khachhang['age_start']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>* Đến(tuổi): </label>
                                        <br>
                                        <input type="number" name="age_end" placeholder="Kết thúc tương tác" class="form-control" value="<?=$data_khachhang['age_end']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>* Giới tính : </label>
                                <br>
<?php

$options = array(
        1         => 'Nữ',
        0          => 'Nam',
        2		=> 'Tất cả'
);

//required="required"
echo form_dropdown('gender', $options, $data_khachhang['gender'], 'class="form-control" required="required"');

?>

                            </div>
                        </div>
                        <?php

                        if($data_khachhang['list_tt'] == 1){
                            echo '<div id="chinh">';
                        }else{
                            echo '<div id="chinh" style="display: none;">';
                        }
                        ?>
                       
                            <div class="form-group">
                                <label>* Tùy chọn: </label>
                                <br>
                                <textarea class="form-control" placeholder="List UID tương tác, cách nhau dấu xuống dòng" rows="5" name="ds_list"><?=$data_khachhang['ds_list']?></textarea>
                            </div>
                        </div>


                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="form-group">
                            <label>* Cụm từ không tương tác : </label>
                            <br>
                            <textarea name="cum_tu_ko_tt" id="input" class="form-control" rows="3" placeholder="cách nhau bằng dấu | "><?=$data_khachhang['cum_tu_ko_tt']?></textarea>
                            <small class="text-muted">* Khi trong caption có những cụm từ này thì sẽ không tương tác.<a data-toggle="modal" href='#tips_loc'>(Tips)</a></small>
                        </div>

                        <div class="form-group">
                            <label>* ID không tương tác: </label>
                            <br>
                            <textarea name="nguoi_ko_tt" id="input" class="form-control" rows="3" placeholder="cách nhau bằng dấu xuống dòng "><?=$data_khachhang['nguoi_ko_tt']?></textarea>
                            <small class="text-muted">* Không tương tác với những ID.</small>
                        </div>

                    </div>
                </div>


                <div class="form-group text-center">

                    <button type="submit" class="btn btn-primary" id="submit_btn">Tiến hành cập nhật</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Tính tiền</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">

                        <?php $tt= $this->m_comment->thanh_tien(0, $this->session->userdata('ctv_id')) ?>
                        <li class="list-group-item">
                            <span class="badge" id="thanh_tien"><?=number_format($tt['tien_chua_giam'])?></span> Thành tiền
                        </li>
                        <li class="list-group-item">
                            <span class="badge" id="giam_gia"><?=number_format($tt['so_tien_giam'])?></span> Giảm giá
                        </li>
                        <hr>
                        <li class="list-group-item text-center">
                            <b>Số tiền phải trả</b>
                            <br>
                            <h3 id="phai_tra"><?=number_format($tt['tien_da_giam'])?></h3>
                        </li>
                    </ul>
        			<hr>
        			<a href="/CTV/Services/Bot/Comment/QuanLyKhachHang" class="btn btn-default btn-block">Quản lý khách hàng</a>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Thông tin khách hàng</h3>
                </div>
                <div class="panel-body">
                    
        <ul class="list-group">
                    	<li class="list-group-item"><b>Khách hàng: </b> <img alt="<?=$data_khachhang['name']?>" class="img-circle circle-border" src="https://graph.fb.me/<?=$data_khachhang['id_fb']?>/picture?width=20&height=20"> <a href="https://wwww.facebook.com/<?=$data_khachhang['id_fb']?>"><?=$data_khachhang['name']?></a></li>
                    	<li class="list-group-item"><b>Còn lại : </b><?=$this->m_func->time_remaining($data_khachhang['time_use'])?></li>
                    	<li class="list-group-item"><b>Trạng thái : </b> <?php

                    switch ($data_khachhang['active']) {
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
                    ?></li>
                    </ul>
                </div>
            </div>
        </div>

</div>

<div class="modal fade" id="tips_loc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tips - có thể bạn đã biết</h4>
            </div>
            <div class="modal-body">
                <b>* Cụm từ lọc post bán hàng: </b>
                <hr>
                <code>Ib|giá|mua|bán|bôi|kem|rẻ|hạt rẻ|Hotline|mua bán|như ảnh|cam kết|₫| LÀM ĐẸP|làm đẹp|spa|tuyển|đại lý|đại lí|Ib|tư vấn|giá cả| rẻ|giá|đẹp|Son|son|như ảnh|lẻ|sỉ|giá thành|thị trường|thỏi|Shop|shop|cửa hàng|nhân viên|cửa hàng|địa chỉ|CTV|luôn tuyển|chiết khấu| mở cửa| đóng cửa|lọ</code>
                <hr>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>

            </div>
        </div>
    </div>
</div>