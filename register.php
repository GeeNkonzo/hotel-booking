<?php
    // Include config file
    require_once "config/connect.php";
    include_once "classes.php";

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
    <title>register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
</head>
<body>

    <!-- main container -->
    <section class="grid-container">

        <!-- header section of container -->
        <header>
                <!-- Header section grid -->
                <div class="top-grid">
                    <div class="logo">
                        <img src="img/logo.png">
                    </div>
                    <div class="greetings">
                        <h1>Hello!</h1>
                    </div>
                </div>
            </header>

            <!-- main section of page -->
            <main>

                <!-- For created to position grid in the middle -->
                <div class="form-grid">
                    <div></div>
                    <div>
                        <h2>Sign Up</h2>
                        <p>Please fill this form to create an account.</p>

                        <!-- Sign up form -->
                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                            <label>Name:</label><br>
                            <input type="text" name="username" placeholder="username" value="<?php if(isset($_POST["submit"])) {echo $username;} ?>">
                            <br>
                            <label>Password:</label><br>
                            <input type="password" name="password" placeholder="password" value="<?php if(isset($_POST["submit"])) {echo $password;} ?>">
                            <br>
                            <label>Confirm password:</label><br>
                            <input type="password" name="confirm_password" placeholder="confirm password" value="<?php if(isset($_POST["submit"])) {echo $confirm_password;} ?>"><br>

                            <button type="submit" name="register">Register</button>

                            <!-- Redirect user to login page if they already have an account -->
                            <p>Already have an account? <a href="index.php">Login here</a>.</p>
                        </form>
                    </div>
                    <div></div>
                </div>
            </main>

            <footer><p>Gcobisa Nkonzo &#169; 2019</p></footer>
    </section>    
</body>
</html>