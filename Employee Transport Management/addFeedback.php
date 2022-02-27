<?php
session_start();
include "employeeHeader.php";
include "connection.php";
$did = $_GET['did'];
$eid = $_GET['eid'];
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
            <form method="post">
                <h3 style="margin:10px 30px 30px 0px; color:#000; font-weight: 900;">Send Feedback</h3>
                <table style="width:100%;">

                    <tr>
                        <td colspan="4"><textarea class="form-control" style="height:150px" name="details" placeholder="Add Feedback" required=""></textarea></td>
                    </tr>


                    <tr>
                        <td colspan="4"><input type="submit" class="btn btn-warning" name="submit" value="Submit" required=""></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>
<!--//contact-->


<?php
if (isset($_REQUEST['submit'])) {
    $details = $_REQUEST['details'];

    $qry = "INSERT INTO `feedback` (`eid`,`did`,`feedack`) VALUES('$eid','$did','$details')";
    echo $qry;
    if (mysqli_query($conn, $qry) == TRUE) {
        echo "<script>alert('Feedback Added..');window.location='employeeviewridestatus.php';</script>";
    }
}
include "baseFooter.php";

?>