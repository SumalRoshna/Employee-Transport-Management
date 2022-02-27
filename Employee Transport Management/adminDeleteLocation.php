<?php
include "connection.php";
$locid = $_GET['locid'];
$qry = "DELETE FROM `pickup_points` WHERE `pp_id`='$locid'";
if (mysqli_query($conn, $qry) == TRUE) {
    echo "<script>
        alert('Location Deleted...')
        window.location = 'adminAddLocations.php'
    </script>";
}
