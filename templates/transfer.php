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
        <div class="container my-5">
            <div class="m-auto col-12 col-sm-8">
                <form action="transfer.php" method="POST">
                    <div class="form-group row">
                        <label for="fromEmail" class="col-sm-2 col-form-label"><h5>From</h5></label>
                        <div class="col-12 col-sm-10">
                            <input id="fromEmail" class="form-control p-2" type="text" name="from" value="<?php echo $_SESSION["email"];?>" readonly>
                            <span class="text-danger"><?php echo $errors["from"]; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="toEmail" class="col-sm-2 col-form-label"><h5>To </h5></label> 
                        <div class="col-12 col-sm-10">
                            <input id="toEmail" class="form-control p-2" type="text" name="to" value="<?php echo $to; ?>">
                            <span class="text-danger"><?php echo $errors["to"]; ?></span>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label for="amount" class="col-sm-2 col-form-label"><h5>Amount</h5></label>
                        <div class="col-12 col-sm-10">
                            <input id="amount" class="form-control p-2" type="number" name="amount" value="<?php echo $amount; ?>">
                            <span class="text-danger"><?php echo $errors["amount"]; ?></span>
                        </div>
                        
                    </div>
                    <div class="text-center">
                        <input class="btn btn-outline-success font-weight-bold" type="submit" name="transfer" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    <?php else:?>
        <div class="container text-center my-5">
            <img src="../imgs/checked.png" alt="Success">
            <div class="display-4 mb-4">Success</div>
            <a class="h5" href="/Banking-Managment-System">
                <img src="../imgs/left-arrow.png" alt="back">
                Back to Home Page
            </a>
        </div>
        
    <?php endif;?>
<?php
    include "./footer.php";
?>
</html>