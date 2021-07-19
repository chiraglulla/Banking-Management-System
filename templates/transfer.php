<?php
    require "../db/getFromEmail.php";
?>

<?php
    require "../db/storeTransactions.php";
?>


<!DOCTYPE html>
<html lang="en">

<?php
    include "./header.php";
?>

    <?php if(!$_SERVER["QUERY_STRING"] == "success"):?>
        <div>
            <form action="transfer.php" method="POST">
                <div>
                    <input type="text" name="from" readonly="readonly" value="<?php echo $_SESSION["email"];?>">
                    <span><?php echo $errors["from"]; ?></span>
                </div>
                <div>
                    <input type="text" name="to" value="<?php echo $to; ?>">
                    <span><?php echo $errors["to"]; ?></span>
                </div>
                <div>
                    <input type="number" name="amount" value="<?php echo $amount; ?>">
                    <span><?php echo $errors["amount"]; ?></span>
                </div>

                <input type="submit" name="transfer" value="Submit">
            </form>
        </div>
    <?php else:?>
        <h1>Success</h1>
        
    <?php endif;?>
<?php
    include "./footer.php";
?>
</html>