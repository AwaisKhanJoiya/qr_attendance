<html>

<head>
  <title>Login</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/login.css" />

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>

<body>
  <div align="center" style="color: white" class="heading">
    <img class="logo" src="https://img6.androidappsapk.co/hn2ZHiOUthkCM8dHVnBNOMdvNx4y92QqTj2n7YmxLI8uZJfbYNRevw8dtMim-wYpgw=s300" />Attendance Management System
  </div>

  <div class="col-md-6">
    <img align="center" class="img" src="https://www.timelabs.in/images/moduleBox/ATTENDANCE.png" />
  </div>

  <div class="col-md-5">
    <form action="includes/login_process.php" method="POST">
      <p align="center" style="color: white; font-family: 'Roboto Slab', serif; font-size: 30">
        <strong>Account Login</strong>
      </p>
      <br /><br />
      <input type="email" placeholder="Email" class="input" name="email" required /><br /><br />
      <input type="password" placeholder="Password" class="input" name="pass" required /><br /><br />
      <div style="text-align: center;">
        <label for="select" style="color: white;">Who are you?</label>
        <select name="select" class="form-select" aria-label="Default select example">
          <option value="teacher">Teacher</option>
          <option value="student">Student</option>
        </select>
      </div>
      <p align="center" style="color: grey">
        Forgot <strong><a style="color: grey" href="username.php"> Username </a>Or <a style="color: grey" href="reset_password.php"> Password</a>?</strong>
      </p>
      <br />
      <input type="submit" name="submit" value="Login" class="btn btn-outline-success" />
    </form>

    <p align="center" style="color: grey">Don't have an account</p>

    <p align="center" style="color: white">SIGN UP NOW</p>

    <div class="col-md-6">
      <a href="regi.php">
        <p align="right" class="bottom">Tearcher</p>
      </a>
    </div>
    <div class="col-md-6">
      <a href="regi_student.php">
        <p class="bottom">Student</p>
      </a>
    </div>
  </div>


</body>

</html>