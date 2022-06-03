<?php

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Composer/vendor/phpmailer/phpmailer/src/Exception.php';
      require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
      require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Composer/vendor/phpmailer/phpmailer/src/SMTP.php';
      require $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Composer/vendor/autoload.php';

      $locCodeException =  $_SERVER["DOCUMENT_ROOT"]  . '/gajoo_php/Error/View/(View)codeException.php';
      
      $emailRegExp = "/[a-zA-Z0-9]+@(g|hot)mail.com/";

if(!preg_match($emailRegExp,$res1['teacher_email'])){
      require $locError2_5;//2_5 It's not an  email format.
}else{
      
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Mailer = "smtp";

      $mail->SMTPDebug  = 0;  
      $mail->SMTPAuth   = TRUE;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;
      $mail->Host       = "smtp.gmail.com";
      $mail->Username   = "gajoo5@hotmail.com";
      $mail->Password   = "gajoo123@";

      $mail->IsHTML(true);
      $mail->AddAddress($res1['teacher_email']);
      $mail->SetFrom($mail->Username);
      //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
      //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
      $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
      $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class code:</b>";
      
      $mail->MsgHTML($content); 
      if(!$mail->Send()) {
        echo "Error while sending Email.";
        //var_dump($mail);
      } else {
        //echo "Email sent successfully";
      }
}
?>