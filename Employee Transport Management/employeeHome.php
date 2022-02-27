<?php
session_start();
include "employeeHeader.php";
include "connection.php";
$eid = $_SESSION['email'];
$qry = "SELECT * FROM `employees` e, `login` l WHERE e.`email`='$eid' AND l.`user_name`='$eid'";
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
                <table style="width:900px;">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" class="form-control" pattern="[a-zA-Z ]+" name="name" required="" value="<?php echo $r['name']; ?>"></td>

                        <td>&nbsp;&nbsp;&nbsp;&nbsp;Address</td>
                        <td><textarea class="form-control" name="adrs" required=""><?php echo $r['adrs']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" class="form-control" name="password" required="" value="<?php echo $r['password']; ?>"></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;Contact</td>
                        <td><input type="text" class="form-control" pattern="[6789][0-9]{9}" maxlength="10" name="contact" required="" value="<?php echo $r['phone']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="4"><input type="submit" style="width:860px;" class="btn btn-warning" name="submit" value="Update" required=""></td>
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
    $password = $_REQUEST['password'];
    $qryUp = "UPDATE `employees` SET `name`='$name',`phone`='$contact',`adrs`='$adrs' WHERE `email`='$eid'";
    $qryLog = "UPDATE `login` SET `password`='$password' WHERE `user_name`='$eid'";
    if (mysqli_query($conn, $qryUp) == TRUE && mysqli_query($conn, $qryLog)) {
        echo "<script>alert('Profile Updated...')
        window.location='employeeHome.php'
        </script>";
    }
}
include "baseFooter.php";

?>