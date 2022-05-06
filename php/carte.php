<?php

function carte( $Texte )
	{
	$Brut = array();
	$Original = $Texte;
	
	/* Uniformisation de l'input */
	$Texte = fonction("carte_preTraitement", array($Texte));

	/* Donn�es g�n�rales */
	$Brut = fonction("carte_meta", array($Brut, $Texte));

	/* Processing case par case */
	$Brut = fonction("carte_parse", array($Brut, $Texte));

	/* Mise en forme de la carte */
	$Texte = fonction("carte_format", array($Brut));

	/* Elements de r�sum� */
	$Elements = fonction("carte_elements", array($Brut));

	if (isset($GLOBALS['alerte']))
		{
		/* Alerte */
		$GLOBALS['dialogues'][] = array(
			"type" => "erreur",
			"message" => "Votre Carte a g�n�r� une erreur, si vous ne comprenez pas pourquoi pr�venez un administrateur"
			);
		return FALSE;
		}
	else
		{
		return array(
			"original" => $Original,
			"elements" => $Elements,
			"joint" => $Texte
			);
		}
	}

?>
