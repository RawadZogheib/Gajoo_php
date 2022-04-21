<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';

    if(!empty($data->code) && !empty($data->email)){
        $code = htmlspecialchars($data->code);
        $email = htmlspecialchars($data->email);

        $locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Model/(Model)config.inc.php';
        $locGetAccId = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Registration/Model/(Model)getAccountId.inc.php';
        $locSuccess = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)success.php';
        $locCodeFailed = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)codeFailed.php';
        $locDeleteCode = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Login/Model/(Model)deleteCode.inc.php';
        
        //$locErrException = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorException.php';

        require $locConfig;
        $con=con($server);
        
        require $locGetAccId;
        if($gg1['account_Id']){
            $account_Id = $gg1['account_Id'];
            require  $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Registration/Model/(Model)getCode.inc.php';
            if($cc1['vCode']){
                if($code == $cc1['vCode']){
                    require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Registration/Model/(Model)isRegistered.inc.php';
                    require $locSuccess;
                    require $locDeleteCode;
                }else{
                    require $locCodeFailed;
                }
            }
        }

        
      mysqli_close($con);
        
    }else require $locError7;//7 Field cannot be empty.




 
?>