<?php
include "baseHeader.php";
include "connection.php";
?>


<!--/Banner-Start-->
<!--/main-banner-->
<div class="w3l-main-slider position-relative" id="home">
    <div class="w3l-bannerhny-content">
        <div class="container">
            <div class="w3l-bannerhny-info">
                <h3 class="mb-md-5 mb-2">Driver Registration</h3>

            </div>
        </div>
    </div>
</div>
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h6 class="title-subw3hny mb-2"><span>Sign Up Here</span></h6>
        </div>
        <div class="row">
            <div class="col-lg-7 mt-lg-0 mt-5 container" data-aos="fade-up" data-aos-duration="3000">
                <form action="" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col form-group">
                            <input type="text" class="form-control" name="name" id="w3lName" placeholder="Name" required="" />
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" name="email" id="w3lName" placeholder="User Name" required="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <input type="text" class="form-control" name="phone" pattern="[6789][0-9]{9}" maxlength="10" id="w3lName" placeholder="Phone" required="" />
                        </div>
                        <div class="col form-group">
                            <input type="password" class="form-control" name="password" id="w3lSender" placeholder="Password" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="adrs" class="form-control" id="w3lMessage" placeholder="Address" required=""></textarea>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <input type="text" class="form-control" name="car" id="w3lName" placeholder="Vehicle Name" required="" />
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" name="capacity" id="w3lSender" placeholder="Capacity of the vehicle" required="" />
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" name="reg_num" id="w3lSender" placeholder="Vehicle Registration Number" required="" />
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" name="license" id="w3lSender" placeholder="License Number" required="" />
                        </div>
                    </div>
                    <div class="w3lhny-submit text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-style">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <section id="about" class="clients">
            <div class="container">

                <div class="car-img mx-0 text-center px-lg-5">
                    <img src="assets/images/1.png" alt="" class="img-fluid" />
                </div>
            </div>
        </section>
        <div class="map-iframe mt-5 pt-lg-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125745.78501635414!2d76.2382527259212!3d9.97086729947647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d08f976f3a9%3A0xe9cdb444f06ed454!2sErnakulam%2C%20Kerala!5e0!3m2!1sen!2sin!4v1641186057226!5m2!1sen!2sin" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
<!--//contact-->


<?php
if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    $adrs = $_REQUEST['adrs'];
    $car = $_REQUEST['car'];
    $capacity = $_REQUEST['capacity'];
    $reg_num = $_REQUEST['reg_num'];
    $license = $_REQUEST['license'];
    $qry = "INSERT INTO `drivers` (`name`,`email`,`contact`,`adrs`,`car`,`capacity`,`reg_num`,`lice_num`) VALUES ('$name', '$email', '$phone', '$adrs', '$car','$capacity', '$reg_num', '$license')";
    $qryLog = "INSERT INTO `login` (`user_id`, `user_name`, `password`, `user_type`, `status`) VALUES ((SELECT max(driv_id) from drivers), '$email', '$password', 'driver', '0')";
    if (mysqli_query($conn, $qry) == TRUE && mysqli_query($conn, $qryLog) == TRUE) {
?>
        <script>
            alert("Driver Registration Successfull..");
            window.location = "driverRegistration.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Driver Registration Failed");
            window.location = "driverRegistration.php";
        </script>
<?php
    }
}

include "baseFooter.php";
?>