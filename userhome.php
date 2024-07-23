<?php
	session_start();

	if($_SESSION["user-type"] != "user")
	{
		die('Unauthorized Access');
	}
?>


<html>
	<head>
		<title>User Homepage</title>
	</head>
	<body>
		<h1><?php echo 'Welcome, ', $_SESSION["username"];?></h1>
		<h2>USER HOME PAGE</h2>
		<a href="logout.php">Logout</a>
	</body>
</html>