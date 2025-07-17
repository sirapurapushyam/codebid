<?php
include "connection.php"; // Include your database connection file
    echo '<div class="container mx-auto p-4">';
    echo '<h2 class="text-center text-dark fw-bolder">Your Questions</h2>';
    $team=$_GET['Team'];
    echo '<div class="tableHeader mt-3" id="tableHeader">';
    echo '<div><span class="d-flex justify-content-center align-items-center mb-1 pb-1" style="align-items: center;"><img src="./images/'.$team.'.png" alt="'.$team.' logo" class="teamlogoHeader" /><h3 class="pt-2">&nbsp;Team ' . $team . '</h3></span></div>';
    echo '<h3><span class="rounded-pill d-flex align-items-center px-2">
            Current Purse: &nbsp;
            <div class="d-flex align-items-center">
                <i class="bx bx-rupee mt-1"></i>
                <span id="RAmount"></span>
            </div>
        </span></h3>';
    echo '</div>';
    echo '<div class="table-responsive">';
    echo '<table class="table table-responsive table-hover table-striped table-borderedless" border="1">';
    echo '<thead class="bg-secondary table-secondary">';
    echo '<tr>';
    echo '<th scope="col">&nbsp;S.No</th>';
    echo '<th scope="col">Question_ID</th>';
    echo '<th scope="col">Question</th>';
    echo '<th scope="col" class="text-nowrap">Bid Price</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';


    $sql = "SELECT * FROM Questions where BidTeam='$team'";
    $result = mysqli_query($conn, $sql);
    $RAmount=500000000;
    if (mysqli_num_rows($result)) {
        $count = 1;
        $bidsum=0;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $question = $row["Question"];
            $bidsum+=$row["Bidprice"];
            $bidprice = $row["Bidprice"];
            $questionid = $row["QuestionId"];
            echo '<tr>';
            echo '<td>&nbsp;' . $count++ . '</td>';
            echo '<td>' . $questionid . '</td>';
            echo '<td><pre>' . $question . '</pre></td>';
            if($bidprice < 10000000)
            {
                echo '<td>' . $bidprice /100000 . 'L</td>';
        
        
        
            }
            elseif($bidprice >= 10000000){
                echo '<td>' . $bidprice /10000000 . 'Cr</td>';
        
            }
            
            echo '</tr>';
        }
        $RAmount=$RAmount-$bidsum;
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    if($RAmount < 10000000)
    {
        $RAmount=$RAmount / 100000;
        echo '<script>  $("#RAmount").text("'.$RAmount.'L"); </script>';



    }
    elseif($RAmount >= 10000000){
        $RAmount=$RAmount / 10000000;
        echo '<script>  $("#RAmount").text("'.$RAmount.'Cr"); </script>';

    }
?>
