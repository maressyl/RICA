<?php

function rapport( $Texte, $Get )
	{
	$Brut = array();
	$Original = $Texte;
	
	/* Uniformisation de l'input */
	$Texte = fonction("rapport_preTraitement", array($Texte));

	/* Donn�es g�n�rales */
	$Brut = fonction("rapport_meta", array($Brut, $Texte));

	/* Donn�es d'unit�s */	
	$Brut = fonction("rapport_des", array($Brut, $Texte));

	/* Estimation des unit�s ennemies */	
	$Brut = fonction("rapport_estiDef", array($Brut, $Texte));

	/* Mise en forme du rapport */
	$Texte = fonction("rapport_format", array($Brut, $Texte));

	/* Donn�es du joueur ennemi */
	$Brut = fonction("rapport_joueur", array($Brut, $Get));

	/* Elements de r�sum� */
	$Elements = fonction("rapport_elements", array($Brut, ",", "."));
	
	if (isset($GLOBALS['alerte']))
		{
		/* Alerte */
		$GLOBALS['dialogues'][] = array(
			"type" => "erreur",
			"message" => "Votre Rapport a g�n�r� une erreur, si vous ne comprenez pas pourquoi pr�venez un administrateur"
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
