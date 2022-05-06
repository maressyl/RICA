<?php

function interval($T, $T0="actuel")
	{
	/* R�f�rence actuelle di non fournie */
	if ($T0 == "actuel")	{ $T0 = time(); }
	
	/* Interval en secondes */
	$i = abs($T - $T0);
	
	/* Unit�s */
	$Durees = array(60, 60, 24, 30.4375, 12, 100, 1000);
	$Nom  = array("seconde", "minute", "heure", "jour", "mois", "ans", "si�cle", "mill�naire");
	$Noms = array("secondes", "minutes", "heures", "jours", "mois", "ans", "si�cles", "mill�naires");
	
	/* Choix de l'unit� */
	$Borne = $Durees[0];
	$U=0; while($i >= $Borne AND isset($Durees[$U+1]))	{ $Borne *= $Durees[$U+1]; $U++; }
	
	/* Conversion */
	$Tmp = round($i/$Borne*$Durees[$U]);
	if ($Tmp == 1)	{ return $Tmp." ".$Nom[$U]; }
	else			{ return $Tmp." ".$Noms[$U]; }
	}

?>
