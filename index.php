<?php  
require_once 'includes/connect.php';
include_once 'includes/querys.php';
 $games = games($conn); 

if(isset($_GET['submit'])){
	require_once 'includes/functions.php';
	$a1 = test_input($_GET['q1']);
	$a2 = test_input($_GET['q2']);
	$a4 = test_input($_GET['q3']);
	$a3 = test_input($_GET['q4']);
	$id = gameid($conn, $a1);
	if(!empty($id)&&!empty($a2)&&!empty($a3)&&!empty($a4)){
		plangame($conn, $id[0], $a2, $a3, $a4);
	}else{
		$err = "Make sure to enter all fields";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Plan tool</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php if(empty($_GET['page'])){ ?>
<div class="container">
	<?php include 'includes/header.php'; ?>
	<div class="row games">
		<?php  for ($i=0; $i< count($games) ; $i++) { ?>

		<div class="card col-3">
		  <div class="card-body">
		    <p class="card-text"><?php echo $games[$i][1]; ?></p>
		  </div>
		  <img src="images/<?php echo $games[$i][2] ?>" alt="Card image">
		  <div class="card-body">
		    <a class="card-text" href="<?php echo $games[$i][6] ?>">More information</a>
		    <a class="card-text" href="?plan=<?php echo $games[$i][0] ?>&page=plangame">Plan game</a>
		  </div>
		</div>
	<?php } ?>
	</div>
</div>

<?php }else{ ?>

<div class="container">
	<?php include 'includes/header.php'; ?>
	<div class="form">
		<form method="get">
			<p><?php echo $err; ?></p>
			<select name="q1">
				<?php for ($i=0; $i<count($games); $i++){ ?>
					<option><?php echo $games[$i][1]; ?></option> 
				<?php } ?>  
			</select>
			<input type="datetime-local" name="q2">
			<input type="text" name="q3" placeholder="Wie legt de game uit">
			<input type="text" name="q4" placeholder="Wie gaan het spel spelen">
			<input type="submit" name="submit">
			<input type="hidden" name="page" value="plangame">
		</form>
	</div>
</div>
<?php } ?>

</body>
</html>