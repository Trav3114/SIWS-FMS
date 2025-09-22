<?php
	require_once 'admin/conn.php';
	
	if(ISSET($_POST['update'])){
		$stud_id = $_POST['stud_id'];
		$roll_no = $_POST['roll_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$yrsec = $_POST['year']."".$_POST['section'];
		$password = md5($_POST['password']);
		
		mysqli_query($conn, "UPDATE `student` SET `roll_no`='$roll_no', `firstname`='$firstname', `lastname`='$lastname', `gender`='$gender', `yr&sec`='$yrsec', `password`='$password' WHERE `stud_id`='$stud_id' ") or die(mysqli_error());
		
		header('location: student_profile.php');
	}
?>