<?php

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';
$locModelLogin = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Login/Model/(Model)login.inc.php';
$locGetTeachersId = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/LikedTeacher/Model/(Model)getTeachersId.inc.php';
$locError8 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error8.php';

if(!empty($data->email)){
    $email = htmlspecialchars($data->email);

	//Get the data from Flutter
    $json_array = array();
	$t1 = 0;
    $t2 = 0;
    $i = 0;

    //Get Globals List
	
	$json_array[0] = 'error4';

	$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Model/(Model)config.inc.php';
	require $locConfig;
	$con=con($server);

    require $locModelLogin;
    if($res['nbr'] > 0){
	    $account_Id = $res["account_Id"];
        require $locGetTeachersId;
                if(mysqli_num_rows($tt) > 0){
                    while($rest = mysqli_fetch_assoc($tt)){
                        require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/LikedTeacher/Model/(Model)getTeacherIdNameDate.inc.php';
                        if(mysqli_num_rows($x1) > 0){
                            $t1 = 1;
                            $res1 = mysqli_fetch_assoc($x1);
                                $json_array[1][$i][0] = $rest['teacher_Id'];
                                $json_array[1][$i][1] = $res1["teacher_name"];
                                $json_array[1][$i][2] = $res1["teacher_dateOfBirth"];
                                
                                require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/LikedTeacher/Model/(Model)getNbOfCourse.inc.php';
                                if(mysqli_num_rows($x3) > 0){
                                    $json_array[1][$i][3] = $res3["teacher_nbOfCourse"];
                                }else if(mysqli_num_rows($x3) == 0){
                                    $json_array[1][$i][3] = array();
                                }

                                require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/LikedTeacher/Model/(Model)getNbOfCourseReserved.inc.php';
                                if(mysqli_num_rows($x4) > 0){
                                    $json_array[1][$i][4] = $res4["teacher_nbOfCourse"];
                                }else if(mysqli_num_rows($x4) == 0){
                                    $json_array[1][$i][4] = array();
                                }

                                require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/LikedTeacher/Model/(Model)getTeacherInfo.inc.php';
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
                                $i++;

                        }else if(mysqli_num_rows($x1) == 0){
                            $t1 = 2;
                            $json_array = array();

                        }

                        if($t1 == 1 || $t2 == 1){
                            $json_array[0] = 'success';
                        }else if($t1 == 2){
                            $json_array[0] = 'empty';
                        }

                    }
                }else{
                    echo '["no liked teachers"]';
                }

    }else{
        require $locError8;
    }


	//echo [$una,$maa,$mia];
    //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
    echo json_encode($json_array);

}else{
    require $locError7;
}

?>