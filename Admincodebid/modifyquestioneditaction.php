<?php
include "connection.php";
if (isset($_POST["Update"])) {
    $id = $_POST["id"];
    $questionid = mysqli_real_escape_string($conn,$_POST["question_id"]);
    $questionname = mysqli_real_escape_string($conn,$_POST["questionname"]);
    // mysqli_real_escape_string($link, $html_character);
    $question = mysqli_real_escape_string($conn,$_POST["question"]);
    $tags = $_POST["tags"];
    $example = mysqli_real_escape_string($conn,$_POST["example"]);
    $baseprice = $_POST["baseprice"];
    $sql = "UPDATE `Questions` set QuestionId='$questionid',Questionname='$questionname',Question='$question',Questiontags='$tags',Example='$example',Baseprice='$baseprice' where Id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:modifyquestion.php?action=Questionedited");
    } else {
        header("location:modifyquestion.php?action=QuestionNotedited");
    }
}
