<?php
session_start();
include "connection.php";
$did = $_SESSION['id'];
$vrId = $_GET['id'];
$staus = $_GET['status'];
$url = $_GET['url'];
#$empid = $_GET['empid'];
#$pp_id = $_GET['pp_id'];
if ($staus == "Rejected") {
    $qry = "SELECT * FROM `drivers`d, `driver_points` dp WHERE d.`driv_id` <> '$did' AND d.`driv_id`=dp.`driv_id`  ORDER BY  dp.`rate`";
    $res = mysqli_query($conn, $qry);
    $row = mysqli_fetch_array($res);
    $new_did = $row['driv_id'];
    $qryUp = "UPDATE `vehicle_request` SET `driv_id`='$new_did' where vr_id='$vrId'";
} else {

    $qryUp = "UPDATE `vehicle_request` SET `status`='$staus' WHERE `vr_id`='$vrId'";
}
if (mysqli_query($conn, $qryUp) == TRUE) {
    echo "<script>alert('Ride Status Updated'); window.location='$url'</script>";
} else {
    echo "<script>alert('Error Occured');'</script>";
}
