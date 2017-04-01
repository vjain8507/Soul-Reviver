<?php
    require 'PHPMailer/PHPMailerAutoload.php';
    function send_to_register($log_name,$log_email,$log_key)
    {
        $mail1 = new PHPMailer;
        $mail1->isSMTP();
        $mail1->Host = 'soulreviver.org';
        $mail1->SMTPAuth = true;
        $mail1->Username = 'help@soulreviver.org';
        $mail1->Password = '@dm!n!@#$%';
        $mail1->SMTPSecure = 'tls';
        $mail1->Port = 587;
        $mail1->setFrom('help@soulreviver.org', 'Soul Reviver');
        $mail1->addAddress($log_email,$log_name);
        $mail1->addReplyTo('help@soulreviver.org', 'Soul Reviver');
        $mail1->isHTML(true);
        $mail1->Subject = 'Sign Up Confirmation Mail';
        $mail1->Body    = "Hi <b>$log_name</b>,<br><br>Please Confirm Your Mail Address By Clicking On The Link Below Or By Copy & Paste In The URL Address Bar ...<br><br><a href='https://soulreviver.org/?confirm&key=$log_key'>https://soulreviver.org/?confirm&key=$log_key</a>";
        $mail1->send();
    }
    function send_to_contact($contact_name,$contact_email)
    {
        $mail2 = new PHPMailer;
        $mail2->isSMTP();
        $mail2->Host = 'soulreviver.org';
        $mail2->SMTPAuth = true;
        $mail2->Username = 'help@soulreviver.org';
        $mail2->Password = '@dm!n!@#$%';
        $mail2->SMTPSecure = 'tls';
        $mail2->Port = 587;
        $mail2->setFrom('help@soulreviver.org', 'Soul Reviver');
        $mail2->addAddress($contact_email,$contact_name);
        $mail2->addReplyTo('help@soulreviver.org', 'Soul Reviver');
        $mail2->isHTML(true);
        $mail2->Subject = 'Thank You From Soul Reviver';
        $mail2->Body    = "Hi <b>$contact_name</b>,<br><br>We are pleased to inform you that your details reached us. We will contact you ASAP.<br><br>Thank you for trusting us.";
        $mail2->send();
    }
    function send_to_admin($contact_name,$contact_email,$contact_mobile,$contact_age,$contact_subject,$contact_message)
    {
        $mail3 = new PHPMailer;
        $mail3->isSMTP();
        $mail3->Host = 'soulreviver.org';
        $mail3->SMTPAuth = true;
        $mail3->Username = 'help@soulreviver.org';
        $mail3->Password = '@dm!n!@#$%';
        $mail3->SMTPSecure = 'tls';
        $mail3->Port = 587;
        $mail3->setFrom('help@soulreviver.org', 'Soul Reviver');
        $mail3->addAddress('kuldeep@soulreviver.org', 'Kuldeep Yadav');
        $mail3->addReplyTo($contact_email,$contact_name);
        $mail3->isHTML(true);
        $mail3->Subject = 'Contact Form @ soulreviver.org';
        $mail3->Body    = "<b><u>Contact Form Details</u></b><br><br><br>Name: - $contact_name<br>Email: - $contact_email<br>Mobile Number: - $contact_mobile<br>Age: - $contact_age<br>Subject: - $contact_subject<br>Message: - $contact_message";
        $mail3->send();
    }
    function send_to_reset($log_name,$log_email,$log_key)
    {
        $mail4 = new PHPMailer;
        $mail4->isSMTP();
        $mail4->Host = 'soulreviver.org';
        $mail4->SMTPAuth = true;
        $mail4->Username = 'help@soulreviver.org';
        $mail4->Password = '@dm!n!@#$%';
        $mail4->SMTPSecure = 'tls';
        $mail4->Port = 587;
        $mail4->setFrom('help@soulreviver.org', 'Soul Reviver');
        $mail4->addAddress($log_email,$log_name);
        $mail4->addReplyTo('help@soulreviver.org', 'Soul Reviver');
        $mail4->isHTML(true);
        $mail4->Subject = 'Password Changed Confirmation Mail';
        $mail4->Body    = "Hi <b>$log_name</b>,<br><br>Your Password Has Been Changed.<br><br>Please Confirm Your Mail Address By Clicking On The Link Below Or By Copy & Paste In The URL Address Bar ...<br><br><a href='https://soulreviver.org/?confirm&key=$log_key'>https://soulreviver.org/?confirm&key=$log_key</a>";
        $mail4->send();
    }
    function send_to_forgot($log_name,$log_email,$log_key)
    {
        $mail5 = new PHPMailer;
        $mail5->isSMTP();
        $mail5->Host = 'soulreviver.org';
        $mail5->SMTPAuth = true;
        $mail5->Username = 'help@soulreviver.org';
        $mail5->Password = '@dm!n!@#$%';
        $mail5->SMTPSecure = 'tls';
        $mail5->Port = 587;
        $mail5->setFrom('help@soulreviver.org', 'Soul Reviver');
        $mail5->addAddress($log_email,$log_name);
        $mail5->addReplyTo('help@soulreviver.org', 'Soul Reviver');
        $mail5->isHTML(true);
        $mail5->Subject = 'Reset Your Password';
        $mail5->Body    = "Hi <b>$log_name</b>,<br><br>To Reset Your Password Click On The Link Below Or Copy & Paste In The URL Address Bar ...<br><br><a href='https://soulreviver.org/?confirm&resetkey=$log_key'>https://soulreviver.org/?confirm&resetkey=$log_key</a>";
        $mail5->send();
    }
    function send_to_confirm($log_name,$log_email)
    {
        $mail6 = new PHPMailer;
        $mail6->isSMTP();
        $mail6->Host = 'soulreviver.org';
        $mail6->SMTPAuth = true;
        $mail6->Username = 'help@soulreviver.org';
        $mail6->Password = '@dm!n!@#$%';
        $mail6->SMTPSecure = 'tls';
        $mail6->Port = 587;
        $mail6->setFrom('help@soulreviver.org', 'Soul Reviver');
        $mail6->addAddress($log_email,$log_name);
        $mail6->addReplyTo('help@soulreviver.org', 'Soul Reviver');
        $mail6->isHTML(true);
        $mail6->Subject = 'Password Changed Confirmation Mail';
        $mail6->Body    = "Hi <b>$log_name</b>,<br><br>Your Password Has Been Changed.";
        $mail6->send();
    }
?>