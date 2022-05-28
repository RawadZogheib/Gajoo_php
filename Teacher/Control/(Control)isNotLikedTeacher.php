<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';

if(!empty($data->email) && !empty($data->teacher_Id) && !empty($data->isLiked)){
	$email = htmlspecialchars($data->email);
    $teacher_Id = htmlspecialchars($data->teacher_Id);
	$isLiked = htmlspecialchars($data->isLiked);

    $locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Model/(Model)config.inc.php';
	$locError4 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error4.php';
	$locError8 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error8.php';
	$locSuccess = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)success.php';
	$locModelLogin = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Login/Model/(Model)login.inc.php';
	$locGetAccTeacherId = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getAccTeacherId.inc.php';
	$locDeleteLikedTeacher = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)deleteLikedTeacher.inc.php';

    require $locConfig;
	$con=con($server);

	require $locModelLogin;
	$account_Id = $res["account_Id"];
	if($res["nbr"]==1){
        require $locGetAccTeacherId;
        if($res5['nbr'] > 0){
            require $locDeleteLikedTeacher;
            require $locSuccess;
        }else{
			echo '["already deleted"]';
		}
	}else{
		require $locError8;
	}
    

	mysqli_close($con);

}else require $locError7;


?>