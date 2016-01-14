<?php
//===== Récuperation des fichiers externe.
require($base_dir.'check/data.php');
//==========

//===== Récuperation des ip v4 & v6 du client.
function getip() {
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

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
$uh = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//==========

//===== Donnée des attaques de bot aspirateur.
$ua = getenv('HTTP_USER_AGENT'); 
if(in_array("$ua",$bannav)){ die(); } // Liste des aspirateurs en fichier externe 'bannav.php'.
foreach ($bannav as $banned) { $comparaison = strstr($ua,$banned);
    if($comparaison!==false) {
        $tentative++;
    }
}
//==========

//===== Récuperation des infos avec fichier auto écrit.
if($tentative > 0){
   $files = fopen("papprotect-log.cnx", "a"); // Fichier cnx auto inclus a la racine avec le protectionantiplagiat.php.
   $log = ('['.$ua.'] ['.getip().'] ['.$up.'] ['.$uh.']'); // Le texte que vous voulez avoir dans votre fichier protectionantiplagiat.cnx.
   fputs($files, "\n" . $log);
   flock($files, LOCK_SH);
   fclose($files);
   echo utf8_decode('[Sécurité] Notre site web est protégé, vos information sont enregistrer <br><br>[Information] : '.$ua.' '.getip().''); // Le texte que vous voulez que le voleur recevra dans les fichiers télécharger.
//==========

   die(); } 

?>
