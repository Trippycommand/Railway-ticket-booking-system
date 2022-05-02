<?php
$server = "localhost";

$username = "root";

$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
echo "Success connecting to the db";


$Username = $_POST['username'];

$password = $_POST['password'];

$sql="SELECT * FROM `ustrip`.`form` WHERE `User name` = '$Username' AND `Password` = '$password'";
$result=$con->query($sql);
    if ($result->num_rows > 0) {
        header('Location: http://localhost/Aryan/booking.html');
    } else {
        header('Location: http://localhost/Aryan/Sign.html');
        
    }

?>
