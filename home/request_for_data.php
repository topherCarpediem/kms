<?php
include '../classes/dbHelper.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/home/mandates.php') {
		if($_GET['keyword']){
			$keyword = $_GET['keyword'];
			$data = DB::query('SELECT * FROM gad');
			$matches = array();
			foreach($data as $k=>$v) {
			   if(strpos($v[$k], $keyword)){
			   		print_r('header(string)');
			   }
			}

			print_r($matches);
		}
	}
}



?>