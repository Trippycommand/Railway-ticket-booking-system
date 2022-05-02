<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trains</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/train_info.css">
</head>

<body>

    <header>
        <img class="logo" src="./res/logo.png" alt="logo" width="70" height="70">
        <nav>
            <ul class="nav__links">
                <li><a href="./sign.html">Sign up </a></li>
                <li><a href="./register.html">Register</a></li>
                <li>
                    <a href="http://www.indianrail.gov.in/enquiry/StaticPages/StaticEnquiry.jsp?StaticPage=index.html">
                        About us
                    </a>
                </li>
            </ul>
        </nav>
        <a href="./contact.html" class="cta3"><button>Contact Us</button></a>
    </header>


    <table>

        <tr>
            <th colspan="8">
                <h2>Available Trains</h2>
            </th>
        </tr>

        <tr>
            <th>Sr no </th>
            <th>Train Name</th>
            <th>Train Number</th>
            <th>Travelling form</th>
            <th>Travelling To</th>
            <th>Date</th>
            <th>Departing Time</th>
            <th>Book</th>
        </tr>
        <?php

        session_unset();
        session_start();
        $_SESSION = $_POST;


        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ustrip";
        $con = mysqli_connect($server, $username, $password, $dbname);

        $query = "";
        if (empty($_SESSION)) {
            $query = "SELECT * FROM train";
        } else {
            $from = $_SESSION['from'];
            $to = $_SESSION['to'];
            $query = "SELECT * FROM train WHERE `Travelling form`='$from' AND `Travelling To`='$to'";
        }
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
        <td>" . $result['Time'] . "</td>
        <td><a  href='/Aryan/passenger_info.php?num=" . $result["Train Number"] . "'>Book</a></td>
        </tr>
        ";
            }
        } else {
            echo "there is no data";
        }

        ?>
    </table>

</body>

</html>