<?php include('includes/header.php') ?>

<?php include('includes/db.php') ?>



<body>

    <div id="wrapper">

        <?php include('includes/navbar.php') ?>
        <?php
        $id = $_SESSION['teacher_id'];
        $sql = "SELECT * FROM `subjects` where teacher_id='$id'";
        $result = mysqli_query($connection, $sql);

        ?>
        <div id="page-wrapper">
            <h2 class="text-center">Your Items</h2>

            <div class="container-fluid">


                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Branch</th>
                            <th>Duration</th>
                            <th>Semester</th>
                            <th>Edit</th>
                        </tr>
                    </thead>

                    <?php
                    if (mysqli_num_rows($result) == '0') {
                        echo '<h1>No Subject Added</h1>;';
                    } else {

                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $subject_id = $row['id'];
                            $subject_code = $row['subject_code'];
                            $subject_name = $row['subject_name'];
                            $branch = $row['branch'];
                            $start_year = $row['start_year'];
                            $end_year = $row['end_year'];
                            $semester = $row['semester'];
                            $sno++;
                            $order_id = $row['id'];
                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $sno ?></td>
                                    <td><?php echo $subject_code ?></td>
                                    <td><?php echo $subject_name ?></td>
                                    <td><?php echo $branch ?></td>
                                    <td><?php echo "$start_year - $end_year" ?></td>
                                    <td><?php echo $semester ?></td>
                                    <td>
                                        <a href="view_students.php?id=<?php echo $subject_id ?>">View Students</a>
                                        <a href="includes/delete.php?id=<?php echo $subject_id ?>" style="margin-left: 10px;">Delete</a>
                                    </td>

                                </tr>
                            </tbody>
            </div>
    <?php     }
                    }
    ?>

    </table>

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