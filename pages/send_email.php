<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'powergridsolutionslk@gmail.com'; // Your email address
        $mail->Password   = 'ugxjdwomcnllebdf'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port       = 587; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('powergridsolutionslk@gmail.com', $_POST['name']);
        $mail->addAddress('powergridsolutionslk@gmail.com', $_POST['email']);
        
        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $_POST['subject']; // Email subject
        $mail->Body    = 'This is the HTML message body. <b>Feedback:</b><br>Name: ' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Subject: ' . $_POST['subject'] . '<br>Description: ' . $_POST['message']; // Email body
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // Send email
        $mail->send();

        // Redirect back to index.php with success status
        echo
        "
        <script>
            alert('Message sent successfully..!');
            document.location.href = 'index.php';
        </script>
        ";
    } catch (Exception $e) {
        echo
        "
        <script>
            alert('Message not sent successfully..!' $e);
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
