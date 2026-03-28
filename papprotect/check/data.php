<?php
/**
 * data.php — Chargement de la liste des bots indésirables
 *
 * Charge bad_bots.php et expose $bad_bots pour les traitements ultérieurs.
 * Ce fichier est un simple bootstrapper ; la logique de détection se trouve
 * dans papprotect.php.
 */

declare(strict_types=1);

$badBotsFile = __DIR__ . DIRECTORY_SEPARATOR . 'papprotect' . DIRECTORY_SEPARATOR . 'bad_bots.php';

if (!is_file($badBotsFile)) {
    exit('Le fichier bad_bots.php est introuvable dans le répertoire papprotect.');
}

/** @var array<string> $bad_bots */
$bad_bots = require $badBotsFile;

if (!is_array($bad_bots) || $bad_bots === []) {
    exit('bad_bots.php ne retourne pas un tableau valide.');
}

// Continuez ici avec les opérations de détection de bots…
