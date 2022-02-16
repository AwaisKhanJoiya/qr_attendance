<?php
include 'db.php';
if (isset($_POST['submit'])) {
    $student_id = $_POST['id'];
    $student_name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $subject_code = $_POST['subject_code'];

    $query = "INSERT INTO `attendance` (`student_id`, `student_name`, `date`, `time`, `status`, `subject_code`)
     VALUES ('$student_id', '$student_name', '$date','$time', 'Present', '$subject_code')";

    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script>alert("Attendance Successfully Submitted")</script>';
        echo '<script>
            window.location.href = "../index.php"
            </script>';
    } else {
        echo '<script>alert("Attendance did not Submitted. Please try again")</script>';
        echo '<script>
            window.location.href = "../index.php"
            </script>';
    }
}
