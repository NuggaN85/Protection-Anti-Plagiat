<?php
// Désactiver l'affichage des erreurs à l'utilisateur, mais enregistrer les erreurs dans un fichier de log
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/php-error.log'); // Remplacez ceci par le chemin réel de votre fichier de log
error_reporting(E_ALL);
set_time_limit(0);

echo '<pre>';
echo '<span style="color:blue">TÉLÉCHARGEMENT...</span>' . PHP_EOL;

// Téléchargement du fichier.
$fileUrl = 'https://github.com/NuggaN85/Protection-Anti-Plagiat/archive/refs/heads/master.zip';
$zipFile = 'master.zip';

// Vérifier et télécharger le fichier ZIP en utilisant file_get_contents et file_put_contents pour une meilleure gestion des erreurs
$response = @file_get_contents($fileUrl);
if ($response === FALSE) {
    echo 'Oups, le téléchargement du fichier a échoué...';
    exit;
}
if (file_put_contents($zipFile, $response) === FALSE) {
    echo 'Oups, l\'enregistrement du fichier a échoué...';
    exit;
}

$zip = new ZipArchive();

// Vérifier si l'ouverture du fichier ZIP réussit.
if ($zip->open($zipFile) === TRUE) {
    // Extraction du fichier ZIP.
    $extractPath = './';
    if ($zip->extractTo($extractPath) === FALSE) {
        echo 'Oups, l\'extraction du fichier ZIP a échoué...';
        $zip->close();
        unlink($zipFile);
        exit;
    }
    $zip->close();
    unlink($zipFile);

    // Copie des fichiers du répertoire papprotect au répertoire par défaut.
    $sourceDir = "Protection-Anti-Plagiat/papprotect";
    if (!is_dir($sourceDir)) {
        echo 'Le répertoire source est introuvable...';
        exit;
    }

    $files = find_all_files($sourceDir);

    foreach ($files as $file) {
        $destination = basename($file);
        $fullDestination = "./$destination";
        
        if (is_file($file)) {
            // Utiliser le chemin complet pour la copie.
            echo '[FILE] ' . $file . ' -> ' . $fullDestination . PHP_EOL;
            if (!copy($file, $fullDestination)) {
                echo 'Échec de la copie du fichier ' . $file . '...';
            }
        } elseif (is_dir($file)) {
            echo '[DIR]  ' . $file . PHP_EOL;
            
            if (!is_dir($fullDestination)) {
                // Créer le répertoire avec le chemin complet.
                if (!mkdir($fullDestination, 0755, true)) {
                    echo 'Échec de la création du répertoire ' . $fullDestination . '...';
                }
            }
        }
    }

    // Suppression du dossier papprotect au répertoire par défaut après l'extraction.
    foreach ($files as $file) {
        if (is_dir($file)) {
            echo '[REM]  ' . $file . PHP_EOL;
            if (!@rmdir($file)) {
                echo 'Échec de la suppression du répertoire ' . $file . '...';
            }
        }
    }
    @rmdir($sourceDir);

    // Vérifier si la copie a réussi.
    if (file_exists('index.php')) {
        // Redirection vers la page d'installation de papprotect.
        echo '<meta http-equiv="refresh" content="1;url=index.php" />';
    } else {
        echo 'Oups, cela n\'a pas fonctionné...';
    }
} else {
    echo 'Oups, l\'ouverture du fichier ZIP a échoué...';
}

// Fonction améliorée pour rechercher tous les fichiers et répertoires de manière récursive
function find_all_files($dir)
{
    $result = [];
    $dir = rtrim($dir, '/') . '/';
    
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($files as $file) {
        $result[] = $file->getPathname();
    }
    
    return $result;
}
?>
