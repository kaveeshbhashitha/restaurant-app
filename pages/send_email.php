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
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pharmaforjob@gmail.com';
        $mail->Password   = 'coawqavetilavimz';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; 
        // Recipients
        $mail->setFrom('pharmaforjob@gmail.com', $_POST['name']);
        $mail->addAddress('pharmaforjob@gmail.com', $_POST['email']);
        
        // Content
        $mail->isHTML(true); 
        $mail->Subject = $_POST['subject']; // Email subject
        $mail->Body    = '<b>Welcome to ABC Restaurant.<b><br>
                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQpUVrE8OovvS7g6XmHBe0z5isk1npWY2EzLsU4LyeOQgE7j-H" style="height:50px; width:50px;"><br>
                          <b>We Appreciate Your Feedback</b><br>Name: ' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Subject: ' . $_POST['subject'] . '<br>Description: ' . $_POST['message'];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // Send email
        $mail->send();

        // Redirect back to index.php with success status
        echo
        "
        <script>
            alert('Message sent successfully..!');
            document.location.href = 'contact.php';
        </script>
        ";
    } catch (Exception $e) {
        echo
        "
        <script>
            alert('Message not sent successfully..!' $e);
            document.location.href = 'contact.php';
        </script>
        ";
    }
}
?>

<!-- coawqavetilavimz
pharmaforjob@gmail.com -->

<!-- $mail->Body    = '<b>Welcome to ABC Restaurant.<b><br>
                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQpUVrE8OovvS7g6XmHBe0z5isk1npWY2EzLsU4LyeOQgE7j-H" style="height:50px; width:50px;"><br>
                          <b>We Appreciate Your Feedback</b><br>Name: ' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Subject: ' . $_POST['subject'] . '<br>Description: ' . $_POST['message']; -->
