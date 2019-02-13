<?php
    // Include config file
    require_once "connect.php";
    include_once "classes.php";

    $register = new registration;
    $register->reg($conn);
?>

<!DOCTYPE html>
<html lang="en">
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
                        <h1>Hello User!</h1>
                    </div>
                </div>
            </header>
            <main>
                <div class="form-grid">
                    <div></div>
                    <div>
                        <h2>Sign Up</h2>
                        <p>Please fill this form to create an account.</p>
                        <form action="index.php" method="post">
                        
                            <p>Already have an account? <a href="index.php">Login here</a>.</p>
                        </form>
                    </div>
                    <div></div>
                </div>
            </main>

            <footer>footer</footer>
    </section>    
</body>
</html>