<?php 

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $locError7 =  $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error7.php';
    if(!empty($data->teacher_Id)){

    $locGetcoupons = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Payment/Model/(Model)getcoupons.inc.php';
    
    $json_array[0] = 'error4';

    require $locGetcoupons;
    if(mysqli_num_rows($xx)>0){
        $t1 = 1;
        $ress = mysqli_fetch_assoc($xx);
        if($ress["redcoupon"]==null){$redcoupon = '0';}else{$redcoupon = $ress["redcoupon"];}
        if($ress["yellowcoupon"]==null){$yellowcoupon = '0';}else{$yellowcoupon = $ress["yellowcoupon"];}
        if($ress["bluecoupon"]==null){$bluecoupon = '0';}else{$bluecoupon = $ress["bluecoupon"];}
        if($ress["greencoupon"]==NULL){$greencoupon = '0';}else{$greencoupon = $ress["greencoupon"];}

        $json_array[1] = array(	$redcoupon,
                                $yellowcoupon,
                                $bluecoupon,
                                $greencoupon,
                                    );

    }else $json_array[1] = [];

    if($t1 == 1){
        $json_array[0] = 'success';
    }
    //echo [$una,$maa,$mia];
    //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
        echo json_encode($json_array);

        
    }else require $locError7;
}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
 

?>