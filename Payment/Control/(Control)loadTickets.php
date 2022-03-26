<?php 

$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

    $locGetTickets = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Payment/Model/(Model)getTickets.inc.php';
    
    $json_array[0] = 'error4';

    require $locGetTickets;
    if(mysqli_num_rows($xx)>0){
        $t1 = 1;
        $ress = mysqli_fetch_assoc($xx);
        if($ress["redTicket"]==null){$redTicket = '0';}else{$redTicket = $ress["redTicket"];}
        if($ress["yellowTicket"]==null){$yellowTicket = '0';}else{$yellowTicket = $ress["yellowTicket"];}
        if($ress["blueTicket"]==null){$blueTicket = '0';}else{$blueTicket = $ress["blueTicket"];}
        if($ress["greenTicket"]==NULL){$greenTicket = '0';}else{$greenTicket = $ress["greenTicket"];}

        $json_array[1] = array(	$redTicket,
                                $yellowTicket,
                                $blueTicket,
                                $greenTicket,
                                    );

    }else $json_array[1] = [];

    if($t1 == 1){
        $json_array[0] = 'success';
    }
    //echo [$una,$maa,$mia];
    //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
        echo json_encode($json_array);

}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
 

?>