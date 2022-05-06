<?php

function rapport_elements( $Rapport, $Dec, $Mil )
	{
	$Elements = array();
	
	/* Titre */
	if ($Rapport['type'] == "Rapport d'attaque")
		{
		$Titre  = $Rapport['bilan']." - ";
		$Titre .= $Rapport['objet']." de ".$Rapport['cible']." en ";
		$Titre .= $Rapport['position']." (".$Rapport['secteur'].")";
		}
	else if ($Rapport['type'] == "Rapport de d�fense")
		{
		$Titre  = "Attaqu� par la Flotte de ".$Rapport['cible']." en ";
		$Titre .= $Rapport['position']." (".$Rapport['secteur'].")";
		}
	else { $Titre = "Erreur, contactez un Administrateur"; }
	$Elements[] = array(
		"contenu" => $Titre
		);
	
	/* Posteur */
	$Elements[] = array(
		"nom" => "Ajout� par",
		"contenu" => $_SESSION['pseudo']
		);
	
	/* Type */
	$Elements[] = array(
		"nom" => "Type",
		"contenu" => $Rapport['type']
		);
	
	/* Fiche */
	$Elements[] = array(
		"contenu" => "<a href='http://www.ngswing.com/infoperso.php?id1=".$Rapport['IDs']."' target='_blank'>Fiche de l'adversaire</a>"
		);
	
	/* Joueur */
	$Elements[] = array(
		"nom" => "Joueur",
		"contenu" => $Rapport['cible']
		);
		
	/* Clan */
	$Elements[] = array(
		"nom" => "Clan",
		"contenu" => $Rapport['clan']
		);
		
	/* Info objet */
	if ($Rapport['type'] == "Rapport d'attaque")
		{
		/* Objet attaqu� */
		$Elements[] = array(
			"nom" => $Rapport['objet'],
			"contenu" => $Rapport['nom']." (".$Rapport['numero'].")"
			);
		}
	
	/* Position */
	$Elements[] = array(
		"nom" => "Position",
		"contenu" => $Rapport['position']
		);
	
	/* Secteur */
	$Elements[] = array(
		"nom" => "Secteur",
		"contenu" => $Rapport['secteur']
		);
	
	/* Unit�s initiales */
	if (isset($Rapport['lui']))
		{
		$Unites = "";
		foreach($Rapport['lui'] as $U => $V)	{ $Unites .= "#".$V['id'].", "; }
		$Elements[] = array(
			"nom" => "Unit�s",
			"contenu" => substr($Unites,0,-2)
			);
		}
	
	/* Unit�s restantes */
	$Restants = FALSE;
	if (isset($Rapport['lui']))
		{
		foreach($Rapport['lui'] as $U => $V)
			{
			if (!isset($V['reste']))
				{
				/* Nombre d'unit�s inconnu */
				$Restants = TRUE;
				$Elements[] = array(
					"nom" => "Restent",
					"contenu" => $U." (#".$V['id'].")"
					);
				}
			else if ($V['reste'] > 0)
				{
				/* Nombre d'unit�s connu */
				$Restants = TRUE;
				$Elements[] = array(
					"nom" => "Restent",
					"contenu" => number_format($V['reste'], 0, $Dec, $Mil)." ".$U." (#".$V['id'].")"
					);
				}
			}
		}
	
	/* Puissance restante */
	if ($Restants)
		{
		if (preg_match("#^[0-9]+$#", $_POST['puissance']))
			{
			/* Puissance fournie */
			$Elements[] = array(
				"nom" => "Puissance",
				"contenu" => number_format($_POST['puissance'], 0, $Dec, $Mil)
				);
			}
		else if ($Rapport['inconnu'])
			{
			/* Puissance inconnue */
			$Elements[] = array(
				"nom" => "Puissance",
				"contenu" => "inconnue"
				);
			}
		else
			{
			/* Puissance approximative */
			$Elements[] = array(
				"nom" => "Puissance",
				"contenu" => "~ ".round($Rapport['puissance']/1000000,1)."M"
				);
			$GLOBALS['dialogues'][] = array("type" => "confirmation", "message" => "Puissance incorrecte, approximation utilis�e");
			}
		}
	
	/* Puissance � vide */
	$Elements[] = array(
		"nom" => "PAV",
		"contenu" => $Rapport['planetes']." plan�tes et ".number_format($Rapport['parsecs'], 0, $Dec, $Mil)." parsecs"
		);
	
	/* D�gats */
	if (isset($Rapport['lui']))
		{
		$Degats = 0; foreach($Rapport['lui'] as $V) { $Degats += $V['pertes']; }
		$Elements[] = array(
			"nom" => "D�gats",
			"contenu" => round($Degats,2)." tours"
			);
		}
	
	/* Pertes */
	if (isset($Rapport['moi']))
		{
		$Pertes = 0; foreach($Rapport['moi'] as $V) { $Pertes += $V['pertes']; }
		$Elements[] = array(
			"nom" => "Pertes",
			"contenu" => round($Pertes,2)." tours"
			);
		}
	
	/* Passagers */
	$VIP = fonction("vip");
	if (isset($Rapport['VIP_allie']))
		{
		foreach($Rapport['VIP_allie'] as $V)
			{
			$Elements[] = array(
				"nom" => "VIP alli�",
				"contenu" => $V." <span class='".$VIP[$V]['clan']."'>(T".$VIP[$V]['T'].")</span>"
				);
			}
		}
	if (isset($Rapport['VIP_ennemi']))
		{
		foreach($Rapport['VIP_ennemi'] as $V)
			{
			$Elements[] = array(
				"nom" => "VIP ennemi",
				"contenu" => $V." <span class='".$VIP[$V]['clan']."'>(T".$VIP[$V]['T'].")</span>"
				);
			}
		}

	/* Tours jou�s */
	if (isset($Rapport['tours']))
		{
		$Elements[] = array(
			"nom" => "Tours jou�s",
			"contenu" => $Rapport['tours']
			);
		}
	
	/* Sortie */
	return $Elements;
	}

?>
