<?php

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $mailTo = "info@standard.ub.gov.mn";
    $headers = "From: ".$mailFrom;
    $txt = "You have received an e-mail from ".$name.".\n\n".$message."\n\n".$phone;
    $alert = "<script>alert('Амжилттай илгээсэн');</script>";
    $headers .= 'MIME-Version: 1.0' ."\r\n";
    $headers .= 'Content-Type: text/HTML; charset=utf-8' . "\r\n";
    $headers .= 'Content-Transfer-Encoding: 8bit'. "\n\r\n";

    mail($mailTo, $subject, $txt, $headers);
    header("Location: contactus?mailsent");
    
    echo $alert;
}