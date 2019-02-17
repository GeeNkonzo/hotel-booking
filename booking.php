<?php
// Initialize the session
session_start();
include_once("connect.php");
include_once("classes.php");

// Check if there is a user logged in or not
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
    
// Assign user's name to session
$_SESSION["username"] = $_POST["username"];
// C
if (isset($_POST["book"])) {
    $booking = new bookings;
    $booking->insertBooking($conn);
    $booking->displayBooking($conn);
};

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
</head>
<body>
    <section class="grid-container">
        <header>
            <div class="top-grid">
                <div class="logo">
                    <img src="img/logo.png">
                </div>
                <div class="greetings">
                    <h1>Hello <?php echo $_SESSION["username"] ?>!</h1>
                </div>
                <div class="logout">
                    <form action="index.php" method="post">
                        <button class="logout-btn" name="logout" type="submit">Log Out</button>
                    </form>
                </div>
            </div>
        </header>
        <main>

            <h1>Find affordable accommodation in Cape Town.</h1>
            
                <form action="booking.php" method="post">
                    <div class="form-grid">
                        <div>
                            <label>Hotel:</label>
                            <select id="hotel" name="hotel" required>
                                <option value="1">Mojo Hotel</option>
                                <option value="2">Cape Diamond Hotel</option>
                                <option value="3">Fountains Hotel</option>
                                <option value="4">Taj Cape Town</option>
                            </select> 
                        </div>

                        <div>
                            <label>Check in date:</label>
                                <input type="date" id="start" name="arrival" min="2018-01-01" max="2020-12-31" required>
                        </div>
                        <div>
                            <label>Check out date:</label>
                                <input type="date" id="end" name="departure" min="2018-01-01" max="2020-12-31" required>
                        </div>
                        <div>
                           <label>Number of rooms:</label>
                            <select id="rooms" name="rooms" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select> 
                        </div>
                        <div class="merge">
                            <br>
                            <button type="submit" name="book">BOOK!</button>
                        </div>
                    </div>
                </form>
                <br><br><br><br><br><br><br>
                <div class="gallery-grid">
                    <div class="container">
                        <img src="img/hotel1.jpeg" class="image">
                        <div class="middle">
                            <div class="text">Mojo Hotel</div>
                        </div>
                    </div>
                    <div class="container">
                        <img src="img/hotel2.jpeg" class="image">
                        <div class="middle">
                            <div class="text">Cape Diamond Hotel</div>
                        </div>
                    </div>
                    <div class="container">
                        <img src="img/hotel3.jpeg" class="image">
                        <div class="middle">
                            <div class="text">Fountains Hotel</div>
                        </div>
                    </div>
                    <div class="container">
                        <img src="img/hotel4.jpeg" class="image">
                        <div class="middle">
                            <div class="text">Taj Hotel</div>
                        </div>
                    </div>
                </div>
        </main>
        
        <footer>footer</footer>
    </section>
</body>
</html>