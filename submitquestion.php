<?php
    echo '<div class="row-md-4 text-dark p-4">';
        $team = $_GET['Team'];
        echo '<h2 class="text-center fw-bolder p-1" id="idsubmit">Submit Your Answers Here</h2>';
        
        echo '<div class="row-md-4 px-3 shadow-lg">';
      echo  '<form id="questionForm" method="post" action="submitquestionaction.php?Team='.$team.'">';
            include "connection.php";
            $sql = "SELECT * FROM Questions where BidTeam='$team' and Response=''";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $question = $row["Question"];
                    $id = $row["QuestionId"];
                    echo ' <div class="row-md-5">
                    <label for="question'.$id.'" class="fw-bolder my-2">Question:&nbsp;' . $id . '</label>
                    <textarea class="form-control p-2" id="question" name="question" readonly style="min-height:350px"> '.$question. '</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="answer'.$id.'" class="fw-bolder mb-2 pt-2">Your Answer:</label>
                    <textarea class="form-control" id="answer" name="' . $id . '" style="min-height:350px"></textarea>
                    <input type="hidden" id="jsVariableInput" name="answers" value="">
                    <input type="hidden" name="name" value=>
                </div>';
            }
            echo 
              '  <button type="submit" class="btn btn-success my-3" id="submitBtn">Submit</button>
        </form>
        </div>
    </div>';
        }
        
              
            else{
                echo '<div style="text-align: center" class="text-success fw-bold">No Questions to Answer</div>
                <script>
                document.getElementById("idsubmit").innerText="";
                </script>';
            }

?>