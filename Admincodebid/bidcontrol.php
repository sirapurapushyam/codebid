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
    <title>Codebid BidIncrease</title>
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
    <div class="container">
    <a href="index.php" class="text-light"><button type="button" class="btn btn-primary">Home</button></a>
<p><?php if(isset($_GET["action"])){echo $_GET["action"];}?></p>
    
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">QuestionId</th>
                            <th scope="col">BasePrice</th>
                            <th scope="col">Response</th>
                            <th scope="col">BidTeam</th>
                            <th scope="col">BidPrice</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include "connection.php";
                        $sql = "SELECT * FROM Questions where BidTeam = ''";
                        // $sql1 = "SELECT `Eventname` from `Events` where `Userid`='$userid'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $id = $row["Id"];
                                $questionid = $row["QuestionId"];
                                $baseprice = $row["Baseprice"];
                                $bidprice = $row["Bidprice"];
                                echo '<tr>
                <td>' . $questionid . '</td>
                <td>' . $baseprice . '</td>
                <form action="bidcontrolsoldaction.php" method="POST">
                <td><input type="text" name="response" style="width: 70px;"></td>
                <td><select name="teams">
                <option selected value="C">C</option>
                <option value="Java">Java</option>
                <option value="Python">Python</option>
                <option value="Ruby">Ruby</option>
                <option value="PHP">PHP</option>
                <option value="JavaScript">JavaScript</option>
                <option value="R">R</option>
                <option value="CPP">CPP</option>
                <option value="Unsold">Unsold</option>
              </select></td>
              <td><input type="text" name="bidprice" value="'.$bidprice.'"><input type="hidden" name="id" value='. $id .'></td>
                <td width=250px>
                    <input type="submit" class="btn btn-primary" name="Sold" value="Sold">
                    <a href="displayaction.php?display_id=' . $id . '" class="text-light"><button type="button" class="btn btn-success">Display</button></a>
                    </form>
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