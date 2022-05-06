<?php

function cookie($Nom, $Valeur, $Expire="NA")
	{
	/* Expire par d�faut : 10 ans */
	if (!preg_match("#^[0-9]+$#", $Expire))
		{ $Expire = time() + 60*60*24*365*10; }
	
	/* Stockage client */
	setcookie(
		$Nom,
		$Valeur,
		$Expire		
		);
	
	/* Disponibilit� imm�diate */
	$_COOKIE[ $Nom ] = $Valeur;
	}

?>
