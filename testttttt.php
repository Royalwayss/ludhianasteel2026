<?php	 
include('config.php');
require("PHPMailer/PHPMailer.php");
require("PHPMailer/SMTP.php");
require("PHPMailer/Exception.php"); 
require("email_connection.php");

			$mail_message = 'test mail';
			
			$mail = new PHPMailer\PHPMailer\PHPMailer(true);
			$mail->isSMTP();
			// Use 'smtppro.zoho.in' if you have a paid business account, 
			// or 'smtp.zoho.in' for personal/standard accounts.
			$mail->Host       = 'smtp.zoho.in'; 
			$mail->SMTPAuth   = true;
			$mail->Username   = $email_username; // Your full Zoho email address
			$mail->Password   = $email_password; // Your Zoho App-Specific Password
			
			// Zoho prefers SSL on port 465 or TLS on 587. 
			// SSL/465 is generally more stable for Zoho.
			$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS; 
			$mail->Port       = 465;
			//$mail->SMTPDebug = 2;

			// Recipients
			$mail->setFrom($email_username, 'mis');
			$mail->addAddress('rwpttech@gmail.com');
			//$mail->addAddress('info@ludhianasteel.com');
			//$mail->addCC('jaspreet@rtpltech.com');
			//$mail->addBCC('rwpttech@gmail.com');

			// Content
			$mail->isHTML(true);
			$mail->Subject = "Ludhianasteel Contact Form | ".date('d-m-Y');
			$mail->Body    = $mail_message;
			$mail->AltBody = 'Ludhianasteel Mail';

			$sent = $mail->send();
			
			if($sent){
				echo 'mail sent';
			}else{
				echo 'mail not sent';
			}
			
			?>