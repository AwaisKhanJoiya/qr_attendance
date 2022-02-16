<!DOCTYPE html>
<html lang="en">
<?php
include('includes/header.php');
include('includes/db.php');
?>



<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/navbar.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="select" style="text-align: center;">
                    <form action="view_attendance.php" method="POST">
                        <label for="select" class="mt">Select Your Subject Code:</label>
                        <select name="subject_code" class="form-select bg-primary" style="padding: 4px; border-radius: 3px; cursor: pointer;" aria-label="Default select example" required>
                            <option value="none">Please Select an Option</option>
                            <option disabled="disabled"></option>
                            <?php
                            if (isset($_SESSION['teacher_id'])) {
                                $teacher_id = $_SESSION['teacher_id'];
                                $query = "SELECT * FROM subjects WHERE teacher_id=$teacher_id";
                                $result = mysqli_query($connection, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject_code = $row['subject_code'];



                                        echo '
                                     <option value="' . $subject_code . '">' . $subject_code . '</option>
        
                                        ';
                                    }
                                }
                            } else {
                                $query = "SELECT * FROM subjects";
                                $result = mysqli_query($connection, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject_code = $row['subject_code'];

                                        echo '
                                     <option value="' . $subject_code . '">' . $subject_code . '</option>
        
                                        ';
                                    }
                                }
                            }
                            ?>
                        </select>
                        <label for="date">Please Select your Date</label>
                        <input type="date" name="date">
                        <input type="submit" class="btn btn-success" name="submit" value="Search" style="margin-left: 50px;">
                    </form>
                </div>
                <div class="table mt">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if (isset($_POST['submit'])) {
                                $code = $_POST['subject_code'];
                                $checkDate = $_POST['date'];
                                $sql = "SELECT * FROM attendance WHERE subject_code='$code'";


                                $sqlResult = mysqli_query($connection, $sql);
                                if ($sqlResult) {
                                    if (mysqli_num_rows($sqlResult) == '0') {
                                        echo '<h1>No Result found</h1>;';
                                    }
                                    $sno = 0;
                                    while ($attendance_row = mysqli_fetch_assoc($sqlResult)) {
                                        if ($_SESSION['logged_as'] == 'student') {
                                            if ($attendance_row['student_id'] == $_SESSION['student_id']) {
                                                $student_id = $attendance_row['student_id'];
                                                $student_name = $attendance_row['student_name'];
                                                $date = $attendance_row['date'];
                                                $time = $attendance_row['time'];
                                                $status = $attendance_row['status'];
                                                $sno++;
                                                if (isset($checkDate)) {
                                                    if ($checkDate == $date) {


                            ?>
                                                        <tr>
                                                            <td><?php echo $sno ?></td>
                                                            <td><?php echo $student_id ?></td>
                                                            <td><?php echo $student_name ?></td>
                                                            <td><?php echo $date ?></td>
                                                            <td><?php echo $time ?></td>
                                                            <td><?php echo $status ?></td>

                                                        </tr>
                                                    <?php   } else {
                                                        '<h1>No Result Found</h1>';
                                                    }
                                                } else {
                                                    echo '<h1>Plese Select the Date</h1>';
                                                }
                                            } else {
                                                echo '<h1>Result not Found</h1>';
                                            }
                                        } else {
                                            $student_id = $attendance_row['student_id'];
                                            $student_name = $attendance_row['student_name'];
                                            $date = $attendance_row['date'];
                                            $time = $attendance_row['time'];
                                            $status = $attendance_row['status'];
                                            $sno++;
                                            if (isset($checkDate)) {
                                                if ($checkDate == $date) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sno ?></td>
                                                        <td><?php echo $student_id ?></td>
                                                        <td><?php echo $student_name ?></td>
                                                        <td><?php echo $date ?></td>
                                                        <td><?php echo $time ?></td>
                                                        <td><?php echo $status ?></td>

                                                    </tr>
                            <?php
                                                } else {
                                                    '<h1>No Result Found</h1>';
                                                }
                                            } else {
                                                echo '<h1>Plese Select the Date</h1>';
                                            }
                                        }
                                    }
                                }
                            } ?>

                        </tbody>
                    </table>
                </div>
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