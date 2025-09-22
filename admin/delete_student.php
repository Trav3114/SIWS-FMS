<?php
    require_once 'conn.php';

    if (isset($_POST['stud_id'])) {
        $stud_id = $_POST['stud_id'];

        // Fetch student details from the database
        $query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$stud_id'") or die(mysqli_error($conn));
        $fetch = mysqli_fetch_array($query);
        $stud_no = $fetch['stud_no'];

        // Check if the student's directory exists and remove it
        $student_dir = "../files/" . $stud_no;
        if (file_exists($student_dir)) {
            if (removeDir($student_dir)) {
                // Directory successfully removed, now delete student data from the database
                $delete_student = mysqli_query($conn, "DELETE FROM `student` WHERE `stud_id` = '$stud_id'") or die(mysqli_error($conn));
                $delete_storage = mysqli_query($conn, "DELETE FROM `storage` WHERE `stud_no` = '$stud_no'") or die(mysqli_error($conn));

                if ($delete_student && $delete_storage) {
                    echo "success";
                } else {
                    echo "error: Failed to delete student or storage data.";
                }
            } else {
                echo "error: Failed to delete student directory.";
            }
        } else {
            // Directory does not exist, proceed to delete student records
            $delete_student = mysqli_query($conn, "DELETE FROM `student` WHERE `stud_id` = '$stud_id'") or die(mysqli_error($conn));
            $delete_storage = mysqli_query($conn, "DELETE FROM `storage` WHERE `stud_no` = '$stud_no'") or die(mysqli_error($conn));

            if ($delete_student && $delete_storage) {
                echo "success";
            } else {
                echo "error: Failed to delete student or storage data.";
            }
        }
    } else {
        echo "error: No student ID provided.";
    }

    // Recursive function to remove directory and all files/subdirectories
    function removeDir($dir) {
        if (!is_dir($dir)) {
            return false;
        }

        $items = scandir($dir);
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }
            $path = $dir . '/' . $item;
            if (is_dir($path)) {
                // Recursively remove subdirectories
                removeDir($path);
            } else {
                // Remove files
                unlink($path);
            }
        }
        return rmdir($dir); // Finally, remove the directory itself
    }
?>
