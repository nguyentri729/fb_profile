<div class="col-md-12">
	
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Cách thức nạp tiền</h3>
	</div>
	<div class="panel-body">
		<div class="row">

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<center>

							<div class="modal fade" id="the_cao">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Nạp tiền thẻ cào</h4>
										</div>
										<div class="modal-body">
											<h4 class="text-center">HIỆN CÁC NHÀ MẠNG ĐÃ ĐÓNG CỔNG NẠP THẺ. KHÔNG THỂ THỰC HIỆN GIAO DỊCH. </h4>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
										</div>
									</div>
								</div>
							</div>
							<a data-toggle="modal" href='#the_cao'><i class="fa fa-mobile fa-4x" aria-hidden="true"></i><h3>Qua thẻ cào</h3></a>
					    </center>
					</div>
				</div>
			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<center>

							<div class="modal fade" id="the_ngan_hang">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Nạp tiền qua ngân hàng</h4>
										</div>
										<div class="modal-body">
											<h4 class="text-center">ĐANG ĐĂNG KÝ TÍCH HỢP </h4>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
										</div>
									</div>
								</div>
							</div>


							<a data-toggle="modal" href='#the_ngan_hang'><i class="fa fa-credit-card fa-4x" aria-hidden="true"></i><h3>Ngân hàng</h3></a>
					    </center>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<center>


							<div class="modal fade" id="chuyen_khoan">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Chuyển khoản ngân hàng</h4>
										</div>
										<div class="modal-body">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Ngân hàng</th>
														<th>Số tài khoản</th>
														<th>Chủ tài khoản</th>
														<th>Chi nhánh</th>


													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Vietinbank</td>
														<td>15451454541</td>
														<td>Nguyen Van Tri</td>
														<td>CN Vinh Phuc</td>
													</tr>
												</tbody>
											</table>
											<hr>
											<div class="alert alert-info">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<p>Chuyển khoản với nội dung như sau : <br><b>Nap tien he thong. Ma thanh vien: <?=$this->session->userdata('ctv_id')?></b></p>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
										</div>
									</div>
								</div>
							</div>



							<a data-toggle="modal" href='#chuyen_khoan'><i class="fa fa-telegram fa-4x" aria-hidden="true"></i><h3>Chuyển khoản</h3></a>
					    </center>
					</div>
				</div>
			</div>

		</div>
		<hr>
		<div id="nap_tien">
				<div id="the_cao">
						
				</div>
		</div>
		<hr>

		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p>Sau khi chuyển khoản vui lòng soạn <b>CTTC <?=$this->session->userdata('ctv_id')?> [Cách thức chuyển khoản]</b> gửi <b>0971010421</b>, hệ thống sẽ cộng tiền trong vòng 1->24h.</p>
		</div>
	</div>
</div>

</div>