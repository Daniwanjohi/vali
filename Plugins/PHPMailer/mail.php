<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address: $email");
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'wanjohidee21@gmail.com';                     //SMTP username
    $mail->Password   = 'hnjb phel msoi foln';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('wanjohidee21@gmail.com', 'Daniella Wanjohi');
    $mail->addAddress('deewanjohi06@gmail.com', 'Dee Wanjohi');     //Add a recipient
   
    // Content
    $mail->isHTML(true);
    $mail->Subject = "Welcome to Task App!";
    $mail->Body    = "<p>Hello <b>$name</b>,</p>
                      <p>Welcome to our application! We’re excited to have you on board.</p><br>
                      <p>Follow the link <a href='http://localhost/vali/login.php'> to Sign up</a></p><br>
                      Kind Regards,</p><br>
                      Task App Admin.";

    $mail->send();
    echo "Welcome email sent to $email";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Insert into DB
