<?php

	$to = "cmazzochi81@gmail.com";

	// Windows may not handle this format well
    //$to = "Chris Mazzochi <cmazzochi81@gmail.com>";

	// multiple recipients
	// $to = "junkmail@novafabrica.com, nobody@novafabrica.com";
	// $to = "Kevin Skoglund <junkmail@novafabrica.com>, nobody@novafabrica.com";

	$subject = "Mail Test at ".strftime("%T", time());

	$message = "This is a test.";
	// Optional: Wrap lines for old email programs
	// wrap at 70/72/75/78
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