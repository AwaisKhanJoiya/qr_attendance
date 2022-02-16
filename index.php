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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the Dashboard
                            <?php if (isset($_SESSION['loggedin'])) {
                                if (isset($_SESSION['name'])) {
                                    echo '
                                    <small>' . strtoupper($_SESSION['name']) . '</small>';
                                    if ($_SESSION['logged_as'] == 'student') {
                                        echo '
                                        <small>Your ID is:  ' . $_SESSION['student_id'] . '</small>';
                                    }
                                }
                            } else {
                                echo '
                                <small>Please Log in</small>';
                            } ?>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

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