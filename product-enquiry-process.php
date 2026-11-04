<?php
	include('config.php');

	$err = '';
	$data = $_POST;

	// ---- Required fields ----
	$user_name = (isset($data['name']) && $data['name'] != '') ? $data['name'] : ($err = 1);
	$phone     = (isset($data['phone']) && $data['phone'] != '') ? $data['phone'] : ($err = 1);
	$comment   = (isset($data['message']) && $data['message'] != '') ? $data['message'] : ($err = 1);

	if (isset($data['email']) && $data['email'] != '') {
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$err = 1;
			$email = '';
		} else {
			$email = $data['email'];
		}
	} else {
		$err = 1;
		$email = '';
	}

	// ---- Hidden fields set by the form ----
	$enquiry_type = isset($data['enquiry_type']) ? $data['enquiry_type'] : 'product';
	$form_type    = isset($data['form_type']) ? $data['form_type'] : '';

	if ($err == '') {

		// ---- Build response rows for the email table ----
		$post_data = [
			'product'     => $form_type,
			'name'        => $user_name,
			'phone'       => $phone,
			'email'       => $email,
			'requirement' => $comment,
		];

		$fields = array();

		foreach ($post_data as $name => $value) {
			if (empty($value)) {
				continue;
			}

			$name = function_exists('mb_convert_case') ? mb_convert_case($name, MB_CASE_TITLE, "UTF-8") : ucwords($name);
			$fields[$name] = nl2br(filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
		}

		$response = array();

		foreach ($fields as $fieldname => $fieldvalue) {

			$fieldname = '
			<tr>
			   <td align="right" valign="top" style="border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;"><strong>' . $fieldname . '</strong>: </td>
			   ';
			   $fieldvalue = '
			   <td align="left" valign="top" style="border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;">' . $fieldvalue . '</td>
			</tr>
			';
			$response[] = $fieldname . $fieldvalue;

		}

		// ---- Save to database (other enquiries columns stay NULL) ----
		$db_enquiry_type = mysqli_real_escape_string($conn, $enquiry_type);
		$db_form_type    = mysqli_real_escape_string($conn, $form_type);
		$db_name         = mysqli_real_escape_string($conn, $user_name);
		$db_email        = mysqli_real_escape_string($conn, $email);
		$db_phone        = mysqli_real_escape_string($conn, $phone);
		$db_comment      = mysqli_real_escape_string($conn, $comment);

		$sql = "INSERT INTO enquiries
			(enquiry_type, form_type, comment, name, email, phone, created_at)
			VALUES
			('".$db_enquiry_type."','".$db_form_type."','".$db_comment."','".$db_name."','".$db_email."','".$db_phone."', NOW())";
		mysqli_query($conn, $sql);

				$mail_message =
				'<!DOCTYPE html>
				<html>
				   <head>
					  <meta charset="UTF-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1.0">
					  <title>Email</title>
					  <style>
						 body{
						 margin:0;
						 padding:0;
						 background:#f4f4f4;
						 font-family: Arial, Helvetica, sans-serif;
						 }
						 .container{
						 max-width:600px;
						 margin:auto;
						 background:#ffffff;
						 }
						 .header{
						 background: linear-gradient(135deg, #23346b, #1e2a5a, #667cb9) !important;
						 text-align:center;
						 }
						 .header img{
						 max-width:100px;
						 }
						 .title{
						 text-align:center;
						 padding:20px;
						 font-size:20px;
						 font-weight:bold;
						 color:#333;
						 }
						 .content{
						 padding:20px;
						 }
						 .content table{
						 width:100%;
						 border-collapse:collapse;
						 }
						 .content td{
						 padding:10px;
						 border-bottom:1px solid #eee;
						 font-size:14px;
						 }
						 .label{
						 font-weight:bold;
						 color:#555;
						 width:40%;
						 }
						 .footer{
						 text-align:center;
						 padding:15px;
						 font-size:12px;
						 color:#fff;
						 background: linear-gradient(135deg, #23346b, #1e2a5a, #667cb9) !important;
						 }
						 @media only screen and (max-width:600px){
						 .container{
						 width:100% !important;
						 }
						 .content td1{
						 display:block;
						 width:100%;
						 }
						 .label{
						 padding-bottom:5px;
						 }
						 }
					  </style>
				   </head>
				   <body>
					  <table width="100%" cellpadding="0" cellspacing="0" border="0">
						 <tr>
							<td align="center">
							   <table class="container" cellpadding="0" cellspacing="0">
								  <tr>
									 <td class="header">
										<img src="https://ludhianasteel.com/images/lsrm/logo-w-b.png" alt="Logo">
									 </td>
								  </tr>
								  <tr>
									 <td class="title">
										Ludhianasteel Product Enquiry<br>
										<small>'.date('d-m-Y').'</small>
									 </td>
								  </tr>
								  <tr>
									 <td class="content">
										<table>
										   '.implode('', $response).'
										</table>
									 </td>
								  </tr>
								  <tr>
									 <td class="footer">
										© '.date('Y').' Ludhianasteel. All rights reserved.
									 </td>
								  </tr>
							   </table>
							</td>
						 </tr>
					  </table>
				   </body>
				</html>
				';

				require("PHPMailer/PHPMailer.php");
				require("PHPMailer/SMTP.php");
				require("PHPMailer/Exception.php");
				require("email_connection.php");
/*
				$mail = new PHPMailer\PHPMailer\PHPMailer(true);

		try {
			// Server settings
			$mail->isSMTP();
			$mail->Host       = 'smtp.zoho.in';
			$mail->SMTPAuth   = true;
			$mail->Username   = $email_username; // Your full Zoho email address
			$mail->Password   = $email_password; // Your Zoho App-Specific Password
			$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port       = 465;
			//$mail->SMTPDebug = 2;

			// Recipients
			$mail->setFrom($email_username, 'mis');

			$mail->addAddress('rwpttech@gmail.com');
			//$mail->addAddress('info@ludhianasteel.com');
			//$mail->addBCC('jaspreet@rtpltech.com');
           // $mail->addBCC('rwpttech@gmail.com');
			// Content
			$mail->isHTML(true);
			$mail->Subject = "Ludhianasteel Product Enquiry | ".date('d-m-Y');
			$mail->Body    = $mail_message;
			$mail->AltBody = 'Ludhianasteel Mail';

			$mail->send();

		} catch (Exception $e) {
			//echo json_encode(array("status" => false, "message" => "Message could not be sent. Error: {$mail->ErrorInfo}"));
		}
*/
		echo '{ "alert": "alert alert-success alert-dismissable", "message": "Your enquiry has been sent successfully!" }';

	}else{
		echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Your enquiry could not been sent!" }';
	}

?>