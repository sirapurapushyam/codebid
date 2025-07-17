<?php
$team = $_GET['Team'];
include "connection.php";
$sql = "SELECT * FROM Questions where BidTeam='$team' and Response=''";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $id = $row["QuestionId"];
        $answer= $_POST[$id];
        $sql1 = "UPDATE `Questions` set Response='$answer'  where QuestionId='$id'";
        $result1 = mysqli_query($conn, $sql1);
        if ($result) {
            header("location:index.php?action=Submitted");
        }
    else{
        header("location:index.php?action=NotSubmitted");
    }
    }
}
