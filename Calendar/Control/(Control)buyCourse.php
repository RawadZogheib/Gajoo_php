<?php
//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

//Test token
$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

	if(!empty($data->course_Id)){

        $course_Id = htmlspecialchars($data->course_Id);

        $locCheckCourseNotTaken = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)checkCourseNotTaken.inc.php';
        $locCheckCourseExists = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)checkCourseExists.inc.php';
        $locCheckWalletExists = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)checkWalletsExists.inc.php';
        $locUpdateWallets = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)updateWallets.inc.php';
        $locReserveCourse = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Model/(Model)reserveCourse.inc.php';
        $locSuccess = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)success.php';
        $locError4 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error4.php';
        $locError410 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error410.php';
        $locError411 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error411.php';
        $locError412 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error412.php';
        $locError413 = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)error413.php';
        $locSendAllMail = $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Calendar/Control/(Control)sendAllMails.php';

        require $locCheckCourseNotTaken;
        
        if($res["count"] == 0){

            require $locCheckCourseExists;
            if(mysqli_num_rows($xx1) == 1){
                $case = '-999';
                require $locCheckWalletExists;
                
                if(mysqli_num_rows($xx2) == 1){// If Wallet Exists

                    if($res1["type"] == 'Language Lessons'){// If you have enough bill Grey or Red
                        if($res1["course_max_students"] == 1){
                            if($res2["coupon_amount1"] == 1){// If you have enough bill Grey
                                $case = '1';
                            }else if($res2["coupon_amount2"] >= 1){// If you have enough bill Red
                                $case = '2';
                            }else{
                                mysqli_close($con);
                                require $locError4;
                            }
                        }else{
                            if($res2["coupon_amount2"] >= 1){// If you have enough bill Red
                                $case = '2';
                            }else{
                                mysqli_close($con);
                                require $locError4;
                            }
                        }
                        
                    }else if($res1["type"] == 'Native Speaking' && $res2["coupon_amount3"] >= 1 ){// If you have enough bill Native Speaking
                        $case = '3';
                    }else if($res1["type"] == 'Audio Books' && $res2["coupon_amount4"] >= 1){// If you have enough bill Audio Books
                        $case = '4';
                    }else if($res1["type"] == 'Diploma Certificate' && $res2["coupon_amount5"] >= 1){// If you have enough bill Diploma Certificate
                        $case = '5';
                    }else{
                        require $locError411;
                    }            
                    



                    require $locUpdateWallets;
                    if($yy3){
                        require $locReserveCourse;
                        if($yy4){// Remove course
                            mysqli_close($con);
                            // require $locSendAllMail;
                            require $locSuccess;
                        }else{
                            mysqli_close($con);
                            require $locError4;
                        }
                    }else{
                        mysqli_close($con);
                        require $locError4;
                    } 


                    





                }else require $locError410;
            }else require $locError412;
        }else require $locError413;
	}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)Error7.php';


}else require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>