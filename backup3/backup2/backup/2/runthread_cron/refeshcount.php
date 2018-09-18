<?php //date_default_timezone_set('Asia/Ho_Chi_Minh');
//ini_set('max_execution_time', 0);
require_once '../xacnhan2.php';
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME);
mysqli_set_charset($conn,'utf8');

updatetotalauto();
deletehistory();

function updatetotalauto(){
      global $conn;
      mysqli_query($conn, "UPDATE `botreaction` SET `autotoday`='0',`autocmttoday`='0' WHERE 1");    
}
function deletehistory(){
      global $conn;
      mysqli_query($conn, "DELETE FROM `historybot` WHERE 1");    
} ?>