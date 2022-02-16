<?php
include 'includes/db.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $c_pass = $_POST['c_pass'];
    $query = "SELECT * FROM teachers WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        if (mysqli_num_rows($result) == '0') {
            $sql = "SELECT * FROM students WHERE email='$email'";
            $newResult = mysqli_query($connection, $sql);
            if ($newResult) {
                if (mysqli_num_rows($newResult) == '0') {
                    echo '<script>alert("Email Address Not Found Please Try again")</script>';
                    echo '<script>window.location.href = "reset_password.php"</script>';
                } else {
                    if ($pass === $c_pass) {
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $query = "UPDATE students SET `password`='$hash' WHERE email='$email'";
                        $result = mysqli_query($connection, $query);
                        if ($result) {
                            echo '<script>alert("Password has been reset")</script>';
                            echo '<script>window.location.href = "login.php"</script>';
                        }
                    } else {
                        echo '<script>alert("Passwords are not same")</script>';
                        echo '<script>window.location.href = "reset_password.php"</script>';
                    }
                }
            }
        } else {
            if ($pass === $c_pass) {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $query = "UPDATE teachers SET `password`='$hash' WHERE email='$email'";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    echo '<script>alert("Password has been reset")</script>';
                    echo '<script>window.location.href = "login.php"</script>';
                }
            } else {
                echo '<script>alert("Passwords are not same")</script>';
                echo '<script>window.location.href = "reset_password.php"</script>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <title>Forgot Username</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .inner {
            background-color: grey;
            width: 400px;
            height: auto;
            border-radius: 15px;
        }

        h1,
        h2 {
            text-align: center;
            margin: 10px;
            color: white;
        }

        h2 {
            font-size: 20px;
        }

        p {
            color: white;
            text-align: center;
            font-size: 20px;
            margin-top: 15px;
        }

        .input {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 30px;
        }

        label {
            font-size: 20px;
            margin-top: 10px;
        }

        input {
            margin-top: 10px;
            border-radius: 10px;
            padding: 7px;
            font-size: 20px;
            width: 100%;
            border: none;
        }

        .btn {
            cursor: pointer;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="inner">
            <h1>Reset Your Password</h1>
            <form action="reset_password.php" method="POST">
                <div class="input">
                    <label for="email">Please Enter Your Email Addres</label>
                    <input type="email" name="email" required title="Please Enter Correct Email">
                    <label for="pass">Enter you new Password</label>
                    <input type="password" name="pass" required>
                    <label for="c_pass">Retype Your Password</label>
                    <input type="password" name="c_pass" required>
                    <input type="submit" class="btn btn-success" name="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>