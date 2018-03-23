<?php
//Systeme de notification part Email.
   if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $destinataire)) // On filtre les serveurs qui rencontrent des bogues.
//==========   
   $destinataire = 'VOTRE EMAIL ICI'; // Mettre un Email crée via votre panel exemple (papprotect@papprotect.com).
   function isValidEmail($destinataire){ 
      return filter_var($destinataire, FILTER_VALIDATE_EMAIL) !== false;
}  
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
   $expediteur = 'noreply@papprotect.com';
   $copie = 'noreply@papprotect.com';
   $copie_cachee = 'noreply@papprotect.com';
   $objet = '[INFORMATION]'; // Objet du message
   $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
   $headers .= 'Content-type: text/html; charset=utf-8'."\n"; // l'en-tete Content-type pour le format HTML
   $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
   $headers .= 'From: "papprotect.com"<'.$expediteur.'>'."\n"; // Expediteur
   $headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
   $headers .= 'Cc: '.$copie."\n"; // Copie Cc
   $headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc
   $message = '<div style="width: 100%; text-align: center; font-weight: bold"><img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67"><br><br>
   SUR VOTRE SITEWEB : '.$sn.' <br><br>FICHIER ATTAQUER : '.$sf.' <br><br>'.$ua.' <br><br>IP CLIENT : '.getUserIP().' <br><br>PORT CLIENT : '.$up.' <br><br>HOST CLIENT : '.$ra.'
   <br><br><br>POUR PLUS AVOIR DE SOUCI VEUILLEZ BLOQUER LE CLIENT DANS LA BLACKLIST DE VOTRE SERVEUR.<br><br>
   <b><a href="https://github.com/NuggaN85/Protection-Anti-Plagiat/issues">Un bug? une suggestion?</a></b></div>';
//==========   
   if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
//==========
?>
