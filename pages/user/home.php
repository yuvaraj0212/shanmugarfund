<?php
include('../../config.php');
session_start();
if (!isset($_SESSION['login'])) {
    // header("Location:../../index.php");
    echo '<script> 
    window.location.href="../../index.php";
    </script>';
}

$id = (int) $_SESSION['userDetails']['id'];
$sql = "SELECT * FROM `user_table`  WHERE `user_table`.`id` = $id;";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$_SESSION['userDetails'] = $row;
?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Shanmugarfunds</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./user.css'>
    <script src='main.js'></script>
</head>

<body>
    <header class="">
        <div class="topnav " id="myTopnav">
            <div class="logo">
                <a href="./home.php"> <img src="../../assets/images/logo.png" alt=""></a>
            </div>
            <nav class="nav">
                <a href="./profile.php" class="nav-items">Profile</a>
                <div class="dropdown nav-items">Plans
                    <span class="dropdown-content">
                        <a href="./chit.php" class="dropdown-item">Chit Funds</a>
                        <a href="./gold.php" class="dropdown-item">Gold</a>
                        <a href="./education.php" class="dropdown-item">Education Saving Plan </a>
                        <a href="./festival.php" class="dropdown-item">Festival Saving Plans</a>
                    </span>
                </div>
                <a href="./payment.php" class="nav-items">Payment</a>
                <a href="./invite.php" class="nav-items">Invite</a>
                <a href="../logout.php" class="nav-items">Log out</a>
            </nav>
            <a href="#" onclick="openSide()" class="bars">
                <i class="fa fa-bars" id="bars"></i>
            </a>
        </div>
        <nav class="mobile-nav d-lg-none d-none" id="mobile-nav">
            <ul>
                <li class="nav-items"><i class="fa fa-user" aria-hidden="true"></i> <a href="./profile.php">Profile</a>
                </li>
                <li class="nav-items"><i class="fa fa-tasks" aria-hidden="true"></i><a href="#"
                        class="nav-items">Plans</a>
                    <ul class="plans ms-3">
                        <li><a href="./chit.php" class="plans-item">Chit Funds</a></li>
                        <li><a href="./gold.php" class="plans-item">Gold</a></li>
                        <li><a href="./education.php" class="plans-item">Education</a></li>
                        <li><a href="./festival.php" class="plans-item">Festival</a></li>
                    </ul>
                </li class="nav-items">
                <li class="nav-items"><i class="fa fa-money" aria-hidden="true"></i><a href="./payment.php">Payment</a>
                </li>
                <li class="nav-items"><i class="fa fa-users" aria-hidden="true"></i><a href="./invite.php">Invite</a>
                </li>
                <li class="nav-items logout"><i class="fa fa-sign-out" aria-hidden="true"></i><a
                        href="../logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>
    <section class="home-section">
        <div class="body-content ">
            <h1> Welcome to </h1>
            <h3>Shanmugar Gold & Savings Chits. </h3>
            <h1>Good Morning,
                <?php echo ($_SESSION['userDetails']['name']) ?>!
            </h1>
            <?php
            //    chit
            
            if ($_SESSION['userDetails']['chit_status'] === null) {
                echo ('
                <a href="chit.php">
                <div class="balance-card text-center">
                <h3><a href="./chitRequest.php" class="add-chit"> Add New Chit</a></h3>
            </div>
            </a>
               ');
            }
            if ($_SESSION['userDetails']['chit_status'] === "request") {
                echo ('
                <a href="chit.php">
                <div class="balance-card text-center">
            <h5>Your chit Request has send succesfully</h5>
        </div></a>');
            }
            if ($_SESSION['userDetails']['chit_status'] === "pending") {
                echo ('
                <a href="chit.php">
                <div class="balance-card text-center">
            <h5>Your chit Request has Pending</h5>
        </div></a>');
            }
            if ($_SESSION['userDetails']['chit_status'] === "approved") {
                $plan = $_SESSION['userDetails']['chit_amount'];
                echo (' 
                <div>
                <a href="chit.php" class="text-center">
                <div class="balance-card ">
                  <h1>chit Savings</h1>
                  <span id="chit-blance"><b> Plan amount = ' . $plan . ' </b></span>
              </div>
              </a>
              
              </div>');
            }

            // Gold
            
            if ($_SESSION['userDetails']['gold_status'] === null) {
                echo ('
               
                <div class="balance-card text-center">
                <h3><a href="./goldRequest.php" class="add-chit"> Add New Gold plan</a></h3>
                </div>
                    ');
            }
            if ($_SESSION['userDetails']['gold_status'] === "request") {
                echo ('
                <a href="./gold.php"><div class="balance-card text-center">
                <h5>Your gold Request has send succesfully</h5>
         </div></a>');
            }
            if ($_SESSION['userDetails']['gold_status'] === "pending") {
                echo ('<div class="balance-card text-center">
                <a href="./gold.php"><h5>Your gold Request has Pending</h5></a>
            </div>');
            }
            if ($_SESSION['userDetails']['gold_status'] === "approved") {
                echo ('  <a href="./gold.php">  <div class="balance-card text-center">
                <h1>Gold Savings  </h1>
                <span id="chit-blance"><b> Plan amount =  ' . $_SESSION['userDetails']['gold_amount'] * 12 . ' </b></span>
            </div>
              </a>
');
            }
            // education
            if ($_SESSION['userDetails']['education_status'] === null) {
                echo ('
                <div class="balance-card text-center">
                <h3><a href="./educationRequest.php" class="add-chit"> Add New eduction plan</a></h3>
            </div>
               ');
            }
            if ($_SESSION['userDetails']['education_status'] === "request") {
                echo ('<div class="balance-card text-center">
                <a href="./education.php"> <h5>Your education Request has send succesfully</h5></a>
        </div>');
            }
            if ($_SESSION['userDetails']['education_status'] === "pending") {
                echo ('<div class="balance-card text-center">
                <a href="./education.php"> <h5>Your  education Request has Pending</h5></a>
        </div>');
            }
            if ($_SESSION['userDetails']['education_status'] === "approved") {
                echo (' <div class="balance-card text-center">
                  <h1>Savings eduction balance</h1>
                  <a href="./education.php">     <span id="chit-blance"><b> Plan amount =  ' . $_SESSION['userDetails']['education_amount'] . ' </b></span>
          </a></div>
             ');
            }
            ?>

        </div>
    </section>
    <footer>
        <a href="./home.php" class=''><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="./payment.php" class=''><i class="fa fa-calculator" aria-hidden="true"></i></a>
        <a href="./payment.php" class=""><i class="fa fa-university" aria-hidden="true"></i></a>
    </footer>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
        function openSide() {
            var x = document.getElementById("mobile-nav");
            var y = document.getElementById("bars");
            if (x.className === "mobile-nav d-lg-none d-none") {
                y.className = "fa fa-times"
                x.className = "mobile-nav d-lg-none d-block";
            } else {
                y.className = "fa fa-bars"
                x.className = "mobile-nav d-lg-none d-none";
            }
        }
    </script>
</body>

</html>