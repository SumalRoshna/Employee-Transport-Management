<?php
include "adminHeader.php";
include "connection.php";

?>
<style>
    table {
        margin: auto;
        width: 80%;
        text-align: center;
    }

    th {
        color: brown;
    }

    table,
    th,
    td {
        border: 1px solid gray;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
    }
</style>
<div class="w3l-main-slider position-relative" id="home">
    <div class="w3l-bannerhny-content">
        <div class="container">
            <div class="w3l-bannerhny-info">
                <h3 class="mb-md-5 mb-2">Transportation Report</h3>

            </div>
        </div>
    </div>
</div>

<section id="contact" class="contact">
    <div class="container">
        <form action="" method="post">
            <input type="search" name="search" id="" style="width: 500px; background-color:#E5E4E2">
            <input type="submit" name="submit" value="Search" style="width: 100px; background-color:black; color:#fff">
        </form>
        <?php
        if (isset($_REQUEST['submit'])) {
            $search = $_POST['search'];
            $qry = "SELECT * FROM `vehicle_request` vr, `employees` e, `drivers` d, `pickup_points` pp WHERE vr.`emp_id`=e.`emp_id` AND vr.`driv_id`=d.`driv_id` AND vr.`pp_id`=pp.`pp_id` AND (d.`name` LIKE '%$search%' OR e.`name` LIKE '%$search%') ORDER BY vr.`vr_id` DESC";
            $result = mysqli_query($conn, $qry);
        ?>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Employee Contact</th>
                    <th>Driver Name</th>
                    <th>Driver Email</th>
                    <th>Driver Contact</th>
                    <th>Car</th>
                    <th>Registration No.</th>
                    <th>Pickup Point</th>
                    <th>Status</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                <td>$row[start_date]</td>
                    <td>$row[10]</td>
                    <td>$row[11]</td>
                    <td>$row[12]</td>
                    <td>$row[16]</td>
                    <td>$row[17]</td>
                    <td>$row[18]</td>
                    <td>$row[car]</td>
                    <td>$row[reg_num]</td>
                    <td>$row[ppoints]</td>
                    <td>$row[status]</td>
                    </tr>";
                }
                ?>
            </table>
        <?php
        } else {
            $qry = "SELECT * FROM `vehicle_request` vr, `employees` e, `drivers` d, `pickup_points` pp WHERE vr.`emp_id`=e.`emp_id` AND vr.`driv_id`=d.`driv_id` AND vr.`pp_id`=pp.`pp_id` ORDER BY vr.`vr_id` DESC";
            $result = mysqli_query($conn, $qry);

        ?>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Employee Contact</th>
                    <th>Driver Name</th>
                    <th>Driver Email</th>
                    <th>Driver Contact</th>
                    <th>Car</th>
                    <th>Registration No.</th>
                    <th>Pickup Point</th>
                    <th>Status</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                <td>$row[start_date]</td>
                    <td>$row[10]</td>
                    <td>$row[11]</td>
                    <td>$row[12]</td>
                    <td>$row[16]</td>
                    <td>$row[17]</td>
                    <td>$row[18]</td>
                    <td>$row[car]</td>
                    <td>$row[reg_num]</td>
                    <td>$row[ppoints]</td>
                    <td>$row[status]</td>
                    </tr>";
                }
                ?>
            </table>
        <?php
        }
        ?>
    </div>
</section>
<!--//contact-->


<?php
include "baseFooter.php";

?>