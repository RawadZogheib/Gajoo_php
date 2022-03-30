<?php

    $sql1 = "INSERT INTO `coupon` (`account_Id`, `payment_code`, `coupon_amount`) VALUES ('".$account_Id."', '".$payment_code."', '".$coupon_amount."')";
    $yy1 = mysqli_query($con,$sql1);

?>