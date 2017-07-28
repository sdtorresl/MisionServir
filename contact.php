<?php 
function redirect($url, $statusCode = 303) 
{
	header('Location: ' . $url, true, $statusCode);
	die();
}

//if "email" variable is filled out, send email
if (isset($_REQUEST['email']))  {

	//Email information
	$admin_email = "soluciones@innovaciones.co";
	$email = $_REQUEST['email'];
	$subject = $_REQUEST['name'];
	$comment = $_REQUEST['message'];

	//send email
	mail($admin_email, "$subject", $comment, "From:" . $email);

	redirect("success.php");
}
else  {
	// Redirect
}

?>