<?php
include "connection.php";
$logid = $_GET['id'];
$status = $_GET['status'];
$url = $_GET['url'];
$qry = "UPDATE `login` SET `status`='$status' WHERE `log_id`='$logid'";
if (mysqli_query($conn, $qry) == TRUE) {
    echo "<script>
    alert('Status Updated...');
    window.location = '$url'
    </script>";
} else {
    echo "<script>
    alert('Error Occured...');
    window.location = '$url'
    </script>";
}
