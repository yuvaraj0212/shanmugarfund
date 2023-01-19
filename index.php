<?php
include("./config.php");
session_start();
if (isset($_SESSION['login'])) {
    // header("Location:./pages/user/home.php");
    echo '<script> 
      window.location.href="./pages/user/home.php";
      </script>';
}
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $password = md5($password);

    $sql = "SELECT * FROM `user_table` WHERE email = '$email' or phone ='$email' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        if ($row['loginAs'] == 'admin') {
            # code...
            $_SESSION['login'] = true;
            $_SESSION['admin'] = true;
            $_SESSION['userDetails'] = $row;
            echo '<script> 
      window.location.href="./pages/admin/home.php";
      </script>';
        }
        if ($row['loginAs'] == 'user') {
            # code...
            $_SESSION['login'] = true;
            $_SESSION['userDetails'] = $row;
            // header("Location:./pages/user/home.php");
            echo '<script> 
      window.location.href="./pages/user/home.php";
      </script>';
        } else {

            $_SESSION['error'] = "badcredentials";
        }
    } else {
        $_SESSION['error'] = "badcredentials";
    }

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Shanmugarfunds</title>
    <!-- Bootstrap only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <div class="container">
        <h1 class="head-titele">Shanmugar Gold & Savings chits</h1>
        <form action="" class="form" method="post">
            <div class="form-layout">
                <h1>Wellcome to</h1>
                <div class="img-row">
                    <h3>Shanmugar Gold & <br> Savings Chits</h3>
                    <img src="" alt="">
                    <h2>Login</h2>
                </div>
                <?php
                if (isset($_SESSION['error'])) { ?>
                    <p id="error" class="text-danger text-center">
                        <?= $_SESSION['error']; ?>
                    </p>
                    <?php unset($_SESSION['error'])
                    ;
                } ?>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter email" name="email" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required
                        autocomplete="off">
                </div>

                <button type="submit" name="login" class=" form-control bg-success">Submit</button>

                <p class="text-center">Forget Password ?</p>

                <p class="text-center">Don't have an account? <a href="pages/register.php"> <b>Sign up</b></a></p>
            </div>
        </form>
        <div class="bank-img">
            <img src="./assets/images/bank.png" alt="bank-icon">
        </div>
    </div>

</body>

</html>