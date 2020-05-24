<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


if (isset($_POST['email'])) {
    $emailTo = stripslashes($_POST['email']);

    $code = uniqid(true);
    $query = $conn -> prepare("INSERT INTO reset_password (code, email) VALUES ('$code', '$emailTo')");

    $query -> bindParam(':code', $code, PDO::PARAM_STR);
    $query -> bindParam(':email', $emailTo, PDO::PARAM_STR);

    $stmt = $query -> execute();
    if (!$stmt) {
        exit('Error');
    }

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'swaijuvenalis@gmail.com';                     // SMTP username
        $mail->Password   = 'myrzwguiaevlfkgz';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('swaijuvenalis@gmail.com', 'Transfer Management System - TMS');
        $mail->addAddress($emailTo);     // Add a recipient Name is optional
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Your password reset link';
        $mail->Body    = "<h1><strong>You requested a password rest </strong></h1>
                            Click <a href=\"$url\">this link</a> to do so";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<h3 style=" font-size: 30px;" class="alert alert-success">
        <center><strong>Reset link has been sent to your email.</strong></center>
      </h3>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
}
