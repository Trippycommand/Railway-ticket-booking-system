
<?php
$server = "localhost";

$username = "root";

$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
echo "Success connecting to the db";

$name = $_POST['Fullname'];
$Username = $_POST['Username'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$password = $_POST['Password'];
$confirm = $_POST['ConfirmPassword'];

$sql = "INSERT INTO `ustrip`.`form` (`Sr no`,`Full name`,`User name`, `Email Address`, `Phone Number`, `Password`,`conform password`, `date`) VALUES (Null,'$name', '$Username', '$email', '$phone','$password','$confirm ', current_timestamp());";
if ($con->query($sql) ===TRUE) {
    header('Location: http://localhost/Aryan/Sign.html');
}
else{
    echo "Error " . $sql . "<br>" . $conn->error;
}

?>
