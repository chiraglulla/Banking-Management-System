<?php
    include "./db/getUsers.php"
?>

<!DOCTYPE html>
<html lang="en">
    
    <?php 
        include "./templates/header.php"
    ?>
    
    <?php foreach($users as $user):?>

        <p><?php echo htmlspecialchars($user['name']); ?></p>
        <p><?php echo htmlspecialchars($user['email']); ?></p>
        <p><?php echo htmlspecialchars($user['current_balance']); ?></p>

        <form action="./templates/userDetails.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user["id"]?>">
            <input type="submit" name="info" value="Transaction History">
        </form>

        <form action="./templates/transfer.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user["id"]?>">
            <input type="submit" name="info" value="Transfer">
        </form>

        <hr>

    <?php endforeach;?>

    <?php 
        include "./templates/footer.php"
    ?>  

</html>