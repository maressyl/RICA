<?php

function header_combat($Pages)
	{
	/* Visibilit� */
	if (isset($Pages['combat']['class']))	{ $Display = ""; }
	else								{ $Display = " style=\"display: none\""; }
	
	/* Affichage */
	$Header = "
		<form action=\"index.php?P=recherche\" method=\"post\" id=\"form_combat\"".$Display.">
			<input type=\"submit\" class=\"submit\" value=\"Ajouter\">
			Date : <input type=\"text\" class=\"date\" name=\"date\">
			Puissance : <input type=\"text\" id=\"puissance\" name=\"puissance\">
			<textarea name=\"combat\" id=\"txt_combat\" rows=1 cols=10 onKeyDown=\"touche(event, 'combat')\"></textarea>
			<p>Copiez le texte complet du rapport (attaque ou d�fense, plan�te ou flotte, peu importe) et collez le ici. Si vous n'entrez pas la puissance restante de la cible, une approximation sera calcul�e � partir des unit�s restantes. Si la date n'est pas renseign�e (aaaa-mm-jj hh:nn(:ss)) la date actuelle sera utilis�e.</p>
		</form>";
	
	return $Header;
	}

?>
