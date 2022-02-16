<?php
include 'includes/db.php';
if (isset($_POST['submit'])) {
    $phone = $_POST['phone'];
    $query = "SELECT * FROM teachers WHERE phone_number='$phone'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        if (mysqli_num_rows($result) == '0') {
            $sql = "SELECT * FROM students WHERE phone_number='$phone'";
            $newResult = mysqli_query($connection, $sql);
            if ($newResult) {
                if (mysqli_num_rows($newResult) == '0') {
                    echo '<script>alert("Phone Number Not Found Please Try again")</script>';
                    echo '<script>window.location.href = "username.php"</script>';
                } else {
                    $row = mysqli_fetch_assoc($newResult);
                    $email = $row['email'];
                }
            }
        } else {
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
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
            height: 400px;
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
            <h1>Forgot Username</h1>
            <form action="username.php" method="POST">
                <div class="input">
                    <label for="phone">Please Enter Your Phone Number</label>
                    <input type="text" name="phone" pattern="[0-9]{10}" required title="Please Enter Correct Phone Number">
                    <input type="submit" class="btn btn-success" name="submit">
                </div>
            </form>
            <h2><b>Your Username Will be displayed here </b></h2>
            <?php
            if (isset($email)) {
                echo '
                    <p>' . $email . '</p>
                    
                    ';
            }
            ?>
        </div>
    </div>
</body>

</html>