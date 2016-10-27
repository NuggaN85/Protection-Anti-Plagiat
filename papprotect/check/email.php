<?php
//==========
$destinataire = 'VOTRE EMAIL';
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = 'noreply@papprotect.com';
$copie = 'papprotect@pap.com';
$copie_cachee = 'papprotect@pap.com';
$objet = '[PAPPROTECT]'; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "noreply@papprotect.com"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
$message = '<div style="width: 100%; text-align: center; font-weight: bold">[INFORMATION CLIENT] <br><br>".$ua." <br><br>IP CLIENT : ".getip()." <br><br>PORT CLIENT : ".$up." <br><br>HOST CLIENT : ".$uh."
<br><br><br>POUR PLUS AVOIR DE SOUCI VEUILLEZ BLOQUER LE CLIENT DANS LA BLACKLIST.</div>';
if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
//==========
	
// On filtre les serveurs qui rencontrent des bogues
function verifEmail ($destinataire) {
    if (filter_var ($destinataire, FILTER_VALIDATE_EMAIL) === false) {
        return false;
    } else {
        return true;
    }
}
?>
