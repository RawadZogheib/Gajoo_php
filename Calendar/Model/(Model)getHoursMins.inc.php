<?php 

	$sql = "SELECT c.course_Id,
                    c.course_date_of_begin,
                    (SELECT count(*) 
                                                FROM `course_reserved` as cr
                                                WHERE c.course_Id =cr.course_Id) as participants,
                    c.course_max_students,
                    c.course_duration

                FROM `course` as c
                WHERE c.teacher_Id = '".$teacher_Id."'  AND type = '".$type."' AND language = '".$language."' AND level = '".$level."' AND c.course_date_of_begin BETWEEN '".$date." 00:00:00' AND '".$date." 23:59:59' AND c.course_date_of_begin > NOW()";

	$xx = mysqli_query($con,$sql);	
		
?>