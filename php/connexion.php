<?php

function connexion($Identite, $Pass)
	{
	$Test = fonction("SQL", array("SELECT pass FROM inscrits WHERE IDs=\"".$Identite."\"",__LINE__,"VAL",__FILE__));
	if ($Test != "")
		{
		if ($Test == $Pass)
			{
			$Info = fonction("SQL", array("SELECT * FROM classement WHERE IDs=\"".$Identite."\"",__LINE__,"ARR",__FILE__));
			if (is_array($Info))
				{
				/* Auto-connexion */
				if (isset($_POST['auto']))
					{ fonction("cookie", array("connexionAuto", $Identite."-".$Pass)); }
			
				$_SESSION['pseudo'] = $Info['pseudo'];
				$_SESSION['identite'] = $Identite;
				$_SESSION['clan'] = $Info['clan'];
				$_SESSION['connecte'] = time();
			
				$GLOBALS['dialogues'][] = array("type" => "confirmation", "message" => "Connexion au r�seau RICA r�ussie");
				}
			else { $GLOBALS['dialogues'][] = array("type" => "erreur", "message" => "Vous n'�tes pas dans le classement"); }
			}
		else { $GLOBALS['dialogues'][] = array("type" => "erreur", "message" => "Mot de passe incorrect"); }
		}
	else { $GLOBALS['dialogues'][] = array("type" => "erreur", "message" => "Cette identit� n'est pas activ�e"); }
	}

?>
