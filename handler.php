<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php/PHPMailer-5.2.28/src/Exception.php';
require 'php/PHPMailer-5.2.28/src/PHPMailer.php';
require 'php/PHPMailer-5.2.28/src/SMTP.php';

$mail = new PHPMailer(true);
$mail_to_email = 'info@gdgbasra.dev'; // your email
$mail_to_name = 'Moey';

try {

	$mail_from_name = isset($_POST['name']) ? $_POST['name'] : '';
	$mail_from_email = isset($_POST['email']) ? $_POST['email'] : '';
	$mail_message = isset($_POST['message']) ? $_POST['message'] : '';


	// Server settings
	$mail->isSMTP(); // Send using SMTP
	$mail->Host = 'mail.gdgbasra.dev'; // Set the SMTP server to send through
	$mail->SMTPAuth = true; // Enable SMTP authentication
	$mail->Username = 'info@gdgbasra.dev'; // SMTP username
	$mail->Password = '$_0%iZSASS#*'; // SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	$mail->Port = 993; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	$mail->setFrom($mail_to_email, $mail_to_name); // Your email
	$mail->addAddress($mail_from_email, $mail_from_name); // Add a recipient

	// for($ct=0; $ct<count($_FILES['file_attach']['tmp_name']); $ct++) {
	// 	$mail->AddAttachment($_FILES['file_attach']['tmp_name'][$ct], $_FILES['file_attach']['name'][$ct]);
	// }

	// Content
	$mail->isHTML(true); // Set email format to HTML

	$mail->Subject = $mail_title;
	$mail->Body = '
		<strong>Name:</strong> ' . $mail_from_name . '<br>
		<strong>Email:</strong> ' . $mail_from_email . '<br>
		<strong>Message:</strong> ' . $mail_message;

	$mail->Send();

	echo 'Message has been sent';
} catch (Exception $e) {

	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
