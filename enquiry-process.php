<?php
	include('config.php');

	$err = '';
	$data = $_POST;

	// ---- Required fields (same style as save-contact.php) ----
	$form_type   = (isset($data['form_type']) && $data['form_type'] != '') ? $data['form_type'] : ($err = 1);
	$size        = (isset($data['size']) && $data['size'] != '') ? $data['size'] : ($err = 1);
	$qty         = (isset($data['qty']) && $data['qty'] != '') ? $data['qty'] : ($err = 1);
	$application = (isset($data['application']) && $data['application'] != '') ? $data['application'] : ($err = 1);
	$user_name   = (isset($data['name']) && $data['name'] != '') ? $data['name'] : ($err = 1);
	$company     = (isset($data['company']) && $data['company'] != '') ? $data['company'] : ($err = 1);
	$phone       = (isset($data['phone']) && $data['phone'] != '') ? $data['phone'] : ($err = 1);

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

	if (!isset($data['consent']) || $data['consent'] != 'yes') {
		$err = 1;
	}

	// ---- Optional fields ----
	$enquiry_type = isset($data['enquiry_type']) ? $data['enquiry_type'] : '';
	$grade        = isset($data['grade']) ? $data['grade'] : '';
	$qty_unit     = isset($data['qty_unit']) ? $data['qty_unit'] : '';
	$condition    = isset($data['condition']) ? $data['condition'] : '';
	$frequency    = isset($data['frequency']) ? $data['frequency'] : '';
	$required_by  = isset($data['required_by']) ? $data['required_by'] : '';
	$spec         = isset($data['spec']) ? $data['spec'] : '';
	$delivery     = isset($data['delivery']) ? $data['delivery'] : '';
	$comment      = isset($data['message']) ? $data['message'] : '';
	$designation  = isset($data['designation']) ? $data['designation'] : '';
	$industry     = isset($data['industry']) ? $data['industry'] : '';
	$city         = isset($data['city']) ? $data['city'] : '';
	$country      = isset($data['country']) ? $data['country'] : '';

	if ($err == '') {

		/* if ($_SERVER['HTTP_HOST'] != 'localhost') {

			$recaptcha_secret   = RECAPTCHA_SECRET_KEY;
			$recaptcha_response = $_POST['g-recaptcha-response'];

			$recaptcha_api_url = 'https://www.google.com/recaptcha/api/siteverify';
			$rc_data = [
				'secret'   => $recaptcha_secret,
				'response' => $recaptcha_response
			];

			$options = [
				'http' => [
					'method'  => 'POST',
					'content' => http_build_query($rc_data)
				]
			];

			$context    = stream_context_create($options);
			$api_result = file_get_contents($recaptcha_api_url, false, $context);
			$json       = json_decode($api_result);

			if ($json->success) {

			} else {
				echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Your enquiry could not been sent!" }';
				die;
			}
		} */ 

		// ---- Handle attachment upload (optional) ----
		$attachment_name = '';
		$attachment_saved_path = '';
		if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
			$allowed_ext = array('pdf', 'jpg', 'jpeg', 'png', 'doc', 'docx', 'xls', 'xlsx', 'dwg');
			$max_size    = 10 * 1024 * 1024; // 10 MB

			$orig_name = $_FILES['attachment']['name'];
			$ext = strtolower(pathinfo($orig_name, PATHINFO_EXTENSION));

			if (in_array($ext, $allowed_ext) && $_FILES['attachment']['size'] <= $max_size) {
				$upload_dir = __DIR__ . '/uploads/enquiry/';
				if (!is_dir($upload_dir)) {
					mkdir($upload_dir, 0755, true);
				}
				$safe_name = date('Ymd_His') . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $orig_name);
				$dest = $upload_dir . $safe_name;

				if (move_uploaded_file($_FILES['attachment']['tmp_name'], $dest)) {
					$attachment_name = $orig_name;
					$attachment_saved_path =  $safe_name;
				}
			}
		}

		// ---- Build response rows for the email table (same style as save-contact.php) ----
		$post_data = [
			'enquiry type'      => $enquiry_type,
			'product form'      => $form_type,
			'steel grade'       => $grade,
			'size'              => $size,
			'quantity'          => $qty . ' ' . $qty_unit,
			'supply condition'  => $condition,
			'frequency'         => $frequency,
			'required by'       => $required_by,
			'application'       => $application,
			'specification'     => $spec,
			'delivery location' => $delivery,
			'message'           => $comment,
			'name'              => $user_name,
			'company'           => $company,
			'designation'       => $designation,
			'industry'          => $industry,
			'email'             => $email,
			'phone'             => $phone,
			'city'              => $city,
			'country'           => $country,
			'attachment'        => $attachment_name,
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

		// ---- Save to database ----
		$db_enquiry_type = mysqli_real_escape_string($conn, $enquiry_type);
		$db_form_type    = mysqli_real_escape_string($conn, $form_type);
		$db_grade        = mysqli_real_escape_string($conn, $grade);
		$db_size         = mysqli_real_escape_string($conn, $size);
		$db_qty          = mysqli_real_escape_string($conn, $qty);
		$db_qty_unit     = mysqli_real_escape_string($conn, $qty_unit);
		$db_condition    = mysqli_real_escape_string($conn, $condition);
		$db_frequency    = mysqli_real_escape_string($conn, $frequency);
		$db_required_by  = mysqli_real_escape_string($conn, $required_by);
		$db_application  = mysqli_real_escape_string($conn, $application);
		$db_spec         = mysqli_real_escape_string($conn, $spec);
		$db_delivery     = mysqli_real_escape_string($conn, $delivery);
		$db_comment      = mysqli_real_escape_string($conn, $comment);
		$db_name         = mysqli_real_escape_string($conn, $user_name);
		$db_company      = mysqli_real_escape_string($conn, $company);
		$db_designation  = mysqli_real_escape_string($conn, $designation);
		$db_industry     = mysqli_real_escape_string($conn, $industry);
		$db_email        = mysqli_real_escape_string($conn, $email);
		$db_phone        = mysqli_real_escape_string($conn, $phone);
		$db_city         = mysqli_real_escape_string($conn, $city);
		$db_country      = mysqli_real_escape_string($conn, $country);
		$db_attachment   = mysqli_real_escape_string($conn, $attachment_saved_path);

		$sql = "INSERT INTO enquiries
			(enquiry_type, form_type, grade, size, qty, qty_unit, supply_condition, frequency, required_by, application, spec, delivery, comment, name, company, designation, industry, email, phone, city, country, attachment, created_at)
			VALUES
			('".$db_enquiry_type."','".$db_form_type."','".$db_grade."','".$db_size."','".$db_qty."','".$db_qty_unit."','".$db_condition."','".$db_frequency."','".$db_required_by."','".$db_application."','".$db_spec."','".$db_delivery."','".$db_comment."','".$db_name."','".$db_company."','".$db_designation."','".$db_industry."','".$db_email."','".$db_phone."','".$db_city."','".$db_country."','".$db_attachment."', NOW())";
		mysqli_query($conn, $sql);

		// ---- Build email ----
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
								Ludhianasteel Enquiry Form<br>
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

		// ---- Send via Zoho Mail API (same account already used by save-contact.php) ----
		try {
			$refresh_token = '1000.5120537a18efa38ae22987160d4e50d0.cae3b8064f06e7f208cce2593e121866';
			$client_id     = '1000.3UYZ303BOOW52YJZ46KRWQRC6OR2IE';
			$client_secret = '460aa3fa10ebe53f048545eb38fb13ca1e755b685c';
			$account_id    = '7354863000000002002';

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

				$mail_url = "https://mail.zoho.in/api/accounts/{$account_id}/messages";

				$mail_data = [
					"fromAddress" => "mis@ludhianasteel.com",
					"toAddress"   => "sales@ludhianasteel.com",
					"ccAddress"   => "info@ludhianasteel.com",
					"bccAddress"  => "manjit@rtpltech.com",
					"subject"     => "Ludhianasteel Enquiry Form | " . date('d-m-Y'),
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
		} catch (Exception $e) {
			// swallow — DB insert already succeeded, don't block the success response on mail delivery
		}

		echo '{ "alert": "alert alert-success alert-dismissable", "message": "Your enquiry has been sent successfully!" }';

	} else {
		echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Please fill in all required fields." }';
	}
?>