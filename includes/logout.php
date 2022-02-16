<?php
session_start();
if ($_SESSION['logged_as'] == 'student') {
    include('../phpqrcode/qrlib.php');
    $id = $_SESSION['student_id'];
    $filename = $id . '.png';
    $filepath = '../img/' . $filename;
    if (file_exists($filepath)) {
        unlink($filepath);
    }
}
session_destroy();
echo '<script>alert("You have Successfully logged out")</script>';
echo '<script>
window.location.href = "../index.php"
</script>';
