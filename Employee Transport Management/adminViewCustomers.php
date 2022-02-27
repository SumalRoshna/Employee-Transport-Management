<?php
include "adminHeader.php";
include "connection.php";
$qry = "SELECT * FROM `employees` e, `login` l WHERE e.`email`=l.`user_name` AND l.`status`=0";
$result = mysqli_query($conn, $qry);
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
                <h3 class="mb-md-5 mb-2">Customer Request</h3>

            </div>
        </div>
    </div>
</div>

<section id="contact" class="contact">
    <div class="container">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Emp ID</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                if ($row['status'] == '1') {
                    $status = "Active";
                } else {
                    $status = "Inactive";
                }
                echo "<tr>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[empid]</td>
                    <td>$row[phone]</td>
                    <td>$row[adrs]</td>
                    <td>$status</td>
                    <td><a href='adminapprovecustomers.php?id=$row[log_id]&status=1&url=adminViewCustomers.php'>Approve</a></td>
                    <td><a href='adminapprovecustomers.php?id=$row[log_id]&status=-1&url=adminViewCustomers.php'>Reject</a></td>
                </tr>";
            }
            ?>
        </table>
    </div>
</section>
<!--//contact-->


<?php
include "baseFooter.php";

?>