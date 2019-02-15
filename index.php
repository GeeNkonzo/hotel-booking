<?php
// Initialize the session
session_start();
require_once "connect.php";
include_once "classes.php";
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: booking.php");
    exit;
}
if(isset($_POST["logout"])) {
    session_destroy();
}
if(isset($_POST["register"])) {
    $register = new registration;
    $register->reg($conn);
}
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
                        <h1>Hello!</h1>
                    </div>
                </div>
            </header>
            <main>
                <div class="form-grid">
                    <div></div>
                    <div>
                        <h2>Login</h2>
                        <p>Please fill in your credentials to login.</p>
                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                            <label>Name:</label><br>
                            <input type="text" name="username" placeholder="username" value="<?php if(isset($_POST["submit"])) {echo $username;} ?>">
                            <br>
                            <label>Password:</label><br>
                            <input type="password" name="password" placeholder="password" value="<?php if(isset($_POST["submit"])) {echo $password;} ?>"><br>
                            <button type="submit" name="register">Login</button>
                                                    
                        <p>Don't have an account? <a href="register.php">Sign up now</a>.</p></p>

                        </form>
                    </div>
                    <div></div>
                </div>
            </main>

            <footer>footer</footer>
        </section>    
    </body>
</html>