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
        $bidteam = $row["BidTeam"];
        $bidprice = $row["Bidprice"];
        $display= $row["Display"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codebid Modifybid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <form action="modifybideditaction.php" method="POST">
    <input type="hidden" name="id" value=<?php echo $id ?>>
        <div class="mb-3">
            <label for="Question_id" class="form-label">Question_id</label>
            <input type="text" class="form-control" name="question_id" value=<?php echo $questionid; ?>>
        </div>
        <div class="mb-3">
            <label for="BidTeam" class="form-label">BidTeam</label>
            <textarea class="form-control" name="BidTeam" rows="3"><?php echo $bidteam;?></textarea>
        </div>
        <div class="mb-3">
            <label for="BidPrice" class="form-label">BidPrice</label>
            <input type="text" class="form-control" name="Bidprice" value=<?php echo $bidprice; ?>>
        </div>
        <div class="mb-3">
            <label for="Display" class="form-label">Display</label>
            <input type="text" class="form-control" name="Display" value=<?php echo $display; ?>>
        </div>
        <input type="submit" name="Update">
    </form>
</body>

</html>