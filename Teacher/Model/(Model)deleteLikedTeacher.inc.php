
<?php
    $sql = "DELETE FROM `liked_teacher`
            WHERE account_Id = '".$res['account_Id']."' && teacher_Id = '".$teacher_Id."' ";
    
    $dt = mysqli_query($con,$sql);

?>