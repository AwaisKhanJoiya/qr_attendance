<?php
include('db.php');
$id = $_GET['id'];
$sql = "DELETE FROM subjects WHERE id=$id";
$result = mysqli_query($connection, $sql);
if ($result) {
    echo '<script>alert("Subject Deleted Successfully")</script>';
    echo '<script>window.location.href = "../view_subjects.php"</script>';
} else {
    echo mysqli_error($connection);
}
