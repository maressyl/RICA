<?php

function header_carte($Pages)
	{
	/* Visibilit� */
	if (isset($Pages['carte']['class']))	{ $Display = ""; }
	else									{ $Display = " style=\"display: none\""; }
	
	/* Affichage */
	$Header = "
		<form action=\"index.php?P=recherche\" method=\"post\" id=\"form_carte\"".$Display.">
			<input type=\"submit\" class=\"submit\" value=\"Ajouter\" id=\"envoyer\">
			Date : <input type=\"text\" class=\"date\" name=\"date\">
			<textarea name=\"carte\" rows=1 cols=10 onKeyDown=\"touche(event, 'carte')\" id=\"txt_date\"></textarea>
			<p>Copiez le code HTML (ou \"Code source\") d'une page de SWING o� se trouve une carte d�taill�e (vue de flotte ou de plan�te) et collez le ici. Avec Firefox : Ctrl+U, Ctrl+A, Ctrl+C puis Ctrl+V sur le formulaire de cette page. Si la date n'est pas renseign�e (aaaa-mm-jj hh:nn(:ss)) la date actuelle sera utilis�e.</p>
		</form>";
	
	return $Header;
	}

?>
