<?php 

	$sql = "SELECT c.course_Id, 
                    c.course_date_of_begin, 
                    c.course_max_students, 
                    c.course_duration, 
                    (SELECT count(*) 
                                                FROM `course_reserved` as cr 
                                                WHERE c.course_Id =cr.course_Id) as participants
                FROM `course` as c
                WHERE c.course_date_of_begin BETWEEN '2022-3-27 00:00:00' AND '2022-3-27 23:59:59'";

	$xx = mysqli_query($con,$sql);	
		
?>