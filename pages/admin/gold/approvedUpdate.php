<?php

include "../../../config.php";

if (isset($_POST["SendRequest"])) {

    $currentPay = $_POST["current_paid_amount"];
    $totalPay = $_POST["paid_amount"];
    $currrnt_day_gram = $_POST["currrnt_day_gram"];
    $total_gram = $_POST["total_gram"];
    $total = $_POST["total_amount"];
    $next_due = $_POST["next_due"];
    $blance = $_POST["blance_amount"];
    $id = $_POST["id"];

    $new_balance = (int) $blance - (int) $currentPay;
    $new_pay = (int) $totalPay + (int) $currentPay;
    $new_gram = (float) $total_gram + (float) $currrnt_day_gram;
    $sql = "UPDATE `gold_funds_table` SET `total_gram` = '$new_gram',`blance_amount` = '$new_balance', `paid_amount` = '$new_pay', `next_due` = '$next_due' WHERE `gold_funds_table`.`userId` = '$id'";
    $result = $db->query($sql);
    if ($result == TRUE) {
        echo '<script> 
        window.location.href="./approved.php";
        </script>';

    } else {

        echo "Error:" . $sql . "<br>" . $db->error;

    }

}

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `gold_funds_table` WHERE `userId`='$user_id'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone = $row['phone'];
        $id = $row['userId'];
        $planAmount = $row['gold_amount'];
        $balance_amonunt = $row['blance_amount'];
        $paidAmount = $row['paid_amount'];
        $next_due = $row['next_due'];
        $total_gram = $row['total_gram'];
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
                <h2><b>Welcome to Chit fund schemes</b></h2>
                <div class="img-row">
                    <h3>Interest 9.5%, months-20</h3>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" readonly
                        autocomplete="off" value="<?php echo $name; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="blance_amount" value="<?php echo $balance_amonunt; ?>">
                    <input type="hidden" name="paid_amount" value="<?php echo $paidAmount; ?>">
                    <input type="hidden" name="total_amount" value="<?php echo $planAmount; ?>">
                    <input type="hidden" name="total_gram" value="<?php echo $total_gram; ?>">
                    <input type="hidden" name="next_due" value="<?php echo $next_due; ?>">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Enter mobile" name="phone" readonly
                        autocomplete="off" value="<?php echo $phone; ?>">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Paid Amount" name="current_paid_amount"
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="currrnt gram" name="currrnt_day_gram"
                        autocomplete="off">
                </div>
                <button type="submit" name="SendRequest" class=" form-control bg-success">Send Request</button>

            </div>
        </form>

    </div>
</body>

</html>