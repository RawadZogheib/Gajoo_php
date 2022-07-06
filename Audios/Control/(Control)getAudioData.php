<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

    $locGetData = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Audios/Model/(Model)getData.inc.php';

//Test token
$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

	//Get the data from Flutter
    $json_array = array();

	$json_array[0] = 'error10';
    $t1 = 0;


    

    require $locGetData;

    if(mysqli_num_rows($aud)){
		$t1 = 1;
        $i=0;
        while($aud1 = mysqli_fetch_assoc($aud)){

            $json_array[1][$i] = array(
                $aud1['audio_Id'],
                $aud1['audio_language'],
                $aud1['audio_theme'],
                $aud1['audio_time'],
                $aud1['audio_date'],
                $aud1['audio_text'],
            );
            $i++;
        }
    }else{
        $json_array[1] = [];
    }


    if($t1 == 1){
        $json_array[0] = 'success';
	}
	
    echo json_encode($json_array);

}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>