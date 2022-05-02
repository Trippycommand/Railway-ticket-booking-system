<?php
$server = "localhost";
$username = " root";
$password = "";
$dbname = "ustrip";
$conn = mysqli_connect($server, $username, $password,$dbname);
if($conn)
{
    echo "connection ok";
}
else
echo "not ok";
?>