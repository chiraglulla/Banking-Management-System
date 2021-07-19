<?php
    require "../db/getUserDetails.php";    
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include "./header.php";
?>


    <div>
        <p><?php echo htmlspecialchars($user["name"]); ?></p>
        <p><?php echo htmlspecialchars($user["email"]); ?></p>
        <p><?php echo htmlspecialchars($user["current_balance"]); ?></p>
    </div>

    <div>
        <?php if(empty($transaction_data)): ?>
            <p>No Transactions Done Yet</p>
            <form action="./transfer.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="info" value="Do Your First Transaction">
            </form>
        <?php else: ?>
            <?php foreach($transaction_data as $transaction):?>
                <?php include "../db/toidToEmail.php"; ?>
                <p> <?php echo htmlspecialchars($receiver["name"]) . " " . htmlspecialchars($receiver["email"]); ?> </p>
                <p> <?php echo htmlspecialchars($transaction["amount"]); ?> </p>
                <p> <?php echo htmlspecialchars($transaction["transaction_date"]); ?> </p>
                <hr>
            <?php endforeach;?>
        <?php endif; ?>
    </div>

<?php
    include "./footer.php";
?>