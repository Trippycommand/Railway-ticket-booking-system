<?php
$server = "localhost";

$username = "root";

$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
echo "Success connecting to the db";

$train = $_POST['TrainName'];
$number = $_POST['TrainNumber'];
$from = $_POST['Travellingfrom'];
$To = $_POST['TravellingTo'];
$date= $_POST['DepartingDate'];


$sql = "INSERT INTO `ustrip`.`train` (`Sr no`,`Train Name`,`Train Number`, `Travelling form`, `Travelling To`, `Departing Date`, `date`) VALUES (Null,'$train', '$number', '$from', '$To','$date', current_timestamp());";
if ($con->query($sql) ===TRUE) {
    header('Location: http://localhost/Aryan/admin.html');
}
else{
    echo "Error " . $sql . "<br>" . $conn->error;
}
