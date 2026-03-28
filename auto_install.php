<?php
/**
 * auto_install.php — Installation automatique de Protection-Anti-Plagiat
 *
 * Télécharge l'archive depuis GitHub, extrait le contenu et installe
 * les fichiers dans le répertoire courant, puis redirige vers index.php.
 *
 * ⚠ À supprimer du serveur après installation.
 */

declare(strict_types=1);

ini_set('display_errors', '0');
ini_set('log_errors',     '1');
// Ajustez le chemin ci-dessous selon votre configuration serveur :
ini_set('error_log', '/var/log/php-error.log');
error_reporting(E_ALL);
set_time_limit(0);

// ── Constantes ────────────────────────────────────────────────────────────────
const ARCHIVE_URL  = 'https://github.com/NuggaN85/Protection-Anti-Plagiat/archive/refs/heads/master.zip';
const ARCHIVE_FILE = 'master.zip';
const SOURCE_DIR   = 'Protection-Anti-Plagiat-master/papprotect';
const DEST_DIR     = './';

echo "<pre>\n";
echo '<span style="color:blue">TÉLÉCHARGEMENT…</span>' . PHP_EOL;

// ── 1. Téléchargement ─────────────────────────────────────────────────────────
$data = @file_get_contents(ARCHIVE_URL);
if ($data === false) {
    exit('Échec du téléchargement de l\'archive.');
}
if (file_put_contents(ARCHIVE_FILE, $data) === false) {
    exit('Impossible d\'écrire l\'archive sur le disque.');
}
echo 'Archive téléchargée.' . PHP_EOL;

// ── 2. Extraction ─────────────────────────────────────────────────────────────
$zip = new ZipArchive();
$openResult = $zip->open(ARCHIVE_FILE);
if ($openResult !== true) {
    @unlink(ARCHIVE_FILE);
    exit("Impossible d'ouvrir le fichier ZIP (code : $openResult).");
}

if (!$zip->extractTo(DEST_DIR)) {
    $zip->close();
    @unlink(ARCHIVE_FILE);
    exit('Échec de l\'extraction du fichier ZIP.');
}
$zip->close();
@unlink(ARCHIVE_FILE);
echo 'Archive extraite.' . PHP_EOL;

// ── 3. Copie des fichiers ─────────────────────────────────────────────────────
if (!is_dir(SOURCE_DIR)) {
    exit('Le répertoire source est introuvable : ' . SOURCE_DIR);
}

/**
 * Retourne récursivement tous les fichiers et répertoires d'un dossier.
 *
 * @return \SplFileInfo[]
 */
function listFilesRecursive(string $dir): array
{
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    return iterator_to_array($iterator, false);
}

/** @var \SplFileInfo[] $items */
$items = listFilesRecursive(SOURCE_DIR);

// Copie (répertoires d'abord, puis fichiers)
foreach ($items as $item) {
    $relative = substr($item->getPathname(), strlen(SOURCE_DIR) + 1);
    $dest     = rtrim(DEST_DIR, '/') . '/' . $relative;

    if ($item->isDir()) {
        if (!is_dir($dest) && !mkdir($dest, 0755, true)) {
            echo "[WARN] Impossible de créer : $dest" . PHP_EOL;
        } else {
            echo "[DIR]  $dest" . PHP_EOL;
        }
    } elseif ($item->isFile()) {
        if (!copy($item->getPathname(), $dest)) {
            echo "[WARN] Copie échouée : {$item->getPathname()}" . PHP_EOL;
        } else {
            echo "[FILE] {$item->getPathname()} → $dest" . PHP_EOL;
        }
    }
}

// ── 4. Nettoyage du dossier extrait ──────────────────────────────────────────
$allItems = listFilesRecursive(SOURCE_DIR);
// Supprimer fichiers d'abord, puis répertoires (du plus profond au plus haut)
$dirs = [];
foreach (array_reverse($allItems) as $item) {
    if ($item->isFile()) {
        @unlink($item->getPathname());
    } elseif ($item->isDir()) {
        $dirs[] = $item->getPathname();
    }
}
foreach ($dirs as $d) {
    @rmdir($d);
}
@rmdir(SOURCE_DIR);
// Supprimer le dossier racine de l'archive extraite
@rmdir(dirname(SOURCE_DIR));

echo 'Nettoyage terminé.' . PHP_EOL;

// ── 5. Redirection ────────────────────────────────────────────────────────────
if (is_file('index.php')) {
    echo '</pre>';
    echo '<meta http-equiv="refresh" content="1;url=index.php">';
} else {
    exit('Installation incomplète : index.php introuvable.');
}
