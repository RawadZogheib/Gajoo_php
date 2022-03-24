<?php

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

	//Get the data from Flutter
    $json_array = array();
	

    //Get Globals List
	
	$json_array[0] = 'error10';

	$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Model/(Model)config.inc.php';
	require $locConfig;
	$con=con($server);

	require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getTeacherName.inc.php';
	if(mysqli_num_rows($x1) > 0){

		while($res1 = mysqli_fetch_assoc($x1)){
			$teacher_Id = $res1["teacher_Id"];
			require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getTeacherInfo.inc.php';
			if(mysqli_num_rows($x2) > 0){
				$t1 = 1;
				while($res2 = mysqli_fetch_assoc($x2)){
						$json_array[1] = array(
							$res1['teacher_Id'],
							$res1["teacher_name"],
							$res2["characteristic_t_type"],
							$res2["characteristic_t_language"],
							$res2["characteristic_t_level"],
						);
				}
			}else $json_array[1] = [];
		}
	}else $json_array[1] = [];



    // if(mysqli_num_rows($xx)>0){
	// 	$t1 = 1;
	// 	$ress = mysqli_fetch_assoc($xx);
	// 	$accountId=$ress["account_Id"];
	// 	$json_array[1] = array($accountId,
	// 						   $ress["account_email"]
	// 								);

	// }else $json_array[1] = [];

	if($t1 == 1){
		$json_array[0] = 'true';
	}
	//echo [$una,$maa,$mia];
    //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
    echo json_encode($json_array);


?>