<?php
include "adminHeader.php";
include "connection.php";
$qry = "SELECT * FROM `pickup_points`";
$result = mysqli_query($conn, $qry)
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

    .table,
    .th,
    .td {
        border: 1px solid #000;
        border-collapse: collapse;
    }

    .table {
        width: 50%;
        margin: 20px auto;
    }

    .th {
        text-align: center;
        color: brown;
    }
</style>

<section id="contact" class="contact">
    <div class="container">
        <div id="log">
            <form method="POST">
                <h3 style="margin:10px 30px 30px 0px; color:#000; font-weight: 900;">Set Locations</h3>
                <table style="width:900px;">
                    <tr>
                        <td>Loaction</td>
                        <td><input type="text" class="form-control" pattern="[a-zA-Z ]+" name="name" required=""></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="4"><input type="submit" style="width:860px;" class="btn btn-warning" name="submit" value="Add" required=""></td>
                    </tr>
                </table>
            </form>
        </div>
        <table class="table">
            <tr>
                <th class="th">Sl/No</th>
                <th class="th">Location</th>
                <th class="th">Action</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                ++$i;
                echo "<tr>
                    <td class='td'>$i</td>
                    <td class='td'>$row[ppoints]</td>
                    <td class='td text-center'><a href='adminDeleteLocation.php?locid=$row[pp_id]'>Remove</a></td>
                </tr>";
            }
            ?>


        </table>
    </div>
</section>
<!--//contact-->


<?php
if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $qryUp = "INSERT INTO `pickup_points`(ppoints) VALUE('$name')";
    if (mysqli_query($conn, $qryUp) == TRUE) {
        echo "<script>alert('Location Added...')
        window.location='adminAddLocations.php'
        </script>";
    } else {
        echo "<script>alert('Error Occured...')
        </script>";
    }
}
include "baseFooter.php";

?>