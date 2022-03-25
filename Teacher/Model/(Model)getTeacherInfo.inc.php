<?php
    $sql2 = "Select 
    characteristic_t_type as characteristic_t_type,
    characteristic_t_language as characteristic_t_language,
    characteristic_t_level as characteristic_t_level
    FROM characteristic_t
    WHERE teacher_Id = '".$res1['teacher_Id']."' ";
    $x2 = mysqli_query($con,$sql2);



?>