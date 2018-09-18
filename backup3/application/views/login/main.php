
 <div class="panel panel-danger">
						<div class="panel-heading">
						<center>	<strong><i class="fa fa-user" aria-hidden="true"></i> THÔNG TIN &amp; THÔNG BÁO</strong></center>
						</div>
						<div class="panel-body">


						<div class="row">
							<div class="col-md-12">
								<?php
								if($this->session->userdata('vn') == false){
									echo '<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>Lưu ý: !</strong> Bạn đang cài đặt ngôn ngữ của tài khoản Facebook của bạn khác Tiếng Việt. Vui lòng sử dụng tiếng Việt trên tài khoản Facebook của bạn để nhận được like, sub, comment của người Việt Nam.
								</div>';
								}?>


							</div>
                                     <div class="col-sm-3">             
							<ul class="media-list">
			                    <li class="media">
								<div class="media-left">
								<a href="//fb.com/<?=$info_member['id_fb']?>" target="_blank">
													<img src="https://graph.facebook.com/<?=$info_member['id_fb']?>/picture" style="border-radius: 50%;">
												</a>
							</div>
							<div class="media-body">
								<input type="hidden" id="ids" value="<?=$info_member['id_fb']?>">
								<h4 class="media-heading"><?=$info_member['name']?></h4>
								<?=$info_member['email']?>
                                                                                           <a href="/Logout" class="btn btn-danger btn-xs"><i class="fa fa-sign-out"></i> Đăng Xuất</a><br><br>
			                        </div>
			                    </li>
			                </ul>
							</div>
							<div class="col-sm-9">

								
				<div class="notice notice-danger"><center><strong> <i class="fa fa-heart fa-spin"></i> THÔNG BÁO : Nếu bạn tăng like bị lỗi <font color="red"> <b>ĐANG THỰC THI</b></font> thì hãy <font color="red"> <b>XÓA LỊCH SỬ DUYỆT WEB</b></font> rồi tiến hành tăng lại nhé ! </strong></center></div><strong>

			
			
							</strong></div><strong>
							
							</strong></div><strong>
							
							
							
							
							
                                             </strong></div></div><strong>
											 
											 
											 
			<div class="row">
												  
            <div class="col-sm-6">								 
			 <div class="panel panel-primary">
					<div class="panel-heading">
						<center>	<strong><i class="fa fa-user" aria-hidden="true"></i> HỆ THỐNG AUTO</strong></center>
					</div>
					<div class="panel-body">
					<center>Hãy click vào chức năng AUTO bạn cần sử dụng :</center>
					 <hr>
                                <div class="row">
								<div class="col-sm-2"> </div> 
								<div class="col-sm-8"> 								
                               <a href="/ChucNang/Auto/Like" class="btn btn-danger btn-block"> <span class="badge pull-right">Max 150</span><i class="glyphicon glyphicon-thumbs-up"></i> <big><b>Auto Tăng Like</b></big></a>    
                                 </div>
								 <div class="col-sm-2">  </div> 
								 </div>
								 <hr>
   
								<div class="row">
								<div class="col-sm-2"> </div> 
								<div class="col-sm-8"> 
                               <a href="/ChucNang/Auto/Sub" class="btn btn-info btn-block"><span class="badge pull-right">Max 50</span><i class="fa fa-user-plus"></i> <big><b>Auto Tăng SUB - Friend</b></big></a>               
								</div>
								 <div class="col-sm-2">  </div> 
								 </div>
								
								<hr>
								<div class="row">
								<div class="col-sm-2"> </div> 
								<div class="col-sm-8">
                               <a href="/ChucNang/Auto/Comment" class="btn btn-warning btn-block"><span class="badge pull-right">Max 10</span><i class="fa fa-comments-o"></i> <big><b>Auto Tăng Comment</b></big></a>
								</div>
								 <div class="col-sm-2">  </div> 
								 </div>
								
								<hr>
								<!-- <div class="row">
								<div class="col-sm-2"> </div> 
								<div class="col-sm-8">								
                                <a href="#" onclick="alert('Hiện tại chức năng này đang bảo trì ! Vui lòng quay lại sau')" class="btn btn-primary btn-block"><span class="badge pull-right">Max 25</span><i class="fa fa-share" aria-hidden="true"></i><big> <b>Auto Tăng Share</b></big></a>
                                 </div>
								 <div class="col-sm-2">  </div> 
								 </div>   -->      
                    </div>
               
                    <div class="panel-footer"><b>Lưu Ý:</b> Chọn Chức năng và đọc kĩ hướng dẫn để đạt hiệu quả tốt nhất ! </div>
            </div>
												
			</div>									
											
												
												
			<div class="col-sm-6">									
			     <div class="panel panel-primary">
					<div class="panel-heading">
						<center><strong><i class="fa fa-user" aria-hidden="true"></i> HỆ THỐNG BOT</strong></center>
							</div>
						<div class="panel-body">
						<center>Hãy click vào loại BOT bạn cần cài :</center>
					 <hr>
                                                 <div class="row">
												<div class="col-sm-2"> </div> 
												<div class="col-sm-8">
                                                  <a href="/ChucNang/Bot/Reactions" class="btn btn-danger btn-block"><span class="badge pull-right">Hot</span><i class="fa fa-heart fa-spin"></i> <big><b>BOT Like Cảm Xúc</b></big></a>
                                                </div>
												<div class="col-sm-2">  </div> 
												</div> 
												 
												 <hr>
												 <div class="row">
												<div class="col-sm-2"> </div> 
												<div class="col-sm-8">
                                                  <a href="/ChucNang/Bot/Comment" class="btn btn-info btn-block"><span class="badge pull-right">New</span><i class="fa fa-comments-o"></i> <big><b>Bot Bình Luận Random</b></big> </a>
                                                  </div>
												<div class="col-sm-2">  </div> 
												</div>


												 <hr>
                                                <div class="row">
												<div class="col-sm-2"> </div> 
												<div class="col-sm-8">
                                                  <a href="#" onclick="alert('Hiện tại chức năng này đang bảo trì ! Vui lòng quay lại sau')" disabled="" class="btn btn-success btn-block"><span class="badge pull-right">Free</span><i class="fa fa-comments-o"></i><big> <b>Bot Comment Thường</b></big></a>
												 </div>
												<div class="col-sm-2">  </div> 
												</div>
												<hr>
