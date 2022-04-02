<?php
    $sql = "SELECT c.course_Id, 
                   c.course_name, 
                   c.teacher_Id, 
                   c.course_date_of_begin, 
                   c.course_duration, 
                   (SELECT t1.teacher_name FROM teacher t1 WHERE t1.teacher_Id = c.teacher_Id) as teacherName,
                   (SELECT t2.teacher_dateOfBirth FROM teacher t2 WHERE t2.teacher_Id = c.teacher_Id) as teacherDateOfBirth
            FROM `course` c, `course_reserved` cr
            WHERE cr.account_Id = '".$account_Id."' AND cr.course_Id = c.course_Id ORDER BY c.course_date_of_begin DESC";

    $x1 = mysqli_query($con,$sql);

?>