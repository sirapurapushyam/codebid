<?php
    // include "connection.php";
    if(isset($_POST['login'])){
        $userid=$_POST['Userid'];
        if(($userid == 'C'&& $_POST['Password']=='C@cse115') || ($userid == 'Java'&& $_POST['Password']=='Java@cse178')|| ($userid == 'Python'&& $_POST['Password']=='cse@Python189')|| ($userid == 'Ruby'&& $_POST['Password']=='cse@Ruby23')|| ($userid == 'JavaScript'&& $_POST['Password']=='CSE@JS43')|| ($userid == 'PHP'&& $_POST['Password']=='CSE@php17')|| ($userid == 'CPP' && $_POST['Password']=='Cpp@Cse87')||($userid == 'R' && $_POST['Password']=='R@Cse175'))
        {
            session_start();
            $_SESSION["Teamid"]=$userid;
            header("Location: ./index.php");
        }
        else{
            header("Location:userlogin.php?action=Incorrect Userid or Password");
        }
    }
?>