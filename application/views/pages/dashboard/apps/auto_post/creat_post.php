<style type="text/css">
	.img_grey{
		    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
   			 filter: grayscale(100%);
	}
	/* img{
        width: 20px;
        height: 20px;
    } */
	.card img {
		width: 100px!important;
		height: 100px!important;
	}
    .active a{
        color: white;
    }
    .img-active{
            background-color: #0089ff!important;
            border: 1px solid #0089ff!important;
    }
    #view_album{
        text-align: center;
    }
    .img-thumbnail{
        width: 100px!important;
        height: 100px!important;
    }
    .thumb{
        margin-top: 3%;
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




                <form action="" method="POST" role="form" id="auto_post_form">

                    <div class="form-group">
                        <strong for="message">* Nội dung bài đăng:  </strong>
                        <textarea name="message" id="message" class="form-control" rows="3" placeholder="Bạn đang nghĩ gì ?"></textarea>

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

                        <div class="select" aria-expanded="true" >
                            <select class="form-control" id="post_where" name="post_where">
                                <option value="profile">Trang cá nhân</option>
                                <option value="albums">Albums</option>
                                <option value="group">Nhóm</option>
                            </select>
                        </div>
                        <a class="btn btn-default btn-xs" onclick="modal_open()" id="modal_open_btn">Đăng lên tường của bạn</a>
                       

                    <input type="hidden" name="ab_gr" value="null" id="ab_gr">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">
                    </div>

                    <div class="form-group">
                        <strong>* Quyền riêng tư:  </strong>

                        <div class="select" aria-expanded="true">
                            <select class="form-control" name="privacy">

                                <option value="everyone">Công khai</option>
                                <option value="friend">Bạn bè</option>
                                <option value="onlyme">Chỉ mình tôi</option>

                            </select>
                        </div>
                    </div>
                 
                            <div class="form-group">
                                <strong>Giờ post bài<strong>
                                
                                    <input id="timepicker2" type="text" class="form-control" name="gio" required="">        
                                
                            </div>
                       

                            <div class="form-group">
                                <strong>Ngày post bài<strong>
                                
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="ngay" required="">
                                            
                               
                            </div>
                       

                    <div class="form-group">
                        <strong>* Lặp lại bài đăng sau (phút):  </strong>

                        <input type="number" class="form-control" value="0" placeholder="Điền 0 để ko lặp lại" name="repeat" />
                    </div>

                    <button type="submit" class="btn btn-primary" id="btn_add_post">Thêm bài đăng</button>

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
<div class="modal fade" id="modal_group">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Các nhóm bạn đã tham gia</h4>
            </div>
            <div class="modal-body">
                <div id="view_group">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_albums">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tất cả albums của bạn</h4>
            </div>
            <div class="modal-body">
                
                    <div class="row">
                       <div id="view_album">

                      
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                
            </div>
        </div>
    </div>
</div>