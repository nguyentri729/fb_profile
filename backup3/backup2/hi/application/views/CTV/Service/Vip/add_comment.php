<style type="text/css">
    .sticker_img:hover{
        cursor: pointer;
    }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Thêm bình luận</h3>
        </div>
        <div class="panel-body">
          
            <center>
                

               


                <!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a> -->
                <a href="/CTV/Services/Vip/Comment/QuanLyKhachHang" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
 Quay Lại</a>
                <a class="btn btn-primary" data-toggle="modal" href='#them_bl'><i class="fa fa-plus" aria-hidden="true"></i> Thêm bình luận</a>
                <div class="modal fade" id="them_bl">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Thêm bình luận của bạn</h4>
                            </div>
                            <div class="modal-body">
                           
                            <form id="add_bl">
                                        <div class="form-group">
                                            <label>* Nội dung bình luận</label>
                                          <textarea class="form-control" rows="3" name="message" id="noi_dung" placeholder="Nhập bình luận của bạn. Nội dung cách nhau bằng dấu |"></textarea><br>
                                          <small class="text-muted">
                                              <code>[random_icon]</code> : Icon ngẫu nhiên<br>
                                              <code>[tag]</code> : Tag người đăng status<br>
                                              <code>tag=4=tag</code> : Thay 4 bằng id cần tag<br>
                                              <code>|</code> : Nội dung ngẫu nhiên<br>
                                          </small>
                                      </div><hr>

                             <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" id="csrf_token"/>
                            <div id="div_anh">
                                <div class="form-group">
                                    <div class="input-group input-file" name="Fichier1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button" id="upload_img">Ảnh </button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="" name="image" id="anh"  />
                                    </div>

                                </div>       
                                                                
                                <div id="ds_img" class="row">
                                    
                                </div><br>
                            </div>
                             <div id="div_nhan">
                                <div class="form-group">

                                    <div class="input-group input-file" name="Fichier1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button" data-toggle="modal" href='#sticker_list' id="chose_sticker">Nhãn dán </button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="" id="nhan" name="sticker"  />
                                    </div>
                                </div>   
                                <div id="show_nhan" class="text-center">
                                    
                                </div>
                                </div><br>
                                 <a class="btn btn-info btn-xs" onclick="reset_form()">Reset form</a><br>
                            </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary" onclick="save_comment()">Lưu bình luận</button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

            </center>
           

        <?php foreach ($data_bl as $bl): ?>

            <div class="list-group" id="bl_<?=$bl['id']?>">
                <a href="#" class="list-group-item">
                    <h5 class="list-group-item-heading"><?=$bl['message']?></h5>
                    <div class="list-group-item-text">
                        <small>
                        <?php
                            if($bl['image_url'] !=''){
                                echo 'Ảnh: <code>'.$bl['image_url'].'</code>';
                            }
                        ?>
                        <?php
                            if($bl['sticker_id'] !=''){
                                echo 'Sticker: <code>'.$bl['sticker_id'].'</code>';
                            }
                        ?>
                        </small>
                        <small style="float: right;">
                            <button class="btn btn-xs btn-danger" onclick="delete_comment(<?=$bl['id']?>)">Xóa</button>
                        </small>
                        <div class="clearfix"></div>
                    </div>



                </a>
            </div>

           <?php endforeach ?>



        </div>
    </div>
</div>

<div style="display: none;">
    <form id="form_img">

         <input type="file" id="chose_file" name="image">
    </form>
   
</div>


<div class="modal fade" id="sticker_list">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Danh sách sticker</h4>
                            </div>
                            <div class="modal-body row" id="ds_sticker">
                                    
                                <div style="overflow-y: scroll; max-width: 100%; height:70px;" id="sticker_head"> 

                                   <center><button type="button" class="btn btn-info" onclick="download_sticker()"><i class="fa fa-cloud-download" aria-hidden="true"></i> Tải dữ liệu sticker</button></center> 

                                </div><hr>
                                <div id="sticker_data">
                                    
                                </div>



                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                
                            </div>
                        </div>
                    </div>
                </div>