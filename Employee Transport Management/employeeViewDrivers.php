<?php
session_start();
include "employeeHeader.php";
include "connection.php";
$eid = $_SESSION['email'];
$ppoint = $_GET['ppoint'];
$qry = "SELECT * FROM `driver_points` dp, `drivers` d, `pickup_points` p WHERE dp.`pp_id`='$ppoint' AND p.`pp_id`='$ppoint' AND dp.`driv_id`=d.`driv_id` ORDER BY rate";
$res = mysqli_query($conn, $qry);
?>



<!--/Banner-Start-->
<!--/main-banner-->
<div class="w3l-main-slider position-relative" id="home">
    <div class="w3l-bannerhny-content">
        <div class="container">
            <div class="w3l-bannerhny-info">
                <h3 class="mb-md-5 mb-2">Search</h3>

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

    table,
    th,
    td {
        border: 1px solid brown;
    }

    th,
    td {
        padding: 10px;
    }

    a {
        color: #fff;
    }

    a:hover {
        color: lime;
    }
</style>

<section id="contact" class="contact">
    <div class="container">
        <div id="log">
            <form action="employeeViewDrivers.php" method="get">
                <h3 style="margin:10px 30px 30px 0px; color:#000; font-weight: 900;">Select Drivers</h3>
                <table style="width: 100%;">
                    <tr>
                        <th>Location</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Vehicle Name</th>
                        <th>Registration No.</th>
                        <th>License No.</th>
                        <th>Fare</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>
                            <th>$row[ppoints]</th>
                            <th>$row[name]</th>
                            <th>$row[email]</th>
                            <th>$row[contact]</th>
                            <th>$row[adrs]</th>
                            <th>$row[car]</th>
                            <th>$row[reg_num]</th>
                            <th>$row[lice_num]</th>
                            <th>$row[rate]</th>
                            <th><a href='employeeSelectDriver.php?did=$row[driv_id]&ppid=$row[pp_id]'>Select</a></th>
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