<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function sendConfirmationEmail($email, $firstname, $lastname, $date, $atime, $ltime, $numofcus) {
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pharmaforjob@gmail.com';
        $mail->Password   = 'coawqavetilavimz';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;                 

        //Recipients
        $mail->setFrom('pharmaforjob@gmail.com', 'ABC Restaurant Colombo');
        $mail->addAddress($email, "$firstname $lastname");

        // Content
        $mail->isHTML(true);                               
        $mail->Subject = 'Booking Confirmation on ' . $date . ' at ' . $atime;
        $mail->Body    = '<body style="font-family: \'Poppins\', Arial, sans-serif">
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
                                                Hello, Mr/Mrs '. $firstname . ' '. $lastname .', <br>
                                                We warmly welcome you to ABC Restaurant Colombo
                                                <br><br>
                                                <u>We are excited to confirm your booking with us!</u>
                                                <br>
                                                Booking Details:

                                                Date: '. $date .'<br>
                                                Time: from: '. $atime .' to: '. $ltime .'<br>
                                                Number of Guests: '. $numofcus .'<br>
                                                We look forward to welcoming you on '. $date .' at '. $atime .'. If you have any questions or need to make changes to your booking, please feel free to contact us.<br>

                                                Thank you for choosing ABC Restaurant. We hope you have a wonderful experience!           
                                                </td>
                                            </tr>

                                            <!-- Call to action Button -->
                                            <tr>
                                                <td style="padding: 0px 40px 0px 40px; text-align: center;">
                                                    <!-- CTA Button -->
                                                    <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                                        <tr>
                                                            <td align="center" style="background-color: #345C72; padding: 10px 20px; border-radius: 5px; margin-bottom:10px;">
                                                                <a href='. $email .' target="_blank" style="color: #ffffff; text-decoration: none; font-weight: bold;">Contact Us</a>
                                                            </td>
                                                            <br><br>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!--
                                            <tr>
                                                <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                                                    abc.rest@email.com             
                                                </td>
                                            </tr>
                                            -->
                                            <!-- Footer -->
                                            <tr>
                                                <td class="footer" style="background-color: #333333; padding: 40px; text-align: center; color: white; font-size: 14px; margin-top:20px;">
                                                Copyright &copy; 2024 | ABC Restaurant
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </body>
                        ';
        $mail->AltBody = "Dear $firstname $lastname,\n\nYour booking is confirmed for $date at $atime.\n\nThank you!";

        $mail->send();
        echo
        "
        <script>
            alert('Reservation successfully..!');
            document.location.href = 'booking.php';
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
