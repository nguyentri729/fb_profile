<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">

       <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

            <div class="panel panel-default">

                <div class="panel-body text-center">
                    <i class="fa fa-usd fa-3x" aria-hidden="true"></i>

                    <h3><?=number_format($this->m_admin->tong_tien())?></h3>
                    <span>Tổng tiền hệ thống</span>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

            <div class="panel panel-warning">

                <div class="panel-body text-center">
                   <i class="fa fa-bitbucket fa-3x" aria-hidden="true"></i>
                    <h3><?=number_format($this->m_admin->tong_thanh_vien())?></h3>
                    <span>Tổng CTV & Đại Lý</span>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

            <div class="panel panel-info">

                <div class="panel-body text-center">
                    <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                    <h3><?=number_format($this->m_admin->tong_khach())?></h3>
                    <span>Khách hành đang chạy</span>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

            <div class="panel panel-info">

                <div class="panel-body text-center">
                    <i class="fa fa-gavel fa-3x" aria-hidden="true"></i>
                    <h3><?=number_format($this->m_admin->tong_buff())?></h3>
                    <span>Buff ID chạy</span>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Nhật ký hoạt động</h3> <br><a class="btn btn-danger btn-xs" href="?xoa_log=true">Xoá log</a>
                </div>
                <div class="panel-body" style=" overflow: scroll; height: 420px;">
                    <?php
                    $this->db->limit(10);
                    $this->db->order_by('id', 'desc');
                  
                    $activity = $this->db->get('activity')->result_array();
                    ?>
                    <ul class="list-group">
                        <?php foreach ($activity as $act): ?>
                             <li class="list-group-item"><?=$this->m_admin->string_activity($act['user_creat'],$act['action_type'], $act['where_action'],$act['id_action'], $act['money'], $act['time_creat'])?></li>

                        <?php endforeach ?>
                        
                        
                    </ul>
                </div>
            </div>
        </div>