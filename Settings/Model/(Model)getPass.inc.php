<?php
    $sql = "SELECT `account_password` as account_password FROM account WHERE `account_Id` = '".$account_Id."'";
    
    $x1 = mysqli_query($con,$sql);
    $xx1 = mysqli_fetch_assoc($x1);


?>