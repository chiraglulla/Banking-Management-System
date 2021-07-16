<?php

    require 'conn.php';

    if(isset($_POST["info"])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        echo $id;
    }

?>
