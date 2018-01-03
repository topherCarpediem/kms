<?php
include '../classes/dbHelper.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/home/mandates.php') {
		if($_GET['keyword']){
			$keyword = $_GET['keyword'];
			$data = DB::query('SELECT * FROM gad where (filename LIKE :keyword or title LIKE :keyword or author LIKE :keyword or description LIKE :keyword) and isPublished=true', array(':keyword'=> '%'. $keyword . '%'));
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
	elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/kms/home/' || $_SERVER['HTTP_REFERER'] == 'http://localhost/kms/home/index.php') {

		
		//LINEAR SEARCH ALGO
		if(isset($_GET['keyword'])){
			//Yung keyword ay galing sa search box sa index page
			$keyword = $_GET['keyword'];
			$result = array();
			
			$data1 = DB::query('SELECT * FROM resources where (filename LIKE :keyword or title LIKE :keyword or author LIKE :keyword or description LIKE :keyword or category LIKE :keyword) and isPublished=true', array(':keyword'=> '%'. $keyword . '%'));
			array_push($result,$data1);
			
			$data2 = DB::query('SELECT * FROM ppa where (title LIKE :keyword or description LIKE :keyword or category LIKE :keyword) and isPublished=true', array(':keyword'=> '%'. $keyword . '%'));
			array_push($result,$data2);
			
			$data3 = DB::query('SELECT * FROM linkages where (title LIKE :keyword or description LIKE :keyword) and isPublished=true', array(':keyword'=> '%'. $keyword . '%'));
			array_push($result,$data3);
			
			$data4 = DB::query('SELECT * FROM gad where (filename LIKE :keyword or title LIKE :keyword or author LIKE :keyword or description LIKE :keyword) and isPublished=true', array(':keyword'=> '%'. $keyword . '%'));
			
			array_push($result,$data4);
			// tapos ibabato natin sa cubrid_client_encoding()nt which is browser tapos gagawin natin json format para madaling ihandle kapagjavascript na ang naghahandle ng response mula sa server. Json ay object lang sya sa javascript
			// ganito sya
			// names = {
			//		firstname: "Christian",
			//		lastname: "asdasd"
			//}
			//Javascript pa din yan pero JSON ang kalimitan tawag dyan kasi javascript object notation.
			print_r(json_encode($result));
		}

		if(isset($_GET['cloud'])){
			if($_GET['cloud'] == true){
				$data = DB::query('SELECT category, COUNT(category) as count from ppa GROUP BY category');
				echo json_encode($data);
			}
		}
	}

}


?>