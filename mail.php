<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 0;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "binder.mysitehosted.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "noreply@aptak.or.ke";
$mail->Password = "hno5Zt0r~kCu";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";
//Set TCP port to connect to
$mail->Port = 465;

$mail->From = "noreply@aptak.or.ke";
$mail->FromName = "Hillary Opany website";
$username = $_POST['user_name'];
if (isset($_POST['submit_btn'])) {
    $username = $_POST['user_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // $mail->addAddress("admin@aptak.or.ke", "APTAK");
    $mail->addAddress("hillaryokello19@gmail.com", "APTAK");
    // $mail->SetFrom($email, $username);
    // $mail->AddReplyTo($email, $username);

    $mail->isHTML(true);

    $mail->Subject = "My portfolio";
    $mail->AddReplyTo($email, $username);
    $mail->Body = "<div>$subject</div>";
    $mail->Body .= " <div>$username</div>";
    $mail->Body .= "<div> $email</div>";
    $mail->Body .= "<div>$message</div>";

    // if ($mail->smtpConnect()) {
    //     $mail->smtpClose();
    //     echo "connected";
    // } else {
    //     echo "connection failed";
    // }
    try {
        $mail->send();
        echo "<div style='background:#f1f1f1;background: #5292f1;padding: 30px 40px;margin: 20px 0;text-align: center;color: #fff;text-shadow: 0px 3px 4px rgb(0 0 0 / 80%);'>Thank you for registering.Your message has been sent</div>";
        $username = "";
        $email = "";
        $subject = "";
        $message = "";
        if ($mail = true) {
            header('Location:index.php');
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
