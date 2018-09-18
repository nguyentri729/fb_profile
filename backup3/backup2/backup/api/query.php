<?php
require('../system/Mysql.php');
if(isset($_GET['query'])){
	var_dump($db->query($_GET['query'], true));
}else{
	echo 'KHÔNG CÓ QUERY';
}
