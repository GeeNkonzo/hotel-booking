<?php
    
    include_once 'user.php';

    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Check connection

    if ($conn->connect_error) {
        echo "Connection failed: " . mysqli_connect_error();
    }else{
        $sql = "CREATE TABLE IF NOT EXISTS bookings (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            guestname VARCHAR(50),
            hotelname VARCHAR(50),
            arrival VARCHAR(30),
            depart VARCHAR(30))";
        $conn->query($sql);
    }

    


?>