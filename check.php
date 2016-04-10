+<?php
//UPLOAD AND CONFIGURE FILE TO WEB SERVER

$servername = "localhost";
$username = "DATABASE_USERNAME";
$password = "DATABASE_PASSWORD";
$dbname = "DATABASE_NAME";

$name = $_GET['name'];
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT rank FROM Ranks WHERE name='$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
 while($row = $result->fetch_assoc()) {
 $rank = $row['rank'];
 echo $rank;
    }
    }else{
    echo "No Rank";
 ?>
