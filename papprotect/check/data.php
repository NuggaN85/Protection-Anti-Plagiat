<?php 
//===== Inclure les fichiers externes
$base_dir = __DIR__ . "/papprotect/"; // Initialisez la variable $base_dir avec le chemin du répertoire racine de l'application

// Vérifiez si le fichier bad_bots.php existe avant de l'inclure
$bad_bots_file = $base_dir . "bad_bots.php";
if (file_exists($bad_bots_file)) {
  require_once($bad_bots_file);
} else {
  die("Veuillez placer les fichiers dans le répertoire papprotect!");
}
//==========
?>
