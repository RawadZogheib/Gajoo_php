<?php

    $sql2 = "UPDATE `coupon`
    SET coupon_amount = '".$totalAmount."'
    WHERE account_Id = '".$account_Id."' && payment_code = '".$payment_code."'";
    $yy2 = mysqli_query($con,$sql2);

?>