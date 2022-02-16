<?php
include('db.php');
if (isset($_POST['submit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $c_pass = $_POST['c_pass'];


    if ($pass === $c_pass) {

        $f_name = mysqli_real_escape_string($connection, $f_name);
        $l_name = mysqli_real_escape_string($connection, $l_name);
        $email = mysqli_real_escape_string($connection, $email);
        $phone = mysqli_real_escape_string($connection, $phone);

        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $query = "INSERT INTO `teachers` (`first_name`, `last_name`, `email`, `phone_number`, `password`)
         VALUES ('$f_name', '$l_name', '$email', '$phone', '$hash')";

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
            window.location.href = "../regi.php"
            </script>';
    }
}
