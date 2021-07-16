<?php

    $conn = mysqli_connect('localhost', 'ChiragLulla', '1234', 'Bank');
    if(!$conn)
        echo "Connection error: " . mysqli_connect_error();

?>