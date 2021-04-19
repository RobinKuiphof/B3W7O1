<?php 

function games($conn){
	$sql = "SELECT * FROM `games`";
	$sth = $conn->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	return $result;
}
 ?>