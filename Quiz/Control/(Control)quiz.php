<?php

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

//Test token
$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $json_array = array();
    
	$json_array[0] = 'error10';

$locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';

$listArabic = array('هو','هذه','هؤلاء','الذين','هل','أن','في','كاتِباً','أربعة','شقة مفروشة فيها غرفة نوم وصالة وحمّام ومطبخ مجهّز',
                'الثّلاثاء','الصّيف','شكر صديق','من فضلك أريد التسجيل في هذه الجامعة ');

$listFrench = array('Oui','Oui','Oui','Oui','Vrai','Faux','Vrai','Faux','avion','Assets/Quiz/FR/footBall.png',
                'au tableau.','cartable','couverture','Nadine va à l’école avec sa mère.','la mer.');

$listEnglish = array('see','are thinking','is being','up','out','republican','non of the above','non of the above',
                    'has already visited','had been walking','would','isn\'t used to','had','about','get along with',
                    'by','takes','on','talking','putting','for','is being built','non of the above','amused','will see',
                    'had worn','does he show','in case','inspire','who smoke heavily','who works as a scientist',
                    'worn out','she wanted to know why you had chosen to become a marine biologist','non of the above',
                    'had his car fixed');

$listFRdelf = array();

$count = 0;
    if(!empty($data->account_Id) && !empty($data->type) && !empty($data->list)){
        $type = htmlspecialchars($data->type);
        $list = $data->list;

        // //if arabic
        // $answrList = $listArabic;
        if($type == "AR"){
            $answerList = $listArabic;
        }else if($type == "FR"){
            $answerList = $listFrench;
        }else if($type == "EN"){
            $answerList = $listEnglish;
        }else if($type == "FR_DELF"){
            $answerList = $listEnglish;
        }
        
        for($i = 0; $i < count($answerList); $i++){
            if(strtolower($list[$i]) == strtolower($answerList[$i]))
                $count = $count + 1;
        }
        $json_array[0] = "success";
        $json_array[1] = $count;

        echo json_encode($json_array);


        //echo [$una,$maa,$mia];
        //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
        //echo json_encode($json_array);

        


    }else{
        require $locError7;
    }

}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorToken.php'; //JSON or GET is empty

?>