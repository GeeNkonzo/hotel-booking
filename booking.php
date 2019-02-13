<?php
// Initialize the session
session_start();
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: index.php");
//     exit;
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

            <h1>Find affordable accommodation in Cape Town.</h1>
            
                <form action="confirm.php" method="post">
                    <div class="form-grid">
                        <div>
                            <label>Hotel:</label>
                            <select id="hotel" name="hotel">
                                <option value="1">Mojo Hotel</option>
                                <option value="2">Cape Diamond Hotel</option>
                                <option value="3">Fountains Hotel</option>
                                <option value="4">Taj Cape Town</option>
                            </select> 
                        </div>

                        <div>
                            <label>Check in date:</label>
                                <input type="date" id="start" name="arrival" min="2018-01-01" max="2020-12-31">
                        </div>
                        <div>
                            <label>Check out date:</label>
                                <input type="date" id="end" name="departure" min="2018-01-01" max="2020-12-31">
                        </div>
                        <div>
                           <label>Number of rooms:</label>
                            <select id="rooms" name="rooms">
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
        </main>
        
        <footer>footer</footer>
    </section>
</body>
</html>