<?php
include "connection.php";
if (isset($_POST["Sold"])) {
    $id=$_POST["id"];
    $response=$_POST["response"];
    $bidteam = $_POST["teams"];
    if(empty($_POST["bidprice"])){
        $bidprice =0;
    }
    else{
        $bidprice = $_POST["bidprice"];
    }
    $sql = "UPDATE `Questions` set Response='$response',BidTeam='$bidteam',Bidprice='$bidprice',Display=0 where Id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:bidcontrol.php?action=Solded");
    } else {
        header("location:bidcontrol.php?action=NotSolded");
    }
}
