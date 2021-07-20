<?php
    require "./db/getUsers.php";
?>

<!DOCTYPE html>
<html lang="en">
    
    <?php 
        include "./templates/header.php";
    ?>
    


        <main class="container my-5">
            <div class="row">
                <?php foreach($users as $user):?>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="card mb-4">
                                    <h3 class="card-header"><?php echo htmlspecialchars($user['name']); ?></h3>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted">Current Balance:&#8377;  <?php echo htmlspecialchars($user['current_balance']); ?></h6>

                                        <form class="d-inline-block" action="./templates/transfer.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $user["id"]?>">
                                            <input class="btn btn-outline-dark font-weight-bold" type="submit" name="info" value="Transfer">
                                        </form>

                                        <form class="d-inline-block" action="./templates/userDetails.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $user["id"]?>">
                                            <input class="btn btn-link" type="submit" name="info" value="Transaction History">
                                        </form>
                                    </div>
                                </div>
                            </div>
                <?php endforeach;?>
            </div>
        </main>


    <?php 
        include "./templates/footer.php"
    ?>  

</html>