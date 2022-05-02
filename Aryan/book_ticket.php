<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Tickets</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/book_ticket.css">
</head>

<body>
    <?php
    session_start();
    print_r($_SESSION);
    if (empty($_SESSION) || empty($_POST)) {
        header("Location: ", "http://localhost/Aryan/booking.html");
    }
    $DATA = array_merge($_SESSION, $_POST);

    $userId = "12345";
    $total_passengers = $DATA["total_passengers"];
    $train_num = $DATA["train_num"];
    $passengers_info = array();
    for ($i = 1; $i <= $total_passengers; $i++) {
        $passengers_info[$i - 1] = array(
            "fname" => $DATA["fname" . $i],
            "age" => $DATA["age" . $i],
            "email" => $DATA["email" . $i],
            "phone" => $DATA["phone" . $i],
            "seat" => $DATA["seat" . $i],
            "gender" => $DATA["gender" . $i],
            "id" => $DATA["id" . $i],
        );
    }
    $passengers_info_json = json_encode($passengers_info);

    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $sql = "INSERT INTO `ustrip`.`passengers` (`uid`,`user`,`train_num`,`total_passengers`,`passengers_info`) VALUES (Null, '$userId', '$train_num', '$total_passengers', '$passengers_info_json');";
    if ($con->query($sql) === TRUE) {
        echo "BOOKED SUCCESSFULLY!";
        echo "<script>window.location.href='./booked_tickets.php'</script>";
    } else {
        echo "ERROR IN BOOKING! - " . $con->error;
    }
    ?>
</body>

</html>