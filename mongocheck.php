<?php 

	
	include('vendor/autoload.php');

	$client = new MongoDB\Client;
	$companydb = $client->companydb;

	/*$result = $companydb -> createCollection('empcollection');

	var_dump($result);
	*/
	
 ?>