<?php 

	$sql = "SELECT count(*) as count FROM `course_reserved` as cr WHERE cr.course_Id = '".$course_Id."' AND cr.account_Id = '".$account_Id."'";

	$xx = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($xx);	
		
?>