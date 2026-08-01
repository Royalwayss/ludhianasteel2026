<?php
error_reporting(E_ALL);
$toemailaddresses[]  = ['email'=>'admin@ludhianasteel.com','name'=>'rwpttech'];

$message = '<h1> New message </h1>';
$subject = 'Check mail';
	require 'phpmailer/Exception.php';
			require 'phpmailer/PHPMailer.php';
			require 'phpmailer/SMTP.php';

			$mail = new PHPMailer\PHPMailer\PHPMailer();

			$mail->isSMTP();
			$mail->Host     = 'ludhianasteel.com'; // Your SMTP Host
			$mail->SMTPAuth = true;
			$mail->Username = 'admin@ludhianasteel.com'; // Your Username
			$mail->Password = 'F{,=z~J{yTLT'; // Your Password
			$mail->SMTPSecure = 'ssl'; // Your Secure Connection
			$mail->Port     = 465; // Your Port
			$mail->setFrom( 'admin@ludhianasteel.com', 'ludhianasteel' );
			
			foreach( $toemailaddresses as $toemailaddress ) {
				$mail->AddAddress( $toemailaddress['email'], $toemailaddress['name'] );
			}

			$mail->Subject = $subject;
			$mail->isHTML( true );

			$mail->Body = $message;

			if( $mail->send() ) {
			    echo 'mail sent';
			}else{
			    echo 'mail not sent';
			}