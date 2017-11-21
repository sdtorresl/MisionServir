<?php

// require_once('vendor/autoload.php');
// $privatekey = "";

// $siteKey = '6Lc0nBIUAAAAAARbNL_3P4_-8lft4Ukw6KE_l10M';
// $secret = '6Lc0nBIUAAAAAMnou9fIIb0_Z623SwhvqIc2DrtR';

// if (isset($_POST['g-recaptcha-response'])) {
//     $recaptcha = new \ReCaptcha\ReCaptcha($secret);
//     $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

//     if ($resp->isSuccess()) {
    	// return getContact();
//     }
// }
// else {
// 	die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
// 	    "(reCAPTCHA said: " . $resp->error . ")");
// }

// private function getContact()
// {
	// Get data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	// Set mail
	$adminMail = "soluciones@innovaciones.co"; 
	 
	// Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
	$headers = "From: mision.comercial@misionservir.com\r\n";
	$headers .= "Reply-To: mision.comercial@misionservir.com\r\n";
	$headers .= "Return-Path: mision.comercial@misionservir.com\r\n";
	// $headers .= "BCC: $adminMail\r\n";
	$headers .= "X-Mailer: PHP7\n";
	$headers .= 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	 
	// Create message to administrator
	$subject = "Nuevo contacto en Misión Servir";
	$body = "Un nuevo registro se ha realizado en la página de Misión Servir<br>";
	$body .= "<br>Los datos registrados son los siguientes:<br><br>";
	$body .= "Nombre: ".$name."<br>";
	$body .= "Correo: ".$email."<br>";
	$body .= "Teléfono: ".$phone."<br>";
	$body .= "Mensaje: ".$message;
	 
	// Validate information
	if($name != '' && $email != '' && $phone != '' && $message != ''){
	    $sentToAdmin = mail($adminMail, $subject, $body, $headers);
	}

	// Create message to contact
	$subject = "Su información ha sido enviada";
	$body = "Su contacto ha sido registrado satisfactoriamente en Misión Servir. Muy pronto nos pondremos en contacto con usted.<br>";
	$body .= "<br>Los datos registrados son los siguientes:<br><br>";
	$body .= "Nombre: ".$name."<br>";
	$body .= "Correo: ".$email."<br>";
	$body .= "Teléfono: ".$phone."<br>";
	$body .= "Mensaje: ".$message;
	 
	// Validate information
	if($name != '' && $email != '' && $phone != '' && $message != ''){
	    $sentToCustomer = mail($email, $subject, $body, $headers);
	}

	sleep(1);

	return $sentToAdmin && $sentToCustomer;
// }
?>