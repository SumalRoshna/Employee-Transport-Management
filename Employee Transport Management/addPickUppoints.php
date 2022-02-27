<?php
session_start();
include "driverHeader.php";
include "connection.php";
$eid = $_SESSION['email'];
$id = $_SESSION['id'];
$qry = "SELECT * FROM `pickup_points`";
$result = mysqli_query($conn, $qry);
$qryPoi = "SELECT * FROM `driver_points` dp, `pickup_points` pp WHERE dp.`driv_id`='$id' AND dp.`pp_id`=pp.`pp_id`";
$resultPoi = mysqli_query($conn, $qryPoi);
?>



<!--/Banner-Start-->
<!--/main-banner-->
<div class="w3l-main-slider position-relative" id="home">
    <div class="w3l-bannerhny-content">
        <div class="container">
            <div class="w3l-bannerhny-info">
                <h3 class="mb-md-5 mb-2">Pickup Points</h3>

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
            <form method="POST">
                <h3 style="margin:10px 30px 30px 0px; color:#000; font-weight: 900;">Select Locations</h3>
                <table style="width:900px;">
                    <tr>
                        <td></td>
                        <td><select name="loc" id="" required>
                                <option value="" selected disabled>Select Pickup Points</option>
                                <?php
                                while ($r = mysqli_fetch_array($result)) {
                                    echo "<option value='$r[pp_id]'>$r[ppoints]</option>";
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="number" class="" name="rate" placeholder="Fare" required=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-warning" name="submit" value="Add" required=""></td>
                    </tr>
                </table>
            </form>
        </div>
        <table style="border: 1px solid #000; margin:20px auto; width:80%">
            <tr>
                <th style="border: 1px solid #000; padding:10px">Pickup Locations</th>
                <th style="border: 1px solid #000; padding:10px">Fare</th>
                <th style="border: 1px solid #000; padding:10px">Action</th>
            </tr>
            <?php
            while ($rowPoi = mysqli_fetch_array($resultPoi)) {
                echo "<tr>
                    <th style='border: 1px solid #000; padding:10px'>$rowPoi[ppoints]</th>
                    <th style='border: 1px solid #000; padding:10px'>$rowPoi[rate]</th>
                    <th style='border: 1px solid #000; padding:10px'><a href='driverDeletePickLoc.php?id=$rowPoi[dp_id]'>Delete</a></th>
                </tr>";
            }
            ?>

        </table>
    </div>
</section>
<!--//contact-->


<?php
if (isset($_REQUEST['submit'])) {
    $loc = $_REQUEST['loc'];
    $rate = $_REQUEST['rate'];
    $id = $_SESSION['id'];
    $qryUp = "INSERT INTO `driver_points`(`driv_id`,`pp_id`, `rate`) VALUES ('$id','$loc', '$rate')";
    if (mysqli_query($conn, $qryUp) == TRUE) {
        echo "<script>alert('Pickup Point Added...')
        window.location='addPickUppoints.php'
        </script>";
    }
}
include "baseFooter.php";

?>