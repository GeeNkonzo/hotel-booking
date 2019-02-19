<?php
    // registration class created with method of validating user input and verifying data
    class registration {

        // variables declared
        public $username;
        public $password;
        public $confirm_password;
        
        public $username_err;
        public $password_err;

        function reg($conn) {
            // When user posts data is assigned to the above variables and then checked
            if (isset($_POST["register"])) {
                $this->username = $_POST["username"];
                $this->password = $_POST["password"];
                $this->confirm_password = $_POST["confirm_password"];
                $users=array();
                $resource = $conn->query("SELECT username FROM user");
                while($row = $resource->fetch_assoc()) {
                    array_push($users, $row["username"]);
                }
                if (in_array(trim($this->username),$users)) {
                    $this->username_err = "Username exists!";
                ?>
                    <span style="color:red"><?php echo $this->username_err ?></span>
                <?php
                }

                if($this->password != $this->confirm_password) {
                    $this->password_err = "Passwords do not match!";
                ?>
                    <span style="color:red"><?php echo $this->password_err ?></span>
                <?php
                } else {
                    $this->password = password_hash($this->password, PASSWORD_DEFAULT);
                    // Once data meets requirements it is added to table
                    $user_insert = "INSERT INTO user (username,password) VALUES ('$this->username','$this->password')";
                    if ($conn->query($user_insert)) {
                    // user is then redirected to index page
                    header("Location: index.php");
                    } else {
                        echo "Error: " . $conn->error;
                    }
                
                
            }
            
         }
    }
}

// login class created with method of validating user input and verifying data
    class login {

        // variables declared
        public $username; 
        public $password;
        public $err; 
        
        function log($conn) {
            // user table created 
            $user_create = $conn->query("CREATE TABLE IF NOT EXISTS user (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50),
                password VARCHAR(50))");

            // check if table is created
            if($user_create) {
                
            } else {
                echo "Error: " . $conn->error;
            }

            // once user posts, data is assigned the variables declared above and then checked
            if (isset($_POST["login"])) {
                $this->username = $_POST["username"];
                $this->password = $_POST["password"];
                $resource = $conn->query("SELECT * FROM user");
                while($row = $resource->fetch_array(MYSQLI_ASSOC)) {
                    if(trim($this->username)==$row["username"] && (password_verify(trim($this->password),$row["password"]))) {
                        $_SESSION["username"] = $row["username"];
                        header("Location: booking.php");
                    } else {
                        $this->err = "Username or Password incorrect";
                        ?>
                            <span style="color:red"><?php echo $this->err?></span>
                        <?php
                    }
                }
            }        
    }
}

// bookings class created with method of validating user input and verifying data
    class bookings {

        // variables declared
        public $guest;
        public $surname;
        public $user;
        public $hotel;
        public $dateIn;
        public $dateOut;
        public $rooms;
        public $numDays;

        function insertBooking($conn) {
            $this->guest = $_POST["guestname"];
            $this->surname = $_POST["surname"];
            $this->user = $_SESSION["username"];
            $this->hotel= $_POST["hotel"];
            $this->dateIn= $_POST["arrival"];
            $this->dateOut= $_POST["departure"];
            $this->rooms= $_POST["rooms"];

            if(!$conn->query("INSERT INTO bookings(guestname, surname, username, hotelname,arrival, depart, rooms)
            VALUES ('$this->guest','$this->surname','$this->user','$this->hotel','$this->dateIn', '$this->dateOut','$this->rooms')")) {
               // echo "error " . $conn->error;
            } else {
                header("Location: confirm.php");
            }
        }

        function displayConfirm($conn) {
            $this->user = $_SESSION["username"];
            $this->guest = $_POST["guestname"];
            $this->surname = $_POST["surname"];
            $datetime1 = new DateTime($_POST['arrival']);
            $datetime2 = new DateTime($_POST['departure']);
            $numDays= $datetime1->diff($datetime2)->format("%d");
                ?> 
                    <div class="form-bg">
                        <div>
                            <h3>Thank you <?php echo $_POST["guestname"] . " " . $_POST["surname"] ;?> for booking with Hotel Bookings Online. Below, are your details:  </h3>
                        </div>
                        <br>
                        <div>
                            Hotel Name: <?php echo $_POST["hotel"];?>
                        </div>
                        <br>
                        <div>
                            CHECKIN DATE: <?php echo $_POST["arrival"];?>
                        </div>
                        <br>
                        <div>
                            CHECKOUT DATE: <?php echo $_POST["departure"];?>
                        </div>
                        <br>
                        <div>
                            NUMBER OF ROOMS: <?php echo $_POST["rooms"];?>
                        </div>
                        <br>
                        <div>
                            LENGTH OF STAY: <?php echo $numDays . " days";?>
                        </div>
                        <br>
                        <div>
                            <?php 
                                
                                if($_POST["hotel"]=="Mojo Hotel") {
                                    $price=800;
                                } else if($_POST["hotel"]=="Cape Diamond Hotel") {
                                    $price=1200;
                                } else if($_POST["hotel"]=="Fountains Hotel") {
                                    $price=1350;
                                } else {
                                    $price=1500;
                                }

                                $total = $_POST["rooms"] * $numDays * $price;
                             ?>
                             FOR THE TOTAL AMOUNT OF: <?php echo "R " . $total ?>
                        </div>
                    </div>
                <?php
        
        }
        
    }




?>

