<?php

include "../../../config.php";

if (isset($_POST["SendRequest"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $planAmount = $_POST["plan_amount"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];
    $status = $_POST["status"];
    // Add a recipient 
    $mail->addAddress($email);
    // Set email format to HTML 
    $mail->isHTML(true);

    // Mail subject 
    $mail->Subject = 'THANKS FOR SUBSCRIBING SHANMUGAR FUNDS ';

    // Mail body content 
    $bodyContent = '<h1>Chit funds Status</h1>
<p>Hi ' . $name . ', </p><br>
Your request Now ' . $status . '.<br>
pls check your mobile app
';

    $mail->Body = $bodyContent;

    if ($status === 'approved') {
        $sql = "  INSERT INTO `gold_funds_table`(`userId`,`gold_amount`, `blance_amount`, `paid_amount`, `name`, `phone`) 
        VALUES ($id,'$planAmount','0','0','$name','$phone');";
        $result = $db->query($sql);

        if ($result == TRUE) {
            $sql = "UPDATE `user_table` SET `gold_status` = '$status',`gold_amount`='$planAmount'  WHERE `id`=$id";
            $result = $db->query($sql);

            if ($result == TRUE) {


                if (!$mail->send()) {
                    echo '<script> 
                    alert(' . $mail->ErrorInfo . ')
                    </script>';
                }
                echo '<script> 
                window.location.href="./request.php";
                </script>';
            } else {
                echo "Error:" . $sql . "<br>" . $db->error;
            }
        } else {
            echo "Error:" . $sql . "<br>" . $db->error;
        }

    } else {
        $sql = "UPDATE `user_table` SET `gold_status` = '$status' ,`gold_amount`='$planAmount' WHERE `id`=$id";

        $result = $db->query($sql);

        if ($result == TRUE) {

            if (!$mail->send()) {
                echo '<script> 
                alert(' . $mail->ErrorInfo . ')
                </script>';
            }
            echo '<script> 
    window.location.href="./request.php";
    </script>';
        } else {
            echo $mail->ErrorInfo;
        }


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

        $planAmount = $row['gold_amount'];

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
    <link rel='stylesheet' type='text/css' media='screen' href='../../../main.css'>
</head>

<body>
    <div class="container">
        <h1 class="head-titele">Shanmugar Gold & Savings chits</h1>
        <form class="form" method="POST">
            <div class="form-layout text-center">
                <h2><b>Welcome to Gold fund schemes</b></h2>
                <div class="img-row">
                    <!-- <h3>Interest 9.5%, months-20</h3> -->
                </div>
                <!-- <p class="mt-4"><b>Name :</b>
                    <?php# echo ($name) ?>
                </p>
                <p class=""><b>Email :</b>
                    <?php# echo ($email) ?>
                </p>
                <p class=""><b>Phone :</b>
                    <?php #echo ($phone) ?>
                </p>
                <p class=""><b>planAmount :</b>
                    <?php #echo ($planAmount) ?>
                </p> -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" readonly
                        autocomplete="off" value="<?php echo $name; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter email" name="email" readonly
                        autocomplete="off" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Enter mobile" name="phone" readonly
                        autocomplete="off" value="<?php echo $phone; ?>">
                </div>
                <!-- <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter plane" name="plan_amount" readonly
                        autocomplete="off" value="<?#php echo $planAmount; ?>">
                </div> -->
                <select id="cars" class="form-control form-select" required autocomplete="off" name="plan_amount"
                    value="<?php echo $planAmount; ?>">
                    <?php
                    switch ($planAmount) {
                        case '500':
                            echo ('  <option value="500" selected>500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="6000">6000</option>
        <option value="7000">7000</option>
        <option value="8000">8000</option>
        <option value="9000">9000</option>
        <option value="10000">10000</option>');
                            ;
                            break;
                        case "1000":
                            echo ('  <option value="500">500</option>
        <option value="1000"selected>1000</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="6000">6000</option>
        <option value="7000">7000</option>
        <option value="8000">8000</option>
        <option value="9000">9000</option>
        <option value="10000">10000</option>');
                            break;
                        case "2000":
                            echo ('  <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000"selected>2000</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="6000">6000</option>
        <option value="7000">7000</option>
        <option value="8000">8000</option>
        <option value="9000">9000</option>
        <option value="10000">10000</option>');
                            break;
                        case "3000":
                            echo ('  <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
        <option value="3000"selected>3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="6000">6000</option>
        <option value="7000">7000</option>
        <option value="8000">8000</option>
        <option value="9000">9000</option>
        <option value="10000">10000</option>');
                            ;
                            break;
                        case "4000":
                            echo ('  <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="4000"selected>4000</option>
        <option value="5000">5000</option>
        <option value="6000">6000</option>
        <option value="7000">7000</option>
        <option value="8000">8000</option>
        <option value="9000">9000</option>
        <option value="10000">10000</option>');
                            break;
                        case "5000":
                            echo ('  <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000"selected>5000</option>
        <option value="6000">6000</option>
        <option value="7000">7000</option>
        <option value="8000">8000</option>
        <option value="9000">9000</option>
        <option value="10000">10000</option>');
                            break;
                        case "6000":
                            echo ('  <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="6000"selected>6000</option>
        <option value="7000">7000</option>
        <option value="8000">8000</option>
        <option value="9000">9000</option>
        <option value="10000">10000</option>');
                            ;
                            break;
                        case "7000":
                            echo ('  <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="6000">6000</option>
        <option value="7000"selected>7000</option>
        <option value="8000">8000</option>
        <option value="9000">9000</option>
        <option value="10000">10000</option>');
                            break;
                        case "8000":
                            echo ('  <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="6000">6000</option>
        <option value="7000">7000</option>
        <option value="8000"selected>8000</option>
        <option value="9000">9000</option>
        <option value="10000">10000</option>');
                            break;
                        case "9000":
                            echo ('  <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="6000">6000</option>
        <option value="7000">7000</option>
        <option value="8000">8000</option>
        <option value="9000"selected>9000</option>
        <option value="10000">10000</option>');
                            break;
                        case "10000":
                            echo ('  <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="4000">4000</option>
        <option value="5000">5000</option>
        <option value="6000">6000</option>
        <option value="7000">7000</option>
        <option value="8000">8000</option>
        <option value="9000">9000</option>
        <option value="10000"selected>10000</option>');
                            break;
                    }
                    ?>
                </select>
                <div class="form-group">

                    <select name="status" id="cars" class="form-control" required autocomplete="off">
                        <option value="request">Request</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                    </select>
                </div>
                <button type="submit" name="SendRequest" class=" form-control bg-success">Send Request</button>

            </div>
        </form>

    </div>
</body>

</html>