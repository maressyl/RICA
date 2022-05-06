<?php

function header_recherche($Pages)
	{
	/* Favoris */
	if ($GLOBALS['recherche'] != "")
		{
		$URL = "R=".urlencode($GLOBALS['recherche']);
		if ($GLOBALS['grouper'])			{ $URL .= "&amp;G=1"; } else { $URL .= "&amp;G=0"; }
		if ($GLOBALS['limite'] !== FALSE)	{ $URL .= "&amp;L=".urlencode($GLOBALS['limite']); }
		if ($GLOBALS['heures'])				{ $URL .= "&amp;T=heures"; }
		else if ($GLOBALS['jours'])			{ $URL .= "&amp;T=jours"; }
		if ($GLOBALS['sortie'] !== FALSE)	{ $URL .= "&amp;S=".urlencode($GLOBALS['sortie']); }
		
		$Favoris = "<a href=\"index.php?".$URL."\" title=\"Lien permanent vers cette recherche\">";
		$Favoris .= "<img src=\"images/Save.png\" alt=\"S\"></a>";
		}
	else { $Favoris = "<img src=\"images/Nosave.png\" alt=\"S\" title=\"Aucune recherche � enregistrer\" style=\"cursor: not-allowed\">"; }
	
	/* Visibilit� */
	if (isset($Pages['recherche']['class']))	{ $Display = ""; }
	else										{ $Display = " style=\"display: none\""; }
	
	/* Secteurs */
	$Secteurs = "";
	$X = array(25, 75, 125, 175, 225);
	$Y = array(25, 75, 125, 175, 225);
	foreach($X as $x)
		{
		foreach($Y as $y)
			{
			$S = fonction("secteur", array($x, $y, TRUE, FALSE));
			$Secteurs .= "\t\t\t\t\t<option value=\"Secteur : ".$S."\">".$S."\n";
			}
		}
	
	/* Passagers */
	$Passagers = "";
	$VIP = fonction("vip");
	foreach($VIP as $Nom => $Val)
		{ $Passagers .= "\t\t\t\t\t<option value=\"".$Nom."\" class=\"".$Val['clan']."\">".$Nom." (T".$Val['T'].")\n"; }
	
	/* Formulaires selections */
	$Form = array();
	if ($GLOBALS['grouper'])	{ $Form['grouper'] = " checked"; }	else { $Form['grouper'] = ""; }
	if ($GLOBALS['heures'])		{ $Form['heures'] = " selected"; }	else { $Form['heures'] = ""; }
	if ($GLOBALS['jours'])		{ $Form['jours'] = " selected"; }	else { $Form['jours'] = ""; }
	
	/* Affichage */
	$Header = "
		<form action=\"index.php?P=recherche\" method=\"post\" id=\"form_recherche\"".$Display.">
			<input type=\"submit\" class=\"submit\" value=\"Rechercher\" name=\"rechercher\">
			<input type=\"submit\" class=\"submit\" value=\"BBCode\" name=\"rechercher\">
			".$Favoris."
			<img src=\"images/Reset.png\" alt=\"R\" title=\"Vider le champs\" onClick=\"Vider('txt_recherche')\">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Limiter � : <input type=\"text\" name=\"limite\" id=\"limite\" value=\"".$GLOBALS['limite']."\">
			<select name=\"limite_type\" id=\"limite_type\">
				<option>
				<option".$Form['heures'].">heures
				<option".$Form['jours'].">jours
			</select>
			<br>
			<textarea name=\"recherche\" rows=1 cols=1 id=\"txt_recherche\" onKeyDown=\"entree(event, 'form_recherche')\">".$GLOBALS['recherche']."</textarea>
			<select onChange=\"Ajouter(this.value, 'txt_recherche')\" onClick=\"selectJoueur(this, 'recherche')\"><option value=\"NULL\">Ajouter un pseudo</select>
			<select onChange=\"Ajouter(this.value, 'txt_recherche')\"><option value=\"NULL\">Ajouter un mot cl�
				<optgroup label=\"Type d'entr�e\">
					<option value=\"Type : Rapport\">Rapport
					<option value=\"Type : Rapport d'attaque\">Rapport d'attaque
					<option value=\"Type : Rapport de d�fense\">Rapport de d�fense
					<option value=\"Type : Carte d�taill�e\">Carte d�taill�e
					<option value=\"Type : Memo\">Memo
				</optgroup>
				<optgroup label=\"Type de cible\">
					<option value=\"Flotte :\">Flotte
					<option value=\"Plan�te :\">Plan�te
					<option value=\"Centre d'influence :\">Centre d'influence
				</optgroup>
				<optgroup label=\"Condition de victoire\">
					<option value=\"Centre d'influence :\">Centre d'influence
					<option value=\"Hoth (P30)\">Hoth - Plan�te
					<option value=\"Secteur : Hoth ~\">Hoth - Ceintures
					<option value=\"Coruscant (P19)\">Coruscant - Plan�te
					<option value=\"Secteur : Coruscant ~\">Coruscant - Ceintures
					<option>VIP
					<option>VIP alli�
					<option>VIP ennemi
				</optgroup>
				<optgroup label=\"Clan de l'adversaire\">
					<option value=\"Clan : Contrebande\">Contrebande
					<option value=\"Clan : Empire\">Empire
					<option value=\"Clan : Rebellion\">Rebellion
				</optgroup>
				<optgroup label=\"Secteur\">
					".$Secteurs."
				</optgroup>
				<optgroup label=\"Passager\">
					".$Passagers."
				</optgroup>
			</select>
			&nbsp;&nbsp;&nbsp; Grouper par cible : <input type=\"checkbox\" name=\"grouper\"".$Form['grouper']."><br>
			<p>S�parez les mots cl�s par des <span class=\"clef\">+</span>, tous devront �tre pr�sents dans chaque r�sultat. Utilisez les menu d�roulants pour ajouter facilement certains mots cl�s. Placez un <span class=\"clef\">!</span> devant un mot cl� pour �liminer les r�sultats qui le contiennent. La recherche n'est sensible ni aux majuscules ni aux accents. Vous pouvez utiliser la touche <span class=\"clef\">Entr�e</span> pour valider la recherche.</p>
		</form>";
	
	return $Header;
	}

?>
