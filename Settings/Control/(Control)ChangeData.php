<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';

    if(!empty($data->email) && !empty($data->fname) && !empty($data->lname) && !empty($data->username)){

        $email = htmlspecialchars($data->email);
        $fname = htmlspecialchars($data->fname);
        $lname = htmlspecialchars($data->lname);
        $username = htmlspecialchars($data->username);


        $locError4 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error4.php';
        $locSuccess = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)success.php';
        $locChangeData = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Settings/Model/(Model)changeData.php';

        if(require $locChangeData){
            require $locSuccess;
        }else{
            require $locError4;
        }

        mysqli_close($con);

    }else require $locError7;//7 Field cannot be empty.


}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>