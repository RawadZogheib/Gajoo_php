<?php

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

	//Get the data from Flutter
    $json_array = array();
	$teacher_array = array();
	

    //Get Globals List
	
	$json_array[0] = 'error10';

	$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Model/(Model)config.inc.php';
	require $locConfig;
	$con=con($server);

	require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getTeacherName.inc.php';
	if(mysqli_num_rows($x1) > 0){
		$t1 = 1;
		while($res1 = mysqli_fetch_assoc($x1)){
			$teacher_Id = $res1["teacher_Id"];
			$teacher_array = $res1["teacher_Id"];
			$teacher_array = $res1["teacher_name"];
			require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getTeacherInfo.inc.php';
			if(mysqli_num_rows($x2) > 0){
				$t2 = 1;
				$i = 0;
				while($res2 = mysqli_fetch_assoc($x2)){
					$teacher_array[2][$i++] = array(
						$res2["characteristic_t_type"],
						$res2["characteristic_t_language"],
						$res2["characteristic_t_level"],
					);
				}
			}else if(mysqli_num_rows($x2) == 0){
				$t2 = 2;
				$teacher_array[2] = array();
		
			}
		}
	}else if(mysqli_num_rows($x1) == 0){
        $t1 = 2;
        $teacher_array = array();

    }

	$json_array[1] = $teacher_array;


	if($t1 == 1 || $t2 == 1){
        $json_array[0] = 'success';
    }else if($t1 == 2 && $t2 == 2){
        $json_array[0] = 'empty';
    }


	//echo [$una,$maa,$mia];
    //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
    echo json_encode($json_array);


?>