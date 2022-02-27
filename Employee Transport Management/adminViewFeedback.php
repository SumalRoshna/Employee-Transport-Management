<?php
include "adminHeader.php";
include "connection.php";
$qry = "SELECT * FROM `feedback` f, `employees` e, `drivers` d WHERE f.`did`=d.`driv_id` AND f.`eid`=e.`emp_id`";
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
                <h3 class="mb-md-5 mb-2">Feedbacks</h3>

            </div>
        </div>
    </div>
</div>

<section id="contact" class="contact">
    <div class="container">
        <table>
            <tr>
                <th>Employee Name</th>
                <th>Driver Name</th>
                <th>Feedback</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                    <td>$row[5]</td>
                    <td>$row[11]</td>
                    <td>$row[3]</td>
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