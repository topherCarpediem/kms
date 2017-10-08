<?php
include '../classes/dbHelper.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/home/mandates.php') {
		if($_GET['keyword']){
			$keyword = $_GET['keyword'];
			$data = DB::query('SELECT * FROM gad where summary LIKE :keyword', array(':keyword'=> '%'. $keyword . '%'));
			print_r($data);
		}
	}
}



?>