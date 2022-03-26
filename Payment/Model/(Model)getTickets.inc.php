<?php
    $sql = "Select (SELECT `ticket_amount` FROM `ticket` WHERE account_Id = '".$account_Id."' AND payment_code = 1) as redTicket,
                   (SELECT `ticket_amount` FROM `ticket` WHERE account_Id = '".$account_Id."' AND payment_code = 2) as yellowTicket,
                   (SELECT `ticket_amount` FROM `ticket` WHERE account_Id = '".$account_Id."' AND payment_code = 3) as blueTicket,
                   (SELECT `ticket_amount` FROM `ticket` WHERE account_Id = '".$account_Id."' AND payment_code = 4) as greenTicket";

    $xx = mysqli_query($con,$sql);

?>