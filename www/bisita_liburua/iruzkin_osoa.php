<?php
	require_once("bisita_liburua.inc");
	
	// Beharrezkoa den parametroa ('id') bidali den eta iruzkinen XML fitxategia existitzen den ziurtatu.
	if(isset($_GET['id']) && file_exists($BL_FILE))
	{
		$id=$_GET['id'];
		$bl=simplexml_load_file($BL_FILE);	// Kargatu iruzkinen XML fitxategia.
		foreach($bl->bisita as $bisita)	// Iruzkin bakoitzeko begiratu ia iruzkinaren identifikadoreak eta jasotako parametroak bat egiten duten.
		{
			if($bisita['id'] == $id)
			{
				echo($bisita->iruzkina);	// Eskatutako iruzkinaren testua bidali eta utzi bilatzeari (break).
				break;
			}
		}
	}
?>
