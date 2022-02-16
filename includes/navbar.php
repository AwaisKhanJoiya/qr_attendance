<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Attendance System</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <?php if (isset($_SESSION['loggedin'])) {
            if ($_SESSION['loggedin'] === true) {
                echo '
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . strtoupper($_SESSION['name']) . '</a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="includes/logout.php">Logout</a>
                    </li>
                </ul>
            </li>
                ';
            }
        } else {
            echo '
            <li>
            <a href="login.php">Log In</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register<b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
                <li>
                    <a href="regi.php">Teacher</a>
                </li>
                <li>
                    <a href="regi_student.php">Student</a>
                </li>
            </ul>
        </li>
            ';
        }
        ?>

    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <?php
            if (isset($_SESSION['loggedin'])) {
                if ($_SESSION['logged_as'] == 'teacher') {
                    echo '
                        <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-folder-o" aria-hidden="true"></i> Subjects <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="view_subjects.php">My Subjects</a>
                            </li>
                            <li>
                                <a href="add_subject.php">Add Subject</a>
                            </li>
                        </ul>
                    </li>
                        ';
                } else {
                    echo '
                    <li>
                    <a href="enrolled_subjects.php"><i class="fa fa-fw fa-desktop"></i> Enrolled Subjects</a>
                    </li>
                    
                    ';
                }
            } else {
                echo '
                     
                        <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-folder-o" aria-hidden="true"></i> Subjects <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">My Subjects</a>
                            </li>
                            <li>
                                <a href="#">Add Subject</a>
                            </li>
                        </ul>
                        </li>
                    ';
            }
            ?>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#qr"><i class="fa fa-qrcode" aria-hidden="true"></i> QR Code <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="qr" class="collapse">
                    <?php
                    if (isset($_SESSION['loggedin'])) {
                        if ($_SESSION['logged_as'] == 'teacher') {
                            echo '<li>
                                    <a href="scan_qr.php">Scan QR Code</a>
                                 </li>';
                        }
                        if ($_SESSION['logged_as'] == 'student') {
                            echo '<li>
                                   <a href="enrolled_subjects.php">Generate QR Code</a>
                                 </li>';
                        }
                    } else {
                        echo '<li>
                                <a href="#">Scan QR Code</a>
                             </li>
                             <li>
                                 <a href="#">Generate QR Code</a>
                             </li>';
                    } ?>


                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#attendance"><i class="fa fa-flag-checkered" aria-hidden="true"></i> Attendance Report <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="attendance" class="collapse">
                    <?php
                    if (isset($_SESSION['loggedin'])) {
                        if ($_SESSION['logged_as'] == 'student') {
                            echo '<li>
                                    <a href="view_attendance.php">View Attendance</a>
                                  </li>';
                        } else {
                            echo '<li>
                            <a href="view_attendance.php">View Attendance</a>
                          </li>
                          ';
                        }
                    } else {
                        echo '<li>
                        <a href="#">View Attendance</a>
                      </li>
                      ';
                    }
                    ?>


                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>