<?php
// Initialize the session
session_start();
include_once("connect.php");
include_once("classes.php");


// Assign user's name to session
if (isset($_POST["username"])) {
    $_SESSION["username"] = $_POST["username"];
}
// Call booking class with functions
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
    <title>hotel online booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
</head>
<body>
    <!-- Beginning of grid-container (main grid) -->
    <section class="grid-container">
        <!-- Header section of the main grid -->
        <header>
            <!-- Grid created in header for the structure of logo, greeting and logout button -->
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
            <!-- End of grid within the header section of main grid -->
        </header>
        <!-- End of header section -->

        <!-- Beginning of the main section of the page  -->
        <main>

            <h1>Find affordable accommodation in Cape Town.</h1>
             
            <!-- Booking form -->
                <form action="confirm.php" method="post">

                    <!-- Grid for form data input -->
                    <div class="form-grid">
                        <div>
                            <label>Name:</label>
                            <input type="text" name="guestname" placeholder="Your Name" required>
                        </div>
                        <div>
                            <label>Surname:</label>
                            <input type="text" name="surname" placeholder="Your Surname" required>
                        </div>
                        <div>
                            <label>Hotel:</label>
                            <select id="hotel" name="hotel" required>
                                <option value="Mojo Hotel">Mojo Hotel</option>
                                <option value="Cape Diamond Hotel">Cape Diamond Hotel</option>
                                <option value="Fountains Hotel">Fountains Hotel</option>
                                <option value="Taj Hotel">Taj Hotel</option>
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
                            <br><br>
                            <button type="submit" name="book">BOOK!</button>
                        <div></div>
                    </div>
                </form>
                <!-- End of form -->
                <br><br><br>

                <!-- Grid for hotel images -->
                <div class="gallery-grid">
                    <div class="container">
                        <img src="img/hotel1.jpeg" class="image">
                        <div class="middle">
                            <div class="text">Mojo Hotel</div>
                        </div>
                        <div id="amount">
                            <p>Mojo Hotel</p>
                            <p>R800 per night</p>
                        </div>
                    </div>
                    <div class="container">
                        <img src="img/hotel2.jpeg" class="image">
                        <div class="middle">
                            <div class="text">Cape Diamond Hotel</div>
                        </div>
                        <div id="amount">
                            <p>Cape Diamond Hotel</p>
                            <p>R1200 per night</p>
                        </div>
                    </div>
                    <div class="container">
                        <img src="img/hotel3.jpeg" class="image">
                        <div class="middle">
                            <div class="text">Fountains Hotel</div>
                        </div>
                        <div id="amount">
                            <p>Fountains Hotel</p>
                            <p>R1350 per night</p>
                        </div>
                    </div>
                    <div class="container">
                        <img src="img/hotel4.jpeg" class="image">
                        <div class="middle">
                            <div class="text">Taj Hotel</div>
                        </div>
                        <div id="amount">
                            <p>Taj Hotel</p>
                            <p>R1500 per night</p>
                        </div>
                    </div>
                </div>
        </main>
        
        <footer><p>Gcobisa Nkonzo &#169; 2019</p></footer>
    </section>
</body>
</html>