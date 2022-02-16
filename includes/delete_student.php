<?php
include 'db.php';
$student_id = $_GET['student_id'];
$subject_id = $_GET['subject_id'];

$query = "SELECT * FROM subjects WHERE id=$subject_id";
$result = mysqli_query($connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $students_id = $row['students_id'];
    $student_array = unserialize(base64_decode($students_id));
    $new_array = array_diff($student_array, [$student_id]);
    $insert_array = base64_encode(serialize($new_array));
    $query = "UPDATE subjects SET students_id = '$insert_array' WHERE id=$subject_id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script>alert("Student Deleted Successfully")</script>';
        echo '<script>
                            window.location.href = "../view_students.php"
                            </script>';
    } else {
        echo '<script>alert("Student Not Deleted. Please try again")</script>';
        echo '<script>
                            window.location.href = "../view_students.php"
                            </script>';
    }
}
