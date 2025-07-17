<?php
include "connection.php";
if (isset($_GET['id1'])) {
    $id = $_GET["id1"];
    $sql = "SELECT * FROM Questions where Id='$id'";
    // $sql1 = "SELECT `Eventname` from `Events` where `Userid`='$userid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $id = $row["Id"];
        $questionid = $row["QuestionId"];
        $questionname=$row["Questionname"];
        $question = $row["Question"];
        $tags = $row["Questiontags"];
        $example=$row["Example"];
        $baseprice = $row["Baseprice"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codebid Modifyquestion</title>
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
    <div class="container">
    <form action="modifyquestioneditaction.php" method="POST">
        <div class="mb-3">
            <label for="Question_id" class="form-label">Id</label>
            <input type="text" class="form-control" name="id" value=<?php echo $id;?> readonly>
        </div>
        <div class="mb-3">
            <label for="Question_id" class="form-label">Question_id</label>
            <input type="text" class="form-control" name="question_id" value=<?php echo $questionid; ?>>
        </div>
        <div class="mb-3">
            <label for="Question tag" class="form-label">Questionname</label>
            <textarea class="form-control" name="questionname" rows="3"><?php echo $questionname;?></textarea>
        </div>
        <div class="mb-3">
            <label for="Question" class="form-label">Question</label>
            <textarea class="form-control" name="question" rows="3"><?php echo $question;?></textarea>
        </div>
        <div class="mb-3">
            <label for="Question tag" class="form-label">Example</label>
            <textarea class="form-control" name="example" rows="3"><?php echo $example;?></textarea>
        </div>
        <div class="mb-3">
            <label for="Question tag" class="form-label">Questiontags</label>
            <textarea class="form-control" name="tags" rows="3"><?php echo $tags;?></textarea>
        </div>
        <div class="mb-3">
            <label for="BasePrice" class="form-label">BasePrice</label>
            <input type="text" class="form-control" name="baseprice" value=<?php echo $baseprice; ?>>
        </div>
        <input class="btn btn-primary" type="submit" name="Update">
    </form>
    </div>
</body>

</html>