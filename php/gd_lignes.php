<?php

// Joint les points d�finis par les coordonn�es X / Y
// - Array : array de classe GD
// - X, Y : arrays de valeurs brutes parall�les
// - LabelCouleur : index de la couleur lors de la cr�ation

function gd_lignes($Array, $X, $Y, $LabelCouleur)
	{
	$I=1; while(isset($X[$I]) AND isset($Y[$I]))
		{
		/* Coordonn�es converties */
		$X1 = fonction("gd_coord", array($Array, $X[$I-1], "X"));
		$Y1 = fonction("gd_coord", array($Array, $Y[$I-1], "Y"));
		$X2 = fonction("gd_coord", array($Array, $X[$I], "X"));
		$Y2 = fonction("gd_coord", array($Array, $Y[$I], "Y"));
		
		/* Rejoint les points */
		imageline($Array['image'],
			$X1,
			$Y1,
			$X2,
			$Y2,
			$Array['couleurs'][ $LabelCouleur ]
			);
		$I++;
		}
	
	return $Array;
	}

?>
