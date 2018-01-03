<?php 

class File {

public static function checkformat($document){
	
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$mime = finfo_file($finfo, $document);
	
	switch ($mime) {
	   case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
	   		return true;
	   case 'application/msword':
	   		return true;
	   case 'application/pdf':
	   		return true;
	   default:
	       	return false;
	}
}

public static function checkImage($document){
	
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$mime = finfo_file($finfo, $document);
	
	switch ($mime) {
	   case 'image/png':
	   		return true;
	   case 'image/jpeg':
	   		return true;
	   case 'image/bmp':
	   		return true;
	   default:
	       	return false;
	}
}
}

?>