<?php
    $sql1 = "Select 
    `teacher_name` as teacher_name,
    `teacher_dateOfBirth` as teacher_dateOfBirth
    FROM teacher WHERE `teacher_Id` = '".$rest['teacher_Id']."' ";
    $x1 = mysqli_query($con,$sql1);
    



?>