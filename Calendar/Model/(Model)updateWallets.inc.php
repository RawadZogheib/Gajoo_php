<?php
    if($res1["course_max_students"] == 1){

        if($res2["coupon_amount2"] >= 1){

            $sql3 = "UPDATE `coupon` SET `coupon_amount` = '".($res2["coupon_amount2"] - 1)."' WHERE `account_Id` = '".$account_Id."' AND `payment_code` = '2'";

        }else if($res2["coupon_amount3"] >= 1){

            $sql3 = "UPDATE `coupon` SET `coupon_amount` = '".($res2["coupon_amount3"] - 1)."' WHERE `account_Id` = '".$account_Id."' AND `payment_code` = '3'";
                            
        }else if($res2["coupon_amount4"] >= 1){

            $sql3 = "UPDATE `coupon` SET `coupon_amount` = '".($res2["coupon_amount4"] - 1)."' WHERE `account_Id` = '".$account_Id."' AND `payment_code` = '4'";                 
        }else {
            require $locError4;
        }

        
    }else if($res1["course_max_students"] > 1 && $res2["coupon_amount5"] >= 1){    

        $sql3 = "UPDATE `coupon` SET `coupon_amount` = '".($res2["coupon_amount5"] - 1)."' WHERE `account_Id` = '".$account_Id."' AND `payment_code` = '5'";              
        

    }else{
        require $locError4;
    }

    $yy3 = mysqli_query($con,$sql3);

?>