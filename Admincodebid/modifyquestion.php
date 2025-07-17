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
    <title>Codebid Modifyquestion</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container {
            padding: 2rem 0rem;
        }

        h4 {
            margin: 2rem 0rem 1rem;
        }

        .table-image {

            td,
            th {
                vertical-align: middle;
            }
        }
    </style>
</head>

<body>
<p><?php if(isset($_GET["action"])){echo $_GET["action"];}?></p>
    <div class="container">
    <a href="Addquestion.php" class="text-light"><button type="button" class="btn btn-primary">Add question</button></a>
    <a href="index.php" class="text-light"><button type="button" class="btn btn-info">Home</button></a>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">QuestionId</th>
                            <th scope="col">Questionname</th>
                            <th scope="col">Question</th>
                            <th scope="col">Questiontags</th>
                            <th scope="col">Exampleinput</th>
                            <th scope="col">BasePrice</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include "connection.php";
                        $sql = "SELECT * FROM Questions";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $id = $row["Id"];
                                $questionid = $row["QuestionId"];
                                $questionname=$row["Questionname"];
                                $question = $row["Question"];
                                $tags = $row["Questiontags"];
                                $example=$row["Example"];
                                $baseprice = $row["Baseprice"];
                                echo '<tr>
                <td>' . $questionid . '</td>
                <td>' . $questionname . '</td>
                <td><pre>' . $question . '</pre></td>
                <td>' . $tags . '</td>
                <td>' . $example . '</td>                
                <td>' . $baseprice . '</td>
                <td width=250px>
                <a href="modifyquestionedit.php?id1=' . $id . '" class="text-light"><button type="button" class="btn btn-success">Edit</button></a>
                <a href="modifyquestiondel.php?id_del=' . $id . '" class="text-light"><button type="button" class="btn btn-danger">Delete</button></a>
                </td>
            </tr>';
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>