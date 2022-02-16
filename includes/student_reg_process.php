<?php
include('db.php');
if (isset($_POST['submit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $parent_contact = $_POST['parent_contact'];
    $pass = $_POST['pass'];
    $student_id = $_POST['student_id'];
    $c_pass = $_POST['c_pass'];

    if ($phone == $parent_contact) {

        echo '<script>alert("Your Parent Mobile Number Cannot be same as Your Mobile Number ")</script>';
        echo '<script>
            window.location.href = "../regi_student.php"
            </script>';
    } else {
        $query = "SELECT * FROM students WHERE students_id='$student_id'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            if (mysqli_num_rows($result) == '0') {




                if ($pass === $c_pass) {

                    $f_name = mysqli_real_escape_string($connection, $f_name);
                    $l_name = mysqli_real_escape_string($connection, $l_name);
                    $email = mysqli_real_escape_string($connection, $email);
                    $student_id = mysqli_real_escape_string($connection, $student_id);
                    $upperCase = strtoupper($student_id);

                    $hash = password_hash($pass, PASSWORD_DEFAULT);

                    $query = "INSERT INTO `students` (`students_id`, `first_name`, `last_name`, `email`, `phone_number`, `parent_contact`, `password`)
         VALUES ('$upperCase','$f_name', '$l_name', '$email', $phone, $parent_contact, '$hash')";

                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        echo '<script>alert("Account has successfully created. Please login now")</script>';
                        echo '<script>
                window.location.href = "../login.php"
                </script>';
                    } else {
                        echo '<script><alert>We are facing some error please try again</alert></script>';
                    }
                } else {
                    echo '<script>alert("Passwords do not match. Please try again")</script>';
                    echo '<script>
            window.location.href = "../regi_student.php"
            </script>';
                }
            } else {
                echo '<script>alert("Student with this id already exists")</script>';
                echo '<script>
            window.location.href = "../regi_student.php"
            </script>';
            }
        }
    }
}
