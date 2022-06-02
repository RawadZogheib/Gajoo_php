<?php
    $sql2 = "SELECT `account_email` FROM `account` WHERE `account_Id` = '".$account_Id."' ";
    $x2 = mysqli_query($con,$sql2);
    $res2 = mysqli_fetch_assoc($x2);



?>