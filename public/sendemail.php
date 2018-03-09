<?php

	$to = "cmazzochi81@gmail.com";
	$subject = "Mail Test at ".strftime("%T", time());
	$message = "This is a test.";
	$message = wordwrap($message,70);
	$from = "Web Master <cmazzochi81@gmail.com>";
	$headers = "From: {$from}\n";
	$headers .= "Reply-To: {$from}\n";
	// $headers .= "Cc: {$to}\n";
	// $headers .= "Bcc: {$to}\n";
	$headers .= "X-Mailer: PHP/".phpversion()."\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: text/plain; charset=iso-8859-1";
	$result = mail($to, $subject, $message, $headers);
	echo $result ? 'Sent' : 'Error';
?>