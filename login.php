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
<?php require_once "nav.php" ?>
<h2>Login</h2>
<form method = "POST" action="login.php">
<label>E-mail
	<input type="email" name="email"  value="" required><br>
</label>
	<br>
<label>Password
	<input type="password" name="pw"  value="" required><br>
</label>
<br>
<input type="submit" name="submit" value="Submit">  
</form>
<?php
if(isset($_POST['submit'])){
	if(empty($_POST['email']) || empty($_POST['pw']) ){
		echo "you left something blank";
	}else{
		$email = $_POST['email'];
		$pw = $_POST['pw']; 

		$connection = mysqli_connect("localhost","root","","reg");

		$query = "SELECT * FROM capture WHERE pw='$pw' AND email='$email'";

		$loginCheck = mysqli_query($connection, $query);

		$row = mysqli_num_rows($loginCheck);

		echo $row;

		echo "<br>";

		if($row == 1){
			while($row = mysqli_fetch_assoc($loginCheck)){
				$_SESSION["uid"] = $row["uid"];
				echo $_SESSION["uid"].'<br>';

				$_SESSION["time"] = $row["time"];
				echo $_SESSION["time"].'<br>';

				$_SESSION["name"] = $row["name"];
				echo $_SESSION["name"].'<br>';

				$_SESSION["email"] = $row["email"];
				echo $_SESSION["email"].'<br>';

				$_SESSION["pw"] = $row["pw"];
				echo $_SESSION["pw"].'<br>';

				echo "<a href=\"profile.php\">proceed to profile</a>";
			}

		} else{
			echo "try again";
		}
		mysqli_close($connection);

	}

}
?>
</body>
</html>