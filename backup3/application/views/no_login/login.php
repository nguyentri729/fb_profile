<div class="panel panel-primary">
                                        <div class="panel-heading">NHẬP MÃ BẢO MẬT ĐỂ TIẾP TỤC</div>
					<div class="panel-body">
<form class="navbar-form navbar-center" method="post" action="">

<center>
<?=$captcha['image']?><br><br>
<a href="" class="btn btn-danger btn-xs">LẤY MÃ KHÁC</a>
<hr>
<div class="form-group">
<input type="text" name="captcha" class="form-control" placeholder="Nhập Captcha Bạn Nhìn Thấy Bên Trên Vào Đây!">
<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
</div>
<button class="btn btn-danger" name="skytamm" type="submit">Tiếp Tục</button>

<hr>
<font color="red">Gợi ý:</font> Captcha là dãy số ở hình ảnh phía trên!
</center></form>
</div>
</div>