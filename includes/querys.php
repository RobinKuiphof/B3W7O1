<?php 

function games($conn){
	$sql = "SELECT * FROM `games`";
	$sth = $conn->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	return $result;
}
function gameid($conn, $gamename){
	$sql = "SELECT id FROM `games` where name = :gamename";
	$sth = $conn->prepare($sql);
	$sth->bindParam(":gamename", $gamename);
	$sth->execute();
	$id = $sth->fetch();
	return $id;
}

function plangame($conn,$a1,$a2,$a3,$a4){
	$sql = 'INSERT INTO plangame (idgame,time,players,explainer) values(:idgame, :time, :players, :explainer)';
	$sth = $conn->prepare($sql);
	$sth->bindParam(":idgame", $a1);
	$sth->bindParam(":time", $a2);
	$sth->bindParam(":players", $a3);
	$sth->bindParam(":explainer", $a4);
	$sth->execute();
	header('location:pages/plannedgames.php?alert=0');
}	
function planedgames($conn){
	$sql = "SELECT * FROM `plangame` order by time asc ";
	$sth = $conn->prepare($sql);
	$sth->execute();
	$plangame = $sth->fetchAll();
	return $plangame;
}
function gameinformation($conn, $gameid){
	$sql = "SELECT * FROM `games` where id = :gameid";
	$sth = $conn->prepare($sql);
	$sth->bindParam(":gameid", $gameid);
	$sth->execute();
	$plangameinfo = $sth->fetchAll();
	return $plangameinfo;
}
function planedgame($conn, $id){
	$sql = "SELECT * FROM `plangame` where id = :id";
	$sth = $conn->prepare($sql);
	$sth->bindParam(":id", $id);
	$sth->execute();
	$plangame = $sth->fetchAll();
	return $plangame;
}
function removeitem($conn, $id){
	$sql = "DELETE FROM `plangame` where id = :id";
	$sth = $conn->prepare($sql);
	$sth->bindParam(":id", $id);
	$sth->execute();
}
function update($conn, $id, $idgame,$time,$players,$explainer){
	$sql = "UPDATE `plangame` SET idgame = :idgame, time = :time, players = :players, explainer = :explainer  where id = :id";
	$sth = $conn->prepare($sql);
	$sth->bindParam(":id", $id);
	$sth->bindParam(":time", $time);
	$sth->bindParam(":players", $players);
	$sth->bindParam(":idgame", $idgame);
	$sth->bindParam(":explainer", $explainer);
	$sth->execute();
}
function getgameid($conn, $game){
	$sql = "SELECT id FROM `games` where name = :game";
	$sth = $conn->prepare($sql);
	$sth->bindParam(":game", $game);
	$sth->execute();
	$gameid = $sth->fetch();
	return $gameid;
}

?>


