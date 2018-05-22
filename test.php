<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(); // Passing `true` enables exceptions

// Get data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$message = $_POST['message'] ?? '';

// Validate information
if ($name == '' || $email == '' || $phone == '' || $message == '') {
    return false;
}

// Set mail
//$adminMail = "mision.comercial@misionservir.com"; 
$adminMail = "sdtorresl@innovaciones.co"; 

// Create message to administrator
$subjectAdmin = "Nuevo contacto en Misión Servir";
$bodyAdmin = "Un nuevo registro se ha realizado en la página de Misión Servir<br>";
$bodyAdmin .= "<br>Los datos registrados son los siguientes:<br><br>";
$bodyAdmin .= "Nombre: ".$name."<br>";
$bodyAdmin .= "Correo: ".$email."<br>";
$bodyAdmin .= "Teléfono: ".$phone."<br>";
$bodyAdmin .= "Mensaje: ".$message;
 
// Create message to contact
$subjectCustomer = "Su información ha sido enviada";
$bodyCustomer = "Su contacto ha sido registrado satisfactoriamente en Misión Servir. Muy pronto nos pondremos en contacto con usted.<br>";
$bodyCustomer .= "<br>Los datos registrados son los siguientes:<br><br>";
$bodyCustomer .= "Nombre: ".$name."<br>";
$bodyCustomer .= "Correo: ".$email."<br>";
$bodyCustomer .= "Teléfono: ".$phone."<br>";
$bodyCustomer .= "Mensaje: ".$message; 

try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp-relay.sendinblue.com';            // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'soporte@innovaciones.co';          // SMTP username
    $mail->Password = 'MnzWEOV3axkXNRIm';                 // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->setLanguage('es');
    $mail->CharSet = 'UTF-8';
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($adminMail, 'Misión Servir');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    
    // Send to admin
    $mail->addAddress($adminMail, 'Misión Servir');
    $mail->Subject = $subjectAdmin;
    $mail->Body    = $bodyAdmin;
    $mail->send();
    
    // Send to customer
    $mail->ClearAllRecipients();
    $mail->addAddress($email, $name);
    $mail->Subject = $subjectCustomer;
    $mail->Body    = $bodyCustomer;
    $mail->send();

    return true;
} catch (Exception $e) {
   // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
   return false;
}
