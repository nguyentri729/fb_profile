<?php
if(isset($_GET['trideptrai'])){

}else{
  exit('password incorrect !');
}
?>

<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sedding Tools</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>
    <div class="container">
      <h3 class="text-center">CÔNG CỤ SEDDING</h3>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">SEDDING FACEBOOK</h3>
        </div>
        <div class="panel-body">


          <div class="form-group">
            <label>* API LINK: </label>
            <input type="text" id="api_link" class="form-control" value="https://graph.facebook.com/me" required="required" placeholder="EAAAA....">
          </div>



          <div class="form-group">
            <label>* List access token: </label>
            <textarea id="token_list" class="form-control" rows="5" required="required" placeholder="Cách nhau 1 dòng..."></textarea>
          </div>
          

          <div class="form-group">
            <label>* Khoảng cách (mini s): </label>
            <input type="text" id="khoang_cach" class="form-control" value="500" required="required" placeholder="Mini s">
          </div>

          <div class="form-group" style="float: right;">
            <button type="button" class="btn btn-danger" id="stop" style="display: none;"><i class="fa fa-stop" aria-hidden="true"></i> Dừng</button>
            <button type="button" class="btn btn-primary" id="start_sedding"><i class="fa fa-play" aria-hidden="true"></i> Tiến hành sedding</button>
          </div>

          <div class="form-group" style="float: left;">

            <p><b>Trạng thái :</b> <span class="text-success" id="status"></span></p>

          </div>
  <br><br><br>
  <div class="form-group">
    
<div class="progress">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0"
              aria-valuemin="0" aria-valuemax="100" style="width:0%">
                0%
              </div>
            </div>

  </div>
  <center>
  <h3 class="text-success" style="display: inline;padding: 10px;">Thành công: <span id="success">0</span></h3>/
  <h3 class="text-danger" style="display: inline;padding: 10px;">Thất bại: <span id="error">0</span></h3>/
  <h3 class="text-info" style="display: inline;padding: 10px;">Tất cả: <span id="total">0</span></h3></center>
        </div>
        <br>


      </div>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Các API</h3>
  </div>
  <div class="panel-body">
    
  

    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#Tên</th>
            <th>#API</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>Get access token tây[Dán link trên trình duyệt]</td>
            <td>
            <textarea class="form-control">https://likecuoi.vn/del_tay/index.php?get_all_token=so_luong_get&type=like_tay</textarea>
            </td>
          </tr>

          <tr>

            <td>Get access token việt[Dán link trên trình duyệt]</td>
            <td>
            <textarea class="form-control">https://likecuoi.vn/del_tay/index.php?get_all_token=so_luong_get&type=access_token</textarea>
            </td>
          </tr>

          <tr>
            <td>Kết bạn[Dán link vào form]]</td>
            <td>
            <textarea class="form-control">https://graph.facebook.com/me/friends/id_sub?method=POST</textarea>
            </td>
          </tr>

          <tr>
            <td>Like Page[Dán link vào form]]</td>
            <td>
            <textarea class="form-control">https://graph.facebook.com/id_page/likes/?method=POST</textarea>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>


<br><br><br><br><br><br><br><br><br>

    </div>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
    
  </body>
</html>