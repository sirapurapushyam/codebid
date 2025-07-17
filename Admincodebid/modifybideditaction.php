<?php
include "connection.php";
if (isset($_POST["Update"])) {
    $id = $_POST["id"];
    //$questionid = $_POST["question_id"];
    $bidteam = $_POST["BidTeam"];
    $bidprice = $_POST["Bidprice"];
    $display= $_POST["Display"];
    $sql = "UPDATE `Questions` set BidTeam='$bidteam',Bidprice='$bidprice',Display='$display' where Id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:modifybid.php?action=Bidedited");
    } else {
        echo "notsuccess";
    }
}
?>