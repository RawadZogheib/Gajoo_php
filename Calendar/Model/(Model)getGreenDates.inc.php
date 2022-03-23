<?php 

	$sql1 = "SELECT c.course_date_of_begin 
			    FROM `course` as c 
			    WHERE c.course_max_students > (SELECT count(*) 
								        		FROM `course_reserved` as cr 
								        		WHERE c.course_Id = cr.course_Id)";

	$xx1 = mysqli_query($con,$sql1);	
		
?>