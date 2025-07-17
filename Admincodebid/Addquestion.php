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
    <title>Codebid Addquestion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .container {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            align-content: center;
        }

        form {
            width: 700px;
        }
    </style>
</head>

<body>
    <?php if (isset($_GET["action"])) {
        echo $_GET["action"];
    } ?>
    <div class="container">
        <form action="Addquestionaction.php" method="POST">
        <a href="index.php" class="text-light"><button type="button" class="btn btn-primary">Home</button></a>

            <div class="mb-3">
                <label for="Question_id" class="form-label">Question_id</label>
                <input type="text" class="form-control" name="question_id" placeholder="12345">
            </div>
            <div class="mb-3">
                <label for="Question tag" class="form-label">Questionname</label>
                <input type="text" class="form-control" name="questionname" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="Question" class="form-label">Question</label>
                <textarea class="form-control" name="question" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="Question tag" class="form-label">Example</label>
                <textarea class="form-control" name="example" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="Question tag" class="form-label">Questiontags</label>
                <input type="text" class="form-control" name="tags" placeholder="tags">
            </div>
            <div class="mb-3">
                <label for="BasePrice" class="form-label">BasePrice</label>
                <input type="text" class="form-control" name="baseprice" placeholder="30000000">
            </div>
            <input class="btn btn-primary" type="submit" name="submit">
        </form>
    </div>
</body>

</html>