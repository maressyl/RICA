<?php

function regex($Chaine, $Delimiter="#")
	{
	/* Caract�res classiques */
	$Chaine = preg_quote($Chaine, $Delimiter);
	
	/* Lettres accentu�es */
	$Pattern = array("[a���]", "[e����]", "[i��]", "[o��]", "[u��]", "[c�]");
	foreach($Pattern as $P)
		{ $Chaine = preg_replace("#".$P."#", $P, $Chaine); }
	
	return $Chaine;
	}

?>
