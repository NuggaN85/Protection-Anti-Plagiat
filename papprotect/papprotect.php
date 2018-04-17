<?php
//===== Récuperation des fichiers externe.
if (file_exists($base_dir.'papprotect')) {
  require_once ($base_dir.'check/data.php');
} else {
  echo utf8_encode('S\'il vous plaît mettre les fichiers dans le répertoire papprotect!');
      exit(1); } 
//==========
//===== Récuperation des ip v4, v6 & cloud du client.
function getUserIP()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
    {
        if (array_key_exists($key, $_SERVER) === true)
        {
            foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
            {
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                {
                    return $ip;
                }
            }
        }
    }
}
//==========
//===== Récuperation du port et du host.
   $up = getenv('REMOTE_PORT');
   $ra = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//==========
//===== Donnée des attaques de bot aspirateur.
   $ss = getenv('SERVER_SOFTWARE');
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
// Fichier papprotect-log.cnx auto inclus a la racine du dossier papprotect. 
   $files = fopen($base_dir."papprotect/papprotect-log.cnx", "a");
// Le texte que vous voulez avoir dans votre fichier papprotect-log.cnx.
   $log = ('['.$ua.'] ['.getUserIP().'] ['.$up.'] ['.$ra.'] ['.$ss.']');
   fputs($files, "\n" . $log);
   flock($files, LOCK_SH);
   fclose($files);
// Le texte que vous voulez que le voleur recevra dans les fichiers télécharger.
   echo '<div style="text-align: center;"><img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67" border="0" /></div> ';    
   echo '<br><br>';
   echo utf8_encode('<div style="width: 100%; text-align: center; font-weight: bold">[Site web est protégé, vos information sont enregistrés] <br><br>'.$ua.' <br><br>IP CLIENT : '.getUserIP().' <br><br>PORT CLIENT : '.$up.' <br><br>HOST CLIENT : '.$ra.'
   </div>');
   echo '<br><br>';
   echo utf8_encode('<div style="width: 100%; text-align: center; font-weight: bold">[Website is protected, your information is recorded] <br><br>'.$ua.' <br><br>IP CLIENT : '.getUserIP().' <br><br>PORT CLIENT : '.$up.' <br><br>HOST CLIENT : '.$ra.'
   </div>');
//==========
      exit(1); } 
?>
