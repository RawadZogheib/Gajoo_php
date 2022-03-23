<?php 

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $locGetDates = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)getDates.inc.php';

    $Items = array();
    $t=0;

    require $locGetDates;
    if(mysqli_num_rows($xx)>0){
        $t = 1;
        while($res = mysqli_fetch_assoc($xx)){	
            $Items[] = $res["course_date_of_begin"];
        }	
    }else  if(mysqli_num_rows($xx) == 0){
        $t = 2;
        $Items = array();
    } 

    $json_array[0] = 'error4';
    $json_array[1] = $Items;

    if($t == 1){
        $json_array[0] = 'success';
    }else if($t == 2){
        $json_array[0] = 'empty';
    }
    echo json_encode($json_array);

    mysqli_close($con);
}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
 

?>