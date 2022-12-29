<?php

include "../../config.php";

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "DELETE FROM user_table WHERE `id`=$user_id";
    $result = $db->query($sql);

    if ($result === true) {
        echo ($user_id);
        echo '<script> 
        window.location.href="./home.php";
        </script>';

    } else {

        echo "Error:" . $sql . "<br>" . $db->error;

    }

}

?>