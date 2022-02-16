<?php
session_start();


include('../phpqrcode/qrlib.php');
$id = $_SESSION['student_id'];
if (isset($_GET['subject_code'])) {
    $subject_code = $_GET['subject_code'];
}
$filename = $id . '.png';
$filepath = '../img/' . $filename;
if (file_exists($filepath)) {
    unlink($filepath);
}
$path = '../img/';
$_SESSION['created'] = true;

QRcode::png($id . '&subject_code=' . $subject_code, $path . '' . $id . '.png');

header('location: ../generate_qr.php');
