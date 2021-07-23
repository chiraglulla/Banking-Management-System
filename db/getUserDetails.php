<?php

    require 'conn.php';
    $user = [];
    $transaction_data = [];
    $count = 1;
    
    if(isset($_POST["info"])) {
        global $user;
        global $transaction_data;
       

        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $sql = "SELECT user_details.name, user_details.email, user_details.current_balance FROM user_details WHERE id = $id;";

        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($result);

        $sql = "SELECT * FROM transactions WHERE from_id = $id ORDER BY transaction_date DESC;";

        $result = mysqli_query($conn, $sql);

        $transaction_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);

        mysqli_close($conn);
    }

?>
