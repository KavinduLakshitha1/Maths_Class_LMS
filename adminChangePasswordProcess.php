<?php

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "mail/PHPMailer.php";
require "mail/SMTP.php";
require "mail/Exception.php";

$email = $_GET["email"];


if (!empty($email)) {
    $emailrs = Database::search("SELECT * FROM `admin` WHERE `email`='$email'");
    $emailnum = $emailrs->num_rows;

    if ($emailnum == 1) {
        $emaildata = $emailrs->fetch_assoc();
        

        $vcode = uniqid();
        Database::iud("UPDATE `admin` SET `vcode` ='$vcode' WHERE `email`='" . $email . "'");


        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kavindulakshitha406@gmail.com';
            $mail->Password = 'nsocntwllgypxpjm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('kavindulakshitha406@gmail.com', 'Mailer');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset your admin account password';
            $mail->Body = '<table style="width: 100%; font-family: cooper;">
        <tbody>
            <tr>
                <td align="center">

                    <table style="max-width: 600px;">
                        <tr>
                            <td align="left" style="background-color: lightgreen; padding: 5%; border-radius: 20px;">
                                <a href=""
                                    style="font-size :35px;  color:black; font-weight:bold; text-decoration: none;">Maths Class</a>
                                    <div style="margin: 10px;">Your future Education.</div>
                                    <hr />
                                    <div align="right">
                                        <div style="margin: 10px;">Powered by Media Unit.</div>
                                        <hr />
                                        
                                    </div>
                                </td>
                                
                            </tr>
                        <tr style="font-family: Verdana;">
                            <td>
                                <h1 style="font-size:25px; font-style: italic; padding: 2%; font-weight:bold; line-height: 45px;">Reset your Admin Passsword
                                </h1>
                                <p style="margin-bottom: 24px;">Click below button to reset password.</p>

                                <div align="center" style="margin: 50px;">
                                    <a href="http://localhost/MathsClass/adminchangePassword.php?code=' . $vcode . '"
                                        style="display: inline; background-color: green; color:white; border-radius: 8px; padding: 15px; text-decoration: none;"><span>
                                            Reset Passsword </span></a>
                                </div>
                                <p style="margin-top: 24px;">If you didn\'t requested to reset password. Please Ignore
                                    this email.</p>
                                <hr>
                            </td>
                        </tr>

                        <tr>
                            <td align="center" style="background-color:darkgray; border-radius: 20px;">
                                <p style="font-weight: bold; ">&copy; 2024 Maths Class</p>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

        </tbody>

    </table>';

            $mail->send();
            echo 'Message has been sent. Please check your email box';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo("User not found.");
    }
} else {
    echo("you email not available. Please check your email");
}
