<?php include('includes/header.php') ?>

<body>

    <div id="wrapper">

        <?php include('includes/navbar.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid form-signin w-100">
                <h1 class="text-center">Add Subject</h1>
                <form action="includes/add_subject_process.php" method="POST" enctype="multipart/form-data">
                    <input type="text" style="margin-bottom: 30px;" class="form-control margin" name="subject_code" placeholder="Enter Subject Code" pattern="[0-9A-Z]{}" required>
                    <input type="text" style="margin-bottom: 30px;" class="form-control margin" name="subject_name" placeholder="Enter Subject Name" required>
                    <select name="branch" class="form-select bg-primary" style="padding: 4px; border-radius: 3px; cursor: pointer;" aria-label="Default select example" required>
                        <option value="none" selected>Please Select The Branch Code</option>
                        <option disabled="disabled"></option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                        <option value="MECH">MECH</option>
                    </select>
                    <div class="mt" style="margin-bottom: 30px; display: flex;">
                        <input type="text" class="form-control margin" name="start_year" placeholder="e.g: 2021" pattern="[0-9]{4}" required>
                        <p style="font-size: 22px; margin: 0 20px">To</p>
                        <input type="text" class="form-control margin" name="end_year" placeholder="e.g: 2023" pattern="[0-9]{4}" required>

                    </div>
                    <select name="semester" class="form-select bg-success" style="padding: 4px; border-radius: 3px; cursor: pointer; display: block;" aria-label="Default select example" required>
                        <option value="none" selected>Please Select The Samester</option>
                        <option disabled="disabled"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <input type="submit" name="submit" class="btn btn-primary margin mt">
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