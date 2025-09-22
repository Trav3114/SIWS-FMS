<!DOCTYPE html>
<?php 
	session_start();
	if(!ISSET($_SESSION['student'])){
		header("location: index.php");
	}
	require_once 'admin/conn.php'
?>
<html lang="en">
	<head>
		<title>SIWS File Management System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="admin/css/jquery.dataTables.css" />
		<link rel="stylesheet" type="text/css" href="admin/css/style.css" />
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<label class="navbar-brand">SIWS File Management System</label>
		</div>
	</nav>
	<div class="col-md-3">
		<div class="panel panel-warning" style="margin-top:20%;">
			<div class="panel-heading">
				<h1 class="panel-title">Update  Student Information</h1>
			</div>
			<?php
				$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$_SESSION[student]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
			?>
			<div class="panel-body">
				<form method="POST" action="update_query.php">
					<div class="form-group">
						<label>Student no:</label> 
						<input type="text" class="form-control" value="<?php echo $fetch['stud_no']?>" name="stud_no" readonly="readonly"/>
						<input type="hidden" value="<?php echo $fetch['stud_id']?>" name="stud_id"/>
					</div>
					<div class="form-group">
                         <label>Roll no</label>
                         <input type="number" name="roll_no" class="form-control" required="required"/>
                    </div>
					<div class="form-group">
						<label>Firstname:</label> 
						<input type="text" class="form-control" value="<?php echo $fetch['firstname']?>" name="firstname" required="required"/>
					</div>
					<div class="form-group">
						<label>Lastname:</label> 
						<input type="text" class="form-control" value="<?php echo $fetch['lastname']?>" name="lastname" required="required"/>
					</div>
					<div class="form-group" name="gender" required="required">
						<label>Gender:</label> 
						<select class="form-control" name="gender">
							<option value=""></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						</div>
							<div class="form-group">
								<label>Year</label>
								<select name="year" class="form-control" required="required">
									<option value=""></option>
									<option value="FY">FY</option>
									<option value="SY">SY</option>
									<option value="TY">TY</option>
								</select>
							</div>
							<div class="form-group">
							<label>Course</label>
								<select name="section" class="form-control" required="required">
									<option value=""></option>
									<option value="CS">CS</option>
									<option value="IT">IT</option>
									<option value="BAF">BAF</option>
									<option value="BBI">BBI</option>
									<option value="BMS">BMS</option>
									<option value="AI">AI</option>
									<option value="DS">DS</option>
									<option value="Bcom">Bcom</option>
									<option value="Mcom">Mcom</option>
									<option value="MscCS">MscCS</option>
									<option value="MscIT">MscIT</option>
								</select>
							</div>	
							<br />
					<div class="form-group">
						<label>Password:</label> 
						<input type="password" class="form-control" value="" name="password" required="required"/>
					</div>
					<a class="btn btn-default" href="student_profile.php">Cancel</a> <button class="btn btn-warning" name="update"><span class="glyphicon glyphicon-edit"></span> Update</button>
				</form>
				
			</div>
		</div>
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright SIWS File Management System <?php echo date("Y", strtotime("+8 HOURS"))?></label>
	</div>
	<?php include 'script.php'?>
</body>
</html>