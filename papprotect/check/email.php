<?php
$mail = 'VOTRE EMAIL'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format html.
$message_html = "[INFORMATION CLIENT] <br><br>".$ua." <br><br>IP CLIENT : ".getip()." <br><br>PORT CLIENT : ".$up." <br><br>HOST CLIENT : ".$uh."
<br><br><br>POUR PLUS AVOIR DE SOUCI VEUILLEZ BLOQUER LE CLIENT DANS LA BLACKLIST.";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "[papprotect]";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"PAP.COM\"<noreply@protection-anti-plagiat.com>".$passage_ligne;
$header.= "Reply-to: \"PAP.COM\" <noreply@protection-anti-plagiat.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
if(mail($mail,$sujet,$message,$header))
//==========
?>
