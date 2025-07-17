<?php
    include "connection.php";
    if(isset($_GET['id_del']))
    {
        $id=$_GET['id_del'];
        $sql="DELETE from `Questions` where Id=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
            header("location:modifyquestion.php?action=Questiondeleted");
        }
        else{
            header("location:modifyquestion.php?action=QuestionNotdeleted");
        }
    }
?>