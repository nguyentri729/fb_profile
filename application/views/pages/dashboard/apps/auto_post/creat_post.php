<div class="card" style="min-height: 415px">

    <div class="card-content table-responsive">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#post">Đăng bài</a></li>
            <li><a data-toggle="tab" href="#copy_post">Copy bài đăng</a></li>

        </ul>

        <div class="tab-content">
            <div id="post" class="tab-pane fade in active">

                <form action="" method="POST" role="form">

                    <div class="form-group">
                        <strong for="message">* Nội dung bài đăng:  </strong>
                        <textarea name="message" id="message" class="form-control" rows="3" required="required" placeholder="Bạn đang nghĩ gì ?"></textarea>
                  
                      <div style="padding-top: 4px;">
                      	<a href="#"><i class="fa fa-tag" aria-hidden="true"></i></a>
                      </div>
                    </div>

                    <div class="form-group">
                        <strong for="message">* Ảnh kèm theo:  </strong>

                        <div class="row">
                            <div style="padding-top: 5%;"></div>
                            <div class="col-md-4 col-xs-4" style="padding-bottom: 3%; padding-top: 2%;">

                                <img alt="image" class="img-circle circle-border" src="<?=base_url('assets/img/upload_img.png')?>" width="20">

                            </div>
                            <div class="col-md-4 col-xs-4 text-center" style="padding-bottom: 3%;">

                                <img alt="image" class="img-circle circle-border" src="https://graph.fb.me/100009126175131/picture?width=100" width="20">
                                <button type="button" class="btn btn-xs btn-warning">Delete</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>* Nơi đăng:  </strong>
                       
                            <div class="select" aria-expanded="true">
                                <select class="form-control">
                                   
                                    <option>Trang cá nhân</option>
                                    <option>Albums</option>
                                    <option>Tường bạn bè</option>
                                    <option>Nhóm</option>
                                </select>
                            </div>
                    </div>

					

                    <div class="form-group">
                        <strong>* Quyền riêng tư:  </strong>
                       
                            <div class="select" aria-expanded="true">
                                <select class="form-control">
                                   
                                    <option>Công khai</option>
                                    <option>Bạn bè</option>
                                    <option>Chỉ mình tôi</option>
                                   
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <strong>* Thời gian đăng:  </strong>
                       
                             <input type="text" class="form-control datetimepicker" value="" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <div id="copy_post" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
            </div>

        </div>

    </div>
</div>