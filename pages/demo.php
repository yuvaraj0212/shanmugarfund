<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>demo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>

<body>
    <?php
    include("../config.php");
    $sql = "SELECT * FROM `user_table` ";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
        <img src="./storage/<?= $row['adhar'] ?>" alt="<?$row['pan'] ?>">
    <?php } ?>

</body>

</html>