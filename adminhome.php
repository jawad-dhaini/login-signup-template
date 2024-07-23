<?php
session_start();

	if($_SESSION["user-type"] !== "administrator")
	{
		die('Unauthorized Access');
	}
?>


<html>
	<head>
		<title>Admin Homepage</title>
	</head>
	<body>
		<h1><?php echo 'Welcome, ', $_SESSION["username"];?></h1>
		<h2>ADMIN HOME PAGE</h2>
		<h3><a href="adminsignup.php">Add an admin user</h3>
		<a href="logout.php">Logout</a>
	</body>
</html>