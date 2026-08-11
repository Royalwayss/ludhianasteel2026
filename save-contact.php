<?php	 
	include('config.php');
	
	$err = '';
	$data = $_POST; 
	
	if(isset($data['name']) && $data['name'] != ''){
		$user_name = $data['name'];
	}else{
		$user_name ='';
		$err = 1;
	}
	
	if(isset($data['phone']) && $data['phone'] != ''){
		$phone = $data['phone'];
	}else{
		$phone ='';
		$err = 1;
	} 
	
	if(isset($data['email']) && $data['email'] != ''){
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$err = 1;
			$email  = '';
		}else{
			$email = $data['email'];
		}
	}else{
		$err = 1;
		$email  = '';
	}
	
	if(isset($data['company']) && $data['company'] != ''){
		$company = $data['company'];
	}else{
		$company ='';
		$err = 1; 	
	}
	
	if(isset($data['comment']) && $data['comment'] != ''){
		$comment = $data['comment'];
	}else{
		$comment ='';
	}
	
	if( $err == '' ) {
		
		
		
		
		
		if($_SERVER['HTTP_HOST'] != 'localhost'){
			
					$recaptcha_secret = RECAPTCHA_SECRET_KEY;
					$recaptcha_response = $_POST['g-recaptcha-response'];

					$recaptcha_api_url = 'https://www.google.com/recaptcha/api/siteverify';
					$rc_data = [
						'secret' => $recaptcha_secret,
						'response' => $recaptcha_response
					];

					$options = [
						'http' => [
							'method' => 'POST',
							'content' => http_build_query($rc_data)
						]
					];

					$context = stream_context_create($options);
					$api_result = file_get_contents($recaptcha_api_url, false, $context);
					$json = json_decode($api_result);

					if ($json->success) {
					  
					} else { 
					  echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Your message could not been sent!" }'; die;
					} 
			   
   }
		
		
		
		
		
		
		
		
		
		 
		
		$post_data = [
			'name' => $user_name,
			'phone' => $phone,
			'email' => $email,
			'company' => $company,
			'comment' => $comment
		];
		
		$prefix		= !empty( $_POST['prefix'] ) ? $_POST['prefix'] : '';
		$submits	= $post_data;
		$botpassed	= false;
		
		$fields = array();
		
		foreach( $submits as $name => $value ) {
		if( empty( $value ) ) {
			continue;
		}
		
		$name = str_replace( $prefix , '', $name );
		$name = function_exists('mb_convert_case') ? mb_convert_case( $name, MB_CASE_TITLE, "UTF-8" ) : ucwords($name);
		
		if( is_array( $value ) ) {
			$value = implode( ', ', $value );
		}
		
		$fields[$name] = nl2br( filter_var( $value, FILTER_SANITIZE_SPECIAL_CHARS ) );
		
		}
		
		$response = array();
		
		foreach( $fields as $fieldname => $fieldvalue ) {
			
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
		
		$name = mysqli_real_escape_string($conn, $name);
		$company = mysqli_real_escape_string($conn, $company);
		$comment = mysqli_real_escape_string($conn, $comment);
		
		$sql = "INSERT INTO contacts (name,email,phone,company,comment) VALUES ('".$user_name."','".$email."','".$phone."','".$company."','".$comment."')";
		mysqli_query($conn,$sql);
						
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
										Ludhianasteel Contact Form<br>
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
				
				
				/*
				
				require("PHPMailer/PHPMailer.php");
				require("PHPMailer/SMTP.php");
				require("PHPMailer/Exception.php"); // Added Exception.php for better error handling
				require("email_connection.php");
				
				
				
				$mail = new PHPMailer\PHPMailer\PHPMailer(true);

		try {
			// Server settings
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

			$mail->send();
			//echo json_encode(array("status" => true, "message" => "Email sent successfully via Zoho"));

		} catch (Exception $e) {
			//echo json_encode(array("status" => false, "message" => "Message could not be sent. Error: {$mail->ErrorInfo}"));
		}
         echo '{ "alert": "alert alert-success alert-dismissable", "message": "Your message has been sent successfully!" }';
				
				
				*/
				
				
				
				
				
			     
			        try{
						 // 1. YOUR CREDENTIALS
						$refresh_token = '1000.5120537a18efa38ae22987160d4e50d0.cae3b8064f06e7f208cce2593e121866';
						$client_id     = '1000.3UYZ303BOOW52YJZ46KRWQRC6OR2IE';
						$client_secret = '460aa3fa10ebe53f048545eb38fb13ca1e755b685c';
						$account_id    = '7354863000000002002';

						// 2. STEP ONE: EXCHANGE REFRESH TOKEN FOR A NEW ACCESS TOKEN
						$auth_url = "https://accounts.zoho.in/oauth/v2/token";
						$post_params = [
							'refresh_token' => $refresh_token,
							'client_id'     => $client_id,
							'client_secret' => $client_secret,
							'grant_type'    => 'refresh_token'
						];

						$ch = curl_init($auth_url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_params));
						$auth_response = json_decode(curl_exec($ch), true);
						curl_close($ch);

						if (isset($auth_response['access_token'])) {
							$current_access_token = $auth_response['access_token'];
						} else {
							exit("Failed to get Access Token: " . json_encode($auth_response));
						}

						// 3. STEP TWO: SEND THE EMAIL USING THE NEW ACCESS TOKEN
						$mail_url = "https://mail.zoho.in/api/accounts/{$account_id}/messages";

						$mail_data = [
							"fromAddress" => "mis@ludhianasteel.com",
							"toAddress"   => "info@ludhianasteel.com", 
							"ccAddress"   => "jaspreet@rtpltech.com",
							"bccAddress"  => "",
							"subject"     => "Ludhianasteel Contact Form | ".date('d-m-Y'),
							"content"     => $mail_message,
						];
						 
						$ch = curl_init($mail_url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($mail_data));
						curl_setopt($ch, CURLOPT_HTTPHEADER, [
							"Authorization: Zoho-oauthtoken {$current_access_token}", // Note: Use current_access_token here
							"Content-Type: application/json"
						]);

						$response = curl_exec($ch);
						curl_close($ch);
					}
					
					catch(Exception $e) {
							//echo 'Message: ' .$e->getMessage();
					}
			  
			       echo '{ "alert": "alert alert-success alert-dismissable", "message": "Your message has been sent successfully!" }';
			  
			  
	}else{
		echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Your message could not been sent!" }';
	}
	
	
	
	
	
	
	
?>