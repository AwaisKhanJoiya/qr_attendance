<!DOCTYPE html>
<html lang="en">
<?php
include('includes/header.php') ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/navbar.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <?php
                include 'includes/db.php';
                if (isset($_GET['id'])) {
                    $student_id = $_GET['id'];
                    $subject_code = $_GET['subject_code'];
                    $sql = "SELECT * FROM subjects WHERE subject_code='$subject_code'";
                    $result = mysqli_query($connection, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $teacherId = $_SESSION['teacher_id'];
                            $teacher_id = $row['teacher_id'];
                            if ($teacher_id === $teacherId) {

                                $query = "SELECT * FROM students WHERE students_id='$student_id'";
                                $result = mysqli_query($connection, $query);
                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $id = $row['students_id'];
                                    $name = $row['first_name'] . ' ' . $row['last_name'];
                                    date_default_timezone_set("Asia/Kolkata");
                                    $date = date("Y-m-d");
                                    $time = date("H:i:s");
                ?>
                                    <form action="includes/insert_attendance.php" method="POST">
                                        <label for="id">Student Id</label>
                                        <input type="text" name="id" readonly="" value="<?php echo $id ?>" class="form-control">
                                        <label for="name" class="mt">Student Name</label>
                                        <input type="text" name="name" readonly="" value="<?php echo $name ?>" class="form-control">
                                        <label for="date" class="mt">Date</label>
                                        <input type="text" name="date" readonly="" value="<?php echo $date ?>" class="form-control">
                                        <label for="time" class="mt">Time</label>
                                        <input type="text" name="time" readonly="" value="<?php echo $time ?>" class="form-control">
                                        <label for="subject_code" class="mt">Subject Code</label>
                                        <input type="text" name="subject_code" readonly="" value="<?php echo $subject_code ?>" class="form-control">

                                        </select>

                                        <input type="submit" name="submit" value="Mark as Present" class="btn btn-primary mt">
                                    </form>
            </div>
<?php
                                }
                            } else {
                                echo '<script>alert("This is not your subject. Please scan again with right QR Code of your subject")</script>';
                                echo '<script>
                                    window.location.href = "index.php"
                                    </script>';
                            }
                        }
                    }
                }
?>
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