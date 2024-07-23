<?php
	session_start();

	if($_SESSION["user-type"] === "administrator")
	{
		header("location:adminhome.php");
	}
	if($_SESSION["user-type"] === "user")
	{
		header("location:userhome.php");
	}

	$data = mysqli_connect("localhost","root","","users");
	if ($data === false) {
		die("Couldn't connect to database");
	}

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$user=$_POST["user"];
		$pass=md5($_POST["password"]);
		
		$sql="select * from users where username='".$user."' AND password='".$pass."' ";
		$result=mysqli_query($data,$sql);
		$row=mysqli_fetch_array($result);
		if($row["user-type"]=="user")
		{	
			$_SESSION["user-type"] = "user";
			$_SESSION["username"] = $user;
			header("location:userhome.php");
		}
		elseif($row["user-type"]=="administrator")
		{
			$_SESSION["user-type"] = "administrator";
			$_SESSION["username"] = $user;
			header("location:adminhome.php");
		}
		else
		{
			echo "username or password incorrect";
		}
	}
?>


<html>

	<head>
		<title>Login</title>
	</head>

	<body>
		<section style="display: flex; flex-direction: column; align-items: center">
			<h1>Login Form</h1>
			<br><br><br><br>
			<div style="background-color: grey; width: 500px;">
				<br><br>

				<form action="#" method="POST" style="text-align: center">
					<div>
						<label>Username</label>
						<input type="text" name="user" required>
					</div>
					<br><br>

					<div>
						<label>Password</label>
						<input type="password" name="password" required>
					</div>
					<br><br>

					<div>
						<input type="submit" value="Login">
					</div>
				</form>
				<br><br>
			</div>
		</section>

			<p style="text-align: center">Don't have an account? <a href="signup.php">Signup now!</a></p>
	</body>
</html>

