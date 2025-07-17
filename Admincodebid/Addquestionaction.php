<?php
include "connection.php";
if (isset($_POST["submit"])) {
    $questionid = $_POST["question_id"];
    $questionname =mysqli_real_escape_string($conn,$_POST["questionname"]);
    $question = mysqli_real_escape_string($conn,$_POST["question"]);
    $tags = $_POST["tags"];
    $example = mysqli_real_escape_string($conn,$_POST["example"]);
    if (empty($_POST["baseprice"])) {
        $baseprice = 0;
    } else {
        $baseprice = $_POST["baseprice"];
    }
    $sql = "INSERT into `Questions`(QuestionId,Questionname,Question,Questiontags,Example,Baseprice,Response,Bidprice,BidTeam,Display) VALUES ('$questionid','$questionname','$question','$tags','$example','$baseprice','','$baseprice','',0)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:Addquestion.php?action='success'");
    } else {
        header("location:Addquestion.php?action='unsuccess'");
    }
}
