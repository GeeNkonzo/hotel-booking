<?php

    class registration {

        public $username;
        public $password;
        public $confirm_password;
        
        public $username_err;
        public $password_err;

        function reg($conn) {
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
                    $user_insert = "INSERT INTO user (username,password) VALUES ('$this->username','$this->password')";
                    if ($conn->query($user_insert)) {
                    header("Location: index.php");
                    } else {
                        echo "Error: " . $conn->error;
                    }
                
                
            }
            
         }
    }
}

    class login {
        public $username; 
        public $password;
        public $err; 
        
        function log($conn) {
            $user_create = $conn->query("CREATE TABLE IF NOT EXISTS user (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50),
                password VARCHAR(50))");

            if($user_create) {
                
            } else {
                echo "Error: " . $conn->error;
            }

            if (isset($_POST["login"])) {
                $this->username = $_POST["username"];
                $this->password = $_POST["password"];
                $resource = $conn->query("SELECT * FROM user");
                while($row = $resource->fetch_assoc()) {
                    if(trim($this->username)==$row["username"] && (trim($this->password)==$row["password"])) {
                        $_SESSION["username"] = $row["username"];
                        header("Location: booking.php");
                    } else {
                        $this->err = "Username or Password incorrect";
                        ?>
                            <span style="color:red"><?php echo $this->err ?></span>
                        <?php
                    }
                }
            }        
    }
}
    class bookings {
        public $user;
        public $hotel;
        public $dateIn;
        public $dateOut;
        public $rooms;
        public $numDays;

        function insertBooking($conn) {
            $this->user = $_SESSION["username"];
            $this->hotel= $_POST["hotel"];
            $this->dateIn= $_POST["arrival"];
            $this->dateOut= $_POST["departure"];
            $this->rooms= $_POST["rooms"];

            if(!$conn->query("INSERT INTO bookings(guestname, hotelname,arrival, depart, rooms)
            VALUES ('$this->user','$this->hotel','$this->dateIn', '$this->dateOut','$this->rooms')")) {
                echo "error " . $conn->error;
            } else {
                header("Location: confirm.php");
            }
        }

        function displayConfirm() {
            $datetime1 = new DateTime($_POST['arrival']);
            $datetime2 = new DateTime($_POST['departure']);
            $numDays= $datetime1->diff($datetime2)->format("%d");
            if($result = $conn->query("SELECT * FROM bookings WHERE guestname='$this->user")) {
                ?> 
                    <div>
                        Hotel Name: <?php echo $_POST["hotel"];?>
                    </div>
                    <div>
                        CHECKIN DATE:<?php echo $_POST["arrival"];?>
                    </div>
                    <div>
                        CHECKOUT DATE: <?php echo $_POST["departure"];?>
                    </div>
                    <div>
                        NUMBER OF ROOMS: <?php echo $_POST["rooms"];?>
                    </div>
                    <div>
                        LENGTH OF STAY: <?php echo $numDays . " days";?>
                    </div>

                <?php
            }
        }
        function displayBooking($conn) {

        if($result = $conn->query("SELECT * FROM bookings WHERE guestname='$this->user")) {
            ?> 
                <div>
                    Hotel Name: <?php echo $result["hotelname"];?>
                    CHECKIN DATE:<?php echo $result["arrival"];?>
                    CHECKOUT DATE: <?php echo $result["departure"];?>
                    NUMBER OF ROOMS: <?php echo $result["rooms"];?>
                    LENGTH OF STAY: <?php $datetime1 = new DateTime($_POST["arrival"]);
                    $datetime2 = new DateTime($_POST["departure"]);
                    $numDays= $datetime1->diff($datetime2);
                    echo $interval->format('%d% days');?>
                </div> 

            <?php
        };
        }
    }




?>

