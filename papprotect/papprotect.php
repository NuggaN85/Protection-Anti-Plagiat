<?php
//===== Récuperation des fichiers externe.
if (file_exists($base_dir.'papprotect')) {
  require ($base_dir.'check/data.php');
} else {
  die('S\'il vous plaît mettre les fichiers dans le répertoire papprotect !');
}
//==========
//===== Récuperation des ip v4 & v6 du client.
function getip() {
    $client  = getenv('HTTP_CLIENT_IP');
    $forward = getenv('HTTP_X_FORWARDED_FOR');
    $remote  = getenv('REMOTE_ADDR');
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    return $ip;
}
//==========
//===== Récuperation du port et du host.
   $up = getenv('REMOTE_PORT');
   $ra = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//==========
//===== Donnée des attaques de bot aspirateur.
   $ua = getenv('HTTP_USER_AGENT');
   $sf = getenv('SCRIPT_FILENAME');
   $sn = getenv('SERVER_NAME');
// Liste des aspirateurs en fichier externe 'bad_bots.php'. 
   if (in_array ($ua, $bad_bots) === true) { die(); }
   foreach ($bad_bots as $banned) { $comparaison = strstr($ua, $banned);
       if($comparaison !== false) {
           $tentative++;
       }
   }
//==========
//===== Récuperation des infos avec fichier auto écrit.
   if($tentative > 0) {
   if (!function_exists('file_put_contents')) {
       function file_put_contents($files) {  
       } 
   }         
// Fichier cnx auto inclus a la racine avec le papprotect.php.
   $files = fopen($base_dir."papprotect/papprotect-log.cnx", "a");
// Le texte que vous voulez avoir dans votre fichier papprotect-log.cnx.
   $log = ('['.$ua.'] ['.getip().'] ['.$up.'] ['.$ra.']');
   fputs($files, "\n" . $log);
   flock($files, LOCK_SH);
   fclose($files);
// Le texte que vous voulez que le voleur recevra dans les fichiers télécharger.
   echo '<div style="text-align: center;"><img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67" border="0" /></div> ';	
   echo '<br><br>';
   echo utf8_decode('<div style="width: 100%; text-align: center; font-weight: bold">[Site web est protégé, vos information sont enregistrés] <br><br>'.$ua.' <br><br>IP CLIENT : '.getip().' <br><br>PORT CLIENT : '.$up.' <br><br>HOST CLIENT : '.$ra.'
   </div>');
   echo '<br><br>';
   echo utf8_decode('<div style="width: 100%; text-align: center; font-weight: bold">[Website is protected, your information is recorded] <br><br>'.$ua.' <br><br>IP CLIENT : '.getip().' <br><br>PORT CLIENT : '.$up.' <br><br>HOST CLIENT : '.$ra.'
   </div>');
//==========
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
   $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
   $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
   $headers .= 'From: "papprotect.com"<'.$expediteur.'>'."\n"; // Expediteur
   $headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
   $headers .= 'Cc: '.$copie."\n"; // Copie Cc
   $headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc
   $message = '<div style="width: 100%; text-align: center; font-weight: bold"><img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67"><br><br>
   SUR VOTRE SITEWEB : '.$sn.' <br><br>FICHIER ATTAQUER : '.$sf.' <br><br>'.$ua.' <br><br>IP CLIENT : '.getip().' <br><br>PORT CLIENT : '.$up.' <br><br>HOST CLIENT : '.$ra.'
   <br><br><br>POUR PLUS AVOIR DE SOUCI VEUILLEZ BLOQUER LE CLIENT DANS LA BLACKLIST DE VOTRE SERVEUR.<br><br>
   <b><a href="https://github.com/NuggaN85/Protection-Anti-Plagiat/issues">Un bug? une suggestion?</a></b></div>';
//==========   
   if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
//==========
      die(); } 
?>
