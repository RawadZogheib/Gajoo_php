<?php
    $sql5 = "Select count(*) as nbr, `account_Id`, `teacher_Id`
    FROM `liked_teacher`
    WHERE account_Id = '".$res['account_Id']."' && teacher_Id = '".$teacher_Id."' ";
    $x5 = mysqli_query($con,$sql5);
    $res5 = mysqli_fetch_assoc($x5);



?>