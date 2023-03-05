<?php 
//===== Les includes des fichiers externes
$base_dir = "papprotect/bad_bots.php"; // Ajouter cette ligne pour initialiser la variable $base_dir
if (file_exists($base_dir . "papprotect/bad_bots.php")) {
  require_once($base_dir . "papprotect/bad_bots.php");
} else {
  die("Veuillez placer les fichiers dans le répertoire papprotect!");
}
//==========
?>
