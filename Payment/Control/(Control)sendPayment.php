<?php 

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $locError7 =  $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';
    if(!empty($data->payment_code) && !empty($data->coupon_amount)){

        $locError4 =  $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error4.php';
        $locGetSpecificCoupons = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Payment/Model/(Model)getSpecificCoupons.inc.php';
        $locInsertcoupons = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Payment/Model/(Model)insertCoupons.inc.php';
        $locUpdatecoupons = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Payment/Model/(Model)updateCoupons.inc.php';
        
        $payment_code = htmlspecialchars($data->payment_code);
        $coupon_amount = htmlspecialchars($data->coupon_amount);
        
        require $locGetSpecificCoupons;
        if(mysqli_num_rows($yy) == 0){
            require $locInsertcoupons;
            if($yy1){
                echo '["success"]';
            }else require $locError4;//4 Cannot connect to the dataBase.

        }else  if(mysqli_num_rows($yy) == 1){
            $totalAmount = $res['coupon_amount'] + $coupon_amount;
            require $locUpdatecoupons;
            if($yy2){
                echo '["success"]';
            }else require $locError4;//4 Cannot connect to the dataBase.

        }else require $locError4;//4 Cannot connect to the dataBase.
        
    }else require $locError7;
}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
 

?>