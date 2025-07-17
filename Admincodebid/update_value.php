<?php
include "connection.php";
$newValue = $_POST['newValue'];
$sql = "UPDATE `Questions` SET Bidprice='$newValue' where Display=1";
$result = mysqli_query($conn, $sql);
