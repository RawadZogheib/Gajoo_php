<?php
    $sql = "Select (SELECT `coupon_amount` FROM `coupon` WHERE account_Id = '".$account_Id."' AND payment_code = 1) as freecoupon,
                   (SELECT `coupon_amount` FROM `coupon` WHERE account_Id = '".$account_Id."' AND payment_code = 2) as redcoupon,
                   (SELECT `coupon_amount` FROM `coupon` WHERE account_Id = '".$account_Id."' AND payment_code = 3) as yellowcoupon,
                   (SELECT `coupon_amount` FROM `coupon` WHERE account_Id = '".$account_Id."' AND payment_code = 4) as bluecoupon,
                   (SELECT `coupon_amount` FROM `coupon` WHERE account_Id = '".$account_Id."' AND payment_code = 5) as greencoupon";

    $xx = mysqli_query($con,$sql);

?>