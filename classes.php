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
            
                }
    }

    class login {
        public $username; 
        public $password;
        public $username_err; 
        public $password_err;
        
        function log($conn) {
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
            $this->user = $_SESSION['username'] = "butch";
            $this->hotel= $_POST["hotel"];
            $this->dateIn= $_POST["arrival"];
            $this->dateOut= $_POST["departure"];
            $this->rooms= $_POST["rooms"];

            if(!$conn->query("INSERT INTO bookings(guestname, hotelname,arrival, depart, rooms)
            VALUES ('$this->user','$this->hotel','$this->dateIn', '$this->dateOut','$this->rooms')")) {
                echo "error" . $conn->error;
            } else {
                header("Location: confirm.php");
            }
        }

        function displayConfirm() {
            $datetime1 = new DateTime($_POST['arrival']);
            $datetime2 = new DateTime($_POST['departure']);
            $numDays= $datetime1->diff($datetime2)->format("%d");
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
                    $interval= $datetime1->diff($datetime2);
                    echo $interval->format('%R%a days');?>
                </div>

            <?php
        };
        }
    }



?>

