<?php
include 'db.php';
if (isset($_POST['submit'])) {

    $subject_id = $_GET['id'];
    $student_id = $_POST['student_id'];

    $student_id = strtoupper($student_id);
    // echo $student_id;

    $query = "SELECT * FROM `students` where students_id='$student_id'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == '0') {
        echo '<script>alert("Student With This ID Does Not Exist")</script>';
        echo '<script>
                         window.location.href = "../view_students.php"
                         </script>';
    } else {

        $sql = "SELECT * FROM `subjects` where id=$subject_id";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $students_id = $row['students_id'];
            if (empty($students_id)) {
                $array = array();
                array_push($array, $student_id);
                $insert_array = base64_encode(serialize($array));

                $query = "UPDATE subjects SET students_id = '$insert_array' WHERE id=$subject_id";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    echo '<script>alert("New Student Added Successfully")</script>';
                    echo '<script>
                             window.location.href = "../view_students.php"
                             </script>';
                } else {
                    echo mysqli_error($connection);
                }
            } else {
                $new_students_array = unserialize(base64_decode($students_id));
                if (in_array($student_id, $new_students_array)) {
                    echo '<script>alert("Student already added")</script>';
                    echo '<script>
                         window.location.href = "../view_students.php"
                         </script>';
                } else {
                    $new_students_array = unserialize(base64_decode($students_id));
                    array_push($new_students_array, $student_id);
                    $insert_new_array = base64_encode(serialize($new_students_array));
                    $updateQuery = "UPDATE subjects SET students_id = '$insert_new_array' WHERE id=$subject_id";

                    $updateResult = mysqli_query($connection, $updateQuery);
                    if ($updateResult) {
                        echo '<script>alert("New Student Added Successfully.")</script>';
                        echo '<script>
                         window.location.href = "../view_students.php"
                         </script>';
                    } else {
                        echo mysqli_error($connection);
                    }
                }
            }
        }
    }
}
