<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<style>
		*{
			font-family: sans-serif;
		}
	</style>
</head>
<body>
<?php require_once "nav.php"; ?>
<h2>Upload data to SQL</h2>
<form method="post" action="reg.php">
<label>Name
	<input type="text" name="name" required><br>
</label>
<br>
<label>E-mail
	<input type="email" name="email" required><br>
</label>
<br>
<label>Password
    <input type="password" name="pw" required><br>
</label>
<br>
<input type="submit" name="submit" value="Submit">  
</form>
<?php 
if(isset($_POST['submit'])){
	$name= $_POST['name'];
	$email= $_POST['email'];
    $pw = $_POST['pw'];

	$connection= mysqli_connect("localhost","root","","reg");

	$query= "INSERT INTO capture (`uid`, `time`, `name`, `email`, `pw`) 
	VALUES (NULL, NULL, '$name','$email', '$pw');";

	if($connection){
		echo "new record created";
	}else{
		echo $connection->error;
	}

	mysqli_query($connection, $query);

	mysqli_close($connection);
}

?>
</body>
</html>