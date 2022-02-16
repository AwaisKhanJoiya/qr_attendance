<?php
session_start();
include('db.php');
if (isset($_POST['submit'])) {
    $select = $_POST['select'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if ($select === "teacher") {
        $query = "SELECT * FROM `teachers` where email='$email'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == '0') {
            echo '<script>alert("Account does not exist. Please check your email and try again")</script>';
            echo '<script>
                    window.location.href = "../login.php"
                    </script>';
        }
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $hash = $row['password'];
                if (password_verify($pass, $hash)) {
                    $name = $row['first_name'] . ' ' . $row['last_name'];
                    $_SESSION['loggedin'] = true;
                    $_SESSION['logged_as'] = 'teacher';
                    $_SESSION['name'] = $name;
                    $_SESSION['teacher_id'] = $row['id'];

                    echo '<script>
                    window.location.href = "../index.php"
                    </script>';
                } else {
                    echo '<script>alert("Password is incorrect. Please try again")</script>';
                    echo '<script>
                    window.location.href = "../login.php"
                    </script>';
                }
            }
        }
    }

    if ($select === "student") {
        $query = "SELECT * FROM `students` where email='$email'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == '0') {
            echo '<script>alert("Account does not exist. Please check your email and try again")</script>';
            echo '<script>
                    window.location.href = "../login.php"
                    </script>';
        }
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $hash = $row['password'];
                if (password_verify($pass, $hash)) {
                    $name = $row['first_name'] . ' ' . $row['last_name'];
                    $_SESSION['loggedin'] = true;
                    $_SESSION['logged_as'] = 'student';
                    $_SESSION['name'] = $name;
                    $_SESSION['student_id'] = $row['students_id'];

                    echo '<script>
                    window.location.href = "../index.php"
                    </script>';
                } else {
                    echo '<script>alert("Password is incorrect. Please try again")</script>';
                    echo '<script>
                    window.location.href = "../login.php"
                    </script>';
                }
            }
        } else {
            echo 'error ' . mysqli_error($connection) . '';
        }
    }
}
