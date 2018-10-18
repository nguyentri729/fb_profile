<?php
    $info_member = $this->m_func->info_member();
?>
<div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                       <i class="material-icons">attach_money</i>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Số dư</strong></p>
                                    <h3 class="card-title"><?=number_format($info_member['money'])?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-info">info</i>
                                        <a href="#pablo">Lịch sử giao dịch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-success">
                                        <i class="material-icons">settings</i>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Revenue</strong></p>
                                    <h3 class="card-title">$23,100</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Weekly sales
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-info">
                                       <i class="material-icons">settings</i>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Followers</strong></p>
                                    <h3 class="card-title">+245</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div> -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Hệ thống đang trong thờ gian thử nhiệm ! Dự kiến hoàn thành vào tháng 11/2018. </strong>
            </div>  
        </div>
</div>


