<?php
	require_once "Mail.php";


	$from = $_POST['email'];
	$subject = $_POST['subject'];
	$body = $_POST['content'];
	$to = 'rubenndlh@gmail.com';

	$headers = array(
    	'From' => $from,
    	'To' => $to,
    	'Subject' => $subject
	);

	$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'rubenndlh@gmail.com',
        'password' => 'ajajNO'
    ));

	$mail = $smtp->send($to, $headers, $body);

	if (PEAR::isError($mail)) {
	    echo('<p>' . $mail->getMessage() . '</p>');
	} else {
	    echo('<p>Message successfully sent!</p>');
	    header("location: main.php");
	}
?>