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
        $mail->Username   = 'pharmaforjob@gmail.com'; // Your email address
        $mail->Password   = 'coawqavetilavimz'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port       = 587; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('pharmaforjob@gmail.com', $_POST['name']);
        $mail->addAddress('pharmaforjob@gmail.com', $_POST['email']);
        
        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $_POST['subject']; // Email subject
        $mail->Body = '<body style="font-family: \'Poppins\', Arial, sans-serif">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="padding: 20px;">
                                        <table class="content" width="600" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid #cccccc;">
                                            <!-- Header -->
                                            <tr>
                                                <td class="header" style="background-color: #345C72; padding: 40px; text-align: center; color: white; font-size: 24px;">
                                                ABC Restaurent Colombo
                                                </td>
                                            </tr>

                                            <!-- Body -->
                                            <tr>
                                                <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                                                Hello, Staff! <br>
                                                '. $_POST['subject'] .'
                                                <br><br>
                                                '. $_POST['message'] .'            
                                                </td>
                                            </tr>

                                            <!-- Call to action Button -->
                                            <tr>
                                                <td style="padding: 0px 40px 0px 40px; text-align: center;">
                                                    <!-- CTA Button -->
                                                    <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                                        <tr>
                                                            <td align="center" style="background-color: #345C72; padding: 10px 20px; border-radius: 5px;">
                                                                <a href='. $_POST['email'] .' target="_blank" style="color: #ffffff; text-decoration: none; font-weight: bold;">Email of Sender</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                                                    '. $_POST['email'] .'             
                                                </td>
                                            </tr>
                                            <!-- Footer -->
                                            <tr>
                                                <td class="footer" style="background-color: #333333; padding: 40px; text-align: center; color: white; font-size: 14px;">
                                                Copyright &copy; 2024 | Your brand name
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </body>
                        ';
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
