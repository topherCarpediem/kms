<?php 

if (isset($_POST['download'])) {

	$id = $_POST['gad_id'];
	if ($id) {
		try {
	 		$result = DB::query('SELECT filepath,content_type FROM gad WHERE id=:id', array(':id'=> $id));
	 		$file = $result[0]['filepath'];
	 		$content_type = $result[0]['content_type'];
	 		if (file_exists($file)) {
			    header('Content-Description: File Transfer');
			    header('Content-Type: ' . $content_type);
			    header('Content-Disposition: attachment; filename="'.basename($file).'"');
			    header('Expires: 0');
			    header('Cache-Control: must-revalidate');
			    header('Pragma: public');
			    header('Content-Length: ' . filesize($file));
			    readfile($file);
			    exit;
			}
		} catch (Exception $e) {
	 			var_dump($e->getMessage());
	 	}
	}
 	//$id = file_get_contents('php://input');
}




?>