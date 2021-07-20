<?php

    require "conn.php";

    $dt = new DateTime($transaction["transaction_date"], new DateTimeZone('IST'));
    $date = $dt->format('m/d/Y'); 

    $to_id = $transaction["to_id"];

    $sql = "SELECT user_details.name, user_details.email FROM user_details WHERE id=$to_id;";

    $result = mysqli_query($conn, $sql);

    $receiver = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($conn);
    
?>
