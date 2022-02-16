<?php include('includes/header.php') ?>

<?php include('includes/db.php') ?>



<body>

    <div id="wrapper">

        <?php include('includes/navbar.php') ?>
        <?php
        if (isset($_GET['id'])) {
            $_SESSION['subject_id'] = $_GET['id'];
        }
        $subject_id = $_SESSION['subject_id'];
        $sql = "SELECT * FROM `subjects` where id=$subject_id";
        $result = mysqli_query($connection, $sql);
        if (!$result) {
            echo mysqli_error($connection);
        }

        ?>
        <div id="page-wrapper">
            <h2 class="text-center">Enrolled Students</h2>

            <div class="container-fluid">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student id</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Parent Contact</th>
                            <th class="text-center">Edit</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php


                        $row = mysqli_fetch_assoc($result);
                        $subject_code = $row['subject_code'];
                        $students_id = $row['students_id'];
                        if (empty($students_id)) {
                            echo '<h1>No Student Added</h1>';
                        } else {
                            $students_array = unserialize(base64_decode($students_id));


                            foreach ($students_array as $id) {
                                $query = "SELECT * FROM students WHERE students_id='$id'";
                                $result = mysqli_query($connection, $query);
                                $row = mysqli_fetch_assoc($result);
                                $student_id = $row['students_id'];
                                $student_name = $row['first_name'] . ' ' . $row['last_name'];
                                $email = $row['email'];
                                $phone_number = $row['phone_number'];
                                $parent_contact = $row['parent_contact'];

                        ?>
                                <tr>
                                    <td><?php echo $student_id ?></td>
                                    <td><?php echo $student_name ?></td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $phone_number ?></td>
                                    <td><?php echo $parent_contact ?></td>

                                    <td>
                                        <a href="includes/delete_student.php?student_id=<?php echo $student_id ?>&subject_id=<?php echo $subject_id ?>" style="margin-left: 10px;">Delete</a>

                                        <?php

                                        $sql = "SELECT * FROM attendance WHERE student_id='$student_id'";
                                        $result = mysqli_query($connection, $sql);

                                        if ($result) {
                                            if (mysqli_num_rows($result) == '0') {
                                                echo '

                                                <a href="includes/absent.php?student_id=' . $student_id . '&student_name=' . $student_name . '&subject_code=' . $subject_code . '" style="margin-left: 10px;">Absent</a>
                                            </td>
                                            ';
                                            } else {
                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    date_default_timezone_set("Asia/Kolkata");
                                                    $date = $row['date'];
                                                    $time = $row['time'];
                                                    $explodeTime = explode(':', $time);
                                                    $hour = $explodeTime[0] + 1;

                                                    $time = $hour . ':' . $explodeTime[1] . ':' . $explodeTime[2];
                                                    $hourNow = date("H:i:s");
                                                    if ($date == date("Y-m-d")) {
                                                        $students_id = $row['student_id'];
                                                        if ($id == $student_id) {
                                                            if ($hourNow >= $time) {
                                                                $sub_code = $row['subject_code'];
                                                                if ($sub_code == $subject_code) {

                                                                    echo '
                                                        <a href="includes/absent.php?student_id=' . $student_id . '&student_name=' . $student_name . '&subject_code=' . $subject_code . '" style="margin-left: 10px;">Absent</a>
                                                    </td>
                                                    ';
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        echo '
                                                            <a href="includes/absent.php?student_id=' . $student_id . '&student_name=' . $student_name . '&subject_code=' . $subject_code . '" style="margin-left: 10px;">Absent</a>
                                                        </td>
                                                        ';
                                                    }
                                                }
                                            }
                                        }
                                        ?>

                                </tr>



                        <?php }
                        } ?>
                    </tbody>
                </table>
                <form action="includes/add_student.php?id=<?php echo $subject_id ?>" method="POST">
                    <input type="text" style="margin-bottom: 30px;" class="form-control margin" name="student_id" placeholder="Enter Student id" pattern="[0-9]{}" required>
                    <input type="submit" name="submit" value="Add Student" class="btn btn-primary margin">
                </form>
            </div>

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>