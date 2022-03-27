<?php 

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $locError7 =  $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';
    if(!empty($data->teacher_Id)){

        $locGetGreenDates = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)getGreenDates.inc.php';
        $locGetRedDates = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)getRedDates.inc.php';

        $teacher_Id = htmlspecialchars($data->teacher_Id);

        $greenList = array();
        $redList = array();
        $t1=0;
        $t2=0;

        require $locGetGreenDates;
        if(mysqli_num_rows($xx1)>0){
            $t1 = 1;
            while($res1 = mysqli_fetch_assoc($xx1)){	
                $greenList[] = $res1["course_date_of_begin"];
            }	
        }else  if(mysqli_num_rows($xx1) == 0){
            $t1 = 2;
            $greenList = array();
        }
        
        require $locGetRedDates;
        if(mysqli_num_rows($xx2)>0){
            $t2 = 1;
            while($res2 = mysqli_fetch_assoc($xx2)){	
                $redList[] = $res2["course_date_of_begin"];
            }	
        }else  if(mysqli_num_rows($xx2) == 0){
            $t2 = 2;
            $redList = array();
        } 

        $json_array[0] = 'error4';
        $json_array[1] = $greenList;
        $json_array[2] = $redList;

        if($t1 == 1 || $t2 == 1){
            $json_array[0] = 'success';
        }else if($t1 == 2 && $t2 == 2){
            $json_array[0] = 'empty';
        }
        echo json_encode($json_array);

        mysqli_close($con);
    }else require $locError7;
}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
 

?>