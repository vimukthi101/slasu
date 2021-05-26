<?php
include_once('smtpSettings.php');
$to ="vimukthisaranga1@gmail.com";
$mail->addAddress($to, $to);
$mail->Subject = "Account Created Successfully at SLASU";
$mail->Body ="<h1>Your account was created successfully at Sri Lanka Aquatic Sports Union.</h1><br/>
            <p>Use following credentails to login to the system.</p>
            <p> Link : http://localhost:1234/slasu/login.html <br/>
            <p> User Name : hellp</P><br/>
            <p> Password : yyp</P><br/><br/><br/>
            <p>Please change your password after login to the system.</p><br/><br/><br/>
            <p>Thank You</p><br/>
            <p>Admin,</p><br/>
            <p>SLASU</p>";
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    echo "Error Occurred";
}
?>