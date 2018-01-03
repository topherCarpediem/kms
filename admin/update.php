<?php 

include '../classes/dbHelper.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/ppa.php') {
	 
	  $id = file_get_contents('php://input');
	  $data = json_decode($id);
	  $ppa_params = array(
	    ':category'=> $data->category,
	    ':title'=>$data->title,
	    ':description'=> $data->description,
	    ':id'=> $data->id
	  );
  	  DB::query('UPDATE ppa set category=:category, title=:title, description=:description WHERE id=:id', $ppa_params);

	}elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/resources.php') {
	  $id = file_get_contents('php://input');
	  $data = json_decode($id);
	  $rs = array(
	    ':category'=> $data->category,
	    ':title'=>$data->title,
	    ':description'=> $data->description,
	    ':author'=> $data->author,
	    ':id'=> $data->id
	  );
  	 DB::query('UPDATE resources set category=:category, title=:title, description=:description, author=:author WHERE id=:id', $rs);
	
	}elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/admin/events.php') {
	  $id = file_get_contents('php://input');
	  $data = json_decode($id);
	  //var_dump($data);
	  $rs = array(
	    ':title'=>$data->title,
	    ':start'=> $data->start,
	    ':end'=> $data->end,
	    ':id'=> $data->id
	  );
  	 DB::query('UPDATE calendar set title=:title, start=:start, end=:end WHERE id=:id', $rs);
	}
}


?>