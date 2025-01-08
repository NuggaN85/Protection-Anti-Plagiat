<?php
//===== Inclure les fichiers externes

// Initialisez la variable $base_dir avec le chemin du répertoire racine de l'application
$base_dir = __DIR__ . DIRECTORY_SEPARATOR . "papprotect" . DIRECTORY_SEPARATOR;

// Utilisez la constante DIRECTORY_SEPARATOR pour garantir la portabilité des chemins
$bad_bots_file = $base_dir . "bad_bots.php";

// Utilisez require_once() pour inclure le fichier bad_bots.php et arrêter l'exécution si le fichier n'existe pas
if (!file_exists($bad_bots_file)) {
    exit("Le fichier bad_bots.php est manquant dans le répertoire papprotect!");
}
require_once $bad_bots_file;

// Ajouter une vérification pour s'assurer que $bad_bots est défini et est un tableau
if (!isset($bad_bots) || !is_array($bad_bots)) {
    exit("Le fichier bad_bots.php n'a pas été inclus correctement ou ne contient pas de tableau valide.");
}

// Continuez avec les opérations de détection de bots ici...

?>
