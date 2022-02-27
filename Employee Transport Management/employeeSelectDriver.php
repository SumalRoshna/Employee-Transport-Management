<?php
session_start();
include "employeeHeader.php";
include "connection.php";
$eid = $_SESSION['email'];
$id = $_SESSION['id'];
$did = $_GET['did'];
$ppid = $_GET['ppid'];
?>



<!--/Banner-Start-->
<!--/main-banner-->
<div class="w3l-main-slider position-relative" id="home">
    <div class="w3l-bannerhny-content">
        <div class="container">
            <div class="w3l-bannerhny-info">
                <h3 class="mb-md-5 mb-2"></h3>

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
            <form action="employeeViewDrivers.php" method="get">
                <h3 style="margin:10px 30px 30px 0px; color:#000; font-weight: 900;">Send Request</h3>
                <table style="width:100%;">
                    <tr>
                        <td>Starting Date</td>
                        <td><input type="date" name="date" id="date"></td>

                        <td>&nbsp;&nbsp;&nbsp;&nbsp;Time</td>
                        <td><input type="time" name="time" id="time"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4"><textarea class="form-control" style="height:150px" name="details" placeholder="Details of the ride" required=""></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td colspan="4"><input type="submit" class="btn btn-warning" name="submit" value="Send Request" required=""></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>
<!--//contact-->


<?php
if (isset($_REQUEST['submit'])) {
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $details = $_REQUEST['details'];
    $qry = "INSERT INTO `vehicle_request`(`emp_id`,`pp_id`,`driv_id`,`time`,`start_date`,`details`,`status`) VALUES ('$id','$ppid','$did','$time','$date','$details','Requested')";
    if (mysqli_query($conn, $qry) == TRUE) {
        echo "";
    }
}
include "baseFooter.php";

?>