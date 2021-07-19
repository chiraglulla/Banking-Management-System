<?php

    if(!filter_var($to, FILTER_VALIDATE_EMAIL))
        $errors['to'] = 'Invalid email.';

    if(!preg_match("/^[1-9]([0-9]+)?$/", $amount))
       $errors['amount'] = 'Invalid amount.';

?>