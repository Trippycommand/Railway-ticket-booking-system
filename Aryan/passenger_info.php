<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/passenger_info.css">
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

    <?php
    session_start();
    print_r($_SESSION);

    if (empty($_SESSION)) {
        header("Location: ", "http://localhost/Aryan/booking.html");
    }
    ?>

    <div class="container">
        <h2>Train Info</h2>
        <?php
        echo $_SESSION["from"] . " to " . $_SESSION["to"];
        ?>

        <h2>Passenger Information</h2>
        <form action="book_ticket.php" method="post">

            <?php

            $TRAIN_NUM = $_GET["num"];
            $TOTAL = $_SESSION["adult"] + $_SESSION["child"];

            echo '<input type="number" style="display: none" name="total_passengers" value="' . $TOTAL . '" />';
            echo '<input type="number" style="display: none" name="train_num" value="' . $TRAIN_NUM . '" />';

            for ($i = 1; $i <= $TOTAL; $i++) {
                echo " <h3>Passenger " . $i . ":</h3>";
                echo <<<EOT
                <div>
                    <label>Name:</label>
                    <input type="text" placeholder="Full Name" name="fname$i" >
                </div>
    
                <div>
                    <label>Phone Number: </label>
                    <input type="number" placeholder="Phone Number" name="phone$i" >
                </div>
    
                <div>
                    <label>Email: </label>
                    <input type="email" placeholder="Email" name="email$i" >
                </div>
    
                <div>
                    <label>Age: </label>
                    <input type="number" placeholder="Age" name="age$i" >
                </div>
    
                <div>
                    <label>Gender: </label>
                    <select name="gender$i">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>
    
                <div>
                    <label>Proof of identification </label>
                    <input type="text" placeholder="eg:adhar number, Driving Lisence, Voter Id,etc" name="id$i" >
                </div>
    
                <div>
                    <label>Seat Preference: </label>
                    <select name="seat$i">
                        <option>Lower</option>
                        <option>Middle</option>
                        <option>Upper</option>
                    </select>
                </div>
                EOT;
            }
            ?>

            <input type="submit" name="submit" value="SUBMIT">
        </form>
    </div>
</body>

</html>