<?php
session_start();
include "driverHeader.php";
include "connection.php";
$did = $_SESSION['id'];
$qry = "SELECT * FROM `vehicle_request` vr, `employees` e, `driver_points` dp WHERE vr.`driv_id`='$did' AND vr.`emp_id`=e.`emp_id` AND vr.dp_id=dp.`dp_id` AND vr.`status`='Approved'";
$res = mysqli_query($conn, $qry);
?>
<style>
    table,
    th,
    td {
        border: 1px solid brown;
    }

    th,
    td {
        padding: 10px;
    }
</style>


<!--/Banner-Start-->
<!--/main-banner-->
<div class="w3l-main-slider position-relative" id="home">
    <div class="w3l-bannerhny-content">
        <div class="container">
            <div class="w3l-bannerhny-info">
                <h3 class="mb-md-5 mb-2">Rides</h3>

            </div>
        </div>
    </div>
</div>
<style type="text/css">
    #log {
        background-color: #2371ff;
        margin: auto;
        padding: 50px;
        color: white;
        width: 1100px;
        border-radius: 10px;
    }
</style>

<section id="contact" class="contact">
    <div class="container">
        <div id="log">
            <form action="" method="post">
                <h3 style="margin:10px 30px 30px 0px; color:#000; font-weight: 900;">Ride Details</h3>
                <h5 class="mb-3 text-light"></h5>
                <table style="width:90%; margin:auto">
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Employee Name</th>
                        <th>Employee Email</th>
                        <th>Employee Contact</th>
                        <th>Fare</th>
                        <th>Status</th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>
                            <td>$row[start_date]</td>
                            <td>$row[time]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[rate]</td>
                            <td>$row[status]</td>
                        </tr>";
                    }
                    ?>
                </table>

            </form>
        </div>
    </div>
</section>
<!--//contact-->


<?php
include "baseFooter.php";

?>