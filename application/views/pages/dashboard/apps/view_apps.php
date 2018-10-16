<div class="col-lg-6 col-md-12 col-sm-12">
   <div class="card card-stats">
      <div class="card-header">
         <div class="icon icon-warning">
            <i class="material-icons">calendar_today</i>
         </div>
      </div>
      <div class="card-content">
         <h5 class="card-title">Lập lịch đăng bài</h5>
         <small class="category">Tự động đăng bài theo yêu cầu</small>
      </div>
      <div class="card-footer">
         <center>
            <div class="stats">
                <?php
                    if($this->m_func->isset_table('auto_post', 'id_fb', $this->session->userdata('id_fb'))){
                        ?>
                            <button class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target=".auto_post_modal">Sử dụng</button>

                        <div class="modal fade auto_post_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title">Tùy chọn</h4>
                                    </div>
                                    <div class="modal-body text-center">
                                       
                                            <a type="button" href="/Dashboards/Apps/AutoPost/CreatPost" class="btn btn-success btn-sm btn-block"><i class="fa fa-plus" aria-hidden="true"></i> Tạo bài đăng</a>

                                            <a type="button" href="/Dashboards/Apps/AutoPost/ViewPost" class="btn btn-info btn-sm btn-block"><i class="fa fa-calendar" aria-hidden="true"></i> Quản lý bài đăng</a>
                                            
                                       
                                       
                                    </div>
                                    <div class="modal-footer">
                                      
                                        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Đóng
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php
                    }else{
                        ?>
                             <button class="btn btn-block btn-danger btn-sm" onclick="unlock('auto_post')"><i class="fa fa-unlock" aria-hidden="true"></i> Mở khóa</button>
                        <?php
                    }

                ?>
               
            </div>
         </center>
      </div>
   </div>
</div>


