<style type="text/css">
	.img_grey{
		    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
   			 filter: grayscale(100%);
	}
	img{
		width: 20px;
		height: 20px;
	}
	.card img {
		width: 100px!important;
		height: 100px!important;
	}
</style>
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

                        <!-- <div style="padding-top: 4px;">
                            <a href="#"><i class="fa fa-tag" aria-hidden="true"></i></a>
                        </div> -->
                        <ul class="nav nav-pills">

                                                    <li>
                                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tag_fr" href="#"><i class="fa fa-tag"></i></button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="btn btn-sm btn-default" onclick="click_file()" href="#"><i class=" fa fa-camera"></i></button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="btn btn-sm btn-default" onclick="rand_icon_post()" href="#"><i class="fa fa-smile-o"></i></button>
                                                    </li>
                                            </ul>
                    </div>

                    <div class="form-group">
                        

                        <div class="row">
                           <!--  <div style="padding-top: 2%;"></div> -->
                           <div id="img_uploaded">
                           		
                           </div>

                           <div id="preview_img">
                           		
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
                    <div class="form-group">
                        <strong>* Lặp lại bài đăng sau (phút):  </strong>

                        <input type="number" class="form-control" value="0" placeholder="Điền 0 để ko lặp lại"/>
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

<div id="tag_fr" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tag bạn bè</h4>
            </div>
            <div class="modal-body">

                <div class="input-group col-md-12">
                    <input type="text" class="search-query form-control" placeholder="Tìm kiếm bạn bè" id="key_search" onchange="search_tag()">
                    <span class="input-group-btn">
                                    <button class="btn btn-info btn-sm type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                </span>

                </div>
                <div class="input-group col-md-12">
			
                    <div id="loader" style="display: none;">
                        <center><br>
                        <br>
                        <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
                            <br>
                            <br>
                        </center>
                    </div>

                    <div id="view_tag" style="margin-top: 10px" class="row">
	
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>

</div>

 <form id="form_img">
	<input type="file" name="image[]" class="form-control" id="chose_img" multiple="">
	
</form>