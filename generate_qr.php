<!DOCTYPE html>
<html lang="en">
<?php
include('includes/header.php');
if (isset($_GET['subject_code'])) {
    $subject_code = $_GET['subject_code'];
}
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/navbar.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid d-flex" style="flex-direction: column;">
                <div class="qrframe" style="border: 2px solid black; width: 210px; height: 210px;">
                    <img src="img/<?php echo $_SESSION['student_id'] ?>.png" alt="Your QR Code will be there" class="img">
                </div>
                <a href="includes/qr_generator.php?subject_code=<?php echo $subject_code ?>" class="btn btn-primary mt">Generate QR Code</a>
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