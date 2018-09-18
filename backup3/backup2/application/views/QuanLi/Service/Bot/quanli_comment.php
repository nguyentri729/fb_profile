<script type="text/javascript">
    function check_token(token, id){
        $.getJSON('https://graph.facebook.com/me', {access_token: token}, function() {
                $('#check_'+id+'').addClass('fa fa-circle text-success');
                  $('#checkbtn_'+id+'').addClass('btn btn-success btn-xs').html('LIVE');
        }).fail(function(){
            $('#check_'+id+'').addClass('fa fa-circle text-danger');
            $('#checkbtn_'+id+'').addClass('btn btn-warning btn-xs').html('DIE');

        });
    }
</script>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Công cụ CTV</h3>
        </div>
        <div class="panel-body">
           
            <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Thay token theo list</a>
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Thay token hàng loạt</h4>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control" rows="5" placeholder="Dán token vào đây...cách nhau dấu xuống dòng"></textarea><br>
                            <button type="button" class="btn btn-info" >Tiến hành thay</button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                           
                        </div>
                    </div>
                </div>
            </div>
           


        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Danh sách khách hàng</h3>
        </div>
        <div class="panel-body">
                       
            <div class="table-responsive">
                <table class="table table-hover" id="table_id">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Khách hàng</th>
                        <th>Còn lại</th>
                        <th>Ngày cài</th>
                        <th>Người cài</th>
                        <th>Trạng thái</th>
                        <th>Token</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
            <?php
            $i =1;
            $this->load->helper('date');

            foreach ($data_khachhang as $kh) {
            ?>      
                    <tr>

                        <td><?=$i++?></td>
                        <td><img alt="<?=$kh['name']?>" class="img-circle circle-border" src="https://graph.fb.me/<?=$kh['id_fb']?>/picture?width=20&height=20"> <a href="https://wwww.facebook.com/<?=$kh['id_fb']?>"><?=$kh['name']?> <i id="check_<?=$i?>"></i></a></td>

                        <script>
                            check_token('<?=$kh['access_token']?>', <?=$i?>);
                        </script>
                        <td><?=$this->m_func->time_remaining($kh['time_use'])?></td>
                        
                        <td><?=mdate('%H:%i - %d/%m/%Y', $kh['time_creat'])?></td>
                        <td><?=$this->m_func->get_name_ctv($kh['user_creat'])?></td>
                        <td><?php

                        switch ($kh['active']) {
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
                        ?></td>
                        <td>
                            <button id="checkbtn_<?=$i?>"></button>
                        </td>
                        <td>
                          

                            <a class="btn btn-xs btn-info" href="?chinh_sua=<?=$kh['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>

                            <button class="btn btn-xs btn-danger" onclick="delete_kh(<?=$kh['id']?>)"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>


                        </td>

                    </tr>
            <?php
            }
            ?>
                   
                    </tbody>
                </table>
            </div>




        </div>
    </div>
</div>

