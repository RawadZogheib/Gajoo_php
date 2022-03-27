<?php
    $sql = "UPDATE account
            SET `account_fName` = '".$fname."',
                `account_lName` = '".$lname."',
                `account_userName` = '".$username."'
            WHERE `account_email` = '".$email."'";
    
    $x1 = mysqli_query($con,$sql);


?>