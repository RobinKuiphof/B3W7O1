<?php 

	try {
		$conn = new PDO('mysql:host=localhost;dbname=game_db', 'root','mysql');
	} catch (PDOException $e) {
		print "Error ".$e->getMessage(). "<br/>";
		die();
	}
	 ?>
