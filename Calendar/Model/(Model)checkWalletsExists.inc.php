<?php
    $sql2 = "SELECT (SELECT `coupon_amount` FROM `coupon` WHERE `account_Id` = '".$account_Id."' AND `payment_code` = '1') as coupon_amount1,
                    (SELECT `coupon_amount` FROM `coupon` WHERE `account_Id` = '".$account_Id."' AND `payment_code` = '2') as coupon_amount2,
                    (SELECT `coupon_amount` FROM `coupon` WHERE `account_Id` = '".$account_Id."' AND `payment_code` = '3') as coupon_amount3,
                    (SELECT `coupon_amount` FROM `coupon` WHERE `account_Id` = '".$account_Id."' AND `payment_code` = '4') as coupon_amount4, 
                    (SELECT `coupon_amount` FROM `coupon` WHERE `account_Id` = '".$account_Id."' AND `payment_code` = '5') as coupon_amount5";
    
    $xx2 = mysqli_query($con,$sql2);
    $res2 = mysqli_fetch_assoc($xx2);
?>