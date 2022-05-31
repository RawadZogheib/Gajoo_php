<?php
    $sql6 = "SELECT `isLiked` FROM `liked_teacher` WHERE `teacher_Id` = '".$res1["teacher_Id"]."' ";
    $x6 = mysqli_query($con,$sql6);
    $res6 = mysqli_fetch_assoc($x6);



?>