<?php 

include('../classes/dbHelper.php');

$id = file_get_contents('php://input');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/gad.php') {
		if ($id) {
			$filepath = DB::query('SELECT filepath FROM gad WHERE id=:id', array(':id'=>$id))[0]['filepath'];
			unlink('./'.$filepath);
			DB::query('DELETE FROM gad WHERE id=:id', array(':id'=>$id));	
		}
	}elseif($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/linkages.php') {
		if ($id) {
			DB::query('DELETE FROM linkages WHERE id=:id', array(':id'=>$id));	
		}
	}elseif($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/resources.php') {
		if ($id) {
			$filepath = DB::query('SELECT filepath FROM resources WHERE id=:id', array(':id'=>$id))[0]['filepath'];
			unlink('./'.$filepath);
			DB::query('DELETE FROM resources WHERE id=:id', array(':id'=>$id));	
		}
	}elseif($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/ppa.php') {
		if ($id) {
			DB::query('DELETE FROM ppa WHERE id=:id', array(':id'=>$id));	
		}
	}elseif($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/events.php') {
		if ($id) {
			DB::query('DELETE FROM calendar WHERE id=:id', array(':id'=>$id));	
		}
	}
}
?>