<!-- 												<div class="row">
												<div class="col-sm-2"> </div> 
												<div class="col-sm-4">
                                                  <a href="#" onclick="alert('Hiện tại chức năng này đang bảo trì ! Vui lòng quay lại sau')" disabled="" class="btn btn-primary btn-block"><i class="fa fa-star-half-o fa-spin" aria-hidden="true"></i> <big><b>Bot Ex NEW</b></big></a>
												 </div>
												<div class="col-sm-4">
                                                  <a href="#" onclick="alert('Hiện tại chức năng này đang bảo trì ! Vui lòng quay lại sau')" disabled="" class="btn btn-success btn-block"><i class="fa fa-star-half-o" aria-hidden="true"></i> <big><b>Bot Ex Like</b></big></a>
												 </div>
												<div class="col-sm-2">  </div> 
												</div>  -->
								 
						</div>
                
                <div class="panel-footer">Nếu <b>Bot không hoạt động?</b> Hãy gỡ bot và cài đặt lại </div>
                </div></div></div>

<hr>
<div class="panel panel-primary">
    <div class="panel-heading text-center ">
      <center><strong><i class="fa fa-user" aria-hidden="true"></i> HỆ THỐNG BOT CỰC CHẤT </strong></center>
    </div>
    <div class="panel-body">



       
            <div class="row">
                <!-- Boxes de Acoes -->
             <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <div class="image"><i class="fa fa-heart"></i>
                            </div>
                            <div class="info">
                                <h3 class="title">Bot Cảm Xúc</h3>
                                <p>
                                   Bot cảm xúc cực chất, tính năng thông minh. Bot thông minh chỉ có tại LikeCuoi.Vn
                                </p>
                                <div class="more">
                                    <a href="/ChucNang/BotPro/Reactions">
								Cài đặt
							</a>
                                </div>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <div class="image"><i class="fa fa-comment"></i>
                            </div>
                            <div class="info">
                                <h3 class="title">Bot Bình Luận</h3>
                                <p>
                                    Bot Bình Luận kèm ảnh, nhãn dán,vv.. Hàng tá các tinh chỉnh cực thông minh. Cực truất'sss
                                </p>
                                <div class="more">
                                     <a href="/ChucNang/BotPro/Comment">
									Cài đặt
							</a>
                                </div>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <div class="image"><i class="fa fa-comment-o"></i>
                            </div>
                            <div class="info">
                                <h3 class="title">Bot Bình Luận Vui</h3>
                                <p>
                                   Bot bình luận với nhiều nội dung thú vị về: tình yêu, hài hước, châm ngôn sống,vv... Cực độc đáo 
                                </p>
                                <div class="more">
                                    <a href="/ChucNang/BotPro/CommentVui">
									Cài đặt
							</a>
                                </div>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>

                <!-- <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="box">
                        <div class="icon">
                            <div class="image"><i class="fa fa-heartbeat"></i>
                            </div>
                            <div class="info">
                                <h3 class="title">Bot Cua Gái</h3>
                                <p>
                                  Kết hợp tự thả tim, bình luận. Đứa con gái nào chẳng muốn được quan tâm cơ chứ.
                                </p>
                                <div class="more">
                                    <a href="#" title="Title Link">
									Cài đặt
							</a>
                                </div>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div> -->
                <!-- /Boxes de Acoes -->
            </div>
       


    </div>
</div>
</div>
