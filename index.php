<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>CodeBid</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    
    <style>
       /* Optional CSS styles for the animation container */
       body{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 98.6vw;
            z-index: 0;
            padding-bottom: 2rem;
            font-family: "Ubuntu", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        main{
            padding: 4rem;
        }

        #login-btn{
            scale: 0.9;
        }

        #login-btn:hover{
            scale: 1;
            transition: all 0.1s ease-in;
        }

        #explore:hover{
            scale: 1.05;
            transition: all 0.1s ease-in;
        }

        #questionContainer{
            margin: 4rem;
            /* padding: 1rem; */
        }

        #tableContainer{
            margin: 0rem 4rem 1rem 4rem;
        }

        #logoSection{
            margin:  18px 50px;
        }

        .teamlogo{
            border-radius: 50%;
            height: 80px;
            width: 80px;
            border: black 3px solid;
            padding: 5px;
            background-color: white;
        }

        .teamlogoHeader{
            border-radius: 50%;
            height: 50px;
            width: 50px;
            border: black 1px solid;
            padding: 5px;
        }

        .tableHeader{
            color: #150e0c;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        #currentQuestion{
            font-size: 26px;
        }
        .footer {
            
            color: #fff; 
            
            text-align: center;
            font-size: 14px; 
            font-family: Arial, sans-serif;
}

        @media screen and (max-width: 630px) {
            #questionContainer
            ,#tableContainer{
                margin: 0;
            }

            #buttons{
                margin-top: 4rem;
            }
        }

        @media screen and (max-width: 450px) {
            #tableHeader{
                display: flex;
                flex-direction: column;
            }

            main{
                padding: 0;
            }

            #currentQuestion{
                font-size: 18px;
            }

        }

        /* @media screen and (max-width: 767px) {
            header{
                gap: 17rem;
            }
        }

        @media screen and (max-width: 569px) {
            header{
                gap: 10rem;
            }
        }

        @media screen and (max-width: 407px) {
            header{
                gap: 5rem;
            }
        } */

        @media screen and (max-width: 800px) {
            #currentQuestion{
                display: flex;
                flex-direction: column;
            }
        }

        @media screen and (max-width: 1270px) {
            .teamlogo{
                height: 80px;
                width: 80px;
            }
        }

        @media screen and (max-width: 1140px) {
            .teamlogo{
                height: 70px;
                width: 70px;
            }
        }

        @media screen and (max-width: 1040px) {
            .teamlogo{
                height: 60px;
                width: 60px;
            }
        }

        @media screen and (max-width: 1000px) {
            .teamlogo{
                height: 50px;
                width: 50px;
            }
        }

        @media screen and (max-width: 950px) {
            .teamlogo{
                display: none;
            }

            #logoSection{
                margin: 0;
            }
        }
    </style>
</head>

