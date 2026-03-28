<?php
/**
 * index.php — Redirection permanente vers la racine du site
 *
 * Vérifie que index.php existe bien deux niveaux au-dessus avant de rediriger.
 */

declare(strict_types=1);

$target = realpath(__DIR__ . '/../../index.php');

if ($target !== false && is_file($target)) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: /index.php');
    exit();
}

// Le fichier cible est introuvable — erreur explicite
http_response_code(500);
exit('Redirection impossible. Veuillez contacter l\'administrateur.');
