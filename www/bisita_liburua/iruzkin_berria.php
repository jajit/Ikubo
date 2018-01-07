<?php
	require_once('bisita_liburua.inc');
	
	// Jaso formularioko balioak eta testuei hasierako eta amaierako hutsuneak kendu (trim).
	$izena=trim($_POST['izena']);
	$eposta=trim($_POST['eposta']);
	$pribatua=isset($_POST['pribatua']);
	$iruzkina=trim($_POST['iruzkina']);
	
	//Balidatu formularioko datuak.
	$errorea = balidatu_berria($izena, $eposta, $iruzkina);
	if($errorea == '')
		if(!gorde_iruzkina($izena, $eposta, $pribatua, $iruzkina))	// Gorde iruzkina datu basean (XML fitxategia).
			$errorea = '<li>Ezin izan da iruzkina datu basean gorde.</li>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<?php
		if($errorea=='')
			echo '<title>Eskerrik asko zure iruzkina uzteagatik</title>';
		else
			echo '<title>Errorea iruzkin berria jasotzean</title>';
	?>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	</head>
	<body>
	<?php
		if($errorea != '')
		{
			echo('<h1>Errore bat gertatu da iruzkina gordetzean.</h1>');
			echo("<ul>$errorea</ul>");
		}
		else
		{
			echo('<h1>Eskerrik asko zure iruzkina uzteagatik.</h1>');
		}
	?>
		<a href="iruzkinmenua.html">Itzuli menu nagusira</a>.
	</body>
</html>
