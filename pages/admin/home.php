<?php
include "../../config.php";
session_start();
if (!isset($_SESSION['login'])) {
    // header("Location:../../index.php");
    echo '<script> 
    window.location.href="../../index.php";
    </script>';

}
if (!isset($_SESSION['admin'])) {
    echo '<script> 
    window.location.href="../../index.php";
    </script>';
}
;
$sql = "SELECT * FROM user_table where  loginAs = 'user'and`chit_status` = 'approved'";
$result = $db->query($sql);
$c_approved = $result->num_rows;
$sql = "SELECT * FROM user_table where  loginAs = 'user'and`chit_status` = 'pending'";
$result = $db->query($sql);
$c_pending = $result->num_rows;
$sql = "SELECT * FROM user_table where  loginAs = 'user'and`chit_status` = 'request'";
$result = $db->query($sql);
$c_request = $result->num_rows;
$sql = "SELECT * FROM user_table where  loginAs = 'user'";
$result = $db->query($sql);
$c_user = $result->num_rows;
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
    <section class="admin-section  container ">
        <div class="header bg-gradient-primary pb-8 pt-2 pt-md-8">
            <h1>Chit Details</h1>
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Customers</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo ($c_user) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon ">
                                                <i class="fa fa-user-circle-o text-info" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span> -->
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Request</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo ($c_request) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon">
                                                <i class="fa fa-paper-plane-o text-danger" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <!-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i>
                                            3.48%</span>
                                        <span class="text-nowrap">Since last week</span> -->
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo ($c_pending) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon ">
                                                <i class="fa fa-pause text-warning" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <!-- <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i>
                                            1.10%</span>
                                        <span class="text-nowrap">Since yesterday</span> -->
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Approved</h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo ($c_approved) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon ">
                                                <i class="fa fa-thumbs-o-up text-success" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                        <span class="text-nowrap">Since last month</span> -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-2">
            <table id="example" class="table table-striped table-bordered bg-light" style="width:100%">

                <thead>
                    <h1>Customer Details</h1>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phones</th>
                        <th>Email</th>
                        <th>Plan Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM user_table where loginAs = 'user'";
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
                            <th>" . $row["email"] . "</th>
                            <th>" . $row["chit_amount"] . "</th>
                            <th>" . getstatus($row["chit_status"]) . "</th> 
                            <td><a class='btn btn-danger' href='delete.php?id=" . $row['id'] . "'>Delete</a></td>
                       
                         </tr>");
                        }
                        // <a class='btn btn-info' href='update.php?id=" . $row['id'] . " '>Edit</a>&nbsp;
                    }

                    ?>
                </tbody>

            </table>
        </div>
        <!-- delete popup -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <h4 class="modal-title w-100">Are you sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="">
        <a href="./home.php" class=''><i class="fa fa-home" aria-hidden="true"></i></a>
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