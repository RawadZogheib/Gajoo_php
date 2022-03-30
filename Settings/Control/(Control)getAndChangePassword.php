<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';

    if(!empty($data->account_Id) && !empty($data->password) && !empty($data->password2) && !empty($data->password3)){

        $account_Id = htmlspecialchars($data->account_Id);
        $password = htmlspecialchars($data->password);
        $password2 = htmlspecialchars($data->password2);
        $password3 = htmlspecialchars($data->password3);


        $locError4 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error4.php';
        $locSuccess = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)success.php';
        $locError3 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error3.php';
        $locError2_3 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error2_3.php';
        $locgetPass = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Settings/Model/(Model)getPass.inc.php';
        $locSetPassDb = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Settings/Model/(Model)getPass.inc.php';
        
	    $passRegExp = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@#$%^&:,?_-]).{8,}$/";
        

        if(mysqli_num_rows($x1) > 0 ){
            if($account_Id == $xx1["account_password"]){
                if(strlen($password) <8){
                    require $locError2_3;//2_3 Your password must contain at least 8 characters, 1 lowercase(a-z),1 uppercase(A-Z),1 numeric character(0-9) and 1 special character(* . ! @ # $ % ^ & : , ? _ -).
                }else if(!preg_match($passRegExp, $password)){
                    require $locError2_3;//2_3 Your password must contain at least 8 characters, 1 lowercase(a-z),1 uppercase(A-Z),1 numeric character(0-9) and 1 special character(* . ! @ # $ % ^ & : , ? _ -).
                }else if($password2 != $password3){
                        require $locError3;//3 Please make sure your passwords match.
                }else if(require $locSetPassDb){
                    require $locSuccess;
                }
                
            }else{
                require $locError3;
            }
        }else{
            require $locError4;
        }

        mysqli_close($con);

    }else require $locError7;//7 Field cannot be empty.


}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>