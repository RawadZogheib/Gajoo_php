<?php
    $sql1 = "SELECT `teacher_email` FROM `teacher` WHERE `teacher_Id`= (SELECT `teacher_Id` FROM
    `course` WHERE `course_Id` = '".$course_Id."') ";
    $x1 = mysqli_query($con,$sql1);
    $res1 = mysqli_fetch_assoc($x1);



?>