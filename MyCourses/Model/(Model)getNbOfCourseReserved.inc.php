<?php
    $sql4 = "SELECT count(*) as teacher_nbOfCourseReserved
	FROM (SELECT count(*) as cnt, cr.course_Id as crcid FROM course_reserved as cr WHERE cr.course_Id IN 
    (SELECT `course_Id` FROM course WHERE `teacher_Id` = '".$res1["teacher_Id"]."') GROUP BY cr.course_Id) as counter, course  as c
    WHERE crcid = c.course_Id AND cnt = c.course_max_students";
    $x4 = mysqli_query($con,$sql4);
    $res4 = mysqli_fetch_assoc($x4);



?>

