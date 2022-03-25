<?php 

	$sql1 = "SELECT c.course_date_of_begin
			    FROM `course` as c
			    WHERE c.teacher_Id = ".$teacher_Id." AND c.course_max_students > (SELECT count(*)
																						FROM `course_reserved` as cr
																						WHERE cr.course_Id = c.course_Id)";

	$xx1 = mysqli_query($con,$sql1);	
		
?>