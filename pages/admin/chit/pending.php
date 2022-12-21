<?php

session_start();
if (!isset($_SESSION['login'])) {
    // header("Location:../../index.php");
    echo '<script> 
    window.location.href="../../../index.php";
    </script>';

}
if (!isset($_SESSION['admin'])) {
    echo '<script> 
    window.location.href="../../../index.php";
    </script>';
}

?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- css custom -->
    <link rel='stylesheet' type='text/css' media='screen' href='../admin.css'>
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

</head>

<body>
    <header class="">
        <div class="topnav " id="myTopnav">
            <div class="logo">
                <a href="../home.php"> <img src="../../../assets/images/logo.png" alt=""></a>
            </div>
            <nav class="nav">
                <a href="../profile.php" class="nav-items">Profile</a>
                <!-- <div class="dropdown nav-items">Plans
                    <span class="dropdown-content">
                        <a href="./chit.php" class="dropdown-item">Chit Funds</a>
                        <a href="./gold.php" class="dropdown-item">Gold</a>
                        <a href="./education.php" class="dropdown-item">Education Saving Plan </a>
                        <a href="./festival.php" class="dropdown-item">Festival Saving Plans</a>
                    </span>
                </div> -->
                <!-- <a href="./payment.php" class="nav-items">Payment</a> -->
                <div class="dropdown nav-items ">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Chit
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./request.php">request chit</a>
                        <a class="dropdown-item" href="./approved.php">approved chit</a>
                        <a class="dropdown-item" href="./pending.php">pending chit</a>
                    </div>
                </div>
                <a href="../invite.php" class="nav-items">Invite</a>
                <a href="../../logout.php" class="nav-items">Log out</a>
            </nav>
            <a href="#" onclick="openSide()" class="bars">
                <i class="fa fa-bars" id="bars"></i>
            </a>
        </div>
        <nav class="mobile-nav d-lg-none d-none" id="mobile-nav">
            <ul>
                <li class="nav-items"><i class="fa fa-user" aria-hidden="true"></i> <a href="../profile.php">Profile</a>
                </li>
                <!-- <li class="nav-items"><i class="fa fa-money" aria-hidden="true"></i><a href="./payment.php">Payment</a> -->
                </li>
                <li class="nav-items"><i class="fa fa-users" aria-hidden="true"></i><a href="../invite.php">Invite</a>
                </li>
                <li class="nav-items logout"><i class="fa fa-sign-out" aria-hidden="true"></i><a
                        href="../logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>
    <section class="admin-section my-lg-5 container table-responsive">
        <table id="example" class="table table-striped table-bordered bg-light" style="width:100%">
            <h2>Chit Pending Details</h2>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phones</th>
                    <th>Plan Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../../../config.php";
                $sql = "SELECT * FROM user_table where chit_status = 'pending'";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    function getstatus($value)
                    {
                        if ($value === 'request') {
                            return '<span class="badge badge-danger">Request</span>';
                        }
                        if ($value === 'pending') {
                            return '<span class="badge badge-warning">Pending</span>';
                        }
                        if ($value === 'approved') {
                            return '<span class="badge badge-success">Approved</span>';

                        } else {
                            return '<span class="badge badge-info">Null</span>';
                        }

                    }

                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo ("<tr>
                            <th>" . $row["id"] . "</th>
                            <th>" . $row["name"] . "</th> 
                            <th>" . $row["phone"] . "</th>
                            <th>" . $row["chit_amount"] . "</th>
                            <th>" . getstatus($row["chit_status"]) . "</th> 
                            <td><a class='btn btn-info' href='pendingUpdate.php?id=" . $row['id'] . " '>Edit</a></td>
                       
                         </tr>");
                    }

                }

                ?>
            </tbody>


        </table>
    </section>
    <footer class="">
        <a href="../home.php" class=''><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="" class=''><i class="fa fa-calculator" aria-hidden="true"></i></a>
        <a href="" class=""><i class="fa fa-university" aria-hidden="true"></i></a>
    </footer>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script>$(document).ready(function () {
            $('#example').DataTable();
        });</script>
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