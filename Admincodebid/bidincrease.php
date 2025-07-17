<?php
session_start();
if (!isset($_SESSION["Adminid"]) || $_SESSION["Adminid"] !== true) {
    header("location:login.php");
    exit;
}
include "connection.php";
$sql = "SELECT * FROM Questions where Display=1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $bidprice = $row["Bidprice"];
    echo "<p>Current Value: <span id='currentValue'>".$bidprice."Cr</span></p>";
}
else{
    $bidprice=0;
    echo "<p>Current Value: <span id='currentValue'>$bidprice</span></p>";

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Increment Value</title>
</head>
<body>
<a href="index.php" class="text-light"><button type="button">Home</button></a>
<button onclick="incrementValue(2500000)">Increment Value 25L</button>
<button onclick="incrementValue(-2500000)">Decrement Value -25L</button>
<button onclick="incrementValue(5000000)">Increment Value 50L</button>
<button onclick="incrementValue(-5000000)">Decrement Value -50L</button>
<button onclick="incrementValue(10000000)">Increment value 1Cr</button>
<button onclick="incrementValue(-10000000)">Decrement Value -1Cr</button>
<button onclick="incrementValue(20000000)">Increment value 2Cr</button>
<button onclick="incrementValue(-20000000)">Decrement Value -2Cr</button>


<script>
function incrementValue(value) {
    // Get the current value from the span
    var currentValue = parseInt(document.getElementById('currentValue').innerText);
    
    // Increment the value
    var newValue = currentValue + value;

    // Update the value displayed on the page
    document.getElementById('currentValue').innerText = newValue;

    // Make an AJAX request to update the value in the database
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_value.php", true);
    console.log("hello");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            // Handle response if needed
        }
    };
    xhr.send("newValue=" + newValue);
}
</script>

</body>
</html>