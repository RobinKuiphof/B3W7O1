<?php 
require_once '../includes/connect.php';
require_once '../includes/querys.php';
$planedgames = planedgames($conn);
$planedgamesinfo = gameinformation($conn, $gameid);
if(isset($_GET['alert'])){
	?>
<div class="alert alert-secondary" role="alert">
    <strong>Well done!</strong> You successfully created an extra game.
    <a class="alert-link" href="plannedgames.php">Close</a>
</div>

	<?php
}
if(isset($_GET['alert1'])){
	?>
<div class="alert alert-secondary" role="alert">
    <strong>Well done!</strong> You successfully eddited the game.
    <a class="alert-link" href="plannedgames.php?id=<?php echo $_GET["id"] ?>&page=detail">Close</a>
</div>

	<?php
}
if(isset($_GET['confirm'])){
	?>
	<div class="alert alert-danger" role="alert">
	  <strong>Are you sure you want to remove this planed game?</strong>
	  <a href="plannedgames.php?action='x'&id=<?php echo $_GET['id'] ?>" class="alert-link">Confirm</a>
	  <a href="plannedgames.php" class="alert-link">Cancel</a>
	</div>
	<?php 
}
if(isset($_GET['action'])){
	removeitem($conn, $_GET['id']);
	header('Location:plannedgames.php');
}



 ?>








<!DOCTYPE html>
<html>
<head>
	<title>planed games</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<?php if(empty($_GET['page'])){ ?>
	<div class="container">
	<?php include '../includes/header2.php'; ?>
		<div class="row">

		<?php  for ($i=0; $i<count($planedgames) ; $i++) { 
		$gameinfo = gameinformation($conn, $planedgames[$i][1]);
		?>

			<div class="card col-3">
			  	<div class="card-body">
			    	<p class="card-text"><?php echo $gameinfo[0][1]; ?></p>
				</div>
			  	<img src="../images/<?php echo $gameinfo[0][2] ?>" alt="Card image">
				<div class="card-body">
					<p class="card-text">When: <?php echo $planedgames[$i][2]; ?></p>
					<p class="card-text">Duration: <?php echo $gameinfo[0][10]; ?> minutes</p>
					<p class="card-text">Explained by: <?php echo $planedgames[$i][4]; ?></p>
				    <a class="card-text" href="plannedgames.php?page=detail&id=<?php echo $planedgames[$i][0] ?>">detailed information</a>
				    <a href="plannedgames.php?confirm=confirm&id=<?php echo $planedgames[$i][0]; ?>">Remove</a>
				</div>
			</div>
	<?php } ?>
		</div>
	</div>
<?php }else{ 
$gameinfo1 = planedgame($conn, $_GET['id']);
$gameinfo2 = gameinformation($conn, $gameinfo1[0][1]);
	?>

	<div style="background-color: white;" class="container">
		<div class="details">
			<?php include '../includes/header2.php'; ?>
			<h1 style="text-align: center;"><?php echo $gameinfo2[0][1] ?></h1>
			<img src="../images/<?php echo $gameinfo2[0][2]; ?>">
			<p style="width: 200px;">Time: <?php echo $gameinfo1[0][2]; ?></p><a href="changegame.php?id=<?php echo $gameinfo1[0][0] ?>&when=<?php echo $gameinfo1[0][2] ?>&players=<?php echo $gameinfo1[0][3] ?>&exp=<?php echo $gameinfo1[0][4] ?>&name=<?php echo $gameinfo2[0][1] ?>">Change</a>
			<p>Players: <?php echo $gameinfo1[0][3]; ?></p><a href="changegame.php?id=<?php echo $gameinfo1[0][0] ?>&when=<?php echo $gameinfo1[0][2] ?>&players=<?php echo $gameinfo1[0][3] ?>&exp=<?php echo $gameinfo1[0][4] ?>&name=<?php echo $gameinfo2[0][1] ?>">Change</a>
			<p>Explainer: <?php echo $gameinfo1[0][4]; ?></p><a href="changegame.php?id=<?php echo $gameinfo1[0][0] ?>&when=<?php echo $gameinfo1[0][2] ?>&players=<?php echo $gameinfo1[0][3] ?>&exp=<?php echo $gameinfo1[0][4] ?>&name=<?php echo $gameinfo2[0][1] ?>&idgame=<?php echo $gameinfo1[0][1] ?> ">Change</a>
	

			<p>Expension: <?php echo $gameinfo2[0][4] ?></p>
			<p>Skills: <?php echo $gameinfo2[0][5] ?></p>
			<p>Min players: <?php echo $gameinfo2[0][8] ?></p>
			<p>Max players: <?php echo $gameinfo2[0][9] ?></p>
			<p>Duration: <?php echo $gameinfo2[0][10] ?></p>
			<p>Explaination duration: <?php echo $gameinfo2[0][11] ?></p>
			<a href="<?php echo $gameinfo2[0][6]; ?>"><p>More info about the game</p></a>
			<?php echo $gameinfo2[0][7]; ?>
		</div>
	</div>
<?php } ?>
</body>
</html>