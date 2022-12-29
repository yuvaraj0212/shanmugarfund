<?php
session_start();
if (!isset($_SESSION['login'])) {
    // header("Location:../../index.php");
    echo '<script> 
    window.location.href="../../index.php";
    </script>';
}


?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Shanmugarfunds</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap only -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./admin.css'>
</head>


<body>
    <header class="">
        <div class="topnav " id="myTopnav">
            <div class="logo">
                <a href="./home.php"> <img src="../../assets/images/logo.png" alt=""></a>
            </div>
            <nav class="nav">
                <a href="./profile.php" class="nav-items">Profile</a>

                <!-- <a href="./payment.php" class="nav-items">Payment</a> -->
                <div class="dropdown nav-items ">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Chit
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./chit/request.php">request chit</a>
                        <a class="dropdown-item" href="./chit/approved.php">approved chit</a>
                        <a class="dropdown-item" href="./chit/pending.php">pending chit</a>
                    </div>
                </div>
                <div class="dropdown nav-items ">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Gold
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./gold/request.php">request Gold</a>
                        <a class="dropdown-item" href="./gold/approved.php">approved Gold</a>
                        <a class="dropdown-item" href="./gold/pending.php">pending Giold</a>
                    </div>
                </div>
                <div class="dropdown nav-items ">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Education
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./edu/request.php">request Gold</a>
                        <a class="dropdown-item" href="./edu/approved.php">approved Gold</a>
                        <a class="dropdown-item" href="./edu/pending.php">pending Giold</a>
                    </div>
                </div>
                <div class="dropdown nav-items ">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Festivel
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./festivel/request.php">request Gold</a>
                        <a class="dropdown-item" href="./festivel/approved.php">approved Gold</a>
                        <a class="dropdown-item" href="./festivel/pending.php">pending Giold</a>
                    </div>
                </div>
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
                        class="nav-items">chit</a>
                    <ul class="plans ms-3">
                        <li><a href="./chit/request.php" class="plans-item">Requst</a></li>
                        <li><a href="./chit/pending.php" class="plans-item">Pending</a></li>
                        <li><a href="./chit/approved.php" class="plans-item">Approved</a></li>
                    </ul>
                </li>
                <li class="nav-items"><i class="fa fa-tasks" aria-hidden="true"></i><a href="#"
                        class="nav-items">Gold</a>
                    <ul class="plans ms-3">
                        <li><a href="./gold/request.php" class="plans-item">Requst</a></li>
                        <li><a href="./gold/pending.php" class="plans-item">Pending</a></li>
                        <li><a href="./gold/approved.php" class="plans-item">Approved</a></li>
                    </ul>
                </li>
                <li class="nav-items"><i class="fa fa-tasks" aria-hidden="true"></i><a href="#"
                        class="nav-items">Education</a>
                    <ul class="plans ms-3">
                        <li><a href="./edu/request.php" class="plans-item">Requst</a></li>
                        <li><a href="./edu/pending.php" class="plans-item">Pending</a></li>
                        <li><a href="./edu/approved.php" class="plans-item">Approved</a></li>
                    </ul>
                </li>
                <li class="nav-items"><i class="fa fa-tasks" aria-hidden="true"></i><a href="#"
                        class="nav-items">Festivel</a>
                    <ul class="plans ms-3">
                        <li><a href="./festivel/request.php" class="plans-item">Requst</a></li>
                        <li><a href="./festivel/pending.php" class="plans-item">Pending</a></li>
                        <li><a href="./festivel/approved.php" class="plans-item">Approved</a></li>
                    </ul>
                </li>
                <!-- <li class="nav-items"><i class="fa fa-money" aria-hidden="true"></i><a href="./payment.php">Payment</a> -->
                <!-- </li> -->
                <li class="nav-items"><i class="fa fa-users" aria-hidden="true"></i><a href="./invite.php">Invite</a>
                </li>
                <li class="nav-items logout"><i class="fa fa-sign-out" aria-hidden="true"></i><a
                        href="../logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>
    <section class="invite-section">
        <div class="head-content">
            <h2 id="titele">Refer a friends</h2>
            <h2>
                We value a friendship.
            </h2>
        </div>
        <div class="body-content ">
            <img src="../../assets/images/inaite.png" alt="">
        </div>
        <div class="footer-content text-center container">
            <button class="invite-button my-3">xkj3hy6 invite <i class="fa fa-arrow-right"
                    aria-hidden="true"></i></button>

            <h3>Refer your friends to us , and
                they'll each get Rs.100. on top of
                that, we'll give you Rs.100
                for each friend.</h3>
        </div>
    </section>
    <footer class="">
        <a href="./home.php" class=''><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="" class=''><i class="fa fa-calculator" aria-hidden="true"></i></a>
        <a href="" class=""><i class="fa fa-university" aria-hidden="true"></i></a>
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