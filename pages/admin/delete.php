<?php

include "../../config.php";

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `chit_table` WHERE `id`='$user_id'";

    $result = $db->query($sql);

    if ($result == TRUE) {
        // header("location:./home.php");
        echo '<script> 
        window.location.href=".home.php";
        </script>';

    } else {

        echo "Error:" . $sql . "<br>" . $db->error;

    }

}

?>