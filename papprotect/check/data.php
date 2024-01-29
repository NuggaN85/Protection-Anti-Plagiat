<?php 
//===== Inclure les fichiers externes
// Initialisez la variable $base_dir avec le chemin du répertoire racine de l'application
$base_dir = __DIR__ . DIRECTORY_SEPARATOR . "papprotect" . DIRECTORY_SEPARATOR;

// Utilisez la constante DIRECTORY_SEPARATOR pour garantir la portabilité des chemins
$bad_bots_file = $base_dir . "bad_bots.php";

// Utilisez la fonction include_once() au lieu de require_once() si la non-existence du fichier n'est pas critique
if (file_exists($bad_bots_file)) {
  include_once $bad_bots_file;
} else {
  // Utilisez exit() au lieu de die() pour une gestion plus souple des erreurs
  exit("Veuillez placer les fichiers dans le répertoire papprotect!");
}
//==========
?>
