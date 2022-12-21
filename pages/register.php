<?php
include("../config.php");
session_start();
if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $password = md5($password);

    $sql_u = "select * from user_table where email='$email'";
    $res = mysqli_query($db, $sql_u) or die(mysqli_error($db));
    if (mysqli_num_rows($res) > 0) {
        $name_error = "Email Already Exist";
    } else {
        $sql = "insert into `user_table`(name,email,phone,password) value('$name','$email','$phone','$password')";
        $result = mysqli_query($db, $sql);
        if ($result) {

            $sql = "SELECT * FROM `user_table` WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['login'] = true;
            $_SESSION['userDetails'] = $row;
            echo '<script> 
        window.location.href="./intro1.php";
        </script>';
        } else {
            echo '<script> 
        alert("Register Unsecusseful")
      </script>';
        }
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
        <form class="form" method="post">
            <div class="form-layout">
                <h2><b>Create an account</b></h2>

                <div class="img-row">
                    <h3>create your account at<br>Shanmugar Gold &Savings<br>Chits.</h3>
                </div>
                <?php if (isset($name_error)): ?>
                <p id="error" class="text-center text-danger">
                    <?php echo ($name_error) ?>
                </p>
                <?php endif ?>
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
                    <input type="password" class="form-control" placeholder="Password" name="password" required
                        autocomplete="off">
                </div>
                <button type="submit" name="register" class=" form-control bg-success">Sign up</button>
                <!-- <a href="intro1.php">next page</a> -->

                <p class="text-center">Already have an account? <a href="../index.php"> <b>Login</b></a></p>
            </div>
        </form>
        <div class="bank-img">
            <img src="../assets/images/bank.png" alt="bank-icon">
        </div>

    </div>
</body>

</html>