<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trains</title>
    <link rel="stylesheet" href="train.css">
</head>

<body>

    <header>

        <img class="logo" src="./logo2.png" alt="logo" width="70" height="70">
        <nav>
            <ul class="nav__links">
                <li><a href="#">Book Flight </a></li>
                <li><a href="">Book Bus</a></li>
                <li><a href="Registrationpage.html">Meals</a></li>
                <li><a href="http://www.indianrail.gov.in/enquiry/StaticPages/StaticEnquiry.jsp?StaticPage=index.html">About us</a></li>
            </ul>
        </nav>
        <a href="#" class="cta3"><button>Contact Us</button></a>
    </header>
    
    <table>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ustrip";
    $con = mysqli_connect($server, $username, $password, $dbname);
    // $total = mysqli_num_rows($data);
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    echo "Success connecting to the db";

    $from = $_POST['from'];
    $to = $_POST['to'];
    // $date = $_POST['date'];

    // $query = "INSERT INTO `ustrip`.`info` (`Sr no`,`Travelling form`,`Travelling To`, `Departing`, `Adults`, `Children`,`Travel Class`, `date`) VALUES (Null,'$from', '$to', '$date', '$adult','$child','$class', current_timestamp());";
    $query = "SELECT * FROM `ustrip`.`train`";
    $data =  mysqli_query($con, $query);
    $total = mysqli_num_rows($data);

    if ($total != 0) {
        while ($result = mysqli_fetch_assoc($data)) {
            echo "
    <tr>
    <td>" . $result['Sr no'] . "</td>
    <td>" . $result['Train Name'] . "</td>
    <td>" . $result['Train Number'] . "</td>
    <td>" . $result['Travelling form'] . "</td>
    <td>" . $result['Travelling To'] . "</td>
    <td>" . $result['Departing Date'] . "</td>
    </tr>
    ";
        }
    } else {
        echo "there is no data";
    }
    ?>
</body>

</html>