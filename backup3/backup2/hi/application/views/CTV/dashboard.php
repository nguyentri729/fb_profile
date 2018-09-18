
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <div class="panel panel-default">

                        <div class="panel-body text-center">
                            <i class="fa fa-usd fa-3x" aria-hidden="true"></i>

                            <h3><?=number_format($info_member['money'])?> </h3>
                            <span>Số dư tài khoản</span>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <div class="panel panel-warning">

                        <div class="panel-body text-center">
                            <i class="fa fa-credit-card fa-3x" aria-hidden="true"></i>
                            <h3><?=number_format($info_member['chi_tieu_thang'])?> </h3>
                            <span>Chi tiêu trong tháng</span>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <div class="panel panel-info">

                        <div class="panel-body text-center">
                            <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                            <h3><?=number_format($this->m_ctv->tong_khach($this->session->userdata('ctv_id')))?></h3>
                            <span>Số khách quản lý</span>
                        </div>
                    </div>

                </div>



            </div>
        </div>





        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Nhật ký hoạt động</h3>
                </div>
                <div class="panel-body" style=" overflow: scroll; height: 420px;">
                    <?php
                    $this->db->limit(10);
                    $this->db->order_by('id', 'asc');
                    $this->db->where('user_creat', $this->session->userdata('ctv_id'));
                    $activity = $this->db->get('activity')->result_array();
                    ?>
                    <ul class="list-group">
                        <?php foreach ($activity as $act): ?>
                                <li class="list-group-item"><?=$this->m_ctv->string_activity($act['action_type'], $act['where_action'],$act['id_action'], $act['money'], $act['time_creat'])?></li>

                        <?php endforeach ?>
                        
                        
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Thông báo</h3>
                </div>
                <div class="panel-body">

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#manager_noti">Quản lý</a>
                        </li>
                        <li><a data-toggle="tab" href="#system_noti">Hệ thống</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="manager_noti" class="tab-pane fade in active">
                            <ul class="list-group">
                               <?php foreach ($this->db->get('thong_bao')->result_array() as $noti): ?>
                                <li class="list-group-item">

                                    <i class="fa fa-quote-right" aria-hidden="true"></i> <?=$noti['message']?>
                                    <br>
                                    <small class="float-right" style="float: right;">
                                         <span data-toggle="tooltip" title="Quản trị viên" style="color: green;" data-placement="top"><i>Quản trị viên </i><i class="fa fa-check-circle" aria-hidden="true"></i> </span>
                                         <i><?=$this->m_func->timeAgo($noti['time_creat'])?></i>.

                                     </small>

                                    <div class='clearfix'></div>

                                </li> 
                               <?php endforeach ?>



                            </ul>
                        </div>
                        <div id="system_noti" class="tab-pane fade">
                            


                        </div>

                    </div>


                </div>
            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách dịch vụ sắp hết hạn</h3>
                </div>
                <div class="panel-body">

                    <ul class="nav nav-tabs">

                        <li class="active"><a data-toggle="tab" href="#vip_reactions">Vip Reactions
                                <?php

                                  
                                  $time = time(); 
                                  $me = $this->session->userdata('ctv_id');
                                  $vip_reactions =  $this->db->query("SELECT * FROM vip_reactions WHERE time_use - $time < 432000 AND user_creat = $me");
                                  $num = $vip_reactions->num_rows();
                                  if($num > 0){
                                    echo '<span class="label label-warning">'.$num.'</span>';
                                  }
                                   
                                ?></a>
                        </li>
                        <li><a data-toggle="tab" href="#vip_cmt">Vip Comment <?php

                                      $time = time(); 
                                      $me = $this->session->userdata('ctv_id');

                                     $vip_comment =  $this->db->query("SELECT * FROM vip_comment WHERE time_use - $time < 432000 AND user_creat = $me");
                                  $num = $vip_comment->num_rows();
                                  if($num > 0){
                                    echo '<span class="label label-warning">'.$num.'</span>';
                                  }
                        ?></a>
                        </li>
                        <li><a data-toggle="tab" href="#bot_reactions">Bot Reactions <?php

                                      $time = time(); 
                                      $me = $this->session->userdata('ctv_id');

                                                                      $bot_reactions =  $this->db->query("SELECT * FROM bot_reactions WHERE time_use - $time < 432000 AND user_creat = $me");
                                  $num = $bot_reactions->num_rows();
                                  if($num > 0){
                                    echo '<span class="label label-warning">'.$num.'</span>';
                                  }
                        ?></a>
                        </li>
                        <li><a data-toggle="tab" href="#bot_comment">Bot Comment <?php

                                      $time = time(); 
                                      $me = $this->session->userdata('ctv_id');

                                                                      $bot_comment =  $this->db->query("SELECT * FROM bot_comment WHERE time_use - $time < 432000 AND user_creat = $me");
                                  $num = $bot_comment->num_rows();
                                  if($num > 0){
                                    echo '<span class="label label-warning">'.$num.'</span>';
                                  }
                        ?></a>
                        </li>
                       

                    </ul>
                    <br>
                    <div class="tab-content">


                        <div id="vip_reactions" class="tab-pane fade in active">
                            <div class="row">

                                <?php foreach ($vip_reactions->result_array() as $vip): ?>
                                <div class="col-md-2">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="row text-center">


                                                <img src="https://graph.fb.me/<?=$vip['uid_vip']?>/picture?width=50&height=50" class="img-circle img-thumbnail img-responsive">
                                                <br>

                                                <p class="text-primary"><a href=""><?=$vip['name_vip']?> <br>(<?=$vip['uid_vip']?>)</a>
                                                </p>

                                                <p class="text-danger"><?=$this->m_func->time_remaining($vip['time_use'])?></p>
                                                <a href="/CTV/Services/Vip/Reactions/QuanLyKhachHang?chinh_sua=<?=$vip['id']?>" class="btn btn-xs btn-primary" target="_blank">Gia hạn</a>

                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <?php endforeach ?>
                            </div>

                        </div>


                            <div id="vip_cmt" class="tab-pane fade">
                                <div class="row">


                                    <?php foreach ($vip_comment->result_array() as $vip): ?>
                                    <div class="col-md-2">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="row text-center">


                                                    <img src="https://graph.fb.me/<?=$vip['uid_vip']?>/picture?width=50&height=50" class="img-circle img-thumbnail img-responsive">
                                                    <br>

                                                    <p class="text-primary"><a href=""><?=$vip['name_vip']?> <br>(<?=$vip['uid_vip']?>)</a>
                                                    </p>

                                                    <p class="text-danger"><?=$this->m_func->time_remaining($vip['time_use'])?></p>
                                                    <a href="/CTV/Services/Vip/Comment/QuanLyKhachHang?chinh_sua=<?=$vip['id']?>" class="btn btn-xs btn-primary" target="_blank">Gia hạn</a>

                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                    <?php endforeach ?>
                                </div>
                            </div>



                            <div id="bot_reactions" class="tab-pane fade">
