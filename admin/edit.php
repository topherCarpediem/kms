<?php 

include '../classes/dbHelper.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/ppa.php') {
		if (isset($_GET['id'])) {
			 $data = DB::query('SELECT * FROM ppa WHERE id=:id', array(':id'=>$_GET['id']));
			 print_r( json_encode($data));	
		}
	}elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/resources.php') {
		if (isset($_GET['id'])) {
			 $data = DB::query('SELECT * FROM resources WHERE id=:id', array(':id'=>$_GET['id']));
			 print_r( json_encode($data));	
		}
	}elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/events.php') {
		if (isset($_GET['id'])) {
			 $data = DB::query('SELECT * FROM calendar WHERE id=:id', array(':id'=>$_GET['id']));
			 print_r( json_encode($data));	
		}
	}
}



?>