<?php
session_start();
include 'db.php';
if (isset($_SESSION['loggedin'])) {
    if (isset($_POST['submit'])) {
        $subject_code = $_POST['subject_code'];
        $subject_name = $_POST['subject_name'];
        $branch = $_POST['branch'];
        $start_year = $_POST['start_year'];
        $end_year = $_POST['end_year'];
        $semester = $_POST['semester'];
        $teacher_id = $_SESSION['teacher_id'];
        $teacher_name = $_SESSION['name'];

        $subject_code = mysqli_real_escape_string($connection, $subject_code);
        $subject_name = mysqli_real_escape_string($connection, $subject_name);
        $branch = mysqli_real_escape_string($connection, $branch);
        $start_year = mysqli_real_escape_string($connection, $start_year);
        $end_year = mysqli_real_escape_string($connection, $end_year);
        $teacher_name = mysqli_real_escape_string($connection, $teacher_name);
        $semester = mysqli_real_escape_string($connection, $semester);

        $query = "INSERT INTO `subjects` (`subject_code`, `subject_name`, `branch`, 
        `start_year`, `end_year`, `semester`, `teacher_id`, `teacher_name`)
             VALUES ('$subject_code', '$subject_name', '$branch', '$start_year',
              '$end_year', '$semester', '$teacher_id', '$teacher_name')";

        $result = mysqli_query($connection, $query);
        if ($result) {
            echo '<script>alert("Subject added successfully")</script>';
            echo '<script>
                window.location.href = "../index.php"
                </script>';
        } else {
            echo '<script><alert>We are facing some error please try again</alert></script>';
        }
    }
} else {
    echo '<script>alert("Please login first")</script>';
    echo '<script>
            window.location.href = "../index.php"
            </script>';
}
