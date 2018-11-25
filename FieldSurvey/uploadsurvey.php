<?php 


	if(isset($_POST['submit'])){


		
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
		$fileNameNew = " ";
		$fileExt = explode('.',$fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg','jpeg','png');

		if (in_array($fileActualExt, $allowed)) {
			if($fileError === 0){
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
			}	
			else {
				echo "There was an error uploading file";
			}
		}
		else {
			echo "File type not allowed";
		}


		include('/opt/lampp/htdocs/db-13151/vendor/autoload.php');
		$client = new MongoDB\Client;
		$db = $client->customer;
		$coll = $db->surveyresponse;




		$option = $_POST['Customer'];
		$ans1 = $_POST['ans1'];
		$ans2 = $_POST['ans2'];
		$ans3 = $_POST['ans3'];

		$lat = $_POST['lat'];
		$long = $_POST['long'];

		
		$arr = explode(" ",$option);
		$cid = $arr[0];
		$cname = $arr[2];
		$date = date('Y-m-d H:i:s');
		$imagename = $fileNameNew;
		$insertOneResult = $coll->insertOne(
			['id' => $cid, 'name' => $cname, 'Q1' => $ans1, 'Q2' => $ans2, 'Q3' => $ans3 ,'Date/Time' => $date, 'Latitude' => $lat, 'Longitude' => $long, 'Image' => $imagename]
		);

		printf("Inserted %d documents", $insertOneResult->getInsertedCount());
		//var_dump($insertOneResult->getInsertedId());


		header("refresh:0; url=survey.php");

	}


?>