<body class="d-flex h-100 text-white bg-dark mb-5 pb-4" id="vants-body">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <!-- Header -->
        <div class="container">
            <header class="d-flex align-items-center justify-content-between mb-4">
                <a href="./" class="d-flex align-items-center mt-1 mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" previewlistener="true">
                    <img src="./images/logo.png" alt="CodeBid Image" height="40px" width="40px" class="rounded-pill shadow-lg">
                    <span class="fs-4 text-white">&nbsp;CodeBid</span>
                </a>
                <div class="dropdown d-flex align-items-center gap-2">
                    <button class="btn btn-outline border border-white text-light" id="login-btn"><a href="userlogin.php" class="nav-link active" aria-current="page" id="login">Login</a></button>
                    <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="profile">
                        <img src="<?php echo './images/'.$_SESSION["Teamid"].'.png'?>" height=25px width=25px style="border-radius:50%;"> <i clas="fas fa-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./userlogout.php">
                            <i class="fas fa-power-off text-danger"></i> Logout
                        </a></li>
                    </ul>
                </div>
                <!-- <div class="btn btn-dark d-flex align-items-center gap-2" id="profile">
                    <button type="button" class="btn btn-danger dropdown-toggle rounded-pill" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>  
                    <div class="dropdown-menu">
                        <a href="./userlogout.php" class="dropdown-item"><i class="fas fa-poweroff"></i></a>
                    </div>                  
                </div> -->
            </header>
        </div>

        <!-- Main -->
        <main class=" my-5">
        <div class="container inner">
                <div class="eight columns" style="line-height: 5rem;">
                  <h1> CodeBid </h1>
                  <h3> An event by department of CSE. </h3>
                  <h3> <?php
                    if(isset($_GET["action"])){
                        echo $_GET["action"];
                    }

                  ?></h3>
                  <a href="https://techniverse.rguktsklm.ac.in/cse/"><div class="btn restart btn-outline text-white border-white" id="explore"> Register Now! </div></a>
                </div>
                <!-- <div class="eight columns" style="line-height: 5rem;">
                <a><div class="btn restart btn-outline text-white border-white"> Randomize! </div></a>
                  <h1> CodeBid </h1>
                  <h3> An event in TechniVerse by Coding Club.</h3>
                </div> -->
            </div>
        </main>

        <div class="card" style="position: relative;top: 1rem;" id="questionContainer">

        </div>
            <!-- <p class="lead">
                <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white mt-4">Explore the Bid</a>
            </p>
       -->
        <div class="d-flex gap-2 justify-content-center py-3" id="buttons">
            <button class="btn btn-danger rounded-pill px-3" type="button" id="loadPage1Btn" title="team info">Team</button>
            <button class="btn btn-light rounded-pill px-3" type="button" id="loadPage2Btn">Overview</button>
            <button class="btn btn-light rounded-pill px-3" type="button" id="loadPage3Btn">Questions</button>
        </div>

        <div class="cover shadow album rounded container1 bg-light" id="tableContainer">

        </div>

        <div class=" my-3">
            <footer class="footer">
    <!--<p>Copyright © 2024 Team CodeBid</p>-->
    <p>Designed by Team CodeBid</p>
</footer>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r120/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanta/0.5.24/vanta.rings.min.js"></script>
    <script>
        VANTA.RINGS({
        el: "#vants-body",
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00
        })
        
       
        function updateQuestionContent() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "updatequestion.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("questionContainer").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function loadPageContent(pageUrl, containerId) {
            $.ajax({
                url: pageUrl,
                dataType: 'html',
                success: function(response) {
                    $(containerId).html(response);
                }
            });
        }
        <?php
        if (isset($_SESSION["Teamid"])) {
            echo 
            '            
            $("#login").attr("href","#");
            $("#login").text("Team ' . $_SESSION['Teamid'] .'");
            
           $("#loadPage1Btn").click(function() {
            loadPageContent("updateteamquestion.php?Team=' . $_SESSION['Teamid'] . '", "#tableContainer");
        });

        $("#loadPage2Btn").click(function() {
            loadPageContent("updatebidpage.php", "#tableContainer");
        });

        $("#loadPage3Btn").click(function() {
            loadPageContent("submitquestion.php?Team=' . $_SESSION['Teamid'] . '", "#tableContainer");
        });
        loadPageContent("updateteamquestion.php?Team=' . $_SESSION['Teamid'] . '", "#tableContainer");';
        } else {
            echo '$(document).ready(function(){
                $("#profile").hide();
                $("#loadPage1Btn").hide();
                $("#loadPage3Btn").hide();
            loadPageContent("updatebidpage.php", "#tableContainer");

            });';
        }
        ?>

        // Initial update
        //updateTableContent();
        updateQuestionContent();
        // Refresh content every 5 seconds
        //setInterval(updateTableContent, 5000);
       setInterval(updateQuestionContent, 1000);
    </script>
</body>
</html>

<script>
$(document).ready(function(){
    $("#buttons button").on("click",function(){
        $("#buttons button").removeClass("btn-danger");
        $("#buttons button").addClass("btn-light");
        $(this).removeClass("btn-light");
        $(this).addClass("btn-danger");
    })

});
</script>