<div class="content-box bg-white shadow-large top-30">
    <h4 class="top-25">
	Thêm bài đăng
</h4>
    <style type="text/css">
        .col-xs-4 {
            padding-bottom: 10px;
        }
    </style>
    <div class="top-25 bottom-30">

        <form id="add_post">
            <div class="input-simple-2 textarea has-icon">
                <i class="fa fa-edit"></i>
                <textarea class="textarea-simple-2" placeholder="Nội dung bài đăng" name="noi_dung"></textarea>
            </div><br>
            <br>
            <div class="input-simple-2 textarea">
                <CENTER>

                    <p>


                        <a style="padding: 10px;" data-menu="menu-ablums" data-menu-type="menu-box-modal" href="#" class="header-icon header-icon-2"><i class="fa fa-book fa-2x"></i></a>
                        <a style="padding: 10px;" data-menu="menu-tag" data-menu-type="menu-box-modal" href="#" class="header-icon header-icon-2"><i class="fas fa-tag fa-2x"></i></a>

                    </p>

                </CENTER>
            </div>
            <div class="container">
                <div class="row">
                    <div class="gallery gallery-thumbs gallery-square">

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="upload_click">
                            <center>

                                <div width="100px" style="margin-top: 20%; ">
                                    <button type="button" class="btn btn-default btn-block" onclick="bat_click()">
                                       
                                        <br><i class="fa fa-camera fa-3x" aria-hidden="true"></i><br>
                                        <br>
                                    </button>
                                </div>

                            </center>
                        </div>
                        <div id="view_image">

                        </div>
                        <div class="loading" style="display: none;">

                        </div>
                        <!-- <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="image_view_">
							<input type="hidden" name="image_link[]">
							<center>
								<a class="show-gallery" href="<?=base_url('app')?>/images/pictures/1t.jpg" title="Vynil and Typerwritter">
									<img src="<?=base_url('app')?>images/pictures/1s.jpg" data-src="<?=base_url('app')?>/images/pictures/1s.jpg" class="preload-image responsive-image" alt="img" width="130px;">

								</a>
								<a class="btn btn-xs btn-default" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</center>
						</div> -->


                    </div>
                </div>
            </div>
            <div class="input-simple-2 has-icon input-green bottom-15"><i class="fa fa-clock"></i>
               <input class="timepicker timepicker-without-dropdown text-center" tabindex="0" placeholder="Thời gian đăng" name="thoi_gian">
            </div>


            <div class="input-simple-2 has-icon input-green bottom-15"><i class="fa fa-calendar"></i>
                <input type="text" placeholder="Ngày đăng" id="datepicker" name="ngay_dang">
            </div>


            <div class="input-simple-2 has-icon input-green bottom-15"><i class="fa fa-repeat"></i>
                <input type="number" placeholder="Lặp lại sau(phút)" value="0" min="0">
            </div>

            <div class="select-box select-box-1">
                <strong>Quyền riêng tư</strong>

                <select name="quyen_rieng_tu">
                    <option value="everyone">Mọi người</option>
                    <option value="friend">Bạn bè</option>
                    <option value="onlyme">Chỉ mình tôi</option>
                </select>

            </div>



<div id="menu-ablums" data-menu-height="460" class="menu menu-box-modal bg-white shadow-large">
    <div class="menu-scroll">
        <h3 class="uppercase ultrabold center-text top-0 color-black font-27">Chọn nơi đăng</h3>
        <p class="center-text left-30 right-30 bottom-20 color-black top-10 opacity-70">
            Chọn album mà bạn muốn đăng, chỉ được chọn duy nhất 1 album.
        </p>
        <!--  <div class="container">

		</div> -->

        <div class="deco-thin deco-2 bottom-20" style="padding-top: 5px;"></div>
        <div class="contact-form">

            <div class="select-box select-box-1">
                <strong>Ablums đăng</strong>

                <select name="privacy" id="my_select">
                    <option value="feed">Đăng lên tường</option>

                </select>

            </div>
        </div>

        <a href="#" class="button button-round color-white button-blue button-xs button-center close-menu uppercase bold top-30">Đóng</a>
    </div>
</div>


            <button type="submit" class="button button-rounded button-full button-green-3d button-green uppercase ultrabold">Thêm bài đăng</button>



            
        </form>
    </div>

</div>
<div style="display: none;">

    <form id="form_img">

        <input type="file" id="chose_file" name="image[]" multiple="">
        <button type="submit">Submit</button>
    </form>

</div>





<div id="menu-tag" data-menu-height="460" class="menu menu-box-modal bg-white shadow-large">
    <div class="menu-scroll">

        <!--         <p class="center-text left-30 right-30 bottom-20 color-black top-10 opacity-70">
            Chọn người bạn muốn tag khi bài viết được đăng.
        </p> -->
        <div class="container">
            <div class="chips chips-large" id="tag_view">




            </div>
        </div>

        <div class="deco-thin deco-2 bottom-20" style="padding-top: 5px;"></div>
        <div class="contact-form">



            <!-- <div class="input-group col-md-12">
				    <input type="text" class="search-query form-control" placeholder="Tìm kiếm" id="key_search" onchange="search_tag()">
				</div> -->
            <div class="input-simple-2 has-icon input-green bottom-15"><i class="fa fa-search"></i>
                <input type="text" placeholder="Tìm kiếm" onchange="search_tag()" id="key_search">
            </div>
            <div class="input-group col-md-12">

                <div id="loader" style="display: none;">
                    <br>
                    <br>
                    <center><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
                        <br>
                        <br>
                    </center>
                </div>
            </div>

            <div id="view_tag" class="row">

            </div>

        </div>

        <a href="#" class="button button-round color-white button-blue button-xs button-center close-menu uppercase bold top-30">Đóng</a>
    </div>
</div>

