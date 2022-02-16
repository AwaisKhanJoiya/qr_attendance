<html>

<head>
  <title>Sign Up</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/reg_student.css" />

</head>

<body>
  <div align="center" style="color: white" class="heading">
    <img class="logo" src="https://img6.androidappsapk.co/hn2ZHiOUthkCM8dHVnBNOMdvNx4y92QqTj2n7YmxLI8uZJfbYNRevw8dtMim-wYpgw=s300" />Attendance Management System
  </div>

  <div class="col-md-6">
    <img align="center" class="img" src="https://www.timelabs.in/images/moduleBox/ATTENDANCE.png" />
  </div>

  <div class="col-md-5">
    <p align="center" style="color: white; font-family: 'Roboto Slab', serif; font-size: 30">
      <strong>Student Account Sign-up</strong>
    </p>
    <form action="includes/student_reg_process.php" method="POST">
      <div class="row">
        <div class="col-md-6">
          <p>First Name</p>
          <input class="int_txt" type="text" name="f_name" required pattern="[A-Za-z]{}" /><br /><br />
          <p>Email</p>
          <input class="int_txt" type="email" name="email" required><br /><br />
          <p>Password</p>
          <input class="int_txt" type="password" name="pass" required /><br /><br />
          <p>Enter Your ID</p>
          <input class="int_txt" type="text" name="student_id" placeholder="e.g: AM.EN.U4CSE18226" required /><br />
        </div>
        <div class="col-md-6">
          <p>Last Name</p>
          <input class="int_txt" type="text" name="l_name" required pattern="[A-Za-z]{}" /><br /><br />
          <p>Your Phone</p>
          <input class="int_txt" type="text" name="phone" pattern="[0-9]{10}" title="Enter 10 digits Phone Number" required /><br /><br />
          <p>Conform Password</p>
          <input class="int_txt" type="password" name="c_pass" required /><br /><br />
          <p>Parent Contact</p>
          <input class="int_txt" type="text" name="parent_contact" pattern="[0-9]{10}" title="Please Enter 10 digits Phone Number" required />
        </div>
      </div>
      <input type="submit" name="submit" value="Register" class="btn btn-outline-success" style="margin-top: 10px;" />
    </form>
  </div>
</body>

</html>