<?php
session_start();
include "employeeHeader.php";
include "connection.php";
$eid = $_SESSION['email'];
$qry = "SELECT * FROM `employees`WHERE `email`='$eid'";
$result = mysqli_query($conn, $qry);
$r = mysqli_fetch_array($result);
$qryLoc = "SELECT * FROM `pickup_points`";
$resLoc = mysqli_query($conn, $qryLoc);
?>



<!--/Banner-Start-->
<!--/main-banner-->
<div class="w3l-main-slider position-relative" id="home">
    <div class="w3l-bannerhny-content">
        <div class="container">
            <div class="w3l-bannerhny-info">
                <h3 class="mb-md-5 mb-2">Request a Vehicle</h3>

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
                <h3 style="margin:10px 30px 30px 0px; color:#000; font-weight: 900;">Submit Request</h3>
                <h5 class="mb-3 text-light">User: <?php echo $r['name'] ?></h5>
                <table style="width:900px;">
                    <tr>
                        <td>Select Pickup Point</td>
                        <td><select name="ppoint" id="" required>
                                <option value="" selected disabled>Select Location</option>
                                <?php
                                while ($rowLoc = mysqli_fetch_array($resLoc)) {
                                    echo "<option value='$rowLoc[pp_id]'>$rowLoc[ppoints]</option>";
                                }
                                ?>

                            </select></td>
                    </tr>
                    <tr>
                        <td>Starting Date</td>
                        <td colspan="4"><input type="date" class="" name="date" required=""></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td colspan="4"><input type="time" class="" name="time" required=""></td>
                    </tr>
                    <tr>
                        <td>Additional Details</td>
                        <td colspan="4"><input type="text" class="" name="detail" required=""></td>
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
    $ppoint = $_REQUEST['ppoint'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $detail = $_REQUEST['detail'];
    $eid = $_SESSION['id'];
    $qryCheck = "SELECT COUNT(*) FROM `vehicle_request` WHERE `emp_id`='$eid' AND `status`='Approved'";
    $check = mysqli_query($conn, $qry);
    $count = mysqli_num_rows($check);
    if ($count[0] > 0) {
        echo "<script>alert('Already a ride is active..')</script>";
    } else {

        function Transport($m, $n, $a, $b, $c, &$x, &$ko)
        {
            $inf = 10000;
            $steps = 0;

            for ($i = 0; $i < $m; $i++)
                $u[$i] = 0;
            for ($j = 0; $j < $n; $j++) {
                $r = $inf;
                for ($i = 0; $i < $m; $i++) {
                    $x[$i][$j] = 0;
                    @$sf = $c[$i][$j];
                    if ($sf < $r)
                        $r = $sf;
                }
                $v[$j] = $r;
            }
            $lab1 = false;
            do {
                for ($i = 0; $i < $m; $i++) {
                    $w[$i] = -1;
                    $eps[$i] = $a[$i];
                }
                for ($j = 0; $j < $n; $j++) {
                    $k[$j] = -1;
                    $del[$j] = 0;
                }
                do {
                    $lab  = true;
                    $lab2 = true;
                    $i    = 0;
                    do {
                        $sf = $eps[$i];
                        $eps[$i] = -$eps[$i];
                        if ($sf > 0) {
                            $ra = $u[$i];
                            $j = 0;
                            do {
                                if (@($del[$j] == 0) && @($v[$j] - $ra == $c[$i][$j])) {
                                    $k[$j] = $i;
                                    $del[$j] = $sf;
                                    $lab = false;
                                    if ($b[$j] > 0) {
                                        $lab = true;
                                        $lab2 = false;
                                        $sf = abs($del[$j]);
                                        $r = $b[$j];
                                        if ($r < $sf)
                                            $sf = $r;
                                        $b[$j] = $r - $sf;
                                        do {
                                            $i = $k[$j];
                                            $x[$i][$j] += $sf;
                                            $j = $w[$i];
                                            if ($j != -1) $x[$i][$j] -= $sf;
                                        } while ($j != -1);
                                        $a[$i] -= $sf;
                                        $j = 0;
                                        do {
                                            $lab1 = ($b[$j] <= 0);
                                            $j++;
                                        } while (($j < $n) && ($lab1));
                                        if ($lab1) {
                                            $ko = 0;
                                            for ($i = 0; $i < $m; $i++)
                                                for ($j = 0; $j < $n; $j++)
                                                    @$ko += $x[$i][$j] * $c[$i][$j];
                                        }
                                    }
                                }
                                $j++;
                            } while (($j < $n) && ($lab2));
                        }
                        $i++;
                    } while (($i < $m) && ($lab2));
                    if (!$lab) {
                        $lab = true;
                        for ($j = 0; $j < $n; $j++) {
                            $sf = $del[$j];
                            if ($sf > 0) {
                                for ($i = 0; $i < $m; $i++) {
                                    if ($eps[$i] == 0) {
                                        $r = $x[$i][$j];
                                        if ($r > 0) {
                                            $w[$i] = $j;
                                            if ($r <= $sf)
                                                $eps[$i] = $r;
                                            else
                                                $eps[$i] = $sf;
                                            $lab = false;
                                        }
                                    }
                                }
                                $del[$j] = -$sf;
                            }
                        }
                    }
                } while (!$lab);

                if ($lab) {
                    $r = $inf;
                    for ($i = 0; $i < $m; $i++) {
                        if ($eps[$i] != 0) {
                            $ra = $u[$i];
                            for ($j = 0; $j < $n; $j++) {
                                if ($del[$j] == 0) {
                                    $sf = $c[$i][$j] + $ra - $v[$j];
                                    if ($r > $sf)
                                        $r = $sf;
                                }
                            }
                        }
                    }
                    for ($i = 0; $i < $m; $i++)
                        if ($eps[$i] == 0)
                            $u[$i] += $r;
                    for ($j = 0; $j < $n; $j++)
                        if ($del[$j] == 0)
                            $v[$j] += $r;
                }
                $steps++;
                if ($steps == 1000)
                    // die("Algorithm has encountered an infinite loop");
                    break;
            } while (!$lab1);
        }
        $x;
        $ko;
        $a = array();
        $b = array();
        $c = array(array(), array());
        $z = array();
        $y = array();
        $qryCC = "SELECT * FROM `driver_points` WHERE pp_id='$ppoint'";
        $resCC = mysqli_query($conn, $qryCC);
        $count = mysqli_num_rows($resCC);
        $m = $count;
        $n = $count;
        while ($rowCC = mysqli_fetch_array($resCC)) {
            array_push($a, $rowCC['driv_id']);
            array_push($b, $rowCC['pp_id']);
            array_push($z, $rowCC['rate']);
            array_push($y, $rowCC['rate']);
        }
        $c = array($z, $y);
        Transport($m, $n, $a, $b, $c, $x, $ko);
        if ($ko > 0) {
            $qry = "SELECT * FROM `driver_points` WHERE `pp_id`='$ppoint' AND `rate`<$ko AND rate IN (SELECT MIN(rate) FROM `driver_points` WHERE rate<$ko AND `pp_id`='$ppoint' )";
            $res = mysqli_query($conn, $qry);
            $data = mysqli_fetch_array($res);
            $drId = $data['driv_id'];
            $dpId = $data['dp_id'];
        } else {
            $uid = $_SESSION['id'];
            $qry = "SELECT * FROM `driver_points` WHERE `pp_id`='$ppoint' ORDER BY `rate`";
            echo $qry;
            $res = mysqli_query($conn, $qry);
            $data = mysqli_fetch_array($res);
            $drId = $data['driv_id'];
            $dpId = $data['dp_id'];
        }

        $insert = "INSERT INTO `vehicle_request` (`emp_id`,`pp_id`,`driv_id`,`time`,`start_date`,`details`,`status`, `dp_id`) VALUES ('$eid','$ppoint','$drId','$time','$date','$detail','Requested', '$dpId')";
        echo $insert;
        if (mysqli_query($conn, $insert) == TRUE) {
            echo "<script>alert('Request Sent Successfully...')</script>";
        }
    }
}
include "baseFooter.php";

?>