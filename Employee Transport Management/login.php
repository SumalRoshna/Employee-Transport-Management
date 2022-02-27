<?php
session_start(); //to start the session
include "baseHeader.php";
include "connection.php";
?>


<!--/Banner-Start-->
<!--/main-banner-->
<div class="w3l-main-slider position-relative" id="home">
    <div class="w3l-bannerhny-content">
        <div class="container">
            <div class="w3l-bannerhny-info">
                <h3 class="mb-md-5 mb-2">Login</h3>

            </div>
        </div>
    </div>
</div>
<!--//main-banner-->
<!--/Client-Section-->

<!--//client-Section-->
<!--/About-Section-->

<!--//About-Section-->
<!--/Counts-Section-->

<!--//Counts-Section-->
<!--/Tab-section-->

<!--//abs-Section -->
<!--/Services-Section -->

<!--//Services-Section -->
<!--/-->
<!--/Team-Section-->

<!--//Team-Section-->
<!--/blog-Section-->

<!--//Team-Section-->
<!--/Portfolio-Section -->

<!--//Portfolio-Section -->
<!--/Testimonials/Section-->

<!--//Testimonials/Section-->
<!--/Pricing-Section-->

<!--/Pricing-Section-->
<!--/contact-->
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h6 class="title-subw3hny mb-2"><span>Sign In Here</span></h6>
        </div>
        <div class="row">
            <div class="col-lg-7 mt-lg-0 mt-5 container" data-aos="fade-up" data-aos-duration="3000">
                <form action="" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col form-group">
                            <input type="text" class="form-control" name="email" id="w3lName" placeholder="Username" required="" />
                        </div>
                        <div class="col form-group">
                            <input type="password" class="form-control" name="password" id="w3lSender" placeholder="Password" required="" />
                        </div>
                    </div>
                    <div class="w3lhny-submit text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-style">
                            Login
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
include 'connection.php';
if (isset($_REQUEST['submit'])) {
    $email = $_REQUEST['email'];
    $pwd = $_REQUEST['password'];
    $_SESSION['email'] = $email;
    $q = "select count(*) from login where user_name='$email'";
    $s = mysqli_query($conn, $q);
    $r = mysqli_fetch_array($s);
    if ($r[0] == 0)    //to check whether the username exist
    {
        echo '<script>alert("Username doesnt exist")</script>';
    } else {
        //creating a session variable
        $q = "select * from login where user_name='$email'";
        $s = mysqli_query($conn, $q);
        $r = mysqli_fetch_array($s);
        if ($r['password'] == $pwd)  //to check the password entered by user with the password in database
        {
            if ($r['status'] == 1) {
                if ($r['user_type'] == "admin")  //to check the usertye/role of the user
                {
                    echo '<script>location.href="adminHome.php"</script>';
                } else if ($r['user_type'] == "driver") {
                    $q = "select * from drivers where email='$email'";
                    $s = mysqli_query($conn, $q);
                    $r = mysqli_fetch_array($s);
                    $_SESSION['id'] = $r[0];
                    echo '<script>location.href="driverHome.php"</script>';
                } else if ($r['user_type'] == "customer") {
                    $q = "select * from employees where email='$email'";
                    $s = mysqli_query($conn, $q);
                    $r = mysqli_fetch_array($s);
                    $_SESSION['id'] = $r[0];
                    echo '<script>location.href="employeeHome.php"</script>';
                }
            } else {
                echo '<script>alert("Account not activated...")</script>';
                echo '<script>location.href="index.php"</script>';
            }
        } else {
            echo '<script>alert("Incorrect password")</script>';
            echo '<script>location.href="index.php"</script>';
        }
    }
}

include "baseFooter.php";
?>