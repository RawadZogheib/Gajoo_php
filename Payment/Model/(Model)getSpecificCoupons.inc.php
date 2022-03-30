<?php

    $sql = "SELECT `coupon_amount` FROM `coupon` WHERE account_Id = '".$account_Id."' AND payment_code = '".$payment_code."'";
    $yy = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($yy);

?>