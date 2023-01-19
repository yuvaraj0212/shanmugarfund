<?php

include "../../config.php";

if (isset($_POST["SendRequest"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $planAmount = $_POST["planeAmount"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];

    $sql = "UPDATE `chit_table` SET `name`='$name',`phone`='$phone',`email`='$email',`planAmount`='$planAmount' WHERE `id`='$id'";

    $result = $db->query($sql);

    if ($result == TRUE) {

        // header("location:./home.php");
        echo '<script> 
    window.location.href="./home.php";
    </script>';

    } else {

        echo "Error:" . $sql . "<br>" . $db->error;

    }

}

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `user_table` WHERE `id`='$user_id'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $name = $row['name'];

        $phone = $row['phone'];

        $email = $row['email'];

        $planAmount = $row['festival_amount'];

        // $gender = $row['gender'];

        $id = $row['id'];


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
                        autocomplete="off" value="<?php echo $name; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter email" name="email" required
                        autocomplete="off" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Enter mobile" name="phone" required
                        autocomplete="off" value="<?php echo $phone; ?>">
                </div>
                <div class="form-group">

                    <select name="planeAmount" id="cars" class="form-control" required autocomplete="off"
                        value="<?php echo $planAmount; ?>">
                        <?php
                        switch ($planAmount) {
                            case '50,000':
                                echo ('  <option value="50,000" selected>50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                ;
                                break;
                            case "1,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000"selected>1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                break;
                            case "2,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000"selected>2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                break;
                            case "3,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000"selected>3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                ;
                                break;
                            case "4,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000"selected>4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                break;
                            case "5,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000"selected>5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                break;
                            case "6,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000"selected>6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                ;
                                break;
                            case "7,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000"selected>7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                break;
                            case "8,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000"selected>8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                break;
                            case "9,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000"selected>9,00,000</option>
        <option value="10,00,000">10,00,000</option>');
                                break;
                            case "10,00,000":
                                echo ('  <option value="50,000">50,000</option>
        <option value="1,00,000">1,00,000</option>
        <option value="2,00,000">2,00,000</option>
        <option value="3,00,000">3,00,000</option>
        <option value="4,00,000">4,00,000</option>
        <option value="5,00,000">5,00,000</option>
        <option value="6,00,000">6,00,000</option>
        <option value="7,00,000">7,00,000</option>
        <option value="8,00,000">8,00,000</option>
        <option value="9,00,000">9,00,000</option>
        <option value="10,00,000"selected>10,00,000</option>');
                                break;
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="SendRequest" class=" form-control bg-success">Send Request</button>
                <!-- <a href="intro1.php">next page</a> -->

            </div>
        </form>

    </div>
</body>

</html>