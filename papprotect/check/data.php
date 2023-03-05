<?php 
//===== Les includes des fichiers externes
$base_dir = __DIR__ . "/papprotect/"; // Initialiser la variable $base_dir avec le chemin du répertoire racine de l'application
if (file_exists($base_dir . "bad_bots.php")) {
  require_once($base_dir . "bad_bots.php");
} else {
  die("Veuillez placer les fichiers dans le répertoire papprotect!");
}
//==========
?>
