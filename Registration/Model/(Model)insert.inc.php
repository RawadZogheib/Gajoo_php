<?php

    $sql = "INSERT INTO `account`(`account_Id`, `account_firstName`, `account_lastName`, `account_userName`,
	 `account_password`, `account_email`,
    `account_phoneNumber`, `account_gender`, `account_date`, `account_country`, `account_language`, `isRegistered`)
    VALUES (NULL,'".$fname."','".$lname."','".$userName."','".$hash."','".$email."','".$phoneNumberPlus."','".$gender."',
    '".$dateOfBirth."', '".$country."', '".$language."', '".$isRegistered."')";

    $mq = mysqli_query($con,$sql);

?>