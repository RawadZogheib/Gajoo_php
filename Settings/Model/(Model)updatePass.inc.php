<?php
    $sql2 = "UPDATE account
            SET `account_password` = '".$newHash."'
            WHERE `account_Id` = '".$account_Id."'";
    
    $x2 = mysqli_query($con,$sql2);


?>