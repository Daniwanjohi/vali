<?php
require_once 'ClassAutoLoad.php';

// Mail configuration
$conf = [
    'smtp_host' => 'smtp.gmail.com',
    'smtp_user' => 'wanjohidee21@gmail.com',      
    'smtp_pass' => 'wuxl qedf dvqr yosv',         
    'smtp_port' => 465
];

$recipientName = 'Dee Wanjohi';

$mailCnt = [
    'name_from' => 'Daniella Wanjohi',
    'mail_from' => 'wanjohidee21@gmail.com',
    'name_to' => 'Dee Wanjohi',
    'mail_to' => 'deewanjohi06@gmail.com',
    'subject' => 'Welcome to Task App!',
    'body' => "<p>Hello $recipientName,</p>
                Welcome to our application! We are excited to have you on board.<br>
                Follow the link <a href='http://localhost/vali/login.php'> link </a> to sign up.<br>
                Kind Regards,<br>
                Task App Admin."
];

// SendMail object
$ObjSendMail = new SendMail();

// Send the email
$ObjSendMail->Send_Mail($conf, $mailCnt);