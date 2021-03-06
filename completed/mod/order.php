<?php
if (isset($_POST['orders'])) {
	
	$orders = explode('&', $_POST['orders']);
	$array = array();
	
	foreach($orders as $item) {
		$item = explode('=', $item);
		$item = explode('_', $item[1]);
		$array[] = $item[1];
	}
	
	try {

		$objDb = new PDO('mysql:host=localhost;dbname=books', 'root', 'password');
		$objDb->exec("SET CHARACTER SET utf8");
		
		foreach($array as $key => $value) {
			$key = $key + 1;
			$sql = "UPDATE `books` 
					SET `order` = ?
					WHERE `id` = ?";
			
			$objDb->prepare($sql)->execute(array($key, $value));		
		}
		
		echo json_encode(array('error' => false));
	
	} catch(Exception $e) {
	
		echo json_encode(array('error' => true));
		
	}
	
} else {
	echo json_encode(array('error' => true));
}