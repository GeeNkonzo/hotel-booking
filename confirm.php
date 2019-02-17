<?php
    session_start();
    include_once "classes.php";
    include_once "connect.php";

    $bookings = new bookings;
    if(isset($_POST['confirm'])) {
        $bookings->insertBooking($conn);
    }

   
//    $bookings->displayBooking($conn);
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
            <form action="" method="post">
                <h2>Please verify information below before confirming your booking.</h2>
                <?php $bookings->displayConfirm() ?>

                <button type="submit" name="confirm">CONFIRM BOOKING</button>
                

            </form>
        </main>
        
        <footer>footer</footer>
    </section>
</body>
</html>