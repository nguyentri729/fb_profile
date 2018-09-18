
        <div id="noidung" class="row">
        	<!-- bot_fb -->
        	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        		<div class="panel panel-default">
        			<div class="panel-heading">
        				<h3 class="panel-title">Chức năng tự động (Bot Facebook)</h3>
        			</div>
        			<div class="panel-body text-center">

        				<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 10px;">
	        					<a class="btn btn-default" href="/QuanLi/Services/Bot/Reactions">
	        						<div style="padding: 10px">
	        						<i class="fa fa-heart fa-3x" aria-hidden="true"></i><br>
	        							<span>Bot cảm xúc</span><br><small class="btn btn-info btn-xs"><?=$this->m_thongke->num_row('bot_reactions')?></small>
	        						</div>
	        					</a>			
							</div>	

							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 10px;">
	        					<a class="btn btn-default" href="/QuanLi/Services/Bot/Comment">
	        						<div style="padding: 10px">
	        						<i class="fa fa-comments-o fa-3x" aria-hidden="true"></i><br>
	        							<span>Bot bình luận</span><br><small class="btn btn-info btn-xs"><?=$this->m_thongke->num_row('bot_comment')?></small>
	        						</div>
	        					</a>			
							</div>

						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 10px;">
	        					<a class="btn btn-default" href="#" disabled="" onclick="alert('Hiện tại chức năng này đang trong quá trình hoàn thiện.');">
	        						<div style="padding: 10px">
	        						<i class="fa fa-clipboard fa-3x" aria-hidden="true"></i><br>
	        							<span>Bot Post</span>
	        						</div>
	        					</a>			
							</div>


        				</div>

        			</div>
        		</div>
        	</div>
        	<!-- bot_fb -->


        	<!-- vip_fb -->
        	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        		<div class="panel panel-default">
        			<div class="panel-heading">
        				<h3 class="panel-title">Chức năng Vip (Tự động hoàn toàn)</h3>
        			</div>
        			<div class="panel-body text-center">

        				<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 10px;">
	        					<a class="btn btn-default" href="/QuanLi/Services/Vip/Reactions">
	        						<div style="padding: 10px">
	        						<i class="fa fa-heart fa-3x" aria-hidden="true"></i><br>
	        							<span>Vip cảm xúc</span><br><small class="btn btn-info btn-xs"><?=$this->m_thongke->num_row('vip_reactions')?></small>
	        						</div>
	        					</a>			
							</div>	

							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 10px;">
	        					<a class="btn btn-default" href="/QuanLi/Services/Vip/Comment">
	        						<div style="padding: 10px">
	        						<i class="fa fa-comments-o fa-3x" aria-hidden="true"></i><br>
	        							<span>Vip comment</span><br><small class="btn btn-info btn-xs"><?=$this->m_thongke->num_row('vip_comment')?></small>
	        						</div>
	        					</a>			
							</div>

							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 10px;">
	        					<a class="btn btn-default" disabled="" onclick="alert('Hiện tại chức năng này đang trong quá trình hoàn thiện.');" href="#">
	        						<div style="padding: 10px">
	        						<i class="fa fa-share fa-3x" aria-hidden="true"></i><br>
	        							<span>Vip Share</span>
	        						</div>
	        					</a>			
							</div>


        				</div>


        			</div>
        		</div>
        	</div>
        	<!-- vip_fb -->

        	<!-- buff_fb -->
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        		<div class="panel panel-default">
        			<div class="panel-heading">
        				<h3 class="panel-title">Chức năng buff (Tăng theo số lượng) </h3>
        			</div>
        			<div class="panel-body text-center">

        				<div class="row">

							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
	        					<a class="btn btn-default" href="/QuanLi/Services/Buff/Like">
	        						<div style="padding: 10px">
	        						<i class="fa fa-thumbs-o-up fa-3x" aria-hidden="true"></i><br>
	        							<span>Tăng like</span><br><small class="btn btn-info btn-xs"><?=$this->m_thongke->num_row('buff_like')?></small>
	        						</div>
	        					</a>			
							</div>	

							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
	        					<a class="btn btn-default" href="/QuanLi/Services/Buff/Reactions">
	        						<div style="padding: 10px">
	        						<i class="fa fa-heart fa-3x" aria-hidden="true"></i><br>
	        							<span>Tăng cảm xúc</span><br><small class="btn btn-info btn-xs"><?=$this->m_thongke->num_row('buff_reactions')?></small>
	        						</div>
	        					</a>			
							</div>	

							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
	        					<a class="btn btn-default" onclick="alert('Hiện tại chức năng này đang trong quá trình hoàn thiện.');" href="#" disabled="">
	        						<div style="padding: 10px">
	        						<i class="fa fa-comments-o fa-3x" aria-hidden="true"></i><br>
	        							<span>Tăng comment</span>
	        						</div>
	        					</a>			
							</div>

							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
	        					<a class="btn btn-default" href="/QuanLi/Services/Buff/Share">
	        						<div style="padding: 10px">
	        						<i class="fa fa-share fa-3x" aria-hidden="true"></i><br>
	        							<span>Tăng Share</span><br><small class="btn btn-info btn-xs"><?=$this->m_thongke->num_row('buff_share')?></small>
	        						</div>
	        					</a>			
							</div>
							
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
	        					<a class="btn btn-default" href="/QuanLi/Services/Buff/Follow">
	        						<div style="padding: 8px;">
	        						<i class="fa fa-rss fa-3x" aria-hidden="true"></i><br>
	        							<span>Tăng follow</span><br><small class="btn btn-info btn-xs"><?=$this->m_thongke->num_row('buff_follow')?></small>
	        						</div>
	        					</a>			
							</div>

							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
	        					<a class="btn btn-default" href="/QuanLi/Services/Buff/Rate">
	        						<div style="padding: 8px;">
	        						<i class="fa fa-star-o fa-3x" aria-hidden="true"></i><br>
	        							<span>Tăng đánh giá</span><br><small class="btn btn-info btn-xs"><?=$this->m_thongke->num_row('buff_rate')?></small>
	        						</div>
	        					</a>			
							</div>


        				</div>


        			</div>
        		</div>
        	</div>
        	<!-- buff_fb -->
        	<!-- tool_fb -->
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: none;">
        		<div class="panel panel-default">
        			<div class="panel-heading">
        				<h3 class="panel-title">Các công cụ</h3>
        			</div>
        			<div class="panel-body text-center">

        				<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 10px;">
	        					<a class="btn btn-default" href="">
	        						<div style="padding: 10px">
	        						<i class="fa fa-user-plus fa-3x" aria-hidden="true"></i><br>
	        							<span>Tìm bạn bè</span>
	        						</div>
	        					</a>			
							</div>	

							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 10px;">
	        					<a class="btn btn-default" href="">
	        						<div style="padding: 10px">
	        						<i class="fa fa-filter fa-3x" aria-hidden="true"></i>
	        						<br>
	        							<span>Lọc bạn bè</span>
	        						</div>
	        					</a>			
							</div>	

							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 10px;">
	        					<a class="btn btn-default" href="">
	        						<div style="padding: 10px">
	        						<i class="fa fa-users fa-3x" aria-hidden="true"></i><br>
	        							<span>Đăng bài vào nhóm</span>
	        						</div>
	        					</a>			
							</div>

							<!-- <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
	        					<a class="btn btn-default" href="">
	        						<div style="padding: 10px">
	        						<i class="fa fa-share fa-3x" aria-hidden="true"></i><br>
	        							<span>Tăng Share</span>
	        						</div>
	        					</a>			
							</div> -->






        				</div>


        			</div>
        		</div>
        	</div>
        	<!-- tool_fb -->
        </div>