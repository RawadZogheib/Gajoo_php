<?php
    $sql3 = "Select count(*) as teacher_nbOfCourse
    FROM course
    WHERE teacher_Id = '".$res1['teacher_Id']."' ";
    $x3 = mysqli_query($con,$sql3);
    $res3 = mysqli_fetch_assoc($x3);



?>