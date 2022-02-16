<?php
include 'db.php';
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $student_name = $_GET['student_name'];
    date_default_timezone_set("Asia/Kolkata");
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $subject_code = $_GET['subject_code'];

    $query = "INSERT INTO `attendance` (`student_id`, `student_name`, `date`, `time`, `status`, `subject_code`)
     VALUES ('$student_id', '$student_name', '$date','$time', 'Absent', '$subject_code')";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $sql = "SELECT * FROM students WHERE students_id='$student_id'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $contact = $row['parent_contact'];
            $msg = 'Your student ' . $student_name . ' is absent for ' . $subject_code . ' on ' . $date . ' at ' . $time . '';

            $fields = array(
                "sender_id" => "TXTIND",
                "message" => "$msg",
                "route" => "v3",
                "numbers" => "$contact",
            );

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($fields),
                CURLOPT_HTTPHEADER => array(
                    "authorization: 6yQlGhgYpnfCBRHzEOM8SAomTFtbrWqc1DLPXksZuKdv52UJea5EyC8OSbfZevNxa1MX7VpBPYsKHDun",
                    "accept: */*",
                    "cache-control: no-cache",
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo '<script>alert("Attendance Successfully Submitted")</script>';
                echo '<script>
                    window.location.href = "../index.php"
                    </script>';
            }
        } else {
            echo '<script>alert("Attendance did not Submitted. Please try again")</script>';
            echo '<script>
                    window.location.href = "../index.php"
                    </script>';
        }
    }
}
