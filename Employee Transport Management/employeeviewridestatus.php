<?php
session_start();
include "employeeHeader.php";
include "connection.php";
$eid = $_SESSION['id'];
$qry = "SELECT * FROM `vehicle_request` vr, `drivers` d, `driver_points` dp WHERE vr.`emp_id`='$eid' AND vr.`driv_id`=d.`driv_id` AND vr.dp_id=dp.`dp_id`";
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
                <h3 class="mb-md-5 mb-2">Status</h3>

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
                <h3 style="margin:10px 30px 30px 0px; color:#000; font-weight: 900;">Request Status</h3>
                <h5 class="mb-3 text-light"></h5>
                <table style="width:90%; margin:auto">
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Driver Name</th>
                        <th>Driver Email</th>
                        <th>Driver Contact</th>
                        <th>Vehicle Name</th>
                        <th>Reg No.</th>
                        <th>Fare</th>
                        <th>Status</th>
                        <th>Send Feedback</th>

                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res)) {
                        if ($row['status'] == "Approved"){
                            $action = "<a href='addFeedback.php?did=$row[driv_id]&eid=$row[emp_id]' style='color:#fff'>Add</a>";
                        }else{
                            $action="";
                        }
                        echo "<tr>
                            <td>$row[start_date]</td>
                            <td>$row[time]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[contact]</td>
                            <td>$row[car]</td>
                            <td>$row[reg_num]</td>
                            <td>$row[rate]</td>
                            <td>$row[status]</td>
                            <td>$action</td>
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