<?php
session_start();
if (!isset($_SESSION["Adminid"]) || $_SESSION["Adminid"] !== true) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codebid Adminhome</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<a href="logout.php" class="text-light"><button type="button" class="btn btn-danger">logout</button></a>
    <div style=" display: flex;
    justify-content: center;
    height: 500px;
    align-items: center;">
    <a href="Addquestion.php" class="text-light"><button type="button" class="btn btn-primary">Add question</button></a>
    <a href="modifyquestion.php" class="text-light"><button type="button" class="btn btn-success">Modify question</button></a>
    <a href="bidcontrol.php" class="text-light"><button type="button" class="btn btn-danger">Bid control</button></a>
    <a href="modifybid.php" class="text-light"><button type="button" class="btn btn-primary">Modify bid</button></a>
    <a href="bidincrease.php" class="text-light"><button type="button" class="btn btn-success">Bid increase</button></a>
    <!-- <button type="button" class="btn btn-danger"><a href="userhome.php" class="text-light">userhome</button> -->

    </div>
</body>
</html> 