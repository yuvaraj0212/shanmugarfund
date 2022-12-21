<?php

include "../../../config.php";

if (isset($_POST["SendRequest"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $planAmount = $_POST["plan_amount"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];
    $status = $_POST["status"];

    if ($status === 'approved') {
        $sql = "  INSERT INTO `chit_funds_table`(`userId`,`chit_amount`, `blance_amount`, `paid_amount`, `name`, `phone`) 
        VALUES ($id,'$planAmount','0','0','$name','$phone');";
        $result = $db->query($sql);

        if ($result == TRUE) {
            $sql = "UPDATE `user_table` SET `chit_status` = '$status'  WHERE `id`=$id";
            $result = $db->query($sql);

            if ($result == TRUE) {
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
        $sql = "UPDATE `user_table` SET `chit_status` = '$status'  WHERE `id`=$id";
    }
    $result = $db->query($sql);

    if ($result == TRUE) {

        // header("location:./home.php");
        echo '<script> 
    window.location.href="./request.php";
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

        $planAmount = $row['chit_amount'];

        // $gender = $row['gender'];

        $id = $row['id'];


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
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter plane" name="plan_amount" readonly
                        autocomplete="off" value="<?php echo $planAmount; ?>">
                </div>

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