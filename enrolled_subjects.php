<!DOCTYPE html>
<html lang="en">
<?php
include 'includes/db.php';
include('includes/header.php'); ?>


<?php

$id = $_SESSION['student_id'];
$filename = $id . '.png';
$filepath = 'img/' . $filename;
if (file_exists($filepath)) {
    unlink($filepath);
}
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/navbar.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <h1 class="text-center">Enrolled Subjects</h1>
                <table class="table table-bordered mt">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Branch</th>
                            <th>Semester</th>
                            <th>Teacher Name</th>
                            <th>Generate QR</th>
                        </tr>
                    </thead>


                    <tbody>

                        <?php
                        $query = "SELECT * FROM subjects";
                        $result = mysqli_query($connection, $query);
                        if ($result) {
                            $sno = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $student_id = $row['students_id'];
                                if (!empty($student_id)) {
                                    $array = unserialize(base64_decode($student_id));


                                    $id = $_SESSION['student_id'];
                                    if (in_array($id, $array)) {
                                        $subject_id = $row['id'];
                                        $subject_code = $row['subject_code'];
                                        $subject_name = $row['subject_name'];
                                        $branch = $row['branch'];
                                        $semester = $row['semester'];
                                        $teacher_name = $row['teacher_name'];
                                        $sno++;

                        ?>

                                        <tr>
                                            <td><?php echo $sno ?></td>
                                            <td><?php echo $subject_code ?></td>
                                            <td><?php echo $subject_name ?></td>
                                            <td><?php echo $branch ?></td>
                                            <td><?php echo $semester ?></td>
                                            <td><?php echo $teacher_name ?></td>
                                            <td>
                                                <a href="generate_qr.php?subject_code=<?php echo $subject_code ?>">Generate Now</a>
                                            </td>

                                        </tr>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
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