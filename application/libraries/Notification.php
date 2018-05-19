<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Notification {

    var $CI;
    public $mail;

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function sendNotification($subject, $emailParam) {


        try {
            $body = '<html>
    <body>
        <table align="center" style="border: 1px solid #ddd;border-radius: 2px;width: 45%;padding: 0px 14px 15px 14px;background: #ddd;">
        <tr>
        <td align="center">
        <br>
        <img src = ' . EMAIL_LOGO . ' style="width:40%">


        </td>

        </tr>
        <tr>
        <td align = "left" style = "font-size: 14px;
    font-family: sans-serif;
    font-weight: 700;
    color: black;
    padding: 0px 10px 0px 12px;
    ">

        Hello ' . $emailParam['name'] . '
        </td>
        </tr>
        <tr>
        <td>
        <p style = "font-size: 12px;
    font-family: sans-serif;
    font-weight: 700;
    color: black;
    padding: 0px 10px 0px 12px;">
        Thank you for trusting & booking an appointment with us. You are always being our priority. Our patient support team is working on. They will reach you shortly. Please check the following details ones.
        </p>
        <b style = "padding: 0px 10px 0px 25px;">Name</b>: ' . $emailParam['name'] . '<br>
        <b style = "padding: 0px 10px 0px 25px;">Email</b>:' . $emailParam['email'] . '<br>
        <b style = "padding: 0px 10px 0px 25px;">Mobile No</b>:' . $emailParam['contact'] . '<br>
        <b style = "padding: 0px 10px 0px 25px;">' . MAIL_SUBJECT . '</b>:' . $emailParam['hairline'] . '<br>
       <p style = "font-size: 12px;
    font-family: sans-serif;
    font-weight: 700;
    color: black;
    padding: 0px 10px 0px 12px;">
        In case you dont receive the response you can directly call us on ' . MOBILE . ' Thank you. Have a nice day!
        </p>
        </td>
        </tr>
        </table>
        </body>
        </html>';
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            $mail->isSMTP();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPDebug = 0;
            $mail->Host = 'ssl://smtp.gmail.com:465';
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = SENDERMAIL;                 // SMTP username
            $mail->Password = SENDERPASS;

            $mail->SMTPAuth = true; // TCP port to connect to
            $mail->setFrom(ADMIN_EMAIL, COMPONY_NAME);
            $mail->addAddress($emailParam['email']);               // Name is optional
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;

            $mail->Body = $body;
            $mail->send();
//            echo 'Message has been sent';
        } catch (Exception $e) {
            return false;
        }
//        die;
    }

    public function sendNotificationAdmin($subject, $ImgPath = null, $emailData) {
//        echo $ImgPath;
//        die;
        try {
            $body = '<html>
        <body>
        <table align = "center" style = "border: 1px solid #ddd;border-radius: 2px;width: 45%;padding: 0px 14px 15px 14px;background: #ddd;">
        <tr>
        <td align="center">
        <br>
        <img src = ' . EMAIL_LOGO . ' style="width:40%">



        </td>

        </tr>
        <tr>
        <td align = "left" style = "font-size: 14px;
    font-family: sans-serif;
    font-weight: 700;
    color: black;
    padding: 0px 10px 0px 12px;
    ">

        Hello PST
        </td>
        </tr>
        <tr>
        <td>
        <p style = "font-size: 12px;
    font-family: sans-serif;
    font-weight: 700;
    color: black;
    padding: 0px 10px 0px 12px;">
        Following are the details of the patient who has booked an appointment with us:

        </p>
        <b  style = "padding: 0px 10px 0px 25px;">Name</b>: ' . $emailData['name'] . '<br>
        <b style = "padding: 0px 10px 0px 25px;">Email</b>:' . $emailData['email'] . '<br>
        <b style = "padding: 0px 10px 0px 25px;">Mobile No</b>:' . $emailData['contact'] . '<br>
        <b style = "padding: 0px 10px 0px 25px;">' . MAIL_SUBJECT . '</b>:' . $emailData['hairline'] . '<br>

        <p style = "font-size: 12px;
    font-family: sans-serif;
    font-weight: 700;
    color: darkgray;
    padding: 0px 10px 0px 12px;">
        Please call him/her back.
        </p>
        </td>
        </tr>
        </table>
        </body>
        </html>';
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            $mail->isSMTP();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->SMTPDebug = 0;
            $mail->Host = 'ssl://smtp.gmail.com:465';
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = SENDERMAIL;                 // SMTP username
            $mail->Password = SENDERPASS;
            $mail->AddCC = CCMAIL;
            $mail->SMTPAuth = true; // TCP port to connect to
            $mail->setFrom(ADMIN_EMAIL, COMPONY_NAME);
            $mail->addAddress(ADMIN_EMAIL);
            if (!empty($ImgPath)) {
//                echo "in";
//                die;
                $mail->AddAttachment($ImgPath);
            }// Name is optional
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;

            $mail->Body = $body;
            $mail->send();
        } catch (Exception $ex) {
            return false;
        }
    }

}

?>