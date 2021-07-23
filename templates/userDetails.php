<?php
    require "../db/getUserDetails.php";    
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include "./header.php";
?>


    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h3><?php echo htmlspecialchars($user["name"]); ?></h3>
                <h5 class="text-muted"><?php echo htmlspecialchars($user["email"]); ?></h5>
                <h5 class="lead">Current Balance: &#8377;<?php echo htmlspecialchars($user["current_balance"]); ?></h5>
            </div>
        </div>
        <div class="mt-5"">
                <?php if(empty($transaction_data)): ?>
                    <div class="text-center">
                        <h3 class="display-4">No Transactions Done Yet</h3>
                        <form action="./transfer.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input class="btn btn-outline-dark" type="submit" name="info" value="Do Your First Transaction">
                        </form>
                    </div>
                <?php else: ?>
                    <h4 class="py-3 text-muted">Transaction History</h4>
                    <table class="table table-hover table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name and Email</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($transaction_data as $transaction):?>
                                <?php include "../db/toidToEmail.php"; ?>
                                <tr>
                                    <th scope="row"><?php echo $count; ?></th>
                                    <td>
                                        <h5><?php echo htmlspecialchars($receiver["name"])."<br>"; ?></h5>
                                        <span class="text-muted"><?php echo htmlspecialchars($receiver["email"]); ?></span>
                                    </td>
                                    <td><h5> - &#8377; <?php echo htmlspecialchars($transaction["amount"]); ?></h5></td>
                                    <td><h5><?php echo $date;?></h5></td>
                                </tr>
                                <?php $count++; ?>
                            <?php endforeach;?>
                        </tbody>
                <?php endif; ?>
                    </table>
        </div>
    </div>

<?php
    include "./footer.php";
?>