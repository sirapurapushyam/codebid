<?php
include "connection.php";
if (isset($_GET["display_id"])) {
    $id=$_GET["display_id"];
    $sql = "UPDATE `Questions` set Display=1 where Id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:bidcontrol.php?action='displayed'");
    } else {
        header("location:bidcontrol.php?action='notdisplayed'");

    }
}
