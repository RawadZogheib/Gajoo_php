<?php
    $sql4 = "INSERT INTO `course_reserved` (`course_reserved_Id`, `course_Id`, `account_Id`) 
                    VALUES (NULL, '".$course_Id."', '".$account_Id."')";

    $yy4 = mysqli_query($con,$sql4);

?>