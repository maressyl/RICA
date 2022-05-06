<?php

function rechercher()
	{
	/* Recherche */
	if (isset($_POST['recherche']))	{ $Recherche = stripslashes($_POST['recherche']); }
	elseif (isset($_GET['R']))		{ $Recherche = stripslashes($_GET['R']); }
	else							{ $Recherche = ""; }
	$Recherche = preg_replace("#^\s+#", "", $Recherche);
	$Recherche = preg_replace("#\s+$#", "", $Recherche);
	
	if (strlen($Recherche) <= 100)
		{
		/* Mots cl�s */
		$Mots = array();
		if ($Recherche != "")
			{
			foreach(preg_split("# ?\+ ?#", $Recherche) as $M)
				{
				$Mot = fonction("signes", array($M));
				if ($Mot != "") { $Mots[] = $Mot; }
				}
			}
		$GLOBALS['mots'] = $Mots;
		$GLOBALS['recherche'] = $Recherche;
		}
	else { $GLOBALS['dialogues'][] = array("type" => "erreur", "message" => "Les recherches sont limit�es � 100 caract�res"); }
	}

?>
