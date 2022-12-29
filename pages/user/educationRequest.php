<?php
include("../../config.php");
// include('../../sendmail.php');
session_start();
if (!isset($_SESSION['login'])) {
    echo '<script> 
    window.location.href="./home.php";
    </script>';
}
if (isset($_POST["SendRequest"])) {
    $planamt = $_POST["planeAmount"];
    $id = (int) $_SESSION['userDetails']['id'];
    $name = (int) $_SESSION['userDetails']['name'];
    $due = (string) ((int) $planamt / 11 * 100);
    $sql = "UPDATE `user_table` SET `education_status` = 'request', `education_amount` = '$planamt'WHERE `user_table`.`id` = $id;";
    $result = mysqli_query($db, $sql);
    if ($result) {
        $sql = "SELECT * FROM `user_table`  WHERE `user_table`.`id` = $id;";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['userDetails'] = $row;
        // Add a recipient 
        $mail->addAddress($_SESSION['userDetails']['email']);
        // Set email format to HTML 
        $mail->isHTML(true);

        // Mail subject 
        $mail->Subject = 'THANKS FOR SUBSCRIBING SHANMUGAR FUNDS ';

        // Mail body content 
        $bodyContent = '<h1>Chit funds Request</h1>
        <h1>name :  ' . $_SESSION['userDetails']['name'] . ' </h1>
        <h1>phone : ' . $_SESSION['userDetails']['phone'] . ' </h1>
        <h1>email: ' . $_SESSION['userDetails']['email'] . ' </h1>
        <h1>amount :  ' . $_SESSION['userDetails']['chit_amount'] . ' </h1>';



        $mail->Body = $bodyContent;
        if ($mail->send()) {
            echo '<script> 
            window.location.href="./education.php";
            </script>';
        } else {
            echo $mail->ErrorInfo;
        }


    } else {
        echo ("Error description: " . $db->error);
        //     echo '<script> 
        //     alert("Register Unsecusseful")
        //   </script>';
    }

}

?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Shanmugarfunds</title>
    <!-- Bootstrap only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../main.css'>
    <script src='main.js'></script>
</head>

<body>
    <div class="container">
        <h1 class="head-titele">Shanmugar Gold & Savings chits</h1>
        <form class="form" method="POST">
            <div class="form-layout">
                <h2><b>Welcome to Education fund schemes</b></h2>
                <div class="img-row">
                    <h3>Interest 11%, months-12</h3>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" readonly
                        autocomplete="off" value="<?php echo $_SESSION['userDetails']['name']; ?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter email" name="email" readonly
                        autocomplete="off" value="<?php echo $_SESSION['userDetails']['email']; ?>">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Enter mobile" name="phone" readonly
                        autocomplete="off" value="<?php echo $_SESSION['userDetails']['phone']; ?>">
                </div>
                <p class='text-center'><b>select your plan amount:</b></p>
                <div class="form-group">
                    <!-- <input type="" class="form-control" placeholder="Password" name="passsword" required
                        autocomplete="off"> -->

                    <select name="planeAmount" id="cars" class="form-control form-select" required autocomplete="off">
                        <option value="25000">25000 x 12</option>
                        <option value="75000 ">75000 x 12</option>
                        <option value="100000">100000 x 12</option>
                        <option value="125000">125000 x 12</option>
                        <option value="150000">150000 x 12</option>
                        <option value="175000">175000 x 12</option>
                        <option value="200000">7,00,000 x 12</option>

                    </select>
                </div>
                <button type="submit" name="SendRequest" class=" form-control bg-success">Send Request</button>
                <!-- <a href="intro1.php">next page</a> -->

            </div>
        </form>

    </div>
</body>

</html>