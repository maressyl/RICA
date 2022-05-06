<?php

// Convertit un X ou un Y en coordonn�es dans l'image en respectant les marges, dimensions et limites
// - Array : array de classe GD
// - Val : vecteur de valeurs brutes
// - Type : "X" ou "Y" d�finissant les param�tres � utiliser

function gd_coord($Array, $Val, $Type)
	{
	if (isset($Array['limites'][ $Type."min" ]) AND isset($Array['limites'][ $Type."max" ]))
		{
		/* Inverser l'axe Y */
		if ($Array['inverser'] AND $Type == "Y")
			{ $Val = $Array['limites']['Ymax'] - $Val; }
		
		/* Centr� r�duit */
		$Srt = ($Val - $Array['limites'][ $Type."min" ]) / ($Array['limites'][ $Type."max" ] - $Array['limites'][ $Type."min" ]);
		
		/* Elargi � la surface plotable */
		$Srt *= ( $Array['dimensions'][ $Type ] - $Array['marges'][ $Type."1" ] - $Array['inners'][ $Type ] - $Array['marges'][ $Type."2" ] );
		
		/* D�cal� par la marge */
		$Srt += $Array['marges'][ $Type."1" ];
		
		/* D�cal� par l'inner sauf en Y invers� */
		if (!$Array['inverser'] OR $Type == "X")
			{ $Srt += $Array['inners'][ $Type ]; }
		
		return round($Srt);
		}
	else { die("Conversion impossible sans que les limites ne soient d�finies"); }
	}

?>
