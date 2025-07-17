<?php
include "connection.php"; // Include your database connection file

$teams = array("C", "Java", "Python", "Ruby", "JavaScript", "PHP", "CPP","R");
echo '<div class="d-flex gap-4 px-5 py-4 rounded bg-teritiary" id="logoSection">
    <a href="#C1"><img src="./images/C.png" alt="C logo" class="teamlogo" style="border-color:blue;"/><a>
    <a href="#Java1"><img src="./images/Java.png" alt="Java logo" class="teamlogo" style="border-color:red;"/><a>
    <a href="#Python1"><img src="./images/Python.png" alt="Python logo" class="teamlogo" style="border-color:yellow;"/><a>
    <a href="#Ruby1"><img src="./images/Ruby.png" alt="Ruby logo" class="teamlogo" style="border-color:red;"/><a>
    <a href="#JavaScript1"><img src="./images/JavaScript.png" alt="JavaScript logo" class="teamlogo" style="border-color:yellow;"/><a>
    <a href="#PHP1"><img src="./images/PHP.png" alt="PHP logo" class="teamlogo" style="border-color:purple;"/><a>
    <a href="#CPP1"><img src="./images/CPP.png" alt="C++ logo" class="teamlogo" style="border-color:blue;"/><a>
    <a href="#R1"><img src="./images/R.png" alt="R logo" class="teamlogo" style="border-color:blue;"/><a>
</div>';
foreach ($teams as $team) {
    echo '<div class="container" id="'.$team.'1">';
    echo '<div class="tableHeader" id="tableHeader">';
    echo '<div class="text-center mb-3 pb-1"><img src="./images/'.$team.'.png" alt="'.$team.' logo" class="teamlogoHeader" /><h3 class="pt-2">Team '. $team. '</h3></div>';
    echo '<h3><span class="rounded-pill d-flex align-items-center px-2">
            Current Purse: &nbsp;
            <i class="bx bx-rupee mt-1"></i>
            <span id="'.$team.'"></span>
        </span></h3>';
    echo '</div>';
    echo '<div class="table-responsive mb-5 shadow-lg rounded">';
    echo '<table class="table table-hover table-striped table-bordered" id="teamTable">';
    echo '<thead class="table-dark text-center">';
    echo '<tr>';
    echo '<th scope="col">&nbsp;&nbsp;S.No</th>';
    echo '<th scope="col">Question_ID</th>';
    echo '<th scope="col">Bid Price</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody class="table-tertiary text-center">';
    $sql = "SELECT * FROM Questions where BidTeam='$team'";
    $result = mysqli_query($conn, $sql);
    $bidsum=0;
    $RAmount=500000000;
    if (mysqli_num_rows($result)) {
        $count = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $questionid = $row["QuestionId"];
            $bidprice = $row["Bidprice"];
            $question=$row["Question"];
            $bidprice=$row["Bidprice"];
            $bidsum+=$row["Bidprice"];
            $example=$row["Example"];
            $tags=$row["Questiontags"];
            $questionname=$row["Questionname"];
            echo '<tr>';
            echo '<td>&nbsp;&nbsp;' . $count++ . '</td>';
            // Unique ID for each modal
            $modalId = 'exampleModal' . $questionid;
            echo '<td><button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#' . $modalId . '">
                    '.$questionid.'</button></td>';
            // echo '<td><a class="btn btn-primary" href=question.php?questionid='.$questionid. '>'. $questionid . '</a></td>';
            if($bidprice < 10000000)
            {
                $bidprice=$bidprice / 100000;
                echo '<td>'.$bidprice.'L</td>';
            }
            elseif($bidprice >= 10000000){
                $bidprice=$bidprice / 10000000;
                echo '<td>'.$bidprice.'Cr</td>';
            } 
            echo '</tr>';
            // Modal corresponding to each button
            /* echo '<div class="modal fade text-dark shadow-lg" id="'.$modalId.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
            


                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <div class="text-center ms-auto fw-bolder text-danger"><h3>'.$questionid.'</h3></div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div >
                            <div class="modal-fullscreen">';
                            if(!empty($questionname))
                            {
                                echo " <h2 class='card-title text-danger mb-3'>".$questionname."</h2>";
                            } 
                            echo '<div class="row-md-4 d-flex flex-column align-items-center">';
                             if(!empty($tags))
                             {
                                $array = explode(",", $tags);
                                echo '<div class="d-flex  gap-3 mb-3">';
                                foreach ($array as $tag) {
                                   echo '<small class="btn btn-secondary rounded-pill btn-sm">'.$tag.'</small>';
                                }
                                echo '</div>';
                             }
                            //  style="font-size:1.5rem"
                                echo' "<pre>"' . $question . '"</pre>"'; 
                                        
                                if(!empty($example)) 
                                echo    '<div class="mt-3 text-secondary">Example 1:<br>
                                            <div class="container p-3" style="border:1px solid silver">
                                                <pre>'.$example.'</pre>
                                            </div> 
                                        </div>';
                         echo       '</div>
                                 </div>                            
                            </div>
                        </div>
                    </div>
                </div>';*/
        
            

                echo '<div class="modal fade text-dark shadow-lg" id="'.$modalId.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="text-center ms-auto fw-bolder text-danger"><h3>'.$questionid.'</h3></div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">';
                        if(!empty($questionname))
                        {
                            echo "<h2 class='card-title text-danger mb-3'>".$questionname."</h2>";
                        } 
                        echo '<div class="row-md-4 d-flex flex-column align-items-center">';
                        if(!empty($tags))
                        {
                            $array = explode(",", $tags);
                            echo '<div class="d-flex  gap-3 mb-3">';
                            foreach ($array as $tag) {
                                echo '<small class="btn btn-secondary rounded-pill btn-sm">'.$tag.'</small>';
                            }
                            echo '</div>';
                        }
                        echo '<div class="container p-2" style="font-size:1rem;">';
                        echo "<pre>" . $question . "</pre>"; 
                        if(!empty($example)) {
                            echo '<div class="mt-3 text-secondary">Example 1:<br>
                                    <div class="container p-3" style="border:1px solid silver">
                                        <pre>'.$example.'</pre>
                                    </div> 
                                </div>';
                        }
                        echo '</div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>';
            




            }

        $RAmount=$RAmount-$bidsum;
    }
    if($RAmount < 10000000)
        {
            $RAmount=$RAmount / 100000;
            echo '<script>  $("#'.htmlspecialchars($team).'").text("'.$RAmount.'L"); </script>';


        }
        elseif($RAmount >= 10000000){
            $RAmount=$RAmount / 10000000;
            echo '<script>  $("#'.htmlspecialchars($team).'").text("'.$RAmount.'Cr"); </script>';

        }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';

}
echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
?>
