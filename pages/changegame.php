<?php 
require_once '../includes/connect.php';
require_once '../includes/querys.php';
$games = games($conn);

if(isset($_GET['submit'])){
	$gameid = getgameid($conn, $_GET['q1']);
	update($conn, $_GET['id'], $gameid[0], $_GET['q2'], $_GET['q4'], $_GET['q3']);
	header('Location: plannedgames.php?id='.$_GET["id"].'&page=detail&alert1=1');
}



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change game</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="container">
	<?php include '../includes/header2.php'; ?>
	<div class="form">
		<form method="get">
			<p><?php echo $err; ?></p>
			<select name="q1" value="<?php echo $_GET['name'] ?>">
				<?php for ($i=0; $i<count($games); $i++){ ?>
					<?php if($games[$i][1] == $_GET['name']){ ?>
						<option selected><?php echo $games[$i][1]; ?></option> 
					<?php  }else{ ?>
					<option><?php echo $games[$i][1]; ?></option> 
				<?php } } ?>  
			</select>
			<input type="datetime-local" name="q2" value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', strtotime($_GET['when']))?>">
			<input type="text" name="q3" placeholder="Wie legt de game uit" value="<?php echo $_GET['exp'] ?>">
			<input type="text" name="q4" placeholder="Wie gaan het spel spelen" value="<?php echo $_GET['players'] ?>">
			<input type="submit" name="submit">
			<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
		</form>
	</div>
</div>

</body>
</html>
