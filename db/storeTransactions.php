<?php

    require "conn.php";
    
    $from = $to = "";
    $amount = null;
    $errors = [
        "from" => "",
        "to" => "",
        "amount" => ""
    ];

    if(isset($_POST["transfer"])) {
        global $from;
        global $to;
        global $amount;
        global $errors;

        //user entered data
        $from = mysqli_real_escape_string($conn, $_POST["from"]);
        $to = mysqli_real_escape_string($conn, $_POST["to"]);
        $amount = mysqli_real_escape_string($conn, $_POST["amount"]);

        require "validation.php";

        if(!array_filter($errors)){
            // to id exist check
            $get_receiver_id = "SELECT id FROM user_details WHERE email='$to';";
            $receiver_id = mysqli_fetch_array(mysqli_query($conn, $get_receiver_id));
    
            // amount <= current_balance check
            $get_sender_cb = "SELECT current_balance FROM user_details WHERE email='$from';";
            $current_balance = mysqli_fetch_array(mysqli_query($conn, $get_sender_cb));
    
            // checks
            if(empty($receiver_id))
                $errors["to"] = "No such user found.";
            if(!($amount > 0))
                $errors["amount"] = "Amount can't be zero.";
            if(!($amount <= $current_balance[0])) 
                $errors["amount"] = "Amount exceeded your current balance.<br>" . "Your current balance is : " . $current_balance[0] . "." ;
    
            if(!array_filter($errors)) {
                echo "Kardiya";
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
        }

    }
   
?>