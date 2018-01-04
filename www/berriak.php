<?php
	require_once("berriak.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Bisita liburua: iruzkinak.</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="bisita_liburua.css" type="text/css" />
		<script type="text/javascript" src="bisita_liburua.js"></script>
	</head>
	<body>
		<h1>Bisita liburua</h1>
		<?php
			if(!file_exists($BL_FILE))
			{
				echo('<p>Bisita liburua hutsik dago. Iruzkin bat idazten lehenengoa izan nahi baduzu klikatu <a href="berria.html">hemen</a>.</p>');
			}
			elseif(!($bl=simplexml_load_file($BL_FILE)))
			{
				echo('<p>Errore bat gertatu datu bisita liburua irakurtzean. Barkatu eragozpenak</p>');
			}
			else
			{
			?>
			<p>Hona hemen eskatutako iruzkin zerrenda. Menu nagusira itzultzeko sakatu <a href="index.html">hemen</a>.</p>
			<?php
				$kop=0;
				foreach($bl->bisita as $bisita)
				{
					// Iruzkin bat pantailaratzeko 2 baldintza hauetako bat bete behar da (lehenengoa betetzen bada, bigarrena ez da ebaluatzen):
					//   · 'erab' eremua ez da bidali (iruzkin zerrenda osoa eskatu da).
					//   · 'erab' eremuako balioa eta iruzkinari dagokion izena berdinak dira (minuskulak eta maiuskulak kontuan ez hartzeko bi balioak minuskulara pasatzen dira).
					if(!isset($_POST['erab']) || strtolower($_POST['erab']) == strtolower($bisita->izena))
					{
						$kop++;
						echo('<div class="iruzkina">');
						echo('<div class="ir_goiburua">');
						echo('<span class="data">'.$bisita->data.'</span>');
						echo('<span class="izena">'.$bisita->izena.'</span>');
						if($bisita->eposta && $bisita->eposta['erakutsi']=="bai")
							echo('<span class="eposta">&lt;'.$bisita->eposta.'&gt;</span>');
						echo('</div>');
						echo('<div class="ir_gorputza" id="'.$bisita['id'].'">');
						// Iruzkinaren luzera ez bada maximoa baino luzeagoa, osoa pantailaratu. 
						if(strlen($bisita->iruzkina) <= $MAX_IRUZKIN)
							echo($bisita->iruzkina);
						// Bestela, pantailaratu lehenengo karaktereak eta osorik ikusi ahal izateko esteka bat.
						else
							echo(substr($bisita->iruzkina,0,$MAX_IRUZKIN).'... <a href="javascript:iruzkin_osoa(\''.$bisita['id'].'\');" class="gehiago">[Iruzkin osoa irakurri]</a>');
						echo('</div>');
						echo('</div>');
					}
				}
				// Erakutsi mezu bat ez bada iruzkinik aurkitu.
				if($kop==0)
					echo('Ez da aurkitu '.$_POST['erab'].' izeneko erabiltzailerik.');
			}
		?>
	</body>
</html>
