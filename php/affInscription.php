<?php

function affInscription()
	{
	/* Connexion */
	$Texte = "
		<div id=\"body\" class=\"texte\">

			<form action=\"\" method=\"post\">

				<a class=\"chapitre\">1. Choisissez votre identit�</a>
				<p>Votre compte RICA sera li� � votre compte SWING, choisissez son pseudo dans la liste suivante. Cette liste est tenue � jour � partir du classement, il y a donc un d�lai entre votre (r�)inscription sur SWING et la disponibilit� de votre pseudo dans cette liste. Si l'absence de votre pseudo persiste plus de 24h, contactez un administrateur.<br>
				<br>
				<select name=\"identite\" onClick=\"selectJoueur(this, 'ids')\"><option value=\"\">Votre pseudo SWING</select></p>

				<br>

				<a class=\"chapitre\">2. Confirmez votre identit�</a>
				<p>Afin de prouver votre identit� et d'attribuer un mot de passe � votre compte RICA, vous devez placer la phrase suivante dans la description de votre compte SWING (Divers / Options / Votre description) : <span class=\"clef\">Membre du R�seau RICA</span>. Votre clan sera d�termin� automatiquement, et une mise � jour de vos acc�s sera effectu�e r�guli�rement, y compris en d�but de partie o� vous n'aurez donc pas � vous r�inscrire.</p>

				<br>

				<a class=\"chapitre\">3. Choisissez un mot de passe</a>
				<p>Ce mot de passe vous sera demand� � chaque connexion au R�seau RICA. Pr�f�rez des mots de passe longs (plus de 6 caract�res), qui contiennent des caract�res inhabituels (chiffres, majuscules, ponctuation ...). Evitez �galement d'utiliser le m�me mot de passe que pour SWING. Ce sont les renseignement de tout votre clan qui sont en jeu !<br>
				<br>
				<input name=\"pass\" type=\"password\"></p>

				<br>

				<a class=\"chapitre\">4. Jettez un oeil � l'Aide</a>
				<p>M�me si beaucoup d'efforts ont �t� faits pour rendre l'utilisation du R�seau aussi simple que possible, il vous est vivement conseill� de lire le paragraphe <span class=\"clef\">Aide rapide</span> de la page d'aide (onglet au milieu � droite). N'h�sitez pas � lire les autres paragraphes pour une utilisation avanc�e de cet outil.</p>

				<br>

				<a class=\"chapitre\">5. <input name=\"inscription\" type=\"submit\" class=\"submit\" value=\"Terminer l'inscription\"></a>

			</form>
	
		</div>";
	
	return $Texte;
	}

?>
