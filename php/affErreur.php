<?php

function affErreur()
	{
	$Texte = "
		<div id=\"body\">
			<a class=\"chapitre\">Une erreur est survenue</a><br>
			<br>
			<p>L'op�ration que vous avez effectu� a entrain� une erreur. Merci de contacter un administrateur et de lui expliquer les circonstances de cette erreur afin qu'elle ne se reproduise pas � l'avenir. Fournissez suffisament de d�tails pour que l'erreur puisse �tre reproduite, dont notamment toute donn�e que vous auriez pu envoyer (rapport de combat, source HTML d'une carte ...).<br>
			<br>
			D�sol� pour ce d�sagr�ment</p>
		</div>";
	
	return $Texte;
	}
