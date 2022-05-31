<?php
    $sql = "INSERT INTO `liked_teacher`(`account_Id`, `teacher_Id`, `isLiked`) 
            VALUES ($account_Id, $teacher_Id, '1')";
    
    $lt = mysqli_query($con,$sql);

?>