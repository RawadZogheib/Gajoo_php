<?php 

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $locError7 =  $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';
    if(!empty($data->teacher_Id) && !empty($data->date)){

        $teacher_Id = htmlspecialchars($data->teacher_Id);
        $date = htmlspecialchars($data->date);

        $locGetHoursMins = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)getHoursMins.inc.php';

        $hoursMinsList = array();
        $t1=0;

        require $locGetHoursMins;
        if(mysqli_num_rows($xx)>0){
            $t1 = 1;
            while($res = mysqli_fetch_assoc($xx)){	
                $hoursMinsList[] = array($res["course_Id"],
                                            $res["course_date_of_begin"],
                                            $res["participants"],
                                            $res["course_max_students"],
                                            $res["course_duration"]);
            }	
        }else  if(mysqli_num_rows($xx) == 0){
            $t1 = 2;
            $hoursMinsList = array();
        }
        

        $json_array[0] = 'error4';
        $json_array[1] = $hoursMinsList;

        if($t1 == 1){
            $json_array[0] = 'success';
        }else if($t1 == 2){
            $json_array[0] = 'empty';
        }
        echo json_encode($json_array);

        mysqli_close($con);
    }else require $locError7;
}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
 

?>