<?php
session_start();
include "driverHeader.php";
include "connection.php";
$eid = $_SESSION['email'];
$qry = "SELECT * FROM `drivers` d, `login` l WHERE d.`email`='$eid' AND l.`user_name`='$eid'";
$result = mysqli_query($conn, $qry);
$r = mysqli_fetch_array($result);
?>



<!--/Banner-Start-->
<!--/main-banner-->
<div class="w3l-main-slider position-relative" id="home">
    <div class="w3l-bannerhny-content">
        <div class="container">
            <div class="w3l-bannerhny-info">
                <h3 class="mb-md-5 mb-2">Home</h3>

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
                <h3 style="margin:10px 30px 30px 0px; color:#000; font-weight: 900;">Profile</h3>
                <h5 class="mb-3 text-light">UserName: <?php echo $r['email'] ?></h5>
                <table style="width:90%; margin:auto">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" class="form-control" pattern="[a-zA-Z ]+" name="name" required="" value="<?php echo $r['name']; ?>"></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;Password</td>
                        <td><input type="password" class="form-control" name="password" required="" value="<?php echo $r['password']; ?>"></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Registration No.</td>
                        <td><input type="text" class="form-control" name="regnum" required="" value="<?php echo $r['reg_num']; ?>"></td>

                        <td>&nbsp;&nbsp;&nbsp;&nbsp;License No</td>
                        <td><input type="text" class="form-control" name="licen" required="" value="<?php echo $r['lice_num']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Car</td>
                        <td><input type="text" class="form-control" name="car" required="" value="<?php echo $r['car']; ?>"></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;Contact</td>
                        <td><input type="text" class="form-control" pattern="[6789][0-9]{9}" maxlength="10" name="contact" required="" value="<?php echo $r['contact']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td colspan="3"><textarea class="form-control" style="height:100px" name="adrs" required=""><?php echo $r['adrs']; ?></textarea></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>

                        <td colspan="4"><input type="submit" class="btn btn-warning" name="submit" value="Update" required=""></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>
<!--//contact-->


<?php
if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $adrs = $_REQUEST['adrs'];
    $contact = $_REQUEST['contact'];
    $car = $_REQUEST['car'];
    $regnum = $_REQUEST['regnum'];
    $licen = $_REQUEST['licen'];
    $password = $_REQUEST['password'];
    $qryUp = "UPDATE `drivers` SET `name`='$name',`contact`='$contact', `adrs`='$adrs',`car`='$car',`reg_num`='$regnum',`lice_num`='$licen'  WHERE `email`='$eid'";
    $qryLog = "UPDATE `login` SET `password`='$password' WHERE `user_name`='$eid'";
    if (mysqli_query($conn, $qryUp) == TRUE && mysqli_query($conn, $qryLog)) {
        echo "<script>alert('Profile Updated...')
        window.location='driverHome.php'
        </script>";
    }
}
include "baseFooter.php";

?>