<?php
date_default_timezone_set('Africa/Nairobi');
print "<h1>Hello, World</h>";
print "Today is" . date("Y-m-d") . "<br>";
print "Current Server time is" . date("H:i:s") . "<br>";

//create variables for database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname );

//check connection
if ($conn->connect_error){
    die("Connection Failed" . $conn->connect_error);

}
else{
    echo "Connected Successfully" . $dbname;
}
?>