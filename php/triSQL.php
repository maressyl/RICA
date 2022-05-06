<?php

function triSQL( $Data, $Criteres, $Sens, $Types=array() )
	{
	if ($Data != array())
		{
		/* V�rifications */
		if (!is_array($Data) OR !is_array($Criteres) OR !is_array($Sens) OR !is_array($Types))
			{ exit("triSQL : tous les arguments doivent �tre des arrays"); }
		if (count($Criteres) != count($Sens))
			{ exit("triSQL : longueurs des crit�res (".count($Criteres).") et sens (".count($Sens).") incompatibles"); }
		if ($Types != array() AND count($Sens) != count($Types))
			{ exit("triSQL : longueurs des sens (".count($Sens).") et types (".count($Types).") incompatibles"); }
		foreach($Criteres as $C)
			{ if (!array_key_exists($C, $Data[0]))	{ exit("triSQL : crit�re \"".$C."\" introuvable"); } }

		/* Transposition de Data */
		$Colonnes = array();	
		foreach($Data as $I => $L)
			{
			foreach($Criteres as $C)
				{
				$Colonnes[ $C ][ $I ]  = $L[ $C ];
				}
			}

		/* Construction de l'appel */
		$Eval = "array_multisort( ";
		$N=0; while(isset($Criteres[$N]))
			{
			$Eval .= "\$Colonnes[\"".$Criteres[$N]."\"], SORT_".$Sens[$N].", ";
			if (isset($Types[$N]))	{ $Eval .= "SORT_".$Types[$N].", "; }
			$N++;
			}
		$Eval = substr($Eval, 0, -2).", \$Data );";
	
		/* Execution */
		eval($Eval);
		}

	return $Data;
	}

?>