<div class="row">

                                <?php

                                  
                                  $time = time(); 
                                  $me = $this->session->userdata('ctv_id');
                                 $bot_reactions =  $this->db->query("SELECT * FROM bot_reactions WHERE time_use - $time < 432000 AND user_creat = $me");

                                   
                                ?>
                                <?php foreach ($bot_reactions->result_array() as $vip): ?>
                                <div class="col-md-2">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="row text-center">


                                                <img src="https://graph.fb.me/<?=$vip['id_fb']?>/picture?width=50&height=50" class="img-circle img-thumbnail img-responsive">
                                                <br>

                                                <p class="text-primary"><a href=""><?=$vip['name']?> <br>(<?=$vip['id_fb']?>)</a>
                                                </p>

                                                <p class="text-danger"><?=$this->m_func->time_remaining($vip['time_use'])?></p>
                                                <a href="/CTV/Services/Bot/Reactions/QuanLyKhachHang?chinh_sua=<?=$vip['id']?>" class="btn btn-xs btn-primary" target="_blank">Gia hạn</a>

                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <?php endforeach ?>
                            </div>

                            </div>


                            <div id="bot_comment" class="tab-pane fade">
<div class="row">

                                <?php foreach ($bot_comment->result_array() as $vip): ?>
                                <div class="col-md-2">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="row text-center">


                                                <img src="https://graph.fb.me/<?=$vip['id_fb']?>/picture?width=50&height=50" class="img-circle img-thumbnail img-responsive">
                                                <br>

                                                <p class="text-primary"><a href=""><?=$vip['name']?> <br>(<?=$vip['id_fb']?>)</a>
                                                </p>

                                                <p class="text-danger"><?=$this->m_func->time_remaining($vip['time_use'])?></p>
                                                <a href="/CTV/Services/Bot/Comment/QuanLyKhachHang?chinh_sua=<?=$vip['id']?>" class="btn btn-xs btn-primary" target="_blank">Gia hạn</a>

                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <?php endforeach ?>
                            </div>                                
                            </div>



                    </div>
                </div>

            </div>

        </div>
        <!-- .container -->

        <!-- Jquery -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>