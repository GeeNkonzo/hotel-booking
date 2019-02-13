<?php

    class registration {

        public $username; 
        public $password;
        public $confirm_password;
        
        public $username_err;
        public $password_err;
        public $confirm_password_err;

        function reg($conn) {
            // Processing form data when form is submitted
            if($_SERVER["REQUEST_METHOD"] == "POST"){
        
                // Validate username
                if(empty(trim($_POST["username"]))){
                    $username_err = "Please enter a username.";
                } else{
                    // Prepare a select statement
                    $sql = "SELECT id FROM users WHERE username = ?";
                    
                    if($stmt = $mysqli->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("s", $param_username);
                        
                        // Set parameters
                        $param_username = trim($_POST["username"]);
                        
                        // Attempt to execute the prepared statement
                        if($stmt->execute()){
                            // store result
                            $stmt->store_result();
                            
                            if($stmt->num_rows == 1){
                                $username_err = "Username already exists.";
                            } else{
                                $username = trim($_POST["username"]);
                            }
                        }
                    }
                    
                    // Close statement
                    $stmt->close();
                }
                
                // Validate password
                if(empty(trim($_POST["password"]))){
                    $password_err = "Please enter a password.";     
                } elseif(strlen(trim($_POST["password"])) < 6){
                    $password_err = "Password must have atleast 6 characters.";
                } else{
                    $password = trim($_POST["password"]);
                }
                
                // Validate confirm password
                if(empty(trim($_POST["confirm_password"]))){
                    $confirm_password_err = "Please confirm password.";     
                } else{
                    $confirm_password = trim($_POST["confirm_password"]);
                    if(empty($password_err) && ($password != $confirm_password)){
                        $confirm_password_err = "Password did not match.";
                    }
                }
                
                // Check input errors before inserting in database
                if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                    
                    // Prepare an insert statement
                    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                    
                    if($stmt = $mysqli->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("ss", $param_username, $param_password);
                        
                        // Set parameters
                        $param_username = $username;
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                        
                        // Attempt to execute the prepared statement
                        if($stmt->execute()){
                            // Redirect to login page
                            header("location: login.php");
                        }
                    }
                    
                    // Close statement
                    $stmt->close();
                }
                
                // Close connection
                $mysqli->close();
            }
                    }
                }

    class login {
        public $username; 
        public $password;
        public $username_err; 
        public $password_err;
        
        function log($conn) {
            // Processing form data when form is submitted
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            
                // Check if username is empty
                if(empty(trim($_POST["username"]))){
                    $username_err = "Please enter username.";
                } else{
                    $username = trim($_POST["username"]);
                }
                
                // Check if password is empty
                if(empty(trim($_POST["password"]))){
                    $password_err = "Please enter your password.";
                } else{
                    $password = trim($_POST["password"]);
                }
                
                // Validate credentials
                if(empty($username_err) && empty($password_err)){
                    // Prepare a select statement
                    $sql = "SELECT id, username, password FROM users WHERE username = ?";
                    
                    if($stmt = $mysqli->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("s", $param_username);
                        
                        // Set parameters
                        $param_username = $username;
                        
                        // Attempt to execute the prepared statement
                        if($stmt->execute()){
                            // Store result
                            $stmt->store_result();
                            
                            // Check if username exists, if yes then verify password
                            if($stmt->num_rows == 1){                    
                                // Bind result variables
                                $stmt->bind_result($id, $username, $hashed_password);
                                if($stmt->fetch()){
                                    if(password_verify($password, $hashed_password)){
                                        // Password is correct, so start a new session
                                        session_start();
                                        
                                        // Store data in session variables
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $id;
                                        $_SESSION["username"] = $username;                            
                                        
                                        // Redirect user to welcome page
                                        header("location: booking.php");
                                    } else{
                                        // Display an error message if password is not valid
                                        $password_err = "Invalid password";
                                    }
                                }
                            } else{
                                // Display an error message if username doesn't exist
                                $username_err = "Username does not exist";
                            }
                        }
                    }
                    
                    // Close statement
                    $stmt->close();
                }
                
                // Close connection
                $mysqli->close();
            }
        }
    }

    class bookings {
        public $user;
        public $hotel;
        public $dateIn;
        public $dateOut;
        public $rooms;

        function insertBooking($conn) {

            $this->user= $_SESSION["username"];
            $this->hotel= $_POST["hotel"];
            $this->dateIn= $_POST["arrival"];
            $this->dateOut= $_POST["departure"];
            $this->rooms= $_POST["rooms"];

            $data_input = $conn->query("INSERT INTO bookings (id, guestname, hotelname,arrival, depart, rooms)
            VALUES ('$this->user','$this->hotel','$this->dateIn', '$this->dateOut','$this->rooms')"); 
        }

        function displayBooking($conn) {

        if($result = $conn->query("SELECT * FROM bookings WHERE guestname='$this->user")) {
            ?> 
                <div>
                    hello <?php echo $result["guestname"]; ?>
                    Before you confirm your booking at <?php echo $result["hotelname"]?>
                    please review it below
                </div>
                <div>
                    Hotel Name: <?php echo $result["hotelname"];?>
                    CHECKIN DATE:<?php echo $result["arrival"];?>
                    CHECKOUT DATE: <?php echo $result["departure"];?>
                    NUMBER OF ROOMS: <?php echo $result["rooms"];?>
                    LENGTH OF STAY: <?php ;?>
                </div>

            <?php
        };

        }
    }



?>

