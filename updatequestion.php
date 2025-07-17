<?php
include "connection.php";
session_start();
$sql = "SELECT * FROM Questions where Display=1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //print_r($row);
    $id = $row["Id"];
    $questionid = $row["QuestionId"];
    $questionname=$row["Questionname"];
    $question = $row["Question"];
    $example=$row["Example"];
    $tags=$row["Questiontags"];
    $baseprice = $row["Baseprice"];
    $bidprice = $row["Bidprice"];
    $_SESSION['questionid']=$row["QuestionId"];

echo '<div class="card-header d-flex align-items-center justify-content-between py-3" id="currentQuestion" style="color: #03071e;">
    <b>';
    if (isset($questionid)) {
        echo  $questionid;
    } else {
        echo "-----";
    }
    echo '</b>
    <div class="d-flex gap-2 fw-bold" style="color: #e85d04;">Current Price: 
            <div class="rounded-pill d-flex align-items-center px-2" style="color: #2b2d42;"><i class="bx bx-rupee mt-1"></i><span>';
            if (isset($bidprice)) {
                if($bidprice < 10000000)
                {
                    echo $bidprice /100000 .'L';
            
            
            
                }
                elseif($bidprice >= 10000000){
                    echo $bidprice/ 10000000 .'Cr';
                    
            
                }
            } else {
                echo "---";
            }
            echo '</span>
            </div>
        </div>
    
    <div class="d-flex gap-2 fw-bold" style="color: #e85d04;">Base Price: 
            <div class="rounded-pill d-flex align-items-center px-2" style="color: #2b2d42;"><i class="bx bx-rupee mt-1"></i><span>';
            if (isset($baseprice)) {
                if($baseprice < 10000000)
                {
                    echo $baseprice / 100000 .'L';
            
            
            
                }
                elseif($baseprice >= 10000000){
                    echo $baseprice/10000000 .'Cr';
                    
            
                }
            } else {
                echo "---";
            }
            echo '</span>
            </div>
        </div>
    </div>
    <div class="card-body">';
        if(!empty($questionname))
        {
            echo " <h5 class='card-title'>".$questionname."</h5>";
        } 
        echo '<div class="card-text d-flex flex-column align-items-center">';
         if(!empty($tags))
         {
            $array = explode(",", $tags);
            echo '<div class="d-flex  gap-3 mb-3">';
            foreach ($array as $tag) {
               echo '<small class="btn btn-secondary rounded-pill btn-sm">'.$tag.'</small>';
            }
            echo '</div>';
         }
            echo'<div class="container" style="font-size:1.5rem">
                    <tt class="text-dark" style="font-size:20px;">';
                         if (isset($question)) {
                            echo "<pre class='py-3'>" . $question . "</pre><br>";
                        } else {
                            echo "Best of luck for next question";
                    }
                    echo '</tt>';
            if(!empty($example)) 
            echo    '<div class="mt-3 text-secondary">
                        <div class="container p-3" style="border:1px solid silver">
                            <pre style="font-size:15px;">'.$example.'</pre>
                        </div> 
                    </div>';
     echo       '</div>
             </div>
    </div>';
}
else{
  if(isset($_SESSION['questionid'])) {
      $questionid = $_SESSION['questionid'];
      $sql = "SELECT * FROM Questions where QuestionId='$questionid'";
        $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)) {
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
         $id = $row["Id"];
        $questionid = $row["QuestionId"];
        $questionname=$row["Questionname"];
        $question = $row["Question"];
        $example=$row["Example"];
        $tags=$row["Questiontags"];
        $baseprice = $row["Baseprice"];
        $bidprice = $row["Bidprice"];
        $bidteam=$row["BidTeam"];
        echo '<div class="row justify-content-center font-monospace">
    <div class="col-md-5 text-center my-3">';
    if($bidteam=='Unsold')
    {
        echo ' <img class="card-img-top" src="https://img.freepik.com/premium-vector/unsold-grunge-rubber-stamp_545399-2397.jpg" alt="Sold Hammer" height=400px  width=100px style="border:1px solid black; border-radius:50%" id="hammer">
            </div>
            <div class="card-body text-center">
            <h4 class="card-title">'.$questionid.'</h4>
            <button class="btn btn-danger">Unsold</button>';   
    }
    else{
     echo '<img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxXXbS3LquPcZju02A3z7g3b4CtEKUS3JAOlQxrnizBw&s" alt="Sold Hammer" height=400px  width=50px style="border:1px solid black; border-radius:50%" id="hammer">
            </div>
            <div class="card-body text-center">
            <h4 class="card-title">'.$questionid.'</h4>
            <p class="card-text">Sold To <b>Team '.$bidteam.'</b></p>
            <button class="btn btn-primary">'.$bidprice/10000000 .'Cr</button>';
    }
  echo '</div>
</div>';
      }
  }
  
else{
 echo '<div class="card-header d-flex align-items-center justify-content-between py-3" id="currentQuestion" style="color: #03071e;">
    <b>';
    
        echo "-----";
    echo '</b>
    <div class="d-flex gap-2 fw-bold" style="color: #e85d04;">Current Price: 
            <div class="rounded-pill d-flex align-items-center px-2" style="color: #2b2d42;"><i class="bx bx-rupee mt-1"></i><span>';
                echo "---";
            echo '</span>
            </div>
        </div>
    
    <div class="d-flex gap-2 fw-bold" style="color: #e85d04;">Base Price: 
            <div class="rounded-pill d-flex align-items-center px-2" style="color: #2b2d42;"><i class="bx bx-rupee mt-1"></i><span>';
            if (isset($baseprice)) {
                if($baseprice < 10000000)
                {
                    echo $baseprice / 100000 .'L';
            
            
            
                }
                elseif($baseprice >= 10000000){
                    echo $baseprice/10000000 .'Cr';
                    
            
                }
            } else {
                echo "---";
            }
            echo '</span>
            </div>
        </div>
    </div>
    <div class="card-body">';
            echo " <h5 class='card-title text-center'>WAIT FOR THE NEXT QUESTION</h5>";
        echo '<div class="card-text d-flex flex-column align-items-center">';
            echo'<div class="container" style="font-size:1.5rem">
                    <tt class="text-dark" style="font-size:20px;">';
                            echo "<p class='text-center'>Best of luck</p>";
                    echo '</tt>';
     echo       '</div>
             </div>
    </div>';
}

}

?>