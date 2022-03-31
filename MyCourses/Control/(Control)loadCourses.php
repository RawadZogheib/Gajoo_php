<?php 

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $locGetCourses = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/MyCourses/Model/(Model)getCourses.inc.php';
    $locGetNbOfCourse = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/MyCourses/Model/(Model)getNbOfCourse.inc.php';
    $locGetNbOfCourseReserved = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/MyCourses/Model/(Model)getNbOfCourseReserved.inc.php';
    $locGetTeacherInfo = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/MyCourses/Model/(Model)getTeacherInfo.inc.php';
    
    $json_array = array();
    $json_array[0] = 'error4';
	
    require $locGetCourses;
	if(mysqli_num_rows($x1) > 0){
		$t1 = 1;
		$i = 0;
		while($res1 = mysqli_fetch_assoc($x1)){
			$json_array[1][$i][0] = $res1["course_Id"];
			$json_array[1][$i][1] = $res1["course_name"];
			$json_array[1][$i][2] = $res1["course_date_of_begin"];
			$json_array[1][$i][3] = $res1["course_duration"];
			$json_array[1][$i][4] = $res1["teacher_Id"];
			$json_array[1][$i][5] = $res1["teacherName"];
			$json_array[1][$i][6] = $res1["teacherDateOfBirth"];
			
			require $locGetNbOfCourse;
			if(mysqli_num_rows($x3) > 0){
				$json_array[1][$i][7] = $res3["teacher_nbOfCourse"];
			}else {
				$json_array[1][$i][7] = "0";
			}

			require $locGetNbOfCourseReserved;
			if(mysqli_num_rows($x4) > 0){
				$json_array[1][$i][8] = $res4["teacher_nbOfCourseReserved"];
			}else {
				$json_array[1][$i][8] = "0";
			}

			require $locGetTeacherInfo;
			if(mysqli_num_rows($x2) > 0){
				$t2 = 1;
				$j = 0;
				while($res2 = mysqli_fetch_assoc($x2)){
					$json_array[1][$i][9][$j] = array(
						$res2["characteristic_t_type"],
						$res2["characteristic_t_language"],
						$res2["characteristic_t_level"],
					);
					$j++;
				}
			}else if(mysqli_num_rows($x2) == 0){
				$t2 = 2;
				$json_array[1][$i][9] = array();
		
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

    
    echo json_encode($json_array);

}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
 

?>