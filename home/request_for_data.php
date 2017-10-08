<?php
include '../classes/dbHelper.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/home/mandates.php') {
		if($_GET['keyword']){
			$keyword = $_GET['keyword'];
			$data = DB::query('SELECT * FROM gad where (filename LIKE :keyword or title LIKE :keyword or author LIKE :keyword or summary LIKE :keyword) and isPublished=true', array(':keyword'=> '%'. $keyword . '%'));
			print_r(json_encode($data));
		}
	}elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/home/linkages.php') {
		if($_GET['keyword']){
			$keyword = $_GET['keyword'];
			$data = DB::query('SELECT * FROM linkages where (title LIKE :keyword or description LIKE :keyword) and isPublished=true', array(':keyword'=> '%'. $keyword . '%'));
			print_r(json_encode($data));
		}
	}elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/home/ppa.php') {
		if($_GET['keyword']){
			$keyword = $_GET['keyword'];
			$data = DB::query('SELECT * FROM ppa where (title LIKE :keyword or description LIKE :keyword or category LIKE :keyword) and isPublished=true', array(':keyword'=> '%'. $keyword . '%'));
			print_r(json_encode($data));
		}
	}elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/home/resources.php') {
		if($_GET['keyword']){
			$keyword = $_GET['keyword'];
			$data = DB::query('SELECT * FROM resources where (filename LIKE :keyword or title LIKE :keyword or author LIKE :keyword or description LIKE :keyword or category LIKE :keyword) and isPublished=true', array(':keyword'=> '%'. $keyword . '%'));
			print_r(json_encode($data));
		}
	}
}



?>