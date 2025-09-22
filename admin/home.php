<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php';
?>
<html lang="en">
	<head>
		<title>TRAV</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<label class="navbar-brand">TRAV</label>
			<?php 
				$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_error($conn));
				$fetch = mysqli_fetch_array($query);
			?>
			<ul class="nav navbar-right">	
				<li class="dropdown">
					<a class="user dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-user"></span>
						<?php 
							echo $fetch['firstname']." ".$fetch['lastname'];
						?>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<?php include 'sidebar.php'; ?>
	<div id="content">
		<br /><br /><br />
		<div class="alert alert-info"><h3>About us</h3></div>
		<p>Trav is an innovative file management system specifically designed to facilitate the organization, storage, and retrieval of educational documents within an academic setting. This system addresses the need for effective data management by providing a robust platform that operates under the supervision of teachers, who serve as administrators.</p>
		<div class="alert alert-info"><h3>Vision</h3></div> 
		<p>The aim of Trav is to provide a secure, efficient, and user-friendly platform for managing educational files and data in academic institutions. It seeks to streamline the process of file storage, organization, and sharing, while empowering teachers to manage user accounts and students to access and update their information independently. By creating a centralized system for file management, Trav aims to enhance collaboration, improve data accuracy, and simplify administrative tasks for both teachers and students.</p>
	</div>
	<div id="footer">
		<label class="footer-title">&copy; Copyright TRAV - A File Management System <?php echo date("Y", strtotime("+8 HOURS")); ?></label>
	</div>
	<?php include 'script.php'; ?>
</body>
</html>
