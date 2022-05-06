<?php

function affStats()
	{
	$Sortie = "\n\t\t<div id=\"body\">";
	
	/* R�cup�ration */
	$Images = array();
	$Dossier = opendir("statistiques");
	while($Image = readdir($Dossier))
		{ if (preg_match("#\.png$#", $Image)) { $Images[] = $Image; } }
	sort($Images);
	
	$Sortie .= "<a href=\"statistiques/RICA_Statistiques.txt\" target=\"_blank\">Donn�es brutes au format TXT</a><br>";
	$Sortie .= "<br>";
	
	/* Affichage */
	foreach($Images as $I)
		{ $Sortie .= "<img src=\"statistiques/".$I."\" alt=\"".preg_replace("#\.png#", "", $I)."\"><br><br>"; }
	
	/* Coordonn�es */
	$Hoth = fonction("SQL", array("SELECT valeur FROM informations WHERE nom='hoth'", __LINE__,"VAL",__FILE__));
	$Coru = fonction("SQL", array("SELECT valeur FROM informations WHERE nom='coruscant'", __LINE__,"VAL",__FILE__));
	
	/* L�gende */
	$Sortie .= "<span class=\"clef\">Entr�es :</span> Rapports, Cartes ou Memo post�s sur RICA sans distinction<br>";
	$Sortie .= "<span class=\"clef\">Flottes Coru :</span> Flottes � 5 cases ou moins de ".$Coru." selon la carte de la galaxie<br>";
	$Sortie .= "<span class=\"clef\">Flottes Hoth :</span> Flottes � 5 cases ou moins de ".$Hoth." selon la carte de la galaxie<br>";
	$Sortie .= "<span class=\"clef\">SWING Actifs :</span> Plus de 5000 parsecs ou niveau sup�rieur � 0<br>";
	$Sortie .= "<span class=\"clef\">RICA Actifs :</span> Joueurs avec au moins une entr�e post�e ces 8 derniers jours<br>";
	$Sortie .= "<br>";
	$Sortie .= "Donn�es collect�es � 0h, 8h et 16h chaque jour.<br>";
	$Sortie .= "La couleur noire correspond aux comptes supprim�s.<br>";
	$Sortie .= "\n\t\t</div>";
	
	return $Sortie;
	}

?>
