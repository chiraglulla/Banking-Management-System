<?php

    require "conn.php";
    $user_email = [];
    session_start();
    if(isset($_POST["info"])) {
        global $user_email;

        $id = mysqli_real_escape_string($conn, $_POST["id"]);

        $sql = "SELECT email FROM user_details WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        $user_email = mysqli_fetch_array($result);

        mysqli_free_result($result);

        mysqli_close($conn);

        $_SESSION["email"] = $user_email[0];

    }//else{
    //     $_SESSION["email"] = "";
    // } 

?>