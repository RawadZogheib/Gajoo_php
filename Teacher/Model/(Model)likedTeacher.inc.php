<?php
    $sql = "INSERT INTO `liked_teacher`(`account_Id`, `teacher_Id`) 
            VALUES ($account_Id, $teacher_Id)";
    
    $lt = mysqli_query($con,$sql);

?>