<?php

include "connection.php";
$id = $_GET['id'];
$qry = "DELETE FROM `driver_points` WHERE `dp_id`='$id'";
if (mysqli_query($conn, $qry) == TRUE) {
    echo "<script>alert('Pickup point deleted...');window.location='addPickUppoints.php'</script> ";
} else {
    echo "<script>alert('Error Occured...');window.location='addPickUppoints.php'</script> ";
}
