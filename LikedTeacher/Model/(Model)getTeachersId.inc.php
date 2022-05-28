<?php
	$sql = "SELECT `teacher_Id` FROM `liked_teacher` WHERE `account_Id` = '".$account_Id."' ";
	$tt = mysqli_query($con,$sql);
	
	

?>