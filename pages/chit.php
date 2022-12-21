<?php
include("../config.php");
session_start();
if (!isset($_SESSION['login'])) {
    // header("Location:../index.php");
    echo '<script> 
    window.location.href="../index.php";
    </script>';
}
if (isset($_POST["SendRequest"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $planamt = $_POST["planeAmount"];
    $phone = $_POST["phone"];

    $sql = "insert into `chit_table`(name,email,phone,planAmount) value('$name','$email','$phone','$planamt')";
    $result = mysqli_query($db, $sql);
    if ($result) {
        // header("Location:./user/home.php");
        echo '<script> 
        window.location.href="./user/home.php";
        </script>';
    } else {
        echo '<script> 
        alert("Register Unsecusseful")
      </script>';
    }

}

?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home</title>
    <!-- Bootstrap only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../main.css'>
    <script src='main.js'></script>
</head>

<body>
    <div class="container">
        <h1 class="head-titele">Shanmugar Gold & Savings chits</h1>
        <form class="form" method="POST">
            <div class="form-layout">
                <h2><b>Welcome to Chit fund schemes</b></h2>
                <div class="img-row">
                    <h3>Interest 9.5%, months-20</h3>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter email" name="email" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Enter mobile" name="phone" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <!-- <input type="" class="form-control" placeholder="Password" name="passsword" required
                        autocomplete="off"> -->
                    <select name="planeAmount" id="cars" class="form-control" required autocomplete="off">
                        <option value="50,000">50,000</option>
                        <option value="1,00,000">1,00,000</option>
                        <option value="2,00,000">2,00,000</option>
                        <option value="3,00,000">3,00,000</option>
                        <option value="4,00,000">4,00,000</option>
                        <option value="5,00,000">5,00,000</option>
                        <option value="6,00,000">6,00,000</option>
                        <option value="7,00,000">7,00,000</option>
                        <option value="8,00,000">8,00,000</option>
                        <option value="9,00,000">9,00,000</option>
                        <option value="10,00,000">10,00,000</option>

                    </select>
                </div>
                <button type="submit" name="SendRequest" class=" form-control bg-success">Send Request</button>
                <!-- <a href="intro1.php">next page</a> -->

            </div>
        </form>

    </div>
</body>

</html>