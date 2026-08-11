<?php
	include('config.php');

	$err = '';
	$data = $_POST;

	if(isset($data['name']) && trim($data['name']) != ''){
		$applicant_name = trim($data['name']);
	}else{
		$applicant_name = '';
		$err = 1;
	}

	if(isset($data['phone']) && trim($data['phone']) != ''){
		$phone = trim($data['phone']);
	}else{
		$phone = '';
		$err = 1;
	}

	if(isset($data['email']) && trim($data['email']) != ''){
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$err = 1;
			$email = '';
		}else{
			$email = trim($data['email']);
		}
	}else{
		$err = 1;
		$email = '';
	}

	$position = isset($data['position']) ? trim($data['position']) : '';
	$job_id   = (isset($data['job_id']) && $data['job_id'] !== '') ? (int)$data['job_id'] : 0;
	$message  = isset($data['message']) ? trim($data['message']) : '';

	// ---- Attachment (required: pdf/doc/docx, max 2MB) ----
	$attachment_name = '';
	$allowed_ext = ['pdf','doc','docx'];
	$max_size    = 2 * 1024 * 1024; // 2 MB

	if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK){

		$file_tmp  = $_FILES['attachment']['tmp_name'];
		$file_orig = $_FILES['attachment']['name'];
		$file_size = $_FILES['attachment']['size'];
		$file_ext  = strtolower(pathinfo($file_orig, PATHINFO_EXTENSION));

		if(!in_array($file_ext, $allowed_ext)){
			$err = 1;
		}elseif($file_size > $max_size){
			$err = 1;
		}else{
			$upload_dir = __DIR__ . '/uploads/resumes/';
			if(!is_dir($upload_dir)){
				mkdir($upload_dir, 0755, true);
			}
			$attachment_name = 'resume_' . uniqid() . '_' . time() . '.' . $file_ext;
			$upload_path = $upload_dir . $attachment_name;

			if(!move_uploaded_file($file_tmp, $upload_path)){
				$err = 1;
				$attachment_name = '';
			}
		}
	}else{
		// attachment is required
		$err = 1;
	}

	if( $err == '' ) {

		$stmt = mysqli_prepare($conn, "INSERT INTO career_applications (job_id, position, name, phone, email, message, attachment) VALUES (?, ?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, "issssss", $job_id, $position, $applicant_name, $phone, $email, $message, $attachment_name);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		$fields = [
			'Position' => $position,
			'Name'     => $applicant_name,
			'Phone'    => $phone,
			'Email'    => $email,
			'Message'  => $message
		];

		$response = array();

		foreach( $fields as $fieldname => $fieldvalue ) {

			if( $fieldvalue === '' ) {
				continue;
			}

			$fieldvalue = nl2br( filter_var( $fieldvalue, FILTER_SANITIZE_SPECIAL_CHARS ) );

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

		if( $attachment_name != '' ) {
			$response[] = '
			<tr>
			   <td align="right" valign="top" style="border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;"><strong>Resume</strong>: </td>
			   <td align="left" valign="top" style="border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;">' . $attachment_name . '</td>
			</tr>
			';
		}

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
								Ludhianasteel Career Application<br>
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

				// 3. STEP TWO: SEND THE EMAIL USING THE NEW ACCESS TOKEN
				$mail_url = "https://mail.zoho.in/api/accounts/{$account_id}/messages";

				$mail_data = [
					"fromAddress" => "mis@ludhianasteel.com",
					"toAddress"   => "hrd@ludhianasteel.com",
					"ccAddress"   => "hr2@ludhianasteel.com",
					"bccAddress"  => "",
					"subject"     => "Ludhianasteel Career Application | ".date('d-m-Y'),
					"content"     => $mail_message,
				];

				$ch = curl_init($mail_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($mail_data));
				curl_setopt($ch, CURLOPT_HTTPHEADER, [
					"Authorization: Zoho-oauthtoken {$current_access_token}",
					"Content-Type: application/json"
				]);

				curl_exec($ch);
				curl_close($ch);
			}
		}

		catch(Exception $e) {
			// silent fail — application is already saved to the DB either way
		}

		echo '{ "alert": "alert alert-success alert-dismissable", "message": "Your application has been submitted successfully!" }';

	}else{
		echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Please fill all required fields and attach a valid resume (PDF, DOC or DOCX, max 2 MB)." }';
	}

?>