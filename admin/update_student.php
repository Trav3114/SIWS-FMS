<?php
	require_once 'conn.php';
	
	if (isset($_POST['update'])) {
		$stud_id = $_POST['stud_id'];
		$stud_no = $_POST['stud_no'];
		$roll_no = $_POST['roll_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$yrsec = $_POST['year'] . "" . $_POST['section'];
		$password = md5($_POST['password']);
		
		// Corrected SQL query
		$query = "UPDATE `student` SET 
			`stud_no` = '$stud_no',
			`roll_no` = '$roll_no',
			`firstname` = '$firstname', 
			`lastname` = '$lastname', 
			`gender` = '$gender', 
			`yr&sec` = '$yrsec', 
			`password` = '$password' 
			WHERE `stud_id` = '$stud_id'";
		
		mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'student.php'</script>";
	}
?>
