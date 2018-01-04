<?php
	require_once "Mail.php";


	$from = $_POST['email'];
	$subject = $_POST['subject'];
	$body = $_POST['content'];
	$to = 'ikuboinfor@gmail.com';
	$body = "Enviado desde: " . $from . "\nMensaje: " . $body;

	$headers = array(
    	'From' => $from,
    	'To' => $to,
    	'Subject' => $subject
	);

	$smtp = Mail::factory('smtp', array(
        'host' => 'smtp.gmail.com',
        'port' => '587',
        'auth' => true,
        'username' => 'ikuboinfor@gmail.com',
        'password' => 'pasahitza'
    ));

	$mail = $smtp->send($to, $headers, $body);

	if (PEAR::isError($mail)) {
	    echo('<p>' . $mail->getMessage() . '</p>');
	} else {
	    echo('<p>Message successfully sent!</p>');
	}
	header("refresh:2;url=main.php");
?>