<?php

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

	//Get the data from Flutter
    $json_array = array();
	$t1 = 0;
    $t2 = 0;

    //Get Globals List
	
	$json_array[0] = 'error4';

	$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Model/(Model)config.inc.php';
	require $locConfig;
	$con=con($server);

	require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getTeacherIdNameDate.inc.php';
	if(mysqli_num_rows($x1) > 0){
		$t1 = 1;
		$i = 0;
		while($res1 = mysqli_fetch_assoc($x1)){
			$json_array[1][$i][0] = $res1["teacher_Id"];
			$json_array[1][$i][1] = $res1["teacher_name"];
			$json_array[1][$i][2] = $res1["teacher_dateOfBirth"];
			
			require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getNbOfCourse.inc.php';
			if(mysqli_num_rows($x3) > 0){
				$json_array[1][$i][3] = $res3["teacher_nbOfCourse"];
			}else if(mysqli_num_rows($x3) == 0){
				$json_array[1][$i][3] = array();
			}

			require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getNbOfCourseReserved.inc.php';
			if(mysqli_num_rows($x4) > 0){
				$json_array[1][$i][4] = $res4["teacher_nbOfCourse"];
			}else if(mysqli_num_rows($x4) == 0){
				$json_array[1][$i][4] = array();
			}

			require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getTeacherInfo.inc.php';
			if(mysqli_num_rows($x2) > 0){
				$t2 = 1;
				$j = 0;
				while($res2 = mysqli_fetch_assoc($x2)){
					$json_array[1][$i][5][$j] = array(
						$res2["characteristic_t_type"],
						$res2["characteristic_t_language"],
						$res2["characteristic_t_level"],
					);
					$j++;
				}
			}else if(mysqli_num_rows($x2) == 0){
				$t2 = 2;
				$json_array[1][$i][5] = array();
		
			}

			require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Teacher/Model/(Model)getIfLiked.inc.php';
			if(mysqli_num_rows($x6) == 1){
				$json_array[1][$i][6] = '1';
			}else {
				$json_array[1][$i][6] = '0';
			}

			$i++;
		}
	}else if(mysqli_num_rows($x1) == 0){
        $t1 = 2;
        $json_array = array();

    }

	if($t1 == 1 || $t2 == 1){
        $json_array[0] = 'success';
    }else if($t1 == 2){
        $json_array[0] = 'empty';
    }


	//echo [$una,$maa,$mia];
    //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
    echo json_encode($json_array);


?>