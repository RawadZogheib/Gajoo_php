<?php 

	$sql1 = "SELECT `course_max_students` as course_max_students
			    FROM `course` as c
			    WHERE c.course_Id = '".$course_Id."' AND c.course_max_students > (SELECT count(*)
                                                                                    FROM `course_reserved` as cr
                                                                                    WHERE cr.course_Id = c.course_Id) AND c.course_date_of_begin > NOW()";

	$xx1 = mysqli_query($con,$sql1);
    $res1 = mysqli_fetch_assoc($xx1);	
		
?>