<?php
    include "connection.php";
    if(isset($_POST['login'])){
        $adminid=$_POST['adminid'];
        $password=$_POST['password'];
        if($adminid == 'codebid' && $password == 'cse@rguktsklmcodebid')
        {
            session_start();
            $_SESSION["Adminid"]=true;
            header("Location:bidcontrol(1).php");
        }
        else{
            header("Location:login.php?action=Wrong password or userid");
        }
        // $sql="SELECT * From users where Userid='$userid'";
        // $result=mysqli_query($conn,$sql);
        // if(mysqli_num_rows($result))
        // {
        //     $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        //     session_start();
        //     $_SESSION["Userid"]=$row["Userid"];
        //     header("Location:home.php");
        // }
    }
?>