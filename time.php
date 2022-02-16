<?php
$date = date("m-d-Y");
// echo $date;
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    echo $date;
}
?>
<form action="time.php" method="POST">
    <input type="date" name="date">
    <input type="submit">
</form>