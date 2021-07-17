<?php

    require "conn.php";
    
    $from = $to = "";
    $amount = null;
    if(isset($_POST["transfer"])) {

        global $from;
        global $to;
        global $amount;
        $from = mysqli_real_escape_string($conn, $_POST["from"]);
        $to = mysqli_real_escape_string($conn, $_POST["to"]);
        $amount = mysqli_real_escape_string($conn, $_POST["amount"]);


        $sql = "UPDATE user_details SET current_balance = current_balance - $amount WHERE email='$from'";
        if(mysqli_query($conn, $sql)) {
            $sql = "UPDATE user_details SET current_balance = current_balance + $amount WHERE email='$to'";
            if(mysqli_query($conn, $sql)) {
                $from_id = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM user_details WHERE email='$from'"));
                $to_id = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM user_details WHERE email='$to'"));
                $sql = "INSERT INTO transactions (from_id, to_id, amount) VALUES ({$from_id[0]}, {$to_id[0]}, $amount)";
                if(mysqli_query($conn, $sql)){
                    unset($_SESSION['email']);
                    header("Location: ../templates/transfer.php?success");
                }
            }
        }
    }


?>