<!DOCTYPE html>
<html lang="en">
<?php
include('includes/header.php') ?>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <?php include('includes/navbar.php') ?>

    <div id="page-wrapper">

      <div class="container-fluid" style="display:flex; align-items: center">

        <video id="preview" width="400px" height="400px"></video>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <script type="text/javascript">
    let scanner = new Instascan.Scanner({
      video: document.getElementById('preview')
    });
    scanner.addListener('scan', function(content) {
      window.location.href = "qr_result.php?id=" + content;
    });
    Instascan.Camera.getCameras().then(function(cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function(e) {
      console.error(e);
    });
  </script>
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

</body>

</html>