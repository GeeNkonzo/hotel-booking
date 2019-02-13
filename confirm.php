<?php
    session_start();
    include_once "classes.php";
    include_once "connect.php";

    $bookings = new bookings;
   $bookings->insertBooking($conn);
   $bookings->displayBooking($conn);
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
                    <h1>Hello User<?php echo $_SESSION["username"] ?>!</h1>
                </div>
                <div class="logout">
                    <button class="logout-btn">Log Out</button>
                </div>
            </div>
        </header>
        <main>

            
        </main>
        
        <footer>footer</footer>
    </section>
</body>
</html>