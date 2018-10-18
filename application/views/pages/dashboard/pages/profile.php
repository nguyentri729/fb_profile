<?php
    $info_member = $this->m_func->info_member();
?>
<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-12">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img" src="https://graph.fb.me/<?=$info_member['id_fb']?>/picture?width=128">
                    </a>
                </div>
                <div class="card-content">
                    <h6 class="category text-gray">Thành viên</h6>
                    <h4 class="card-title"><?=$info_member['name']?></h4>
                    <p class="description">
                        Hiện tại tài khoản của bạn được phép sử dụng tất cả các dịch vụ trên hệ thống.
                    </p>
                   <button type="button" class="btn btn-success"><i class="material-icons">
attach_money
</i><?=number_format($info_member['money'])?></button>
<a href="/Logout" class="btn btn-danger">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
</div>