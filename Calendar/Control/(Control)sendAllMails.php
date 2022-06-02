<?php


$locSendMail = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Control/(Control)phpMailer.php';
$locSendMailTeacher = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Control/(Control)sendMailTeacher.php';
$locSendMailClient = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Control/(Control)sendMailClient.php';
$locgetTeacherMail = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)getTeacherMail.inc.php';
$locgetClientMail = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)getClientMail.inc.php';

    require $locgetTeacherMail;
    if(mysqli_num_rows($x1) > 0){
        require $locSendMailTeacher;
    }

    require $locgetClientMail;
    if(mysqli_num_rows($x2) > 0){
        require $locSendMailClient;
    }

    require $locSendMail;


?>