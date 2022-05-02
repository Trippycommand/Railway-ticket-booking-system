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


    <h2>Ticket Information</h2>
    <form action="" method="post">

        <?php

        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ustrip";
        $con = mysqli_connect($server, $username, $password, $dbname);

        $query = "SELECT * FROM passengers";
        $data =  mysqli_query($con, $query);
        $total = mysqli_num_rows($data);

        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                $passengerInfo = json_decode($result["passengers_info"], true);
                $TRAIN_NUM = $result["train_num"];
                $TOTAL = $result["total_passengers"];

                echo '<label>Total Passengers = ' . $TOTAL . '</label>';
                echo '<label>Train #' . $TRAIN_NUM . '</label>';

                for ($j = 1; $j <= $TOTAL; $j++) {
                    $i = $j - 1;
                    echo " <h3>Passenger " . $j . ":</h3>";
                    // print_r($passengerInfo[$i]["email"]);
                    echo <<<EOT
                <div>
                    <label>Name:</label>
                    <input disabled type="text" placeholder="Full Name" name="fname$i" value='{$passengerInfo[$i]["fname"]}' >
                </div>
    
                <div>
                    <label>Phone Number: </label>
                    <input disabled type="number" placeholder="Phone Number" name="phone$i" value='{$passengerInfo[$i]["phone"]}'  >
                </div>
    
                <div>
                    <label>Email: </label>
                    <input disabled type="email" placeholder="Email" name="email$i" value='{$passengerInfo[$i]["email"]}'  >
                </div>
    
                <div>
                    <label>Age: </label>
                    <input disabled type="number" placeholder="Age" name="age$i" value='{$passengerInfo[$i]["age"]}'  >
                </div>
    
                <div>
                    <label>Gender: </label>
                    <select disabled name="gender$i" value='{$passengerInfo[$i]["gender"]}' >
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>
    
                <div>
                    <label>Proof of identification </label>
                    <input disabled type="text" placeholder="eg:adhar number, Driving Lisence, Voter Id,etc" name="id$i"  value='{$passengerInfo[$i]["id"]}' >
                </div>
    
                <div>
                    <label>Seat Preference: </label>
                    <select disabled name="seat$i" value='{$passengerInfo[$i]["seat"]}' >
                        <option>Lower</option>
                        <option>Middle</option>
                        <option>Upper</option>
                    </select>
                </div>
                EOT;
                }
            }
        }



        ?>
</body>

</html>