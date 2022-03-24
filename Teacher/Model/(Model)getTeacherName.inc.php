<?php
    $sql = "Select 
            `teacher_Id` as teacher_Id,
            `teacher_name` as teacher_name
            FROM `teacher` ORDER BY `teacher_Id` ";
    $x1 = mysqli_query($con,$sql);
    



